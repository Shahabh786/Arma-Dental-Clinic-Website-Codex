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
          <a class="btn btn-outline" href="<?php echo esc($whatsAppLink); ?>?text=Hi%20Arma%20Dental%20Clinic%2C%20please%20help%20me%20book%20an%20appointment." target="_blank" rel="noopener">
            <svg viewBox="0 0 24 24" aria-hidden="true" class="btn-icon">
              <path fill="currentColor" d="M12.04 2C6.62 2 2.2 6.4 2.2 11.84c0 1.74.46 3.44 1.33 4.95L2 22l5.35-1.4a9.86 9.86 0 0 0 4.69 1.2h.01c5.42 0 9.84-4.4 9.84-9.84A9.84 9.84 0 0 0 12.04 2Zm0 18.05h-.01c-1.47 0-2.91-.4-4.16-1.16l-.3-.18-3.18.83.85-3.1-.2-.32a8.05 8.05 0 0 1-1.25-4.28c0-4.44 3.62-8.06 8.07-8.06a8.03 8.03 0 0 1 8.05 8.05 8.06 8.06 0 0 1-8.07 8.22Zm4.43-6.02c-.24-.12-1.44-.71-1.66-.79-.22-.08-.38-.12-.54.12-.16.24-.62.79-.76.95-.14.16-.28.18-.52.06-.24-.12-1.02-.38-1.95-1.21-.72-.64-1.21-1.43-1.35-1.67-.14-.24-.01-.37.11-.49.11-.11.24-.28.36-.42.12-.14.16-.24.24-.4.08-.16.04-.3-.02-.42-.06-.12-.54-1.3-.74-1.78-.2-.48-.4-.41-.54-.42h-.46c-.16 0-.42.06-.64.3-.22.24-.84.82-.84 2s.86 2.33.98 2.49c.12.16 1.69 2.58 4.09 3.62.57.25 1.02.4 1.37.52.58.18 1.11.15 1.53.09.47-.07 1.44-.59 1.64-1.16.2-.57.2-1.05.14-1.16-.06-.11-.22-.18-.46-.3Z"></path>
            </svg>
            <span>Message</span>
          </a>
        </div>
        <ul class="tick-list">
          <li>Email: <a href="mailto:<?php echo esc($email); ?>"><?php echo esc($email); ?></a></li>
          <li>Address: <?php echo esc($address); ?></li>
        </ul>
      </div>

      <form class="appointment-form" data-whatsapp-form="true" action="<?php echo esc($whatsAppLink); ?>" method="get" target="_blank" novalidate>
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

  <section id="hours-directions" class="section">
    <div class="container">
      <div class="section-head">
        <p class="eyebrow">Visit Our Clinic</p>
        <h2>Find Arma Dental Clinic on Map</h2>
      </div>
      <div class="map-hours-grid">
        <div class="hero-card map-card" style="padding:0; overflow:hidden;">
          <iframe class="map-iframe" src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3765.909440412022!2d72.860954!3d19.286304000000005!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3be7b1e4006d61ff%3A0x70fb19858ab1c0ca!2sArma%20Dental%20Clinic!5e0!3m2!1sen!2sin!4v1771441799776!5m2!1sen!2sin" style="border:0;display:block;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade" title="Arma Dental Clinic map"></iframe>
        </div>
        <div class="contact-actions map-links-actions" style="margin-top:14px;">
          <a class="btn btn-primary" href="https://maps.google.com/?q=Arma%20Dental%20Clinic%20Mira%20Road" target="_blank" rel="noopener">Google Map</a>
          <a class="btn btn-outline" href="https://maps.apple/p/k9aj_ZuJ9-wgHZ" target="_blank" rel="noopener">Apple Map</a>
        </div>
        <aside class="hero-card clinic-hours-card" aria-label="Clinic hours">
          <p class="eyebrow">Clinic Hours</p>
          <h3>Open Tuesday to Sunday</h3>
          <div class="hours-block">
            <p><strong>Morning</strong></p>
            <p>11:00 AM to 2:30 PM</p>
          </div>
          <div class="hours-block">
            <p><strong>Evening</strong></p>
            <p>05:30 PM to 10:00 PM</p>
          </div>
          <p class="hours-open-days">Tuesday - Sunday: Working</p>
          <p class="hours-closed-day">Monday: Closed</p>
        </aside>
      </div>
    </div>
  </section>
</main>

<?php require_once __DIR__ . '/includes/footer.php'; ?>
