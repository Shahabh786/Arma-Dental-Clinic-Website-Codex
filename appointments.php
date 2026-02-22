<?php
$pageTitle = 'Book Appointment | Arma Dental Clinic';
$metaDescription = 'Book your appointment at Arma Dental Clinic, choose your preferred date and available slot, and submit your request online.';
$metaKeywords = 'book dentist appointment Mira Road, Arma Dental Clinic booking, dental consultation';
$pagePath = 'appointments.php';
require_once __DIR__ . '/includes/header.php';

$timezone = new DateTimeZone('Asia/Kolkata');
$now = new DateTimeImmutable('now', $timezone);
$todayDate = $now->format('Y-m-d');
$defaultDate = $now->format('H:i') < '21:30' ? $todayDate : $now->modify('+1 day')->format('Y-m-d');
?>

<main>
  <section class="page-hero section">
    <div class="container">
      <p class="eyebrow">Appointments</p>
      <h1>Book Your Visit in Minutes</h1>
      <p>Pick a date, check live availability, and send your appointment request directly.</p>
    </div>
  </section>

  <section class="contact section">
    <div class="container contact-grid">
      <div>
        <p class="eyebrow">Why Patients Choose Us</p>
        <h2>Comfort-First Dental Experience</h2>
        <ul class="tick-list">
          <li>Transparent diagnosis and treatment options</li>
          <li>Modern equipment with strict sterilization protocols</li>
          <li>Flexible scheduling with responsive follow-up</li>
          <li>Experienced team for all age groups</li>
        </ul>
      </div>

      <form id="appointment-api-form" class="appointment-form" method="post" novalidate>
        <span id="appointment-request-form" class="anchor-offset" aria-hidden="true"></span>
        <label for="name">Full Name *</label>
        <input id="name" name="name" type="text" required />

        <label for="phone">Phone Number *</label>
        <input id="phone" name="phone" type="tel" required />

        <label for="form-date">Preferred Date *</label>
        <input id="form-date" type="date" min="<?php echo esc($todayDate); ?>" required />
        <input id="form-date-value" name="date" type="hidden" value="<?php echo esc($defaultDate); ?>" />

        <label for="slot-time">Preferred Time Slot *</label>
        <select id="slot-time" name="slot_time" required disabled>
          <option value="">Select a date first</option>
        </select>
        <p id="slot-loading-state">Pick a date to load available time slots.</p>
        <p id="slot-error" class="hidden"></p>

        <label for="service">Service Needed</label>
        <select id="service" name="service">
          <option value="">Select a service</option>
          <option>General Checkup</option>
          <option>Root Canal Treatment</option>
          <option>Teeth Whitening</option>
          <option>Dental Implants</option>
          <option>Smile Design</option>
        </select>

        <label for="message">Additional Notes</label>
        <textarea id="message" name="message" rows="4"></textarea>

        <button type="submit" class="btn btn-primary full">
          <span id="appointment-submit-label">Submit Request</span>
        </button>
      </form>
    </div>
  </section>
</main>

<div id="appointment-toast" style="position:fixed;right:16px;top:90px;z-index:70;border-radius:12px;padding:10px 12px;box-shadow:var(--shadow-sm);opacity:0;pointer-events:none;transition:opacity .2s ease;"></div>

<script>
window.appointmentAvailabilityConfig = {
  endpoint: '/api/appointments-availability.php',
  requestEndpoint: '/api/website-appointment-requests.php',
  initialDate: '<?php echo esc($defaultDate); ?>',
  minDate: '<?php echo esc($todayDate); ?>'
};
</script>

<?php require_once __DIR__ . '/includes/footer.php'; ?>
