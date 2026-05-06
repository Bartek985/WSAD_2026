<?php
$date = carbon_get_theme_option('crb_event_start');
$year = date('Y', strtotime($date));

$button_text = $args['button_text'] ?? 'Dowiedz się więcej';
$edition = carbon_get_theme_option('crb_edition');
$link = $args['link'] ?? '#about';


?>


<header id="top-page" class="d-flex masthead"
  style="background-image: url('<?php echo get_template_directory_uri(); ?>/assets/img/tlo.png')" id="page-top">
  <div class="container my-auto text-center">
    <h1 class="mb-5 text-faded d-none d-sm-none d-lg-block">
      <?php echo "$edition Ogólnopolskie Warsztaty Statystyki i Analizy Danych $year"; ?>
    </h1>

    <h4 class="mb-5 text-faded d-lg-none">
      <?php echo "$edition Ogólnopolskie Warsztaty Statystyki i Analizy Danych $year"; ?>
    </h4>
    <a class="btn btn-primary btn-xl js-scroll-trigger d-none d-lg-inline-block" role="button"
      href="<?php echo $link; ?>">
      <?php echo $button_text; ?>
    </a>
    <a class="btn btn-primary btn-lg js-scroll-trigger d-lg-none fs-4 pe-auto" role="button"
      href="<?php echo $link; ?>">
      <?php echo $button_text; ?>
    </a>
    <div class="overlay"></div>
  </div>
</header>