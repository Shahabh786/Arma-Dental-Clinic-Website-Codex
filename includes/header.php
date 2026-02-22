<?php
require_once __DIR__ . '/config.php';

$pageTitle = $pageTitle ?? "{$clinicName} | Advanced Dental Care";
$metaDescription = $metaDescription ?? "{$clinicName} offers advanced, painless dental care with modern treatment protocols and warm patient experience.";
$pagePath = $pagePath ?? 'index.php';
$pageHeading = $pageHeading ?? $clinicName;
$metaKeywords = $metaKeywords ?? ($pageMeta[$pagePath]['keywords'] ?? $defaultKeywords);

$navItems = [
  'index.php' => 'Home',
  'doctors.php' => 'Doctors',
  'services.php' => 'Services',
  'appointments.php' => 'Appointments',
  'contact.php' => 'Contact',
  'about.php' => 'About'
];

$aboutSubItems = [
  'about.php' => 'About Us',
  'clinic-tour.php' => 'Clinic Tour',
  'contact.php#hours-directions' => 'Hours & Directions',
  'testimonials.php' => 'Patient Testimonials'
];
$aboutGroupPages = ['about.php', 'clinic-tour.php', 'testimonials.php'];
$isAboutGroupPage = in_array($pagePath, $aboutGroupPages, true);

if (PHP_SAPI !== 'cli') {
  $requestUri = $_SERVER['REQUEST_URI'] ?? '';
  $requestPath = (string) parse_url($requestUri, PHP_URL_PATH);
  $queryString = isset($_SERVER['QUERY_STRING']) && $_SERVER['QUERY_STRING'] !== '' ? ('?' . $_SERVER['QUERY_STRING']) : '';
  $targetPath = route_path($pagePath);
  $phpPath = '/' . ltrim($pagePath, '/');

  if ($requestPath === '/index.php') {
    header('Location: /' . $queryString, true, 301);
    exit;
  }

  if ($pagePath !== 'index.php' && $requestPath === $phpPath) {
    header('Location: ' . $targetPath . $queryString, true, 301);
    exit;
  }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title><?php echo esc($pageTitle); ?></title>
  <meta name="description" content="<?php echo esc($metaDescription); ?>" />
  <meta name="keywords" content="<?php echo esc($metaKeywords); ?>" />
  <meta name="robots" content="index, follow" />
  <link rel="canonical" href="<?php echo esc(canonical_url($pagePath)); ?>" />
  <meta property="og:type" content="website" />
  <meta property="og:title" content="<?php echo esc($pageTitle); ?>" />
  <meta property="og:description" content="<?php echo esc($metaDescription); ?>" />
  <meta property="og:url" content="<?php echo esc(canonical_url($pagePath)); ?>" />
  <meta name="twitter:card" content="summary_large_image" />
  <meta name="twitter:title" content="<?php echo esc($pageTitle); ?>" />
  <meta name="twitter:description" content="<?php echo esc($metaDescription); ?>" />
  <meta property="og:image" content="<?php echo esc(canonical_url('assets/images/logo.png')); ?>" />
  <meta name="twitter:image" content="<?php echo esc(canonical_url('assets/images/logo.png')); ?>" />
  <link rel="apple-touch-icon" sizes="180x180" href="/assets/favicon/apple-touch-icon.png" />
  <link rel="icon" type="image/png" sizes="32x32" href="/assets/favicon/favicon-32x32.png" />
  <link rel="icon" type="image/png" sizes="16x16" href="/assets/favicon/favicon-16x16.png" />
  <link rel="manifest" href="/assets/favicon/site.webmanifest" />
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;500;600;700;800&family=DM+Serif+Display:ital@0;1&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="/assets/css/styles.css" />
  <script type="application/ld+json">
  {
    "@context": "https://schema.org",
    "@type": "Dentist",
    "@id": "<?php echo esc(canonical_url('index.php')); ?>#dentist",
    "name": "<?php echo esc($clinicName); ?>",
    "telephone": "+91<?php echo esc($phone); ?>",
    "email": "<?php echo esc($email); ?>",
    "url": "<?php echo esc(canonical_url('index.php')); ?>",
    "image": "<?php echo esc(canonical_url('assets/images/logo.png')); ?>",
    "address": {
      "@type": "PostalAddress",
      "streetAddress": "Shop No. 5, N G Heritage, Near Hyderi Chowk, Naya Nagar, Mira Road East",
      "addressLocality": "Mira Bhayandar",
      "addressRegion": "Maharashtra",
      "postalCode": "401107",
      "addressCountry": "IN"
    },
    "geo": {
      "@type": "GeoCoordinates",
      "latitude": "19.286304",
      "longitude": "72.860954"
    },
    "openingHoursSpecification": [
      {
        "@type": "OpeningHoursSpecification",
        "dayOfWeek": ["Tuesday", "Wednesday", "Thursday", "Friday", "Saturday", "Sunday"],
        "opens": "11:00",
        "closes": "14:30"
      },
      {
        "@type": "OpeningHoursSpecification",
        "dayOfWeek": ["Tuesday", "Wednesday", "Thursday", "Friday", "Saturday", "Sunday"],
        "opens": "17:30",
        "closes": "22:00"
      }
    ],
    "areaServed": "India",
    "medicalSpecialty": "Dentistry"
  }
  </script>
</head>
<body>
  <header class="site-header">
    <div class="container nav-wrap">
      <a href="<?php echo esc(route_path('index.php')); ?>" class="brand" aria-label="<?php echo esc($clinicName); ?> home">
        <img class="brand-logo" src="/assets/images/logo-header.png" alt="<?php echo esc($clinicName); ?> logo" />
      </a>

      <button id="menu-toggle" class="menu-toggle" aria-label="Open menu" aria-expanded="false" aria-controls="mobile-menu">
        <span class="sr-only">Open menu</span>
        <svg aria-hidden="true" viewBox="0 0 24 24" class="menu-icon">
          <path d="M4 7h16M4 12h16M4 17h16" fill="none" stroke="currentColor" stroke-linecap="round" stroke-width="2"></path>
        </svg>
      </button>

      <nav class="site-nav" aria-label="Main navigation">
        <?php foreach ($navItems as $path => $label): ?>
          <?php if ($path === 'about.php'): ?>
            <div class="nav-item has-submenu">
              <a href="<?php echo esc(route_path($path)); ?>" class="nav-link-with-indicator<?php echo ($pagePath === $path || $isAboutGroupPage) ? ' active' : ''; ?>">
                <span><?php echo esc($label); ?></span>
                <svg viewBox="0 0 20 20" aria-hidden="true" class="submenu-indicator">
                  <path d="M5 7.5L10 12.5L15 7.5" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"></path>
                </svg>
              </a>
              <div class="submenu" role="menu" aria-label="About submenu">
                <?php foreach ($aboutSubItems as $subPath => $subLabel): ?>
                  <?php $subBasePath = explode('#', $subPath)[0]; ?>
                  <a href="<?php echo esc(route_path($subPath)); ?>" role="menuitem"<?php echo $pagePath === $subBasePath ? ' class="active"' : ''; ?>><?php echo esc($subLabel); ?></a>
                <?php endforeach; ?>
              </div>
            </div>
          <?php else: ?>
            <a href="<?php echo esc(route_path($path)); ?>"<?php echo $pagePath === $path ? ' class="active"' : ''; ?>><?php echo esc($label); ?></a>
          <?php endif; ?>
        <?php endforeach; ?>
      </nav>

      <a class="btn btn-soft" href="<?php echo esc($callLink); ?>">
        <svg viewBox="0 0 24 24" aria-hidden="true" class="btn-icon">
          <path d="M5.5 4.5h3a1 1 0 0 1 .98.8l.55 2.75a1 1 0 0 1-.29.92l-1.2 1.2a14 14 0 0 0 5.56 5.56l1.2-1.2a1 1 0 0 1 .92-.29l2.75.55a1 1 0 0 1 .8.98v3a1 1 0 0 1-.86 1c-1.77.26-3.58.06-5.26-.59a17 17 0 0 1-8.56-8.56 11.2 11.2 0 0 1-.59-5.26 1 1 0 0 1 1-.86Z" fill="currentColor"></path>
        </svg>
        <span>Call Now</span>
      </a>
    </div>
    <div id="mobile-menu-overlay" class="mobile-menu-overlay" aria-hidden="true"></div>
    <nav id="mobile-menu" class="mobile-menu" aria-label="Mobile navigation">
      <div class="mobile-menu-head">
        <button id="menu-close" class="menu-close" aria-label="Close menu">
          <span class="sr-only">Close menu</span>
          <svg aria-hidden="true" viewBox="0 0 24 24" class="menu-icon">
            <path d="M6 6l12 12M18 6l-12 12" fill="none" stroke="currentColor" stroke-linecap="round" stroke-width="2"></path>
          </svg>
        </button>
      </div>
      <?php foreach ($navItems as $path => $label): ?>
        <?php if ($path === 'about.php'): ?>
          <details class="mobile-submenu-wrap">
            <summary class="mobile-summary">
              <span><?php echo esc($label); ?></span>
              <svg viewBox="0 0 20 20" aria-hidden="true" class="submenu-indicator">
                <path d="M5 7.5L10 12.5L15 7.5" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"></path>
              </svg>
            </summary>
            <div class="mobile-submenu">
              <?php foreach ($aboutSubItems as $subPath => $subLabel): ?>
                <?php $mobileSubBasePath = explode('#', $subPath)[0]; ?>
                <a href="<?php echo esc(route_path($subPath)); ?>"<?php echo $pagePath === $mobileSubBasePath ? ' class="active"' : ''; ?>><?php echo esc($subLabel); ?></a>
              <?php endforeach; ?>
            </div>
          </details>
        <?php else: ?>
          <a href="<?php echo esc(route_path($path)); ?>"<?php echo $pagePath === $path ? ' class="active"' : ''; ?>><?php echo esc($label); ?></a>
        <?php endif; ?>
      <?php endforeach; ?>
    </nav>
  </header>
