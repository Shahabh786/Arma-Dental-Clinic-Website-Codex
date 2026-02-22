<?php
declare(strict_types=1);
$pageKey = 'about';
require_once __DIR__ . '/includes/header.php';
?>
<section class="w-full bg-white px-4 py-16 sm:px-6 lg:px-10">
    <div class="mx-auto max-w-[1600px]">
        <div class="reveal max-w-5xl">
            <p class="text-xs uppercase tracking-widest text-arma-700">About ARMA Dental Clinic</p>
            <h1 class="mt-4 text-4xl font-bold text-arma-900 sm:text-5xl">Welcome to ARMA Dental Clinic</h1>
            <p class="mt-5 text-base leading-relaxed text-arma-800 sm:text-lg">
                At ARMA Dental Clinic, we believe a confident smile can change everything. Located in the heart of Mira Road, our clinic offers high-quality, affordable, and comfortable dental care for families and individuals of all ages.
            </p>
        </div>
    </div>
</section>

<section class="soft-surface w-full px-4 py-16 sm:px-6 lg:px-10">
    <div class="mx-auto grid max-w-[1600px] gap-10 lg:grid-cols-[1.1fr_1fr]">
        <div class="reveal rounded-3xl border border-arma-500/40 bg-white p-8 shadow-premium">
            <p class="text-sm leading-relaxed text-arma-800 sm:text-base">
                Led by experienced dental professionals, we specialize in everything from routine checkups to advanced smile makeovers. Our services include dental implants, braces, cosmetic veneers, root canals, kids' dentistry, and more - all performed with gentle hands and modern technology.
            </p>
            <p class="mt-5 text-sm leading-relaxed text-arma-800 sm:text-base">
                Whether you're coming in for a regular cleaning or a complete smile transformation, our goal is simple: to treat you with compassion, precision, and complete honesty.
            </p>
            <p class="mt-5 text-sm leading-relaxed text-arma-800 sm:text-base">
                We understand that many people feel anxious about dental visits - so we've created a space that feels more like home than a hospital. With a focus on hygiene, painless treatments, and personalized care, ARMA Dental is here to make your dental experience easy and anxiety-free.
            </p>
        </div>
        <div class="reveal overflow-hidden rounded-3xl border border-arma-500/30 shadow-premium">
            <img
                src="/assets/images/about-dental.jpg"
                alt="Modern ARMA Dental Clinic environment"
                class="h-full min-h-[340px] w-full object-cover"
                loading="lazy"
            >
        </div>
    </div>
</section>
<?php require_once __DIR__ . '/includes/footer.php'; ?>
