<?php
$pageTitle = 'Clinic Tour | Arma Dental Clinic';
$metaDescription = 'Take a visual tour of Arma Dental Clinic facilities, treatment areas, and patient-friendly interiors.';
$metaKeywords = 'Arma Dental Clinic photos, clinic tour, dental clinic interiors, Mira Road clinic';
$pagePath = 'clinic-tour.php';
require_once __DIR__ . '/includes/header.php';

$clinicImageDir = __DIR__ . '/assets/images/clinic_images';
$clinicImages = glob($clinicImageDir . '/*.{jpg,jpeg,png,webp,JPG,JPEG,PNG,WEBP}', GLOB_BRACE);
if ($clinicImages === false) {
  $clinicImages = [];
}
sort($clinicImages, SORT_NATURAL | SORT_FLAG_CASE);
?>

<main>
  <section class="page-hero section">
    <div class="container">
      <p class="eyebrow">Clinic Tour</p>
      <h1>Explore Our Modern, Comfort-First Clinic</h1>
      <p>Take a quick visual walkthrough of our treatment spaces, consultation areas, and patient-friendly environment.</p>
    </div>
  </section>

  <section class="section">
    <div class="container">
      <?php if (empty($clinicImages)): ?>
        <div class="hero-card">
          <h2>Clinic images coming soon</h2>
          <p>We are updating this section with fresh photos of the clinic interiors and treatment areas.</p>
        </div>
      <?php else: ?>
        <div class="clinic-gallery-grid">
          <?php foreach ($clinicImages as $imagePath): ?>
            <?php
              $relativePath = 'assets/images/clinic_images/' . basename($imagePath);
              $label = ucwords(str_replace(['-', '_'], ' ', pathinfo($imagePath, PATHINFO_FILENAME)));
            ?>
            <button type="button" class="clinic-gallery-card" data-gallery-open="<?php echo esc($relativePath); ?>" data-gallery-alt="<?php echo esc($label); ?>" aria-label="View <?php echo esc($label); ?>">
              <img src="<?php echo esc($relativePath); ?>" alt="<?php echo esc($label); ?>" loading="lazy">
              <span class="clinic-gallery-overlay">View</span>
            </button>
          <?php endforeach; ?>
        </div>
      <?php endif; ?>
    </div>
  </section>
</main>

<div id="gallery-lightbox" class="gallery-lightbox hidden" role="dialog" aria-modal="true" aria-label="Expanded clinic image">
  <button type="button" id="gallery-lightbox-close" class="gallery-lightbox-close" aria-label="Close image">
    <svg viewBox="0 0 24 24" aria-hidden="true" class="menu-icon">
      <path d="M6 6l12 12M18 6l-12 12" fill="none" stroke="currentColor" stroke-linecap="round" stroke-width="2"></path>
    </svg>
  </button>
  <img id="gallery-lightbox-image" src="" alt="">
</div>

<?php require_once __DIR__ . '/includes/footer.php'; ?>
