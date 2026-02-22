<?php
declare(strict_types=1);

const SITE_NAME = 'Arma Dental Clinic';
const SITE_BASE_URL = 'https://armadental.in';
const SITE_PHONE = '+91-7304996569';
const SITE_EMAIL = 'info@armadental.in';
const SITE_ADDRESS = 'Shop No. 5, N G Heritage, Near Hyderi Chowk, Naya Nagar, Mira Road, Thane, Maharashtra, India - 401107';

const SITE_DEFAULT_DESCRIPTION = 'Arma Dental Clinic in Mira Road delivers premium, modern dental care with a gentle approach, advanced technology, and personalized treatment plans.';
const SITE_DEFAULT_KEYWORDS = 'Arma Dental Clinic, Mira Road dentist, dental clinic Thane, cosmetic dentistry, root canal, dental implants, teeth whitening, oral care';

/**
 * @return array<string, array<string, string>>
 */
function site_pages(): array
{
    return [
        'home' => [
            'title' => 'Premium Dental Care in Mira Road',
            'description' => 'Discover modern, patient-first dentistry with advanced treatment options, trusted specialists, and a calm clinic experience.',
            'keywords' => SITE_DEFAULT_KEYWORDS . ', family dentist, painless dentistry',
            'path' => '/',
            'file' => 'index.php',
            'label' => 'Home',
        ],
        'about' => [
            'title' => 'About Our Clinic and Team',
            'description' => 'Learn how Arma Dental Clinic combines clinical precision, empathy, and technology to deliver confident smiles.',
            'keywords' => SITE_DEFAULT_KEYWORDS . ', dental team, clinic philosophy',
            'path' => '/about.php',
            'file' => 'about.php',
            'label' => 'About',
        ],
        'doctors' => [
            'title' => 'Meet Our Expert Dental Team',
            'description' => 'Meet the experienced and ethical consultants at Arma Dental Clinic who deliver patient-focused dental care.',
            'keywords' => SITE_DEFAULT_KEYWORDS . ', dental consultants, dentists mira road, orthodontist',
            'path' => '/doctors.php',
            'file' => 'doctors.php',
            'label' => 'Doctors',
        ],
        'review' => [
            'title' => 'Patient Reviews and Testimonials',
            'description' => 'Read what patients say about their treatment journey, comfort, and results at Arma Dental Clinic.',
            'keywords' => SITE_DEFAULT_KEYWORDS . ', dental clinic reviews, patient testimonials',
            'path' => '/review.php',
            'file' => 'review.php',
            'label' => 'Review',
        ],
        'contact' => [
            'title' => 'Contact Arma Dental Clinic',
            'description' => 'Reach Arma Dental Clinic by phone, email, or visit our location in Mira Road, Thane.',
            'keywords' => SITE_DEFAULT_KEYWORDS . ', contact dental clinic, Mira Road address',
            'path' => '/contact.php',
            'file' => 'contact.php',
            'label' => 'Contact Us',
        ],
        'services' => [
            'title' => 'Dental Services and Treatments',
            'description' => 'Explore our complete range of dental services, from preventive care to smile design and restorative procedures.',
            'keywords' => SITE_DEFAULT_KEYWORDS . ', dental services, smile makeover, pediatric dentistry',
            'path' => '/services.php',
            'file' => 'services.php',
            'label' => 'Services',
        ],
        'appointments' => [
            'title' => 'Book an Appointment',
            'description' => 'Book your consultation at Arma Dental Clinic and get a personalized treatment plan from our dental experts.',
            'keywords' => SITE_DEFAULT_KEYWORDS . ', book dentist appointment, consultation',
            'path' => '/appointments.php',
            'file' => 'appointments.php',
            'label' => 'Appointments',
        ],
    ];
}

/**
 * @return array<string, string>
 */
function current_page(string $pageKey): array
{
    $pages = site_pages();
    return $pages[$pageKey] ?? $pages['home'];
}

function is_active_page(string $activePageKey, string $targetPageKey): bool
{
    return $activePageKey === $targetPageKey;
}

function canonical_url(string $path): string
{
    $base = rtrim(SITE_BASE_URL, '/');
    if ($path === '/') {
        return $base . '/';
    }
    return $base . $path;
}

function esc(string $value): string
{
    return htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
}
