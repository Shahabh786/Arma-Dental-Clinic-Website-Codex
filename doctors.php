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

  <section class="section">
    <div class="container">
      <div class="service-grid">
        <article class="service-card">
          <img src="assets/images/alfiashaidar.png" alt="Dr. Alfia Shahab Haidar" style="width:100%;height:320px;object-fit:cover;border-radius:12px;margin-bottom:12px;" loading="lazy">
          <h3>Dr. Alfia Shahab Haidar</h3>
          <p><strong>BDS (M.U.H.S) | 10+ Years Experience</strong></p>
          <p>Leads the clinic with a strong focus on precision, comfort-first care, and transparent treatment planning.</p>
          <p><strong>Special Interests:</strong> Smile Designing, Root Canal Treatments, Cosmetic Dentistry, Preventive Dental Care.</p>
        </article>

        <article class="service-card">
          <img src="assets/images/kamalrkabra.png" alt="Dr. Kamal R Kabra" style="width:100%;height:320px;object-fit:cover;border-radius:12px;margin-bottom:12px;" loading="lazy">
          <h3>Dr. Kamal R Kabra</h3>
          <p><strong>Dental Surgeon</strong></p>
          <p>Brings surgical precision and extensive experience in advanced dental procedures with patient safety at the center.</p>
        </article>

        <article class="service-card">
          <img src="assets/images/firozakhan.png" alt="Dr. Firoz A Khan" style="width:100%;height:320px;object-fit:cover;border-radius:12px;margin-bottom:12px;" loading="lazy">
          <h3>Dr. Firoz A Khan</h3>
          <p><strong>Orthodontist</strong></p>
          <p>Specializes in braces and alignment correction with structured orthodontic treatment pathways.</p>
        </article>

        <article class="service-card">
          <img src="assets/images/saqibkhan.png" alt="Dr. Saqib Khan" style="width:100%;height:320px;object-fit:cover;border-radius:12px;margin-bottom:12px;" loading="lazy">
          <h3>Dr. Saqib Khan</h3>
          <p><strong>Dental Consultant</strong></p>
          <p>Focuses on veneers and aligners, helping patients achieve aesthetic and well-aligned smiles.</p>
        </article>
      </div>

      <div class="section-cta">
        <a class="btn btn-primary" href="appointments.php">Book Consultation</a>
      </div>
    </div>
  </section>
</main>

<?php require_once __DIR__ . '/includes/footer.php'; ?>
