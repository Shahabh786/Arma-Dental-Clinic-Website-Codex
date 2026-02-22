<?php require_once __DIR__ . '/config.php'; ?>
  <footer class="site-footer">
    <div class="container footer-wrap">
      <p>&copy; 2017 <?php echo esc($clinicName); ?>. All rights reserved.</p>
      <p><?php echo esc($address); ?></p>
      <p>
        <a href="mailto:<?php echo esc($email); ?>"><?php echo esc($email); ?></a>
        &middot;
        <a href="<?php echo esc($callLink); ?>">Appointment: <?php echo esc($phone); ?></a>
      </p>
    </div>
  </footer>

  <a class="float-whatsapp" href="<?php echo esc($whatsAppLink); ?>?text=Hi%20Arma%20Dental%20Clinic%2C%20I%20want%20to%20book%20an%20appointment." target="_blank" rel="noopener" aria-label="Book on WhatsApp">
    <span class="sr-only">WhatsApp</span>
    <svg viewBox="0 0 24 24" aria-hidden="true" class="whatsapp-icon">
      <path fill="currentColor" d="M12.04 2C6.62 2 2.2 6.4 2.2 11.84c0 1.74.46 3.44 1.33 4.95L2 22l5.35-1.4a9.86 9.86 0 0 0 4.69 1.2h.01c5.42 0 9.84-4.4 9.84-9.84A9.84 9.84 0 0 0 12.04 2Zm0 18.05h-.01c-1.47 0-2.91-.4-4.16-1.16l-.3-.18-3.18.83.85-3.1-.2-.32a8.05 8.05 0 0 1-1.25-4.28c0-4.44 3.62-8.06 8.07-8.06a8.03 8.03 0 0 1 8.05 8.05 8.06 8.06 0 0 1-8.07 8.22Zm4.43-6.02c-.24-.12-1.44-.71-1.66-.79-.22-.08-.38-.12-.54.12-.16.24-.62.79-.76.95-.14.16-.28.18-.52.06-.24-.12-1.02-.38-1.95-1.21-.72-.64-1.21-1.43-1.35-1.67-.14-.24-.01-.37.11-.49.11-.11.24-.28.36-.42.12-.14.16-.24.24-.4.08-.16.04-.3-.02-.42-.06-.12-.54-1.3-.74-1.78-.2-.48-.4-.41-.54-.42h-.46c-.16 0-.42.06-.64.3-.22.24-.84.82-.84 2s.86 2.33.98 2.49c.12.16 1.69 2.58 4.09 3.62.57.25 1.02.4 1.37.52.58.18 1.11.15 1.53.09.47-.07 1.44-.59 1.64-1.16.2-.57.2-1.05.14-1.16-.06-.11-.22-.18-.46-.3Z"></path>
    </svg>
  </a>

  <script src="assets/js/main.js"></script>
</body>
</html>
