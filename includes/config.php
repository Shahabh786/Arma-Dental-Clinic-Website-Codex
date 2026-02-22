<?php
$clinicName = "Arma Dental Clinic";
$phone = "7304996569";
$email = "info@armadental.in";
$address = "Shop No. 5, N G Heritage, Near Hyderi Chowk, Naya Nagar, Mira Road, Thane, Maharashtra, India - 401107";
$whatsAppLink = "https://wa.me/91{$phone}";
$callLink = "tel:+91{$phone}";
$tagline = "Smile Design & Dental Wellness";
$siteBaseUrl = "https://www.armadental.in";
$enablePrettyUrls = getenv('ENABLE_PRETTY_URLS') === '1';
$defaultKeywords = "Arma Dental Clinic, Mira Road dentist, dental clinic Thane, cosmetic dentistry, root canal, dental implants, teeth whitening, oral care";
$pageMeta = [
  "index.php" => [
    "title" => "Premium Dental Care in Mira Road",
    "description" => "Discover modern, patient-first dentistry with advanced treatment options, trusted specialists, and a calm clinic experience.",
    "keywords" => $defaultKeywords . ", family dentist, painless dentistry"
  ],
  "about.php" => [
    "title" => "About Our Clinic and Team",
    "description" => "Learn how Arma Dental Clinic combines clinical precision, empathy, and technology to deliver confident smiles.",
    "keywords" => $defaultKeywords . ", dental team, clinic philosophy"
  ],
  "why-us.php" => [
    "title" => "Why Choose Arma Dental Clinic",
    "description" => "Discover what makes Arma Dental Clinic trusted for ethical, comfortable, and modern dental care in Mira Road.",
    "keywords" => $defaultKeywords . ", why choose arma dental, ethical dentistry, painless treatment"
  ],
  "doctors.php" => [
    "title" => "Meet Our Expert Dental Team",
    "description" => "Meet the experienced and ethical consultants at Arma Dental Clinic who deliver patient-focused dental care.",
    "keywords" => $defaultKeywords . ", dental consultants, dentists mira road, orthodontist"
  ],
  "services.php" => [
    "title" => "Dental Services and Treatments",
    "description" => "Explore our complete range of dental services, from preventive care to smile design and restorative procedures.",
    "keywords" => $defaultKeywords . ", dental services, smile makeover, pediatric dentistry"
  ],
  "appointments.php" => [
    "title" => "Book an Appointment",
    "description" => "Book your consultation at Arma Dental Clinic and get a personalized treatment plan from our dental experts.",
    "keywords" => $defaultKeywords . ", book dentist appointment, consultation"
  ],
  "testimonials.php" => [
    "title" => "Patient Reviews and Testimonials",
    "description" => "Read what patients say about their treatment journey, comfort, and results at Arma Dental Clinic.",
    "keywords" => $defaultKeywords . ", dental clinic reviews, patient testimonials"
  ],
  "contact.php" => [
    "title" => "Contact Arma Dental Clinic",
    "description" => "Reach Arma Dental Clinic by phone, email, or visit our location in Mira Road, Thane.",
    "keywords" => $defaultKeywords . ", contact dental clinic, Mira Road address"
  ]
];

$scheme = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ? 'https' : 'http';
$host = $_SERVER['HTTP_HOST'] ?? 'localhost:8000';
$baseUrl = "{$scheme}://{$host}";

$routeMap = [
  'index.php' => '/',
  'about.php' => '/about',
  'why-us.php' => '/why-us',
  'doctors.php' => '/doctors',
  'services.php' => '/services',
  'appointments.php' => '/appointments',
  'contact.php' => '/contact',
  'testimonials.php' => '/testimonials',
  'clinic-tour.php' => '/clinic-tour'
];

function esc(string $value): string
{
  return htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
}

function page_url(string $path): string
{
  global $baseUrl;
  return rtrim($baseUrl, '/') . '/' . ltrim($path, '/');
}

function route_path(string $path): string
{
  global $routeMap, $enablePrettyUrls;

  $parts = explode('#', $path, 2);
  $basePath = $parts[0];
  $fragment = $parts[1] ?? '';
  if ($enablePrettyUrls) {
    $target = $routeMap[$basePath] ?? ('/' . ltrim($basePath, '/'));
    if ($target !== '/') {
      $target = rtrim($target, '/');
    }
  } else {
    $target = $basePath === 'index.php' ? 'index.php' : ltrim($basePath, '/');
  }

  return $fragment !== '' ? $target . '#' . $fragment : $target;
}

function route_url(string $path): string
{
  global $baseUrl;
  $target = route_path($path);
  if (str_starts_with($target, '/')) {
    return rtrim($baseUrl, '/') . $target;
  }
  return rtrim($baseUrl, '/') . '/' . ltrim($target, '/');
}

function canonical_url(string $path): string
{
  global $siteBaseUrl, $routeMap, $enablePrettyUrls;

  $parts = explode('#', $path, 2);
  $basePath = $parts[0];
  $fragment = $parts[1] ?? '';

  if ($enablePrettyUrls) {
    $canonicalPath = $routeMap[$basePath] ?? ('/' . ltrim($basePath, '/'));
  } else {
    $canonicalPath = $basePath === 'index.php' ? '/' : ('/' . ltrim($basePath, '/'));
  }

  if ($canonicalPath !== '/') {
    $canonicalPath = rtrim($canonicalPath, '/');
  }

  $url = rtrim($siteBaseUrl, '/') . $canonicalPath;
  return $fragment !== '' ? $url . '#' . $fragment : $url;
}
