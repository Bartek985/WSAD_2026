<?php
$start_date = carbon_get_theme_option('crb_event_start');
$year = date('Y', strtotime($start_date));
$all_editions = carbon_get_theme_option('crb_previous_editions');
?>


<!doctype html>
<html <?php language_attributes(); ?>>

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no" />
  <meta name="description" content="Opis konferencji" />

  <title>WSAD
    <?php echo $year; ?>
  </title>

  <?php wp_head(); ?>


</head>

<body <?php body_class(); ?>>
  <div id="page-top"></div>



  <a class="menu-toggle rounded" href="#"><i class="fa fa-bars"></i></a>
  <nav class="navbar navbar-light navbar-expand" id="sidebar-wrapper">
    <div class="container">
      <ul class="nav navbar-nav sidebar-nav" id="sidebar-nav">
        <li class="nav-item sidebar-brand d-flex align-items-center" role="presentation">
          <a class="nav-link active js-scroll-trigger" href="index.html#page-top"><b>WSAD 2026</b></a>
          <img src="<?php echo get_template_directory_uri(); ?>/assets/img/wsad_logo.png" alt="WSAD 2026"
            height="32px" />
        </li>
        <li class="nav-item sidebar-nav-item" role="presentation">
          <div class="d-flex align-items-stretch justify-content-between">
            <a class="nav-link js-scroll-trigger m-0 flex-grow-1 header-nav-link"
              href="<?php echo esc_url(home_url('/')); ?>#page-top">
              <div class="offset-wrapper"><b>Start</b></div>
            </a>
            <a class="text-light p-1 mr-1 d-flex align-items-center justify-content-center submenu-btn" type="button"
              data-toggle="collapse" data-target="#home-submenu" aria-expanded="false"
              aria-controls="home-submenu">▼</a>
          </div>
          <ul class="collapse list-unstyled flex-column ml-2 overflow-hidden" id="home-submenu">
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="<?php echo esc_url(home_url('/')); ?>#about">O konferencji</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="<?php echo esc_url(home_url('/')); ?>#guests">Szczegóły</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger"
                href="<?php echo esc_url(home_url('/')); ?>#schedule">Harmonogram</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="<?php echo esc_url(home_url('/')); ?>#committee">Komitet
                organizacyjny</a>
            </li>
          </ul>
        </li>
        <li class="nav-item sidebar-nav-item" role="presentation">
          <div class="d-flex align-items-stretch justify-content-between">
            <a class="nav-link js-scroll-trigger m-0 flex-grow-1 header-nav-link"
              href="<?php echo esc_url(home_url('/zapisy')); ?>#form">
              <div class="offset-wrapper"><b>Rejestracja</b></div>
            </a>
            <a class="text-light p-1 mr-1 d-flex align-items-center justify-content-center submenu-btn" type="button"
              data-toggle="collapse" data-target="#form-submenu" aria-expanded="false"
              aria-controls="form-submenu">▼</a>
          </div>
          <ul class="collapse list-unstyled flex-column ml-2 overflow-hidden" id="form-submenu">
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger"
                href="<?php echo esc_url(home_url('/zapisy')); ?>#register">Formularz
                zgłoszeniowy</a>
            </li>
          </ul>
        </li>
        <li class="nav-item sidebar-nav-item" role="presentation">
          <div class="d-flex align-items-stretch justify-content-between">
            <a class="nav-link js-scroll-trigger m-0 flex-grow-1 header-nav-link"
              href="<?php echo esc_url(home_url('/goscie')); ?>">
              <div class=" offset-wrapper"><b>Zaproszeni goście</b>
              </div>
            </a>
            <a class="text-light p-1 mr-1 d-flex align-items-center justify-content-center submenu-btn" type="button"
              data-toggle="collapse" data-target="#guests-submenu" aria-expanded="false"
              aria-controls="guests-submenu">▼</a>
          </div>
          <ul class="collapse list-unstyled flex-column ml-2 overflow-hidden" id="guests-submenu">
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger"
                href="<?php echo esc_url(home_url('/goscie')); ?>#guests">Prezenterzy</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger"
                href="<?php echo esc_url(home_url('/goscie')); ?>#abstracts">Abstrakty</a>
            </li>
          </ul>
        </li>
        <li class="nav-item sidebar-nav-item" role="presentation">
          <div class="d-flex align-items-stretch justify-content-between">
            <a class="nav-link js-scroll-trigger m-0 flex-grow-1 header-nav-link" href="<?php echo esc_url(home_url('/poprzednie-edycje')); ?>">
              <div class=" offset-wrapper"><b>Poprzednie edycje</b>
          </div>
          </a>
          <a class="text-light p-1 mr-1 d-flex align-items-center justify-content-center submenu-btn" type="button"
            data-toggle="collapse" data-target="#schedule-submenu" aria-expanded="false"
            aria-controls="schedule-submenu">▼</a>
    </div>
    <ul class="collapse list-unstyled flex-column ml-2 overflow-hidden" id="schedule-submenu">
      <?php if (!empty($all_editions)): ?>
        <?php foreach ($all_editions as $edition): ?>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger"
              href="<?php echo esc_url(home_url('/poprzednie-edycje?q=' . $edition['year-archive'])); ?>#gallery">
              Edycja <?php echo esc_html($edition['title']); ?> (<?php echo esc_html($edition['year-archive']); ?>)
            </a>
          </li>
        <?php endforeach; ?>
      <?php endif; ?>
    </ul>
    </li>
    </ul>
    </div>
  </nav>