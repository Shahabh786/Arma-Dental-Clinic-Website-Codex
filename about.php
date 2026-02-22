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
        <h1>Confident Smiles Begin with Trusted, Human-Centered Care</h1>
        <p>
          At <strong><?php echo esc($clinicName); ?></strong>, we believe a confident smile can change everything.
          Located in the heart of Mira Road, we provide high-quality, affordable, and comfortable dental care
          for families and individuals of all age groups.
        </p>
      </div>
      <div class="hero-card">
        <img src="/assets/images/about-dental.webp" alt="Arma Dental Clinic interior" style="width:100%;height:220px;object-fit:cover;border-radius:14px;margin-bottom:14px;" loading="lazy">
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
        <h2>Compassion, Precision, and Complete Honesty</h2>
        <p>
          Led by experienced dental professionals, we handle everything from routine checkups to advanced smile
          makeovers. Our services include implants, braces, cosmetic veneers, root canals, and kids' dentistry
          using modern technology with a gentle touch.
        </p>
        <p style="margin-top:12px;">
          Whether you visit us for regular cleaning or full smile transformation, our goal stays simple:
          make your treatment easy, painless, and anxiety-free in a space that feels calm, welcoming, and safe.
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
          <p>Multi-speciality support for preventive, restorative, cosmetic, and pediatric dental care.</p>
        </article>
        <article class="service-card">
          <h3>Comfort-First Setup</h3>
          <p>A calm clinic environment that reduces anxiety and improves treatment confidence.</p>
        </article>
      </div>
      <div class="section-cta">
        <a class="btn btn-primary" href="/contact">Book Your Consultation</a>
      </div>
    </div>
  </section>
</main>

<?php require_once __DIR__ . '/includes/footer.php'; ?>
