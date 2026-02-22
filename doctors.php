<?php
$pageTitle = 'Our Doctors | Arma Dental Clinic Specialist Team';
$metaDescription = 'Meet the expert doctors at Arma Dental Clinic delivering ethical, patient-focused, and modern dental care in Mira Road.';
$metaKeywords = 'Arma Dental Clinic doctors, dentist Mira Road, orthodontist, dental consultant team';
$pagePath = 'doctors.php';
require_once __DIR__ . '/includes/header.php';
?>

<main>
  <section class="page-hero section">
    <div class="container">
      <p class="eyebrow">Expert Team</p>
      <h1>Meet Our Expert Dental Team</h1>
      <p>Experienced. Ethical. Patient-focused care from consultation to follow-up.</p>
    </div>
  </section>

  <section class="section doctors-page">
    <div class="container">
      <article class="lead-dentist-card" data-reveal>
        <div class="lead-dentist-media">
          <img src="/assets/images/alfiashaidar.webp" alt="Dr. Alfia Shahab Haidar portrait" loading="lazy" decoding="async" width="720" height="900">
        </div>
        <div class="lead-dentist-content">
          <span class="lead-pill">Lead Dentist</span>
          <h2>Dr. Alfia Shahab Haidar</h2>
          <p class="lead-role">Lead Dentist &amp; Clinical Director</p>
          <p>Known for patient-focused care, ethical dentistry, and a comfort-first treatment philosophy that helps every patient feel informed and at ease.</p>

          <ul class="doctor-points">
            <li>
              <span class="doctor-inline-icon" aria-hidden="true"></span>
              <span>Gentle &amp; painless approach</span>
            </li>
            <li>
              <span class="doctor-inline-icon" aria-hidden="true"></span>
              <span>Clear treatment explanation</span>
            </li>
            <li>
              <span class="doctor-inline-icon" aria-hidden="true"></span>
              <span>Personalized treatment planning</span>
            </li>
            <li>
              <span class="doctor-inline-icon" aria-hidden="true"></span>
              <span>Long-term dental care focus</span>
            </li>
          </ul>

          <blockquote class="lead-dentist-quote">
            <p>&ldquo;Our goal is not just to treat teeth, but to make every patient feel comfortable, confident, and cared for.&rdquo;</p>
          </blockquote>

          <div class="lead-dentist-actions">
            <a class="btn btn-primary" href="<?php echo esc(route_path('appointments.php#appointment-request-form')); ?>">Book Consultation</a>
          </div>
        </div>
      </article>

      <section class="specialist-team">
        <div class="section-head specialist-team-head">
          <p class="eyebrow">Our Specialists</p>
          <h2>Meet Our Specialist Dental Team</h2>
          <p>Led by Dr. Alfia Shahab Haidar, our team provides ethical and patient-focused dental care.</p>
        </div>

        <div class="doctor-grid">
          <article class="doctor-card" data-reveal>
            <div class="doctor-card-media">
              <img src="/assets/images/kamalrkabra.webp" alt="Dr. Kamal R Kabra" loading="lazy" decoding="async" width="700" height="900">
              <span class="doctor-specialty-badge">Dental Surgeon</span>
            </div>
            <div class="doctor-card-body">
              <h3>Dr. Kamal R Kabra</h3>
              <p class="doctor-card-summary">Trusted for precision-led procedures and safe treatment planning.</p>
              <div class="doctor-trust-grid">
                <span><i aria-hidden="true"></i>15+ Years Experience</span>
                <span><i aria-hidden="true"></i>Gentle Treatment Approach</span>
                <span><i aria-hidden="true"></i>Advanced Surgical Expertise</span>
                <span><i aria-hidden="true"></i>Patient Comfort Focus</span>
              </div>
              <p class="doctor-comfort-line">Known for painless procedures and calm chairside communication.</p>
              <a class="btn btn-outline doctor-mini-cta" href="<?php echo esc(route_path('appointments.php#appointment-request-form')); ?>">Book with Dr. Kamal</a>
            </div>
          </article>

          <article class="doctor-card" data-reveal>
            <div class="doctor-card-media">
              <img src="/assets/images/firozakhan.webp" alt="Dr. Firoz A Khan" loading="lazy" decoding="async" width="700" height="900">
              <span class="doctor-specialty-badge">Orthodontist</span>
            </div>
            <div class="doctor-card-body">
              <h3>Dr. Firoz A Khan</h3>
              <p class="doctor-card-summary">Specialist in braces and alignment correction with clear treatment pathways.</p>
              <div class="doctor-trust-grid">
                <span><i aria-hidden="true"></i>10+ Years Experience</span>
                <span><i aria-hidden="true"></i>Detailed Case Planning</span>
                <span><i aria-hidden="true"></i>Modern Orthodontic Methods</span>
                <span><i aria-hidden="true"></i>Comfort-first Progress Care</span>
              </div>
              <p class="doctor-comfort-line">Gentle with anxious patients and clear about each treatment stage.</p>
              <a class="btn btn-outline doctor-mini-cta" href="<?php echo esc(route_path('appointments.php#appointment-request-form')); ?>">Book with Dr. Firoz</a>
            </div>
          </article>

          <article class="doctor-card" data-reveal>
            <div class="doctor-card-media">
              <img src="/assets/images/saqibkhan.webp" alt="Dr. Saqib Khan" loading="lazy" decoding="async" width="700" height="900">
              <span class="doctor-specialty-badge">Cosmetic Dentistry Specialist</span>
            </div>
            <div class="doctor-card-body">
              <h3>Dr. Saqib Khan</h3>
              <p class="doctor-card-summary">Focused on veneers and aligners to build natural, confident smiles.</p>
              <div class="doctor-trust-grid">
                <span><i aria-hidden="true"></i>Smile Design Expertise</span>
                <span><i aria-hidden="true"></i>Personalized Smile Planning</span>
                <span><i aria-hidden="true"></i>Advanced Cosmetic Techniques</span>
                <span><i aria-hidden="true"></i>Patient-friendly Explanations</span>
              </div>
              <p class="doctor-comfort-line">Known for detailed treatment explanations and aesthetic precision.</p>
              <a class="btn btn-outline doctor-mini-cta" href="<?php echo esc(route_path('appointments.php#appointment-request-form')); ?>">Book with Dr. Saqib</a>
            </div>
          </article>
        </div>
      </section>

      <section class="doctor-trust-banner-wrap" data-reveal aria-labelledby="doctor-trust-title">
        <div class="section-head doctor-trust-head">
          <h2 id="doctor-trust-title">Why Patients Trust Our Doctors</h2>
        </div>
        <div class="doctor-trust-banner">
          <div class="doctor-trust-item"><span class="doctor-trust-icon" aria-hidden="true"></span><span>Ethical Treatment Advice</span></div>
          <div class="doctor-trust-item"><span class="doctor-trust-icon" aria-hidden="true"></span><span>Clear Treatment Explanation</span></div>
          <div class="doctor-trust-item"><span class="doctor-trust-icon" aria-hidden="true"></span><span>Modern Painless Techniques</span></div>
          <div class="doctor-trust-item"><span class="doctor-trust-icon" aria-hidden="true"></span><span>Personalized Care</span></div>
        </div>
      </section>

      <div class="section-cta">
        <a class="btn btn-primary" href="<?php echo esc(route_path('appointments.php#appointment-request-form')); ?>">Book Consultation</a>
      </div>
    </div>
  </section>
</main>

<?php require_once __DIR__ . '/includes/footer.php'; ?>
