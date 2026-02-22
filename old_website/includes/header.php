<?php
declare(strict_types=1);

require_once __DIR__ . '/config.php';
$pageKey = $pageKey ?? 'home';
$page = current_page($pageKey);
$pages = site_pages();
$canonicalUrl = canonical_url($page['path']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= esc($page['title']) ?> | <?= esc(SITE_NAME) ?></title>
    <meta name="description" content="<?= esc($page['description']) ?>">
    <meta name="keywords" content="<?= esc($page['keywords']) ?>">
    <meta name="robots" content="index, follow">
    <link rel="canonical" href="<?= esc($canonicalUrl) ?>">

    <meta property="og:type" content="website">
    <meta property="og:site_name" content="<?= esc(SITE_NAME) ?>">
    <meta property="og:title" content="<?= esc($page['title']) ?> | <?= esc(SITE_NAME) ?>">
    <meta property="og:description" content="<?= esc($page['description']) ?>">
    <meta property="og:url" content="<?= esc($canonicalUrl) ?>">
    <meta property="og:image" content="<?= esc(SITE_BASE_URL) ?>/assets/images/logo.png">

    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="<?= esc($page['title']) ?> | <?= esc(SITE_NAME) ?>">
    <meta name="twitter:description" content="<?= esc($page['description']) ?>">
    <meta name="twitter:image" content="<?= esc(SITE_BASE_URL) ?>/assets/images/logo.png">

    <link rel="apple-touch-icon" sizes="180x180" href="/assets/images/logo.png">
    <link rel="icon" type="image/x-icon" href="/assets/images/arma_favicon.ico">
    <link rel="shortcut icon" type="image/x-icon" href="/assets/images/arma_favicon.ico">
    <link rel="manifest" href="/assets/favicon/site.webmanifest">
    <meta name="theme-color" content="#473425">

    <?php if ($pageKey === 'appointments'): ?>
        <link rel="stylesheet" href="/assets/vendor/flatpickr/flatpickr.min.css?v=<?= esc((string) filemtime(__DIR__ . '/../assets/vendor/flatpickr/flatpickr.min.css')) ?>">
    <?php endif; ?>
    <link rel="stylesheet" href="/assets/css/tailwind.css">
    <link rel="stylesheet" href="/assets/css/styles.css">
    <?php if ($pageKey === 'appointments'): ?>
        <script src="/assets/vendor/flatpickr/flatpickr.min.js?v=<?= esc((string) filemtime(__DIR__ . '/../assets/vendor/flatpickr/flatpickr.min.js')) ?>" defer></script>
    <?php endif; ?>
    <script src="/assets/js/main.js?v=<?= esc((string) filemtime(__DIR__ . '/../assets/js/main.js')) ?>" defer></script>
</head>
<body class="bg-arma-100 text-arma-900 antialiased">
<a href="#main-content" class="sr-only focus:not-sr-only focus:absolute focus:z-50 focus:m-4 focus:rounded-md focus:bg-arma-200 focus:px-4 focus:py-2">
    Skip to content
</a>
<header class="sticky top-0 z-40 border-b border-arma-700/40 bg-arma-900/95 backdrop-blur-md">
    <div class="w-full px-4 sm:px-6 lg:px-10">
        <div class="mx-auto flex h-20 max-w-[1600px] items-center justify-between gap-4">
            <a href="/index.php" class="inline-flex items-center" aria-label="Arma Dental Clinic Home">
                <img src="/assets/images/logo-header.png" alt="Arma Dental Clinic Logo" class="h-12 md:h-14 w-auto object-contain">
            </a>
            <button id="menu-toggle" class="inline-flex h-10 w-10 items-center justify-center rounded-lg border border-arma-700 text-arma-200 transition hover:bg-arma-800 md:hidden" aria-expanded="false" aria-controls="mobile-menu" aria-label="Open menu">
                <span class="sr-only">Open menu</span>
                <svg aria-hidden="true" viewBox="0 0 24 24" class="h-5 w-5">
                    <path d="M4 7h16M4 12h16M4 17h16" fill="none" stroke="currentColor" stroke-linecap="round" stroke-width="2"></path>
                </svg>
            </button>
            <nav aria-label="Main navigation" class="hidden md:block">
                <ul class="nav-tabs flex items-center gap-2 lg:gap-3">
                    <span class="nav-tab-indicator" aria-hidden="true"></span>
                    <?php foreach ($pages as $key => $item): ?>
                        <li>
                            <a
                                href="/<?= esc($item['file']) ?>"
                                class="nav-tab-link rounded-full px-4 py-2 text-sm font-medium transition duration-300 <?= is_active_page($pageKey, $key) ? 'is-active text-arma-900' : 'text-arma-200 hover:text-white' ?>"
                            >
                                <?= esc($item['label']) ?>
                            </a>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </nav>
        </div>
    </div>
</header>
<div id="mobile-menu-overlay" class="pointer-events-none fixed inset-x-0 bottom-0 top-20 z-40 bg-arma-900/20 opacity-0 transition-opacity duration-300 md:hidden"></div>
<nav id="mobile-menu" class="fixed right-0 top-20 z-50 h-[calc(100dvh-5rem)] w-80 max-w-[88vw] translate-x-full overflow-y-auto border-l border-arma-500/60 bg-arma-100 p-4 shadow-premium transition-transform duration-300 md:hidden" aria-label="Mobile navigation">
    <div class="mb-4 flex items-center justify-end">
        <button id="menu-close" class="inline-flex h-9 w-9 items-center justify-center rounded-lg border border-arma-500 text-arma-900 transition hover:bg-arma-200" aria-label="Close menu">
            <span class="sr-only">Close menu</span>
            <svg aria-hidden="true" viewBox="0 0 24 24" class="h-5 w-5">
                <path d="M6 6l12 12M18 6l-12 12" fill="none" stroke="currentColor" stroke-linecap="round" stroke-width="2"></path>
            </svg>
        </button>
    </div>
    <ul class="space-y-2">
        <?php foreach ($pages as $key => $item): ?>
            <li>
                <a
                    href="/<?= esc($item['file']) ?>"
                    class="block rounded-lg px-4 py-3 text-base font-semibold transition <?= is_active_page($pageKey, $key) ? 'bg-arma-900 text-white' : 'text-arma-900 hover:bg-arma-200' ?>"
                >
                    <?= esc($item['label']) ?>
                </a>
            </li>
        <?php endforeach; ?>
    </ul>
</nav>
<main id="main-content">
