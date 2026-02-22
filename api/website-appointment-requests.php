<?php
declare(strict_types=1);

ini_set('display_errors', '0');
header('Content-Type: application/json; charset=utf-8');

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
 * @param array<string, mixed> $payload
 */
function forward_request(string $url, string $token, array $payload): void
{
    $ch = curl_init($url);
    if ($ch === false) {
        throw new RuntimeException('Unable to initialize API client.');
    }

    $body = json_encode($payload, JSON_THROW_ON_ERROR);

    curl_setopt_array($ch, [
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_TIMEOUT => 20,
        CURLOPT_POST => true,
        CURLOPT_POSTFIELDS => $body,
        CURLOPT_HTTPHEADER => [
            'Accept: application/json',
            'Content-Type: application/json',
            'Authorization: Bearer ' . $token,
        ],
    ]);

    $response = curl_exec($ch);
    $status = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    $error = curl_error($ch);

    if ($response === false) {
        throw new RuntimeException('Unable to submit appointment request. ' . $error);
    }

    if ($status >= 400) {
        throw new RuntimeException('Appointment API returned HTTP ' . $status . '.');
    }
}

try {
    if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
        http_response_code(405);
        throw new RuntimeException('Method not allowed.');
    }

    $rawBody = file_get_contents('php://input');
    if ($rawBody === false || trim($rawBody) === '') {
        throw new RuntimeException('Request body is required.');
    }

    $decoded = json_decode($rawBody, true);
    if (!is_array($decoded)) {
        throw new RuntimeException('Invalid JSON payload.');
    }

    $requiredFields = [
        'full_name',
        'phone_number',
        'appointment_date',
        'appointment_time_slot',
    ];

    foreach ($requiredFields as $field) {
        $value = trim((string) ($decoded[$field] ?? ''));
        if ($value === '') {
            throw new RuntimeException('Missing required field: ' . $field . '.');
        }
    }

    $date = trim((string) ($decoded['appointment_date'] ?? ''));
    $dateParsed = DateTimeImmutable::createFromFormat('Y-m-d', $date);
    if (!$dateParsed || $dateParsed->format('Y-m-d') !== $date) {
        throw new RuntimeException('Invalid appointment_date. Expected YYYY-MM-DD.');
    }

    $payload = [
        'full_name' => trim((string) ($decoded['full_name'] ?? '')),
        'phone_number' => trim((string) ($decoded['phone_number'] ?? '')),
        'appointment_date' => $date,
        'appointment_time_slot' => trim((string) ($decoded['appointment_time_slot'] ?? '')),
        'service_needed' => trim((string) ($decoded['service_needed'] ?? 'General Checkup')),
        'additional_notes' => trim((string) ($decoded['additional_notes'] ?? '')),
    ];

    $env = load_env(__DIR__ . '/../.env');
    $token = $env['TOKEN'] ?? ($env['APPOINTMENTS_API_TOKEN'] ?? ($env['API_TOKEN'] ?? ''));
    $endpoint = $env['APPOINTMENTS_API_ENDPOINT'] ?? ($env['API_ENDPOINT'] ?? '');

    if ($token === '' || $endpoint === '') {
        throw new RuntimeException('API configuration missing in .env file.');
    }

    $endpoint = rtrim($endpoint, '/');
    if (str_ends_with($endpoint, '/api')) {
        $targetUrl = $endpoint . '/website-appointment-requests';
    } elseif (str_ends_with($endpoint, '/api/website-appointment-requests')) {
        $targetUrl = $endpoint;
    } else {
        $targetUrl = $endpoint . '/api/website-appointment-requests';
    }

    forward_request($targetUrl, $token, $payload);

    echo json_encode([
        'ok' => true,
        'message' => "Appointment request submitted. You'll receive a confirmation shortly.",
    ], JSON_THROW_ON_ERROR);
} catch (Throwable $e) {
    if (http_response_code() < 400) {
        http_response_code(400);
    }
    echo json_encode([
        'ok' => false,
        'error' => $e->getMessage(),
    ]);
}
