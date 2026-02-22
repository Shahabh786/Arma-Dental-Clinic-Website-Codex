<?php
declare(strict_types=1);

ini_set('display_errors', '0');
header('Content-Type: application/json; charset=utf-8');

const CLINIC_TIMEZONE = 'Asia/Kolkata';
const SLOT_INTERVAL_MINUTES = 30;
const CLINIC_WINDOWS = [
    ['start' => '11:00', 'end' => '14:30'],
    ['start' => '17:30', 'end' => '22:00'],
];

/**
 * @return array<string, string>
 */
function load_env(string $path): array
{
    if (!is_file($path) || !is_readable($path)) {
        return [];
    }

    $vars = [];
    $lines = file($path, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    if ($lines === false) {
        return [];
    }

    foreach ($lines as $line) {
        $trimmed = trim($line);
        if ($trimmed === '' || str_starts_with($trimmed, '#')) {
            continue;
        }

        $parts = explode('=', $trimmed, 2);
        if (count($parts) !== 2) {
            continue;
        }

        $key = trim($parts[0]);
        $value = trim($parts[1]);
        $value = trim($value, "\"'");
        if ($key !== '') {
            $vars[$key] = $value;
        }
    }

    return $vars;
}

/**
 * @return array<int, array<string, mixed>>
 */
function fetch_appointments(string $url, string $token): array
{
    $ch = curl_init($url);
    if ($ch === false) {
        throw new RuntimeException('Unable to initialize API client.');
    }

    curl_setopt_array($ch, [
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_TIMEOUT => 20,
        CURLOPT_HTTPHEADER => [
            'Accept: application/json',
            'Authorization: Bearer ' . $token,
        ],
    ]);

    $response = curl_exec($ch);
    $status = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    $error = curl_error($ch);

    if ($response === false) {
        throw new RuntimeException('Unable to fetch availability right now. ' . $error);
    }

    if ($status >= 400) {
        throw new RuntimeException('Availability API returned HTTP ' . $status . '.');
    }

    $decoded = json_decode($response, true);
    if (!is_array($decoded)) {
        throw new RuntimeException('Invalid availability response received.');
    }

    if (array_is_list($decoded)) {
        return $decoded;
    }
    if (isset($decoded['data']) && is_array($decoded['data'])) {
        return $decoded['data'];
    }
    if (isset($decoded['appointments']) && is_array($decoded['appointments'])) {
        return $decoded['appointments'];
    }
    if (isset($decoded['items']) && is_array($decoded['items'])) {
        return $decoded['items'];
    }

    throw new RuntimeException('Availability payload did not contain appointment records.');
}

/**
 * @return array<int, string>
 */
function build_slot_keys(): array
{
    $slots = [];

    foreach (CLINIC_WINDOWS as $window) {
        [$startHour, $startMinute] = array_map('intval', explode(':', $window['start']));
        [$endHour, $endMinute] = array_map('intval', explode(':', $window['end']));

        $startMinutes = ($startHour * 60) + $startMinute;
        $endMinutes = ($endHour * 60) + $endMinute;

        for ($minute = $startMinutes; $minute < $endMinutes; $minute += SLOT_INTERVAL_MINUTES) {
            $hour = intdiv($minute, 60);
            $min = $minute % 60;
            $slots[] = sprintf('%02d:%02d', $hour, $min);
        }
    }

    return $slots;
}

try {
    $date = (string) ($_GET['date'] ?? '');
    $timezone = new DateTimeZone(CLINIC_TIMEZONE);
    if ($date === '') {
        $date = (new DateTimeImmutable('now', $timezone))->format('Y-m-d');
    }

    $selectedDate = DateTimeImmutable::createFromFormat('Y-m-d', $date, $timezone);
    if (!$selectedDate || $selectedDate->format('Y-m-d') !== $date) {
        throw new RuntimeException('Invalid date format. Expected YYYY-MM-DD.');
    }

    $env = load_env(__DIR__ . '/../.env');
    $token = $env['TOKEN'] ?? ($env['APPOINTMENTS_API_TOKEN'] ?? ($env['API_TOKEN'] ?? ''));
    $endpoint = $env['APPOINTMENTS_API_ENDPOINT'] ?? ($env['API_ENDPOINT'] ?? '');

    if ($token === '' || $endpoint === '') {
        throw new RuntimeException('API configuration missing in .env file.');
    }

    $endpoint = rtrim($endpoint, '/');
    $apiUrl = preg_match('#/api$#', $endpoint) === 1 ? $endpoint . '/appointments' : $endpoint;

    $appointments = fetch_appointments($apiUrl, $token);
    $slotKeys = build_slot_keys();
    $bookedBySlot = [];

    foreach ($appointments as $item) {
        if (!is_array($item) || !isset($item['from_time'])) {
            continue;
        }

        $status = (string) ($item['status'] ?? '');
        if (in_array(strtolower($status), ['cancelled', 'canceled'], true)) {
            continue;
        }

        try {
            $from = new DateTimeImmutable((string) $item['from_time']);
            $local = $from->setTimezone($timezone);
        } catch (Throwable $e) {
            continue;
        }

        if ($local->format('Y-m-d') !== $date) {
            continue;
        }

        $slotKey = $local->format('H:i');
        $bookedBySlot[$slotKey] = [
            'patient_name' => (string) ($item['patient_name'] ?? 'Booked'),
            'doctor_name' => (string) ($item['doc_name'] ?? ''),
            'status' => $status,
        ];
    }

    $now = new DateTimeImmutable('now', $timezone);
    $isToday = $date === $now->format('Y-m-d');
    $slots = [];

    foreach ($slotKeys as $slotKey) {
        [$hour, $minute] = array_map('intval', explode(':', $slotKey));
        $slotStart = $selectedDate->setTime($hour, $minute);
        $slotEnd = $slotStart->modify('+' . SLOT_INTERVAL_MINUTES . ' minutes');
        $slotLabel = $slotStart->format('h:i A') . ' - ' . $slotEnd->format('h:i A');

        $isPast = $isToday && $slotStart < $now;
        $isBooked = isset($bookedBySlot[$slotKey]);
        $available = !$isPast && !$isBooked;

        $slots[] = [
            'time' => $slotKey,
            'label' => $slotLabel,
            'available' => $available,
            'booked' => $isBooked,
            'past' => $isPast,
            'details' => $bookedBySlot[$slotKey] ?? null,
        ];
    }

    $bookedCount = count(array_filter($slots, static fn(array $slot): bool => $slot['booked'] === true));
    $availableCount = count(array_filter($slots, static fn(array $slot): bool => $slot['available'] === true));

    echo json_encode([
        'ok' => true,
        'date' => $date,
        'timezone' => CLINIC_TIMEZONE,
        'slots' => $slots,
        'summary' => [
            'total' => count($slots),
            'available' => $availableCount,
            'booked' => $bookedCount,
        ],
    ], JSON_THROW_ON_ERROR);
} catch (Throwable $e) {
    echo json_encode([
        'ok' => false,
        'error' => $e->getMessage(),
    ]);
}
