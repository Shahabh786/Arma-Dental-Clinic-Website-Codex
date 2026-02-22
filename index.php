<?php
$pageTitle = 'Arma Dental Clinic | Dental Clinic for Smile Design and Family Dentistry';
$metaDescription = 'Arma Dental Clinic provides modern, painless dental treatments including smile makeovers, implants, and preventive care. Book an appointment today.';
$pagePath = 'index.php';
require_once __DIR__ . '/includes/header.php';
?>

<main>
  <section class="hero">
    <div class="container hero-grid">
      <div class="hero-copy">
        <p class="eyebrow">Trusted Modern Dentistry</p>
        <h1>Confident Smiles, Designed with Precision.</h1>
        <p>
          At <strong><?php echo esc($clinicName); ?></strong>, we combine advanced dental technology,
          precise diagnostics, and a calm care experience for families and professionals.
        </p>
        <div class="hero-actions">
          <a class="btn btn-primary" href="appointments.php#appointment-request-form">Schedule Visit</a>
          <a class="btn btn-outline" href="<?php echo esc($whatsAppLink); ?>?text=Hi%20Arma%20Dental%20Clinic%2C%20I%20want%20to%20book%20an%20appointment." target="_blank" rel="noopener">Book on WhatsApp</a>
        </div>
        <ul class="hero-points">
          <li>Painless treatment protocols</li>
          <li>Digital smile planning</li>
          <li>Strict sterilization standards</li>
        </ul>
      </div>

      <div class="hero-card" aria-hidden="true">
        <div class="hero-card-top">
          <span>Opening Hours</span>
          <strong>Tue-Sun: 11:00 AM to 2:30 PM, 5:30 PM to 10:00 PM</strong>
        </div>
        <div class="hero-card-body">
          <p>Need urgent dental help?</p>
          <a href="<?php echo esc($callLink); ?>"><?php echo esc($phone); ?></a>
        </div>
        <div class="hero-card-badge">4.9 ★ Patient Experience</div>
        <img src="assets/images/hero-dental.jpg" alt="Modern dental clinic treatment" style="width:100%;height:210px;object-fit:cover;border-radius:14px;margin-top:16px;" loading="eager">
      </div>
    </div>
  </section>

  <section class="stats">
    <div class="container stat-grid">
      <article>
        <h2>12+</h2>
        <p>Years of Clinical Practice</p>
      </article>
      <article>
        <h2>20k+</h2>
        <p>Smiles Treated</p>
      </article>
      <article>
        <h2>98%</h2>
        <p>Patient Satisfaction</p>
      </article>
      <article>
        <h2>100%</h2>
        <p>Hygiene Compliant Care</p>
      </article>
    </div>
  </section>

  <section class="services section">
    <div class="container">
      <div class="section-head">
        <p class="eyebrow">Core Treatments</p>
        <h2>Advanced Dentistry Tailored to You</h2>
      </div>
      <div class="service-grid">
        <article class="service-card">
          <h3>Smile Makeover</h3>
          <p>Customized aesthetic planning with veneers, whitening, and contouring.</p>
        </article>
        <article class="service-card">
          <h3>Dental Implants</h3>
          <p>Long-term, natural-looking tooth replacement with guided implant surgery.</p>
        </article>
        <article class="service-card">
          <h3>Root Canal Treatment</h3>
          <p>Microscope-assisted, painless RCT to preserve your natural tooth.</p>
        </article>
      </div>
      <div class="section-cta">
        <a class="btn btn-outline" href="services.php">View All Services</a>
      </div>
    </div>
  </section>

  <section class="why section">
    <div class="container why-grid">
      <div>
        <p class="eyebrow">Why Patients Choose Us</p>
        <h2>Premium Care. Human Approach.</h2>
        <p>
          We focus on clarity, comfort, and continuity. Every consultation includes detailed
          treatment explanations, transparent planning, and follow-up care.
        </p>
      </div>
      <ul class="tick-list">
        <li>Digital X-ray and advanced diagnostics</li>
        <li>Experienced team with multi-speciality support</li>
        <li>Transparent treatment estimates</li>
        <li>Comfort-first chairside experience</li>
      </ul>
    </div>
  </section>

  <section class="process section">
    <div class="container">
      <div class="section-head">
        <p class="eyebrow">How We Work</p>
        <h2>A Simple 3-Step Treatment Journey</h2>
      </div>
      <div class="process-grid">
        <article>
          <span>01</span>
          <h3>Consultation</h3>
          <p>Detailed oral exam, diagnosis, and smile analysis.</p>
        </article>
        <article>
          <span>02</span>
          <h3>Treatment Plan</h3>
          <p>Personalized options with timeline and transparent costs.</p>
        </article>
        <article>
          <span>03</span>
          <h3>Care and Follow-Up</h3>
          <p>Precise procedure execution and post-treatment support.</p>
        </article>
      </div>
    </div>
  </section>
</main>

<?php require_once __DIR__ . '/includes/footer.php'; ?>
