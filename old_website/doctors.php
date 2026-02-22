<?php
declare(strict_types=1);
$pageKey = 'doctors';
require_once __DIR__ . '/includes/header.php';
?>
<section class="w-full bg-white px-4 py-16 sm:px-6 lg:px-10">
    <div class="mx-auto max-w-[1600px]">
        <div class="reveal max-w-4xl">
            <h1 class="text-4xl font-bold text-arma-900 sm:text-5xl">Meet Our Expert Dental Team</h1>
            <p class="mt-4 text-lg font-medium text-arma-800">Experienced. Ethical. Patient-Focused.</p>
        </div>
    </div>
</section>

<section class="soft-surface w-full px-4 py-16 sm:px-6 lg:px-10">
    <div class="mx-auto max-w-[1600px]">
        <article class="reveal grid gap-8 rounded-3xl border border-arma-500/50 bg-white p-8 shadow-premium lg:grid-cols-[340px_1fr]">
            <div class="overflow-hidden rounded-2xl border border-arma-500/30">
                <img src="/assets/images/alfiashaidar.png" alt="Dr. Alfia Shahab Haidar" class="h-full min-h-[320px] w-full object-cover" loading="lazy">
            </div>
            <div>
                <p class="text-xs font-semibold uppercase tracking-widest text-arma-700">Lead Doctor</p>
                <h2 class="mt-3 text-3xl font-bold text-arma-900">Dr. Alfia Shahab Haidar</h2>
                <div class="mt-4 flex flex-wrap gap-3 text-sm">
                    <span class="rounded-full bg-arma-100 px-4 py-2 font-medium text-arma-800">BDS (M.U.H.S)</span>
                    <span class="rounded-full bg-arma-100 px-4 py-2 font-medium text-arma-800">10+ Years Experience</span>
                </div>
                <p class="mt-5 max-w-4xl text-sm leading-relaxed text-arma-700 sm:text-base">
                    Dr. Alfia Shahab Haidar leads the clinic with over a decade of clinical excellence and patient-centered care. She specializes in comprehensive dental treatments and is committed to delivering high-quality, ethical, and comfortable dental solutions.
                </p>
                <div class="mt-6 grid gap-3 sm:grid-cols-3">
                    <div class="rounded-xl border border-arma-500/40 bg-arma-100 p-3">
                        <p class="text-xs uppercase tracking-wider text-arma-700">Consultation Style</p>
                        <p class="mt-1 text-sm font-semibold text-arma-900">Calm and patient-first</p>
                    </div>
                    <div class="rounded-xl border border-arma-500/40 bg-arma-100 p-3">
                        <p class="text-xs uppercase tracking-wider text-arma-700">Clinical Focus</p>
                        <p class="mt-1 text-sm font-semibold text-arma-900">Precision and comfort</p>
                    </div>
                    <div class="rounded-xl border border-arma-500/40 bg-arma-100 p-3">
                        <p class="text-xs uppercase tracking-wider text-arma-700">Care Promise</p>
                        <p class="mt-1 text-sm font-semibold text-arma-900">Ethical, transparent treatment</p>
                    </div>
                </div>
                <div class="mt-6">
                    <h3 class="text-lg font-semibold text-arma-900">Special Interests</h3>
                    <ul class="mt-3 grid gap-2 text-sm text-arma-800 sm:grid-cols-2 lg:grid-cols-4">
                        <li class="rounded-lg bg-arma-100 px-3 py-2">Smile Designing</li>
                        <li class="rounded-lg bg-arma-100 px-3 py-2">Root Canal Treatments</li>
                        <li class="rounded-lg bg-arma-100 px-3 py-2">Cosmetic Dentistry</li>
                        <li class="rounded-lg bg-arma-100 px-3 py-2">Preventive Dental Care</li>
                    </ul>
                </div>
                <blockquote class="mt-6 rounded-xl border-l-4 border-arma-500 bg-arma-100 px-4 py-3 text-sm italic leading-relaxed text-arma-800">
                    "Every smile deserves thoughtful care. My goal is to make each patient feel informed, comfortable, and confident throughout their treatment journey."
                </blockquote>
                <div class="mt-6 flex flex-wrap gap-3">
                    <a href="/appointments.php#appointment-request-form" class="rounded-full bg-arma-900 px-5 py-2 text-sm font-semibold text-white transition hover:bg-arma-800">Book Consultation</a>
                    <a href="/contact.php" class="rounded-full border border-arma-500 bg-white px-5 py-2 text-sm font-semibold text-arma-900 transition hover:bg-arma-100">Talk to Our Team</a>
                </div>
            </div>
        </article>
    </div>
</section>

<section class="w-full bg-white px-4 pb-16 sm:px-6 lg:px-10">
    <div class="mx-auto max-w-[1600px]">
        <div class="reveal mb-6">
            <h2 class="text-3xl font-bold text-arma-900">Other Specialists</h2>
        </div>
        <div class="grid gap-6 md:grid-cols-2 lg:grid-cols-3">
            <article class="reveal lift-hover overflow-hidden rounded-2xl bg-white shadow-premium">
                <img src="/assets/images/kamalrkabra.png" alt="Dr. Kamal R Kabra" class="h-60 w-full object-cover object-top" loading="lazy">
                <div class="p-7">
                <h3 class="text-2xl font-semibold text-arma-900">Dr. Kamal R Kabra</h3>
                <p class="mt-2 text-sm font-medium text-arma-700">Dental Surgeon</p>
                <p class="mt-4 text-sm leading-relaxed text-arma-700">
                    Dr. Kamal Kabra brings surgical precision and extensive experience in advanced dental procedures. He focuses on safe, efficient, and patient-friendly surgical treatments.
                </p>
                </div>
            </article>
            <article class="reveal lift-hover overflow-hidden rounded-2xl bg-white shadow-premium">
                <img src="/assets/images/firozakhan.png" alt="Dr. Firoz A Khan" class="h-60 w-full object-cover object-top" loading="lazy">
                <div class="p-7">
                <h3 class="text-2xl font-semibold text-arma-900">Dr. Firoz A Khan</h3>
                <p class="mt-2 text-sm font-medium text-arma-700">Orthodontist</p>
                <p class="mt-4 text-sm leading-relaxed text-arma-700">
                    Dr. Firoz Khan specializes in orthodontic treatments, including braces and alignment correction. He is dedicated to helping patients achieve healthy, confident smiles.
                </p>
                </div>
            </article>
            <article class="reveal lift-hover overflow-hidden rounded-2xl bg-white shadow-premium">
                <img src="/assets/images/saqibkhan.png" alt="Dr. Saqib Khan" class="h-60 w-full object-cover object-top" loading="lazy">
                <div class="p-7">
                <h3 class="text-2xl font-semibold text-arma-900">Dr. Saqib Khan</h3>
                <p class="mt-2 text-sm font-medium text-arma-700">Dental Consultant</p>
                <p class="mt-4 text-sm leading-relaxed text-arma-700">
                    Dr. Saqib Khan specializes in veneers and aligners, helping patients achieve aesthetic and well-aligned smiles with personalized treatment planning.
                </p>
                </div>
            </article>
        </div>
    </div>
</section>
<?php require_once __DIR__ . '/includes/footer.php'; ?>
