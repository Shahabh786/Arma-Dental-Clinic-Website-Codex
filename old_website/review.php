<?php
declare(strict_types=1);
$pageKey = 'review';
require_once __DIR__ . '/includes/header.php';
?>
<section class="w-full bg-white px-4 py-16 sm:px-6 lg:px-10">
    <div class="mx-auto max-w-[1600px]">
        <div class="reveal max-w-3xl">
            <p class="text-xs uppercase tracking-widest text-arma-700">Patient Voices</p>
            <h1 class="mt-4 text-4xl font-bold text-arma-900 sm:text-5xl">Reviews That Reflect Trust</h1>
            <p class="mt-4 text-base text-arma-800">
                Real experiences from patients who chose Arma Dental Clinic for preventive, restorative, and cosmetic care.
            </p>
        </div>
    </div>
</section>

<section class="soft-surface w-full px-4 py-16 sm:px-6 lg:px-10">
    <div class="mx-auto max-w-[1600px]">
        <div class="reveal rounded-3xl border border-arma-500/30 bg-white p-5 shadow-premium sm:p-8">
            <div id="reviews-skeleton" class="review-skeleton">
                <div class="review-skeleton-line h-[18px] w-44"></div>
                <div class="mt-4 review-skeleton-line w-full"></div>
                <div class="mt-3 review-skeleton-line w-4/5"></div>
                <div class="mt-6 grid gap-4 md:grid-cols-2 lg:grid-cols-3">
                    <div class="review-skeleton-card"></div>
                    <div class="review-skeleton-card"></div>
                    <div class="review-skeleton-card"></div>
                </div>
            </div>
            <script src="https://elfsightcdn.com/platform.js" async></script>
            <div id="reviews-widget" class="review-widget-hidden">
                <div class="elfsight-app-3a08dd0b-668a-478a-b155-0c7ce8ac4311" data-elfsight-app-lazy></div>
            </div>
        </div>
    </div>
</section>

<section class="w-full bg-white px-4 py-14 sm:px-6 lg:px-10">
    <div class="mx-auto max-w-[1600px]">
        <div class="reveal rounded-3xl border border-arma-500/40 bg-arma-100 p-8 text-center shadow-premium">
            <h2 class="text-2xl font-bold text-arma-900 sm:text-3xl">Ready for your best dental experience?</h2>
            <p class="mt-3 text-sm text-arma-800 sm:text-base">Book your visit and get a personalized consultation.</p>
            <a href="/appointments.php#appointment-request-form" class="lift-hover mt-6 inline-flex rounded-full bg-arma-900 px-6 py-3 text-sm font-semibold text-white">
                Schedule Appointment
            </a>
        </div>
    </div>
</section>
<script>
    document.addEventListener('DOMContentLoaded', () => {
        const skeleton = document.getElementById('reviews-skeleton');
        const widget = document.getElementById('reviews-widget');
        if (!skeleton || !widget) return;

        const startedAt = Date.now();
        const minDelay = 3000;
        let revealed = false;

        const revealWidget = () => {
            if (revealed) return;
            revealed = true;
            skeleton.classList.add('hidden');
            widget.classList.remove('review-widget-hidden');
        };

        const revealWithDelay = () => {
            const elapsed = Date.now() - startedAt;
            const wait = Math.max(0, minDelay - elapsed);
            window.setTimeout(revealWidget, wait);
        };

        const appRoot = widget.querySelector('.elfsight-app-3a08dd0b-668a-478a-b155-0c7ce8ac4311');
        if (!appRoot) {
            revealWithDelay();
            return;
        }

        const observer = new MutationObserver(() => {
            if (appRoot.children.length > 0) {
                observer.disconnect();
                revealWithDelay();
            }
        });

        observer.observe(appRoot, { childList: true, subtree: true });

        window.setTimeout(() => {
            observer.disconnect();
            revealWithDelay();
        }, 12000);
    });
</script>
<?php require_once __DIR__ . '/includes/footer.php'; ?>
