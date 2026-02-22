<?php
declare(strict_types=1);
$pageKey = 'contact';
require_once __DIR__ . '/includes/header.php';
?>
<section class="w-full bg-white px-4 py-16 sm:px-6 lg:px-10">
    <div class="mx-auto max-w-[1600px]">
        <div class="reveal max-w-3xl">
            <p class="text-xs uppercase tracking-widest text-arma-700">Contact Us</p>
            <h1 class="mt-4 text-4xl font-bold text-arma-900 sm:text-5xl">We Are Easy to Reach</h1>
            <p class="mt-4 text-base text-arma-800">Speak with our team, book your visit, or walk into our clinic at Mira Road.</p>
        </div>
    </div>
</section>

<section class="soft-surface w-full px-4 py-16 sm:px-6 lg:px-10">
    <div class="mx-auto grid max-w-[1600px] gap-5 md:grid-cols-3">
        <article class="reveal lift-hover rounded-2xl bg-white p-6 shadow-premium">
            <h2 class="text-lg font-semibold text-arma-900">Phone</h2>
            <p class="mt-2 text-sm text-arma-700"><a href="tel:+917304996569" class="underline"><?= esc(SITE_PHONE) ?></a></p>
        </article>
        <article class="reveal lift-hover rounded-2xl bg-white p-6 shadow-premium">
            <h2 class="text-lg font-semibold text-arma-900">Email</h2>
            <p class="mt-2 text-sm text-arma-700"><a href="mailto:<?= esc(SITE_EMAIL) ?>" class="underline"><?= esc(SITE_EMAIL) ?></a></p>
        </article>
        <article class="reveal lift-hover rounded-2xl bg-white p-6 shadow-premium">
            <h2 class="text-lg font-semibold text-arma-900">Address</h2>
            <p class="mt-2 text-sm text-arma-700"><?= esc(SITE_ADDRESS) ?></p>
        </article>
    </div>
</section>

<section class="w-full bg-white px-4 pb-16 sm:px-6 lg:px-10">
    <div class="mx-auto grid max-w-[1600px] gap-8 lg:grid-cols-[1fr_1.15fr]">
        <div class="reveal rounded-3xl bg-white p-8 shadow-premium">
            <h2 class="text-2xl font-semibold text-arma-900">Send a Message</h2>
            <form action="/contact.php" method="post" class="mt-6 grid gap-4">
                <input type="text" name="name" placeholder="Your name" class="rounded-xl border border-arma-500 bg-arma-100 px-4 py-3 text-sm text-arma-900 outline-none transition focus:border-arma-800 focus:ring-2 focus:ring-arma-500/40">
                <input type="email" name="email" placeholder="Your email" class="rounded-xl border border-arma-500 bg-arma-100 px-4 py-3 text-sm text-arma-900 outline-none transition focus:border-arma-800 focus:ring-2 focus:ring-arma-500/40">
                <input type="tel" name="phone" placeholder="Your phone" class="rounded-xl border border-arma-500 bg-arma-100 px-4 py-3 text-sm text-arma-900 outline-none transition focus:border-arma-800 focus:ring-2 focus:ring-arma-500/40">
                <textarea name="message" rows="4" placeholder="How can we help?" class="rounded-xl border border-arma-500 bg-arma-100 px-4 py-3 text-sm text-arma-900 outline-none transition focus:border-arma-800 focus:ring-2 focus:ring-arma-500/40"></textarea>
                <button type="submit" class="lift-hover rounded-full bg-arma-900 px-6 py-3 text-sm font-semibold text-white">Submit Inquiry</button>
            </form>
        </div>
        <div class="map-embed reveal overflow-hidden rounded-3xl shadow-premium">
            <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3765.909440412022!2d72.860954!3d19.286304000000005!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3be7b1e4006d61ff%3A0x70fb19858ab1c0ca!2sArma%20Dental%20Clinic!5e0!3m2!1sen!2sin!4v1771441799776!5m2!1sen!2sin" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
    </div>
</section>
<?php require_once __DIR__ . '/includes/footer.php'; ?>
