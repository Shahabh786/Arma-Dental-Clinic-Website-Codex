<?php
$pageTitle = 'About Arma Dental Clinic | Experienced Dental Team and Modern Care';
$metaDescription = 'Learn about Arma Dental Clinic, our patient-first philosophy, advanced dental technology, and commitment to safe, high-quality oral care.';
$pagePath = 'about.php';
require_once __DIR__ . '/includes/header.php';
?>

<main>
  <section class="page-hero section">
    <div class="container page-hero-grid">
      <div>
        <p class="eyebrow">About Us</p>
        <h1>Trusted Dental Care Built on Precision and Empathy</h1>
        <p>
          <strong><?php echo esc($clinicName); ?></strong> delivers modern clinical outcomes with a human-centered
          patient experience. We serve families, professionals, and children with comprehensive dentistry.
        </p>
      </div>
      <div class="hero-card">
        <div class="hero-card-top">
          <span>Clinic Promise</span>
          <strong>Clear Advice. Safe Treatment. Lasting Results.</strong>
        </div>
        <div class="hero-card-body">
          <p>Need consultation?</p>
          <a href="<?php echo esc($callLink); ?>"><?php echo esc($phone); ?></a>
        </div>
      </div>
    </div>
  </section>

  <section class="why section">
    <div class="container why-grid">
      <div>
        <p class="eyebrow">Our Philosophy</p>
        <h2>Care Plans That Prioritize Long-Term Oral Health</h2>
        <p>
          We believe good dentistry is preventive, transparent, and personalized. Every patient receives
          structured diagnostics and a clearly explained treatment roadmap.
        </p>
      </div>
      <ul class="tick-list">
        <li>Strict sterilization and hygiene protocols</li>
        <li>Evidence-based treatment decisions</li>
        <li>Conservative, tooth-preserving approach</li>
        <li>Post-treatment review and support</li>
      </ul>
    </div>
  </section>

  <section class="section">
    <div class="container">
      <div class="section-head">
        <p class="eyebrow">What Makes Us Different</p>
        <h2>Designed for Clinical Excellence and Patient Comfort</h2>
      </div>
      <div class="service-grid">
        <article class="service-card">
          <h3>Advanced Diagnostics</h3>
          <p>Digital imaging and modern assessment to improve diagnosis accuracy.</p>
        </article>
        <article class="service-card">
          <h3>Experienced Team</h3>
          <p>Multi-speciality support for cosmetic, restorative, and preventive dentistry.</p>
        </article>
        <article class="service-card">
          <h3>Comfort-First Setup</h3>
          <p>A calm clinic environment that reduces anxiety and improves treatment confidence.</p>
        </article>
      </div>
      <div class="section-cta">
        <a class="btn btn-primary" href="contact.php">Book Your Consultation</a>
      </div>
    </div>
  </section>
</main>

<?php require_once __DIR__ . '/includes/footer.php'; ?>
