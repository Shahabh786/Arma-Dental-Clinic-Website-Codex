<?php
declare(strict_types=1);
$pageKey = 'appointments';
require_once __DIR__ . '/includes/config.php';

$formStatus = '';
$submittedName = '';
$timezone = new DateTimeZone('Asia/Kolkata');
$now = new DateTimeImmutable('now', $timezone);
$todayDate = $now->format('Y-m-d');
$defaultDate = $now->format('H:i') < '21:30'
    ? $todayDate
    : $now->modify('+1 day')->format('Y-m-d');

$selectedDate = $defaultDate;
$selectedSlot = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $submittedName = trim((string) ($_POST['name'] ?? ''));
    $phone = trim((string) ($_POST['phone'] ?? ''));
    $appointmentDateRaw = trim((string) ($_POST['date'] ?? ''));
    $appointmentDate = '';
    $selectedSlot = trim((string) ($_POST['slot_time'] ?? ''));

    if ($appointmentDateRaw !== '') {
        $parsedAppointmentDate = DateTimeImmutable::createFromFormat('Y-m-d', $appointmentDateRaw, $timezone);
        if ($parsedAppointmentDate && $parsedAppointmentDate->format('Y-m-d') === $appointmentDateRaw) {
            $appointmentDate = $appointmentDateRaw;
        }
    }

    if ($appointmentDate !== '') {
        $selectedDate = $appointmentDate;
    }

    if ($submittedName !== '' && $phone !== '' && $appointmentDate !== '' && $selectedSlot !== '') {
        $displayDate = DateTimeImmutable::createFromFormat('Y-m-d', $appointmentDate, $timezone);
        $formStatus = 'Thank you, ' . $submittedName . '. Your appointment request for ' . ($displayDate ? $displayDate->format('d/m/Y') : $appointmentDate) . ' at ' . $selectedSlot . ' has been received. We will contact you shortly.';
    } else {
        $formStatus = 'Please complete your details, choose a date, and select an available time slot.';
    }
}

require_once __DIR__ . '/includes/header.php';
?>
<section class="w-full bg-white px-4 py-16 sm:px-6 lg:px-10">
    <div class="mx-auto max-w-[1600px]">
        <div class="reveal max-w-3xl">
            <p class="text-xs uppercase tracking-widest text-arma-700">Appointments</p>
            <h1 class="mt-4 text-4xl font-bold text-arma-900 sm:text-5xl">Book Your Visit in Minutes</h1>
            <p class="mt-4 text-base text-arma-800">
                Share your preferred slot and concern. Our team will confirm your appointment quickly.
            </p>
        </div>
    </div>
</section>

<section class="soft-surface w-full px-4 py-16 sm:px-6 lg:px-10">
    <div class="mx-auto grid max-w-[1600px] gap-8 lg:grid-cols-[1fr_1.1fr]">
        <div class="reveal rounded-3xl border border-arma-500/40 bg-white p-8 shadow-premium">
            <h2 class="text-2xl font-bold text-arma-900">Why Patients Choose Us</h2>
            <ul class="mt-5 space-y-3 text-sm text-arma-800 sm:text-base">
                <li class="rounded-xl bg-arma-100 p-3">Comfort-first clinical environment</li>
                <li class="rounded-xl bg-arma-100 p-3">Transparent diagnosis and treatment options</li>
                <li class="rounded-xl bg-arma-100 p-3">Modern equipment and strict sterilization protocols</li>
                <li class="rounded-xl bg-arma-100 p-3">Flexible scheduling with responsive follow-up</li>
            </ul>
            <div class="mt-6 text-sm text-arma-800">
                <p><strong>Phone:</strong> <a href="tel:+917304996569" class="underline"><?= esc(SITE_PHONE) ?></a></p>
                <p class="mt-2"><strong>Email:</strong> <a href="mailto:<?= esc(SITE_EMAIL) ?>" class="underline"><?= esc(SITE_EMAIL) ?></a></p>
            </div>
        </div>

        <div id="appointment-request-form" class="reveal rounded-3xl bg-white p-8 shadow-premium">
            <h2 class="text-2xl font-semibold text-arma-900">Appointment Request Form</h2>
            <?php if ($formStatus !== ''): ?>
                <div class="mt-4 rounded-xl border border-arma-500 bg-arma-100 p-4 text-sm text-arma-900">
                    <?= esc($formStatus) ?>
                </div>
            <?php endif; ?>
            <form method="post" action="/appointments.php" class="mt-6 grid gap-4" novalidate>
                <label class="text-sm font-medium text-arma-800" for="name">Full Name *</label>
                <input id="name" name="name" type="text" required class="rounded-xl border border-arma-500 bg-arma-100 px-4 py-3 text-sm text-arma-900 outline-none transition focus:border-arma-800 focus:ring-2 focus:ring-arma-500/40">

                <label class="text-sm font-medium text-arma-800" for="phone">Phone Number *</label>
                <input id="phone" name="phone" type="tel" required class="rounded-xl border border-arma-500 bg-arma-100 px-4 py-3 text-sm text-arma-900 outline-none transition focus:border-arma-800 focus:ring-2 focus:ring-arma-500/40">

                <label class="text-sm font-medium text-arma-800" for="form-date">Preferred Date *</label>
                <div class="relative">
                    <input id="form-date" type="text" required placeholder="Select preferred date" autocomplete="off" class="w-full rounded-xl border border-arma-500 bg-arma-100 px-4 py-3 pr-11 text-sm text-arma-900 outline-none transition focus:border-arma-800 focus:ring-2 focus:ring-arma-500/40">
                    <input id="form-date-value" name="date" type="hidden" value="<?= esc($selectedDate) ?>">
                    <span class="pointer-events-none absolute inset-y-0 right-3 inline-flex items-center text-arma-700" aria-hidden="true">
                        <svg viewBox="0 0 24 24" class="h-5 w-5" fill="none" stroke="currentColor" stroke-width="2">
                            <rect x="3" y="5" width="18" height="16" rx="2"></rect>
                            <path d="M16 3v4M8 3v4M3 10h18"></path>
                        </svg>
                    </span>
                </div>

                <div>
                    <label class="text-sm font-medium text-arma-800" for="slot-time">Preferred Time Slot *</label>
                    <select id="slot-time" name="slot_time" required disabled class="mt-1 w-full rounded-xl border border-arma-500 bg-arma-100 px-4 py-3 text-sm text-arma-900 outline-none transition focus:border-arma-800 focus:ring-2 focus:ring-arma-500/40 disabled:cursor-not-allowed disabled:opacity-70">
                        <option value="">Select a date first</option>
                    </select>
                    <p id="slot-loading-state" class="mt-2 text-xs text-arma-700">Pick a date to load available time slots.</p>
                    <p id="slot-error" class="mt-2 hidden rounded-lg border border-rose-300 bg-rose-50 px-3 py-2 text-xs text-rose-700"></p>
                </div>

                <label class="text-sm font-medium text-arma-800" for="service">Service Needed</label>
                <select id="service" name="service" class="rounded-xl border border-arma-500 bg-arma-100 px-4 py-3 text-sm text-arma-900 outline-none transition focus:border-arma-800 focus:ring-2 focus:ring-arma-500/40">
                    <option value="">Select a service</option>
                    <option>General Checkup</option>
                    <option>Root Canal Treatment</option>
                    <option>Teeth Whitening</option>
                    <option>Dental Implants</option>
                    <option>Smile Design</option>
                </select>

                <label class="text-sm font-medium text-arma-800" for="message">Additional Notes</label>
                <textarea id="message" name="message" rows="4" class="rounded-xl border border-arma-500 bg-arma-100 px-4 py-3 text-sm text-arma-900 outline-none transition focus:border-arma-800 focus:ring-2 focus:ring-arma-500/40"></textarea>

                <button type="submit" class="lift-hover mt-2 rounded-full bg-arma-900 px-6 py-3 text-sm font-semibold text-white">
                    <span id="appointment-submit-label">Submit Request</span>
                </button>
            </form>
        </div>
    </div>
</section>

<div id="appointment-toast" class="appointment-toast pointer-events-none fixed right-4 top-24 z-50 max-w-sm rounded-xl px-4 py-3 text-sm shadow-premium" role="status" aria-live="polite"></div>

<script>
    window.appointmentAvailabilityConfig = {
        endpoint: '/api/appointments-availability.php',
        requestEndpoint: '/api/website-appointment-requests.php',
        initialDate: '<?= esc($selectedDate) ?>',
        minDate: '<?= esc($todayDate) ?>',
        initialSlot: '<?= esc($selectedSlot) ?>'
    };
</script>
<?php require_once __DIR__ . '/includes/footer.php'; ?>
