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
  <section class="page-hero section appointments-page-hero">
    <div class="container">
      <p class="eyebrow">Appointments</p>
      <h1>Book Your Visit in Minutes</h1>
      <p>Pick a date, check live availability, and send your appointment request directly.</p>
      <div class="appointment-badge-row">
        <span class="appointment-badge">No Waiting Time</span>
        <span class="appointment-badge">Gentle Treatment</span>
        <span class="appointment-badge">Transparent Pricing</span>
        <span class="appointment-badge">Sterilized Environment</span>
      </div>
      <p class="lead-dentist-line">All treatments are supervised by Lead Dentist Dr. Alfia Shahab Haidar.</p>
    </div>
  </section>

  <section class="section appointments-page-section">
    <div class="container appointments-layout">
      <aside class="appointments-info-col" data-reveal>
        <div class="appointments-info-card">
          <p class="eyebrow">What Happens Next?</p>
          <h2>Simple and Reassuring Booking Flow</h2>
          <ol class="booking-steps">
            <li><strong>Appointment request received</strong></li>
            <li><strong>Confirmation via WhatsApp/Call</strong></li>
            <li><strong>Visit at scheduled time</strong></li>
            <li><strong>Comfortable consultation</strong></li>
          </ol>
        </div>

        <div class="emergency-booking-card">
          <p class="eyebrow">Priority Support</p>
          <h3>Dental pain or emergency? Call now.</h3>
          <a class="btn btn-primary full" href="<?php echo esc($callLink); ?>">Call Now</a>
        </div>
      </aside>

      <form id="appointment-api-form" class="appointment-form premium-appointment-form" method="post" novalidate data-reveal>
        <span id="appointment-request-form" class="anchor-offset" aria-hidden="true"></span>

        <div class="appointment-form-section">
          <h3>Step 1 - Your Details</h3>
          <label for="name">Full Name *</label>
          <input id="name" name="name" type="text" required />

          <label for="phone">Phone Number *</label>
          <input id="phone" name="phone" type="tel" required />
        </div>

        <div class="appointment-form-section">
          <h3>Step 2 - Appointment Details</h3>
          <label for="doctor">Select Doctor</label>
          <select id="doctor" name="doctor">
            <option value="Dr. Alfia Shahab Haidar (Lead Dentist ⭐ Recommended)">Dr. Alfia Shahab Haidar (Lead Dentist ⭐ Recommended)</option>
            <option value="Dr. Kamal R Kabra">Dr. Kamal R Kabra</option>
            <option value="Dr. Firoz A Khan">Dr. Firoz A Khan</option>
            <option value="Dr. Saqib Khan">Dr. Saqib Khan</option>
            <option value="Any Available Doctor">Any Available Doctor</option>
          </select>

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
        </div>

        <div class="appointment-form-section">
          <h3>Step 3 - Additional Notes</h3>
          <label for="message">Additional Notes</label>
          <textarea id="message" name="message" rows="4"></textarea>
        </div>

        <button type="submit" class="btn btn-primary full">
          <span id="appointment-submit-label">Submit Request</span>
        </button>

        <div class="appointment-microcopy" aria-label="Booking reassurance points">
          <span>Takes less than 30 seconds</span>
          <span>No advance payment required</span>
          <span>Appointment confirmed quickly</span>
        </div>
      </form>
    </div>
  </section>

  <section class="section appointment-social-proof">
    <div class="container">
      <div class="section-head">
        <p class="eyebrow">Patient Confidence</p>
        <h2>Trusted by Families Across Mira Road</h2>
      </div>
      <div class="appointment-proof-grid" data-reveal>
        <article>
          <h3>500+ Happy Patients</h3>
          <p>Growing patient trust built through ethical and comfort-first dentistry.</p>
        </article>
        <article>
          <h3>Google Rated Clinic</h3>
          <p>Consistently appreciated for transparent communication and gentle care.</p>
        </article>
        <article>
          <h3>Patient Satisfaction Highlights</h3>
          <p>Clear treatment plans, minimal waiting time, and supportive follow-up.</p>
        </article>
      </div>
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
