<?php
$pageTitle = 'Why Choose Arma Dental Clinic';
$metaDescription = 'Comfortable, ethical, and modern dental care designed around you at Arma Dental Clinic, Mira Road.';
$metaKeywords = 'why choose arma dental clinic, ethical dentistry mira road, painless dental care, trusted dentist';
$pagePath = 'why-us.php';
require_once __DIR__ . '/includes/header.php';
?>

<main>
  <section class="page-hero section why-us-page-hero">
    <div class="container">
      <div class="page-hero-grid why-us-hero-grid">
        <div>
          <p class="eyebrow">Why Us</p>
          <h1>Why Choose Arma Dental Clinic</h1>
          <p>Comfortable, ethical, and modern dental care designed around you.</p>
          <div class="hero-actions why-us-hero-actions">
            <a class="btn btn-primary" href="<?php echo esc(route_path('appointments.php#appointment-request-form')); ?>">Book an Appointment</a>
            <a class="btn btn-outline" href="<?php echo esc(route_path('contact.php#hours-directions')); ?>">Visit Our Clinic</a>
          </div>
        </div>
        <aside class="why-us-hero-media hero-card" data-reveal>
          <img
            src="/assets/images/clinic_images/DSC01584.webp"
            alt="Modern treatment room at Arma Dental Clinic"
            loading="eager"
            decoding="async"
            width="1200"
            height="800"
          />
          <div class="why-us-hero-media-chip">
            <span>Trusted Care</span>
            <strong>4.9 ★ Patient Experience</strong>
          </div>
          <img
            class="why-us-hero-media-float"
            src="/assets/images/clinic_images/DSC01588.webp"
            alt="Comfort-focused dental clinic interior"
            loading="lazy"
            decoding="async"
            width="1200"
            height="800"
          />
        </aside>
      </div>
    </div>
  </section>

  <section class="section why-us-section">
    <div class="container">
      <div class="why-us-grid">
        <article class="why-us-card" data-reveal>
          <div class="why-us-card-head">
            <span class="why-us-icon" aria-hidden="true">
              <svg viewBox="0 0 24 24">
                <path d="M4 12.5h4l2.2-4.5L13 17l2.4-4.5H20" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"></path>
              </svg>
            </span>
            <h2>Complete Dental Care Under One Roof</h2>
          </div>
          <ul class="why-us-list">
            <li>General Dentistry</li>
            <li>Root Canal Treatment</li>
            <li>Dental Implants</li>
            <li>Smile Designing</li>
            <li>Crowns, Bridges &amp; Dentures</li>
            <li>Preventive &amp; Family Dentistry</li>
          </ul>
          <p>Provide comprehensive dental solutions in one place without referring patients elsewhere.</p>
        </article>

        <article class="why-us-card" data-reveal>
          <div class="why-us-card-head">
            <span class="why-us-icon" aria-hidden="true">
              <svg viewBox="0 0 24 24">
                <path d="M12 20c4-3.3 6.7-6 6.7-9.5a3.7 3.7 0 0 0-6.7-2.3 3.7 3.7 0 0 0-6.7 2.3c0 3.5 2.7 6.2 6.7 9.5Z" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"></path>
              </svg>
            </span>
            <h2>Gentle &amp; Painless Treatment Experience</h2>
          </div>
          <ul class="why-us-list">
            <li>Modern painless techniques</li>
            <li>Patient-first approach</li>
            <li>Clear explanation before treatment</li>
            <li>Comfortable environment</li>
          </ul>
          <p>We focus on reducing dental anxiety and ensuring a relaxed treatment experience.</p>
        </article>

        <article class="why-us-card" data-reveal>
          <div class="why-us-card-head">
            <span class="why-us-icon" aria-hidden="true">
              <svg viewBox="0 0 24 24">
                <path d="M12 12.2a3.2 3.2 0 1 0 0-6.4 3.2 3.2 0 0 0 0 6.4Zm-6.5 7.3a6.5 6.5 0 0 1 13 0" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"></path>
              </svg>
            </span>
            <h2>Experienced &amp; Caring Dental Team</h2>
          </div>
          <p>Led by experienced professionals who prioritize honest advice and personalized treatment planning.</p>
        </article>

        <article class="why-us-card" data-reveal>
          <div class="why-us-card-head">
            <span class="why-us-icon" aria-hidden="true">
              <svg viewBox="0 0 24 24">
                <path d="M12 3.8 5 7v5.2c0 4.4 2.6 7.1 7 8.8 4.4-1.7 7-4.4 7-8.8V7l-7-3.2Z" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"></path>
                <path d="m9.5 12.1 1.8 1.8 3.4-3.4" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"></path>
              </svg>
            </span>
            <h2>Advanced Sterilization &amp; Hygiene Standards</h2>
          </div>
          <ul class="why-us-list">
            <li>Hospital-grade sterilization</li>
            <li>Individually packed instruments</li>
            <li>Strict infection control protocols</li>
          </ul>
          <p>Patient safety and hygiene are maintained at the highest standards.</p>
        </article>

        <article class="why-us-card why-us-card-wide" data-reveal>
          <div class="why-us-card-head">
            <span class="why-us-icon" aria-hidden="true">
              <svg viewBox="0 0 24 24">
                <path d="M5 12h14M12 5v14" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"></path>
                <path d="M7.2 8.5c1.8-2.5 4-3.8 6.6-3.8 3.1 0 5.5 1.8 6.7 4.8m-16.3 6c1.4 2.2 3.7 3.6 6.4 3.6 3.3 0 6-2 7.1-5" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"></path>
              </svg>
            </span>
            <h2>Convenient Location &amp; Flexible Appointments</h2>
          </div>
          <ul class="why-us-list">
            <li>Easy accessibility near Hyderi Chowk, Mira Road</li>
            <li>Appointment-based consultations</li>
            <li>Minimal waiting time</li>
            <li>Emergency dental care availability</li>
          </ul>
          <p>Designed for convenience and stress-free visits.</p>
        </article>
      </div>

      <section class="featured-doctor" data-reveal aria-labelledby="featured-doctor-title">
        <div class="section-head featured-doctor-head">
          <p class="eyebrow">Meet Your Dentist</p>
          <h2 id="featured-doctor-title">Meet Your Dentist</h2>
          <p>Compassionate dentistry focused on comfort, trust, and long-term oral health.</p>
        </div>
        <article class="featured-doctor-card">
          <div class="featured-doctor-media">
            <img
              src="/assets/images/alfiashaidar.webp"
              alt="Dr. Alfia, Lead Dentist at Arma Dental Clinic"
              loading="lazy"
              decoding="async"
              width="720"
              height="900"
            />
          </div>
          <div class="featured-doctor-content">
            <div class="featured-doctor-title">
              <h3>Dr. Alfia</h3>
              <p>Lead Dentist - Arma Dental Clinic</p>
            </div>

            <ul class="featured-doctor-points">
              <li>
                <span class="featured-point-icon" aria-hidden="true">
                  <svg viewBox="0 0 24 24">
                    <path d="M12 20c4-3.3 6.7-6 6.7-9.5a3.7 3.7 0 0 0-6.7-2.3 3.7 3.7 0 0 0-6.7 2.3c0 3.5 2.7 6.2 6.7 9.5Z" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"></path>
                  </svg>
                </span>
                <span>Patient-focused and gentle approach</span>
              </li>
              <li>
                <span class="featured-point-icon" aria-hidden="true">
                  <svg viewBox="0 0 24 24">
                    <path d="M5 7.5A2.5 2.5 0 0 1 7.5 5h9A2.5 2.5 0 0 1 19 7.5v6A2.5 2.5 0 0 1 16.5 16H11l-4 3v-3H7.5A2.5 2.5 0 0 1 5 13.5v-6Z" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"></path>
                  </svg>
                </span>
                <span>Clear explanation before every treatment</span>
              </li>
              <li>
                <span class="featured-point-icon" aria-hidden="true">
                  <svg viewBox="0 0 24 24">
                    <path d="M12 3.8 5 7v5.2c0 4.4 2.6 7.1 7 8.8 4.4-1.7 7-4.4 7-8.8V7l-7-3.2Z" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"></path>
                    <path d="m9.5 12.1 1.8 1.8 3.4-3.4" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"></path>
                  </svg>
                </span>
                <span>Ethical dentistry philosophy</span>
              </li>
              <li>
                <span class="featured-point-icon" aria-hidden="true">
                  <svg viewBox="0 0 24 24">
                    <path d="M4 12.5h4l2.2-4.5L13 17l2.4-4.5H20" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"></path>
                  </svg>
                </span>
                <span>Focus on painless and comfortable care</span>
              </li>
            </ul>

            <blockquote class="featured-doctor-quote">
              <p>&ldquo;Our goal is not just to treat teeth, but to make every patient feel comfortable, confident, and cared for.&rdquo;</p>
            </blockquote>

            <div class="featured-doctor-actions">
              <a class="btn btn-outline" href="<?php echo esc(route_path('doctors.php')); ?>">See More Consultants</a>
            </div>
          </div>
        </article>
      </section>

      <div class="trust-banner" data-reveal>
        <div class="trust-item">
          <span class="trust-icon" aria-hidden="true">
            <svg viewBox="0 0 24 24">
              <path d="M4 9.5h16M7 4.5h10a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2v-11a2 2 0 0 1 2-2Z" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"></path>
            </svg>
          </span>
          <span>Transparent Pricing</span>
        </div>
        <div class="trust-item">
          <span class="trust-icon" aria-hidden="true">
            <svg viewBox="0 0 24 24">
              <path d="M5 7.5A2.5 2.5 0 0 1 7.5 5h9A2.5 2.5 0 0 1 19 7.5v6A2.5 2.5 0 0 1 16.5 16H11l-4 3v-3H7.5A2.5 2.5 0 0 1 5 13.5v-6Z" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"></path>
            </svg>
          </span>
          <span>Clear Treatment Explanation</span>
        </div>
        <div class="trust-item">
          <span class="trust-icon" aria-hidden="true">
            <svg viewBox="0 0 24 24">
              <path d="M9 18h6M12 14v4M8.2 10.2a3.8 3.8 0 1 1 7.6 0c0 1.3-.5 2-1.5 2.9-.8.8-1.3 1.3-1.3 2.1v.3" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"></path>
            </svg>
          </span>
          <span>Modern Technology</span>
        </div>
        <div class="trust-item">
          <span class="trust-icon" aria-hidden="true">
            <svg viewBox="0 0 24 24">
              <path d="M5 12h14M8 9.5h8M8 14.5h8M6.5 6h11A2.5 2.5 0 0 1 20 8.5v7A2.5 2.5 0 0 1 17.5 18h-11A2.5 2.5 0 0 1 4 15.5v-7A2.5 2.5 0 0 1 6.5 6Z" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"></path>
            </svg>
          </span>
          <span>Comfortable Environment</span>
        </div>
        <div class="trust-item">
          <span class="trust-icon" aria-hidden="true">
            <svg viewBox="0 0 24 24">
              <path d="M4.5 12.5a7.5 7.5 0 1 0 15 0 7.5 7.5 0 0 0-15 0Z" fill="none" stroke="currentColor" stroke-width="1.8"></path>
              <path d="M9.2 12.4 11 14l3.8-3.8" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"></path>
            </svg>
          </span>
          <span>Long-term Dental Care Focus</span>
        </div>
      </div>

      <div class="section-cta why-us-cta" data-reveal>
        <a class="btn btn-primary" href="<?php echo esc(route_path('appointments.php#appointment-request-form')); ?>">Book Your Consultation</a>
      </div>
    </div>
  </section>
</main>

<?php require_once __DIR__ . '/includes/footer.php'; ?>
