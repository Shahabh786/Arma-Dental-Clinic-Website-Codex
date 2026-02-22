<?php require_once __DIR__ . '/config.php'; ?>
  <footer class="site-footer">
    <div class="container footer-wrap">
      <p>&copy; <?php echo date('Y'); ?> <?php echo esc($clinicName); ?>. All rights reserved.</p>
      <a href="<?php echo esc($callLink); ?>">Appointment: <?php echo esc($phone); ?></a>
    </div>
  </footer>

  <a class="float-whatsapp" href="<?php echo esc($whatsAppLink); ?>?text=Hi%20Arma%20Dental%20Clinic%2C%20I%20want%20to%20book%20an%20appointment." target="_blank" rel="noopener" aria-label="Book on WhatsApp">WhatsApp</a>

  <script src="assets/js/main.js"></script>
</body>
</html>
