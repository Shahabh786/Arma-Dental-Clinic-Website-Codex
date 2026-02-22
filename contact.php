<?php
$pageTitle = 'Contact Arma Dental Clinic | Book Appointment on WhatsApp or Call';
$metaDescription = 'Contact Arma Dental Clinic to book an appointment. Call or WhatsApp 7304996569 for smile makeover, implants, root canal, and general dental consultation.';
$pagePath = 'contact.php';
require_once __DIR__ . '/includes/header.php';
?>

<main>
  <section class="page-hero section">
    <div class="container">
      <p class="eyebrow">Contact and Booking</p>
      <h1>Book Your Appointment with Arma Dental Clinic</h1>
      <p>Call us directly or send a WhatsApp message to schedule your visit.</p>
    </div>
  </section>

  <section class="contact section">
    <div class="container contact-grid">
      <div>
        <p class="eyebrow">Get In Touch</p>
        <h2>Start Your Smile Transformation Today</h2>
        <p>
          Our team will help you with consultation slots, treatment guidance, and appointment planning.
          For faster response, share your concern on WhatsApp.
        </p>
        <div class="contact-actions">
          <a class="btn btn-primary" href="<?php echo esc($callLink); ?>">Call <?php echo esc($phone); ?></a>
          <a class="btn btn-outline" href="<?php echo esc($whatsAppLink); ?>?text=Hi%20Arma%20Dental%20Clinic%2C%20please%20help%20me%20book%20an%20appointment." target="_blank" rel="noopener">Message on WhatsApp</a>
        </div>
      </div>

      <form class="appointment-form" action="<?php echo esc($whatsAppLink); ?>" method="get" target="_blank" novalidate>
        <label for="name">Full Name</label>
        <input id="name" name="name" type="text" placeholder="Your name" required />

        <label for="phone">Phone Number</label>
        <input id="phone" name="phone" type="tel" placeholder="Your number" required />

        <label for="service">Treatment Needed</label>
        <select id="service" name="service" required>
          <option value="">Select treatment</option>
          <option>Smile Makeover</option>
          <option>Dental Implants</option>
          <option>Root Canal Treatment</option>
          <option>Braces / Aligners</option>
          <option>Kids Dentistry</option>
          <option>General Checkup</option>
        </select>

        <label for="note">Message</label>
        <textarea id="note" name="note" rows="4" placeholder="Preferred day/time"></textarea>

        <button type="submit" class="btn btn-primary full">Send Booking Request</button>
      </form>
    </div>
  </section>
</main>

<?php require_once __DIR__ . '/includes/footer.php'; ?>
