<?php
$mail = carbon_get_theme_option('crb_mail');
$fb_wsad = carbon_get_theme_option('crb_facebook_link_wsad');
$fb_sknm = carbon_get_theme_option('crb_facebook_link_sknm');
?>

<?php get_template_part('template-parts/partners'); ?>

<footer class="footer text-center bg-light" id="contact">
  <div class="container d-flex">
    <div class="container">
      <h2>Kontakt</h2>
      <ul class="list-inline mb-3">
        <li class="list-inline-item">

          <a class="text-white social-link rounded-circle d-flex align-items-center justify-content-center text-decoration-none"
            target="_blank" href="mailto:<?php echo $mail; ?> ">
            <i class="icon-envelope"></i>
          </a>
        </li>
        <li class="list-inline-item">
          <a class="text-white social-link rounded-circle d-flex align-items-center justify-content-center text-decoration-none"
            target="_blank" href="<?php echo $fb_wsad; ?>">
            <i class="icon-social-facebook"></i></a>
        </li>
      </ul>
      <p class="text-dark mb-3">
        e-mail:
        <a class="text-muted" href="mailto:<?php echo $mail; ?>">
          <?php echo $mail; ?>
        </a>
      </p>
    </div>
    <div class="container">
      <h2>Organizatorzy</h2>
      <ul class="list-inline mb-3">
        <li class="list-inline-item">

          <img src="<?php echo get_template_directory_uri(); ?>/assets/img/wsad_logo.png" alt="WSAD" height="96px" />

        </li>
        <li class="list-inline-item">
          <a target="_blank" href="<?php echo $fb_sknm; ?>" class="">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/sknm_logo.png" alt="SKNM6" height="96px" />
          </a>
        </li>
      </ul>
    </div>
  </div>
  <p class="text-muted mb-0 small">Copyright &nbsp;© WSAD 2025</p>
</footer>
<a class="js-scroll-trigger scroll-to-top rounded" href="#page-top"><i class="fa fa-angle-up"></i></a>
<?php wp_footer(); ?>
</body>

</html>