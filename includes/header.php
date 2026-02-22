<?php
require_once __DIR__ . '/config.php';

$pageTitle = $pageTitle ?? "{$clinicName} | Advanced Dental Care";
$metaDescription = $metaDescription ?? "{$clinicName} offers advanced, painless dental care with modern treatment protocols and warm patient experience.";
$pagePath = $pagePath ?? 'index.php';
$pageHeading = $pageHeading ?? $clinicName;

$navItems = [
  'index.php' => 'Home',
  'about.php' => 'About',
  'services.php' => 'Services',
  'testimonials.php' => 'Testimonials',
  'contact.php' => 'Contact'
];
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title><?php echo esc($pageTitle); ?></title>
  <meta name="description" content="<?php echo esc($metaDescription); ?>" />
  <link rel="canonical" href="<?php echo esc(page_url($pagePath)); ?>" />
  <meta property="og:type" content="website" />
  <meta property="og:title" content="<?php echo esc($pageTitle); ?>" />
  <meta property="og:description" content="<?php echo esc($metaDescription); ?>" />
  <meta property="og:url" content="<?php echo esc(page_url($pagePath)); ?>" />
  <meta name="twitter:card" content="summary_large_image" />
  <meta name="twitter:title" content="<?php echo esc($pageTitle); ?>" />
  <meta name="twitter:description" content="<?php echo esc($metaDescription); ?>" />
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;500;600;700;800&family=DM+Serif+Display:ital@0;1&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="assets/css/styles.css" />
  <script type="application/ld+json">
  {
    "@context": "https://schema.org",
    "@type": "Dentist",
    "name": "<?php echo esc($clinicName); ?>",
    "telephone": "+91<?php echo esc($phone); ?>",
    "url": "<?php echo esc($baseUrl); ?>",
    "areaServed": "India",
    "medicalSpecialty": "Dentistry"
  }
  </script>
</head>
<body>
  <header class="site-header">
    <div class="container nav-wrap">
      <a href="index.php" class="brand" aria-label="<?php echo esc($clinicName); ?> home">
        <span class="brand-mark">A</span>
        <span class="brand-text">
          <strong><?php echo esc($clinicName); ?></strong>
          <small><?php echo esc($tagline); ?></small>
        </span>
      </a>

      <button class="menu-toggle" aria-label="Toggle menu" aria-expanded="false">Menu</button>

      <nav class="site-nav" aria-label="Main navigation">
        <?php foreach ($navItems as $path => $label): ?>
          <a href="<?php echo esc($path); ?>"<?php echo $pagePath === $path ? ' class="active"' : ''; ?>><?php echo esc($label); ?></a>
        <?php endforeach; ?>
      </nav>

      <a class="btn btn-soft" href="<?php echo esc($callLink); ?>">Call Now</a>
    </div>
  </header>
