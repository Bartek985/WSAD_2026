<?php
$mail = carbon_get_theme_option('crb_mail');
$fb_wsad = carbon_get_theme_option('crb_facebook_link_wsad');
$fb_sknm = carbon_get_theme_option('crb_facebook_link_sknm');
$organisers = carbon_get_theme_option('crb_orginiser_list');

?>

<div class="content-section bg-light">
  <?php get_template_part('template-parts/partners'); ?>
  <?php get_template_part('template-parts/organisers'); ?>
</div>


<footer class="footer text-center bg-light" id="contact">
  <div class="container">
    <!-- LEWA KOLUMNA: Kontakt -->
    <div class="col-12 col-md-4 mb-5 mb-md-0 mx-auto">
      <h2>Kontakt</h2>

      <ul class="list-inline mb-3">
        <li class="list-inline-item">
          <a class="text-white social-link rounded-circle d-flex align-items-center justify-content-center text-decoration-none"
            target="_blank" href="mailto:<?php echo $mail; ?>">
            <i class="icon-envelope"></i>
          </a>
        </li>

        <li class="list-inline-item">
          <a class="text-white social-link rounded-circle d-flex align-items-center justify-content-center text-decoration-none"
            target="_blank" href="<?php echo $fb_wsad; ?>">
            <i class="icon-social-facebook"></i>
          </a>
        </li>
      </ul>

      <p class="text-dark mb-3">
        e-mail:
        <a class="text-muted" href="mailto:<?php echo $mail; ?>">
          <?php echo $mail; ?>
        </a>
      </p>
    </div>

    <p class="text-muted mb-0 small mt-5">Copyright © WSAD 2026</p>
  </div>
</footer>



<?php wp_footer(); ?>
</body>

</html>