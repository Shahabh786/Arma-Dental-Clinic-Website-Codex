<?php
declare(strict_types=1);
$pageKey = 'home';
require_once __DIR__ . '/includes/header.php';
?>
<section class="hero-image-overlay w-full bg-arma-100 px-4 py-16 sm:px-6 lg:px-10">
    <div class="mx-auto grid max-w-[1600px] items-center gap-10 md:grid-cols-2">
        <div class="reveal">
            <p class="inline-flex items-center rounded-full border border-arma-500/50 bg-white px-4 py-1 text-xs uppercase tracking-widest text-arma-800">
                Trusted Modern Dentistry
            </p>
            <h1 class="mt-5 text-4xl font-bold leading-tight text-arma-900 sm:text-5xl lg:text-6xl">
                Premium Smile Care, Designed Around You.
            </h1>
            <p class="mt-5 max-w-2xl text-base leading-relaxed text-arma-800 sm:text-lg">
                At Arma Dental Clinic, we combine advanced dental technology with a calm, personalized experience so every visit feels effortless and reassuring.
            </p>
            <div class="mt-8 flex flex-wrap gap-3">
                <a href="/appointments.php#appointment-request-form" class="lift-hover rounded-full bg-arma-900 px-6 py-3 text-sm font-semibold text-white shadow-premium">
                    Book Appointment
                </a>
                <a href="/services.php" class="lift-hover rounded-full border border-arma-500 bg-white px-6 py-3 text-sm font-semibold text-arma-900">
                    Explore Services
                </a>
            </div>
        </div>
        <div class="reveal">
            <div class="aspect-[4/3] min-h-[320px] overflow-hidden rounded-3xl border border-arma-500/30 bg-white shadow-premium md:min-h-[420px]">
                <img
                    src="/assets/images/hero-dental.jpg"
                    alt="Dentist working with a patient in a modern clinic"
                    class="block h-full w-full object-cover"
                    loading="eager"
                >
            </div>
        </div>
    </div>
</section>

<section class="w-full bg-white px-4 py-14 sm:px-6 lg:px-10">
    <div class="mx-auto grid max-w-[1600px] gap-4 sm:grid-cols-2 lg:grid-cols-4">
        <article class="reveal glass-card lift-hover rounded-2xl p-6 shadow-premium">
            <p class="text-3xl font-bold text-arma-800">10+</p>
            <p class="mt-2 text-sm text-arma-900">Years of trusted clinical experience</p>
        </article>
        <article class="reveal glass-card lift-hover rounded-2xl p-6 shadow-premium">
            <p class="text-3xl font-bold text-arma-800">5k+</p>
            <p class="mt-2 text-sm text-arma-900">Smiles treated with precision care</p>
        </article>
        <article class="reveal glass-card lift-hover rounded-2xl p-6 shadow-premium">
            <p class="text-3xl font-bold text-arma-800">100%</p>
            <p class="mt-2 text-sm text-arma-900">Customized treatment planning approach</p>
        </article>
        <article class="reveal glass-card lift-hover rounded-2xl p-6 shadow-premium">
            <p class="text-3xl font-bold text-arma-800">7 Days</p>
            <p class="mt-2 text-sm text-arma-900">Flexible consultation availability</p>
        </article>
    </div>
</section>

<section class="soft-surface w-full px-4 py-16 sm:px-6 lg:px-10">
    <div class="mx-auto max-w-[1600px]">
        <div class="reveal flex flex-wrap items-end justify-between gap-6">
            <div>
                <h2 class="text-3xl font-bold text-arma-900 sm:text-4xl">Featured Services</h2>
                <p class="mt-3 max-w-2xl text-sm text-arma-800 sm:text-base">
                    Complete oral care solutions tailored to your smile goals, comfort, and long-term health.
                </p>
            </div>
            <a href="/services.php" class="lift-hover rounded-full border border-arma-500 bg-white px-5 py-2 text-sm font-semibold text-arma-900 transition hover:bg-arma-200">
                View All Services
            </a>
        </div>
        <div class="mt-8 grid gap-5 md:grid-cols-3">
            <article class="reveal lift-hover overflow-hidden rounded-2xl bg-white shadow-premium">
                <img src="/assets/images/service-smile.jpg" alt="Cosmetic dental treatment and smile design" class="h-52 w-full object-cover" loading="lazy">
                <div class="p-6">
                    <h3 class="text-xl font-semibold text-arma-900">Smile Design</h3>
                    <p class="mt-2 text-sm text-arma-700">Digital planning, veneers, and aesthetic contouring for naturally confident results.</p>
                </div>
            </article>
            <article class="reveal lift-hover overflow-hidden rounded-2xl bg-white shadow-premium">
                <img src="/assets/images/service-restorative.jpg" alt="Restorative dental implants tools" class="h-52 w-full object-cover" loading="lazy">
                <div class="p-6">
                    <h3 class="text-xl font-semibold text-arma-900">Restorative Dentistry</h3>
                    <p class="mt-2 text-sm text-arma-700">Implants, crowns, and bridges to restore bite function and tooth integrity.</p>
                </div>
            </article>
            <article class="reveal lift-hover overflow-hidden rounded-2xl bg-white shadow-premium">
                <img src="/assets/images/service-preventive.jpg" alt="Routine preventive dental checkup" class="h-52 w-full object-cover" loading="lazy">
                <div class="p-6">
                    <h3 class="text-xl font-semibold text-arma-900">Preventive Care</h3>
                    <p class="mt-2 text-sm text-arma-700">Routine checkups, scaling, and oral hygiene guidance to prevent future issues.</p>
                </div>
            </article>
        </div>
    </div>
</section>

<section class="w-full bg-white px-4 py-16 sm:px-6 lg:px-10">
    <div class="mx-auto grid max-w-[1600px] gap-8 lg:grid-cols-[1.2fr_1fr]">
        <div class="reveal rounded-3xl border border-arma-500/30 bg-arma-100 p-8 shadow-premium">
            <h2 class="text-3xl font-bold text-arma-900">Experience Dentistry Without Stress</h2>
            <p class="mt-4 max-w-2xl text-sm leading-relaxed text-arma-800 sm:text-base">
                We focus on comfort-first communication, transparent treatment pathways, and advanced sterilization standards so you feel fully informed and in control.
            </p>
            <div class="mt-6 flex flex-wrap gap-3">
                <a href="/contact.php" class="lift-hover rounded-full bg-arma-900 px-5 py-2 text-sm font-semibold text-white">Contact Us</a>
                <a href="tel:+917304996569" class="lift-hover rounded-full border border-arma-500 bg-white px-5 py-2 text-sm font-semibold text-arma-900">Call +91-7304996569</a>
            </div>
        </div>
        <div class="reveal rounded-3xl bg-white p-8 shadow-premium">
            <h3 class="text-2xl font-semibold text-arma-900">Patient Snapshot</h3>
            <div class="mt-6 space-y-4 text-sm text-arma-800">
                <p class="rounded-xl bg-arma-100 p-4">"The treatment was painless and everything was explained clearly. Highly professional care."</p>
                <p class="rounded-xl bg-arma-100 p-4">"Warm staff, clean facility, and excellent results. The best dental experience I have had."</p>
            </div>
            <a href="/review.php" class="mt-6 inline-flex text-sm font-semibold text-arma-800 underline decoration-arma-500 underline-offset-4">
                Read more reviews
            </a>
        </div>
    </div>
</section>
<?php require_once __DIR__ . '/includes/footer.php'; ?>
