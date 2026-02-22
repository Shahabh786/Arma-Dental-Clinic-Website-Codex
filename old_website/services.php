<?php
declare(strict_types=1);
$pageKey = 'services';
require_once __DIR__ . '/includes/header.php';
?>
<section class="soft-surface w-full px-4 py-16 sm:px-6 lg:px-10">
    <div class="mx-auto max-w-[1600px]">
        <div class="reveal max-w-4xl">
            <p class="text-xs font-semibold uppercase tracking-widest text-arma-700">Our Services</p>
            <h1 class="mt-4 text-4xl font-bold leading-tight text-arma-900 sm:text-5xl">Advanced Dental Solutions, Designed Around Your Smile</h1>
            <p class="mt-4 max-w-3xl text-base leading-relaxed text-arma-800 sm:text-lg">
                From preventive checkups to full smile rehabilitation, we offer precise, comfortable, and personalized treatment plans backed by modern techniques and specialist expertise.
            </p>
            <div class="mt-6 flex flex-wrap gap-3">
                <a href="/appointments.php#appointment-request-form" class="lift-hover rounded-full bg-arma-900 px-6 py-3 text-sm font-semibold text-white">Book Consultation</a>
                <a href="/contact.php" class="lift-hover rounded-full border border-arma-500 bg-white px-6 py-3 text-sm font-semibold text-arma-900">Talk to Our Team</a>
            </div>
        </div>
    </div>
</section>

<section class="w-full bg-white px-4 py-16 sm:px-6 lg:px-10">
    <div class="mx-auto max-w-[1600px]">
        <div class="reveal mb-8 max-w-3xl">
            <h2 class="text-3xl font-bold text-arma-900 sm:text-4xl">Comprehensive Services</h2>
            <p class="mt-3 text-sm text-arma-700 sm:text-base">Select the care you need and book your preferred slot. Every service below is handled with specialist precision and patient-first comfort.</p>
        </div>
        <div class="grid gap-6 md:grid-cols-2 xl:grid-cols-3">
            <?php
            $services = [
                [
                    'number' => '01',
                    'title' => 'Smile Makeover (Cosmetic Dentistry)',
                    'focus' => 'Veneers, Teeth Whitening, Smile Designing',
                    'desc' => 'Transform your smile with personalized cosmetic treatments. From veneer placement to whitening and smile designing, our experts craft natural, confident smiles using modern aesthetics.',
                    'image' => '/assets/images/smile_desing.jpg',
                    'alt' => 'Cosmetic dentistry treatment for smile makeover',
                ],
                [
                    'number' => '02',
                    'title' => 'Missing Tooth Solutions (Dental Implants & Bridges)',
                    'focus' => 'Implants, Dental Bridges, Full Mouth Rehabilitation',
                    'desc' => 'Replace missing teeth with strong, natural-looking implants or fixed bridges. Long-lasting solutions planned with precision and delivered with years of surgical experience.',
                    'image' => '/assets/images/implants.jpg',
                    'alt' => 'Dental implant tools and treatment setup',
                ],
                [
                    'number' => '03',
                    'title' => 'Tooth Pain Relief (Root Canal Treatment)',
                    'focus' => 'Endodontics',
                    'desc' => 'Save your natural tooth and eliminate pain with our expert, pain-free root canal procedures - done using advanced equipment and sterile techniques.',
                    'image' => '/assets/images/rct.jpg',
                    'alt' => 'Root canal treatment in progress',
                ],
                [
                    'number' => '04',
                    'title' => 'Tooth Repair (Crowns & Bridges)',
                    'focus' => 'Prosthodontics',
                    'desc' => 'Restore broken or weak teeth with custom-designed, durable crowns and bridges that blend seamlessly with your natural smile.',
                    'image' => 'https://images.pexels.com/photos/4687360/pexels-photo-4687360.jpeg?auto=compress&cs=tinysrgb&w=1200',
                    'alt' => 'Dental crown and bridge restorative procedure',
                ],
                [
                    'number' => '05',
                    'title' => 'Braces & Tooth Alignment (Orthodontics)',
                    'focus' => 'Metal Braces, Ceramic Braces, Clear Aligners (Invisalign)',
                    'desc' => 'Straighten crooked or misaligned teeth with braces or invisible aligners. We offer orthodontic care for kids, teens, and adults - designed with precision and monitored regularly.',
                    'image' => '/assets/images/braces.jpg',
                    'alt' => 'Orthodontic braces consultation and alignment planning',
                ],
                [
                    'number' => '06',
                    'title' => 'Gum Health & Bleeding Issues (Gum Care)',
                    'focus' => 'Periodontics',
                    'desc' => 'Treat gum diseases like bleeding, swelling, and bad breath with expert periodontal care. From deep cleaning to advanced gum treatments, we ensure lasting gum health.',
                    'image' => '/assets/images/gum.jpg',
                    'alt' => 'Periodontal gum care and dental cleaning',
                ],
                [
                    'number' => '07',
                    'title' => 'Children\'s Dental Care (Pedodontics)',
                    'focus' => 'Preventive Treatments, Fluoride, Sealants',
                    'desc' => 'Gentle, fun, and safe dental treatments for kids - building healthy habits and preventing cavities from a young age.',
                    'image' => '/assets/images/children.jpg',
                    'alt' => 'Child-friendly pediatric dental checkup',
                ],
                [
                    'number' => '08',
                    'title' => 'Tooth Removal & Oral Surgeries',
                    'focus' => 'Extractions, Minor Surgical Procedures',
                    'desc' => 'Whether it\'s a painful wisdom tooth or any surgical need, we offer comfortable, safe, and sterile procedures handled by skilled hands.',
                    'image' => '/assets/images/extraction.jpg',
                    'alt' => 'Oral surgery and extraction preparation',
                ],
                [
                    'number' => '09',
                    'title' => 'Dentures (Full & Partial Sets)',
                    'focus' => 'Removable Dentures, Flexible Dentures',
                    'desc' => 'Custom-fitted, natural-looking dentures for seniors or those missing multiple teeth - designed for comfort and ease in daily life.',
                    'image' => '/assets/images/dentures.jpg',
                    'alt' => 'Dental prosthetic denture fittings',
                ],
                [
                    'number' => '10',
                    'title' => 'Teeth Cleaning & Polishing (General Dentistry)',
                    'focus' => 'Scaling, Oral Hygiene Counseling',
                    'desc' => 'Professional cleaning to remove plaque, tartar, and stains - keeping your mouth fresh, healthy, and disease-free.',
                    'image' => 'https://images.pexels.com/photos/4269688/pexels-photo-4269688.jpeg?auto=compress&cs=tinysrgb&w=1200',
                    'alt' => 'Professional teeth cleaning and polishing',
                ],
                [
                    'number' => '11',
                    'title' => 'Emergency Dental Care',
                    'focus' => 'Toothache, Injury, Swelling',
                    'desc' => 'Same-day treatments for pain, swelling, injuries, or broken teeth. Walk in or call us - our team is always ready to help.',
                    'image' => 'https://images.pexels.com/photos/7089401/pexels-photo-7089401.jpeg?auto=compress&cs=tinysrgb&w=1200',
                    'alt' => 'Emergency dental consultation with immediate care',
                ],
                [
                    'number' => '12',
                    'title' => 'Preventive Dental Checkups',
                    'focus' => 'X-Rays, Full Mouth Exams, Routine Monitoring',
                    'desc' => 'Early detection is the best protection. We offer routine checkups, digital X-rays, and detailed assessments to prevent bigger issues down the line.',
                    'image' => '/assets/images/preventive.jpg',
                    'alt' => 'Preventive dental checkup with diagnostic screening',
                ],
            ];
            foreach ($services as $service):
                ?>
                <article class="reveal lift-hover overflow-hidden rounded-2xl border border-arma-500/35 bg-white shadow-premium">
                    <div class="relative h-52 overflow-hidden">
                        <img src="<?= esc($service['image']) ?>" alt="<?= esc($service['alt']) ?>" class="h-full w-full object-cover" loading="lazy">
                        <span class="absolute left-4 top-4 rounded-full bg-white/95 px-3 py-1 text-xs font-semibold text-arma-900 shadow-sm"><?= esc($service['number']) ?></span>
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-semibold leading-snug text-arma-900"><?= esc($service['title']) ?></h3>
                        <p class="mt-3 rounded-lg bg-arma-100 px-3 py-2 text-sm font-medium text-arma-800"><?= esc($service['focus']) ?></p>
                        <p class="mt-4 text-sm leading-relaxed text-arma-700"><?= esc($service['desc']) ?></p>
                        <a href="/appointments.php#appointment-request-form" class="mt-5 inline-flex text-sm font-semibold text-arma-800 underline decoration-arma-500 underline-offset-4">
                            Book this service
                        </a>
                    </div>
                </article>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<section class="w-full bg-arma-100 px-4 py-14 sm:px-6 lg:px-10">
    <div class="mx-auto max-w-[1600px]">
        <div class="reveal rounded-3xl border border-arma-500/40 bg-white p-8 shadow-premium">
            <div class="flex flex-wrap items-center justify-between gap-4">
                <div>
                    <h2 class="text-2xl font-bold text-arma-900 sm:text-3xl">Need a personalized treatment plan?</h2>
                    <p class="mt-2 text-sm text-arma-800">Consult our team to identify the most effective treatment pathway for your smile.</p>
                </div>
                <a href="/appointments.php#appointment-request-form" class="lift-hover rounded-full bg-arma-900 px-6 py-3 text-sm font-semibold text-white">Book Consultation</a>
            </div>
        </div>
    </div>
</section>
<?php require_once __DIR__ . '/includes/footer.php'; ?>
