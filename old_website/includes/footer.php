<?php
declare(strict_types=1);
require_once __DIR__ . '/config.php';
$pages = site_pages();
?>
</main>
<footer class="border-t border-arma-500/60 bg-arma-200 text-arma-900">
    <div class="w-full px-4 py-6 sm:px-6 lg:px-10">
        <div class="mx-auto max-w-[1600px]">
            <div class="flex flex-col gap-5 text-sm md:flex-row md:items-start md:justify-between">
                <div>
                    <h2 class="text-base font-semibold text-arma-900"><?= esc(SITE_NAME) ?></h2>
                    <p class="mt-1 text-arma-700"><?= esc(SITE_ADDRESS) ?></p>
                </div>
                <div class="grid grid-cols-3 gap-x-3 gap-y-2 text-arma-900 sm:grid-cols-6 md:flex md:flex-wrap md:items-center md:gap-x-4 md:gap-y-2">
                    <?php foreach ($pages as $item): ?>
                        <a href="/<?= esc($item['file']) ?>" class="transition hover:text-arma-800"><?= esc($item['label']) ?></a>
                    <?php endforeach; ?>
                </div>
                <div class="text-left md:text-right">
                    <a href="tel:+917304996569" class="block transition hover:text-arma-800"><?= esc(SITE_PHONE) ?></a>
                    <a href="mailto:<?= esc(SITE_EMAIL) ?>" class="mt-1 block transition hover:text-arma-800"><?= esc(SITE_EMAIL) ?></a>
                </div>
            </div>
            <div class="mt-4 border-t border-arma-500/70 pt-3 text-xs text-arma-700">
                &copy; <?= date('Y') ?> <?= esc(SITE_NAME) ?>. All rights reserved.
            </div>
        </div>
    </div>
</footer>
</body>
</html>
