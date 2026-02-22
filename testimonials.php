<?php
$pageTitle = 'Patient Testimonials | Arma Dental Clinic Reviews';
$metaDescription = 'Read patient testimonials and feedback for Arma Dental Clinic. Discover why families trust us for safe, comfortable and modern dental care.';
$pagePath = 'testimonials.php';
require_once __DIR__ . '/includes/header.php';
?>

<main>
  <section class="page-hero section">
    <div class="container">
      <p class="eyebrow">Patient Stories</p>
      <h1>Real Experiences from Patients at Arma Dental Clinic</h1>
      <p>Our outcomes are measured by patient comfort, trust, and long-term oral health results.</p>
    </div>
  </section>

  <section class="testimonials section">
    <div class="container">
      <div class="hero-card">
        <div id="reviews-skeleton" class="review-skeleton">
          <div class="review-skeleton-line review-skeleton-title"></div>
          <div class="review-skeleton-line review-skeleton-subtitle"></div>
          <div class="review-skeleton-grid">
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
      <div class="section-cta">
        <a class="btn btn-primary" href="contact.php">Become Our Next Happy Patient</a>
      </div>
    </div>
  </section>
</main>

<script>
document.addEventListener('DOMContentLoaded', () => {
  const skeleton = document.getElementById('reviews-skeleton');
  const widget = document.getElementById('reviews-widget');
  if (!skeleton || !widget) return;

  const appRoot = widget.querySelector('.elfsight-app-3a08dd0b-668a-478a-b155-0c7ce8ac4311');
  const startedAt = Date.now();
  const reveal = () => {
    skeleton.classList.add('hidden');
    widget.classList.remove('review-widget-hidden');
  };

  const isWidgetRendered = () => {
    if (!appRoot) return false;
    const elapsed = Date.now() - startedAt;

    const iframe = appRoot.querySelector('iframe');
    if (iframe && (iframe.offsetHeight > 0 || elapsed > 2500)) {
      return true;
    }

    if (appRoot.children.length > 0 && elapsed > 3500) {
      return true;
    }

    const hasVisibleContent = Array.from(appRoot.children).some((el) => {
      return el instanceof HTMLElement && el.offsetHeight > 24 && el.offsetWidth > 24;
    });

    return hasVisibleContent;
  };

  if (!appRoot) return;

  const tryReveal = () => {
    if (isWidgetRendered()) {
      observer.disconnect();
      reveal();
      return true;
    }
    return false;
  };

  const observer = new MutationObserver(() => {
    tryReveal();
  });
  observer.observe(appRoot, { childList: true, subtree: true, attributes: true });

  const pollId = window.setInterval(() => {
    if (tryReveal()) {
      window.clearInterval(pollId);
    }
  }, 250);

  // Safety fallback in case external widget script is blocked.
  window.setTimeout(() => {
    window.clearInterval(pollId);
    observer.disconnect();
    reveal();
  }, 15000);
});
</script>

<?php require_once __DIR__ . '/includes/footer.php'; ?>
