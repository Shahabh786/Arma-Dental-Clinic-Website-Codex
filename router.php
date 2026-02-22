<?php
declare(strict_types=1);

$uri = (string) parse_url($_SERVER['REQUEST_URI'] ?? '/', PHP_URL_PATH);
$filePath = __DIR__ . $uri;

if ($uri !== '/' && is_file($filePath)) {
    return false;
}

$slugToFile = [
    '/about' => '/about.php',
    '/doctors' => '/doctors.php',
    '/services' => '/services.php',
    '/appointments' => '/appointments.php',
    '/contact' => '/contact.php',
    '/testimonials' => '/testimonials.php',
    '/clinic-tour' => '/clinic-tour.php',
];

$legacyToSlug = [
    '/index.php' => '/',
    '/about.php' => '/about',
    '/doctors.php' => '/doctors',
    '/services.php' => '/services',
    '/appointments.php' => '/appointments',
    '/contact.php' => '/contact',
    '/testimonials.php' => '/testimonials',
    '/clinic-tour.php' => '/clinic-tour',
];

if (isset($legacyToSlug[$uri])) {
    $target = $legacyToSlug[$uri];
    $query = isset($_SERVER['QUERY_STRING']) && $_SERVER['QUERY_STRING'] !== '' ? ('?' . $_SERVER['QUERY_STRING']) : '';
    header('Location: ' . $target . $query, true, 301);
    exit;
}

if ($uri === '/' || $uri === '') {
    require __DIR__ . '/index.php';
    exit;
}

if (isset($slugToFile[$uri])) {
    require __DIR__ . $slugToFile[$uri];
    exit;
}

http_response_code(404);
require __DIR__ . '/index.php';
