<?php
$start_date = $args['start_date'];
$end_date = $args['end_date'];
$number_of_days = $args['number_of_days'];
$month = $args['month'];
$year = $args['year'];
$show_date = $args['show_date'];
?>
<section id="services" class="content-section bg-primary text-white text-center pt-0">
  <div class="container">
    <div class="content-section-heading">
      <h2 class="mb-5">Szczegóły</h2>
    </div>
    <div class="row">
      <div class="col-md-6 col-lg-3 mb-5 mb-lg-0">
        <span class="mx-auto service-icon rounded-circle mb-3"><i class="icon-calendar"></i></span>
        <h4><strong>Data</strong></h4>
        <p class="mb-0 text-faded">

          <?php
          if ($show_date && !empty($start_date) && !empty($end_date)):

            for ($i = 0; $i < $number_of_days; $i++):
              $add_time = $i . ' day';
              $new_date = strtotime($start_date . ' + ' . $add_time);

              $day = date('d', $new_date);
              $month = date('n', $new_date);


              echo $day;

              if ($i < $number_of_days - 2):
                echo ', ';
              elseif ($i == $number_of_days - 2):
                echo ' i ';
              endif;


            endfor;
            // 3. Na samym końcu wypisujemy miesiąc (zakładając, że wszystkie dni są z tego samego miesiąca)
            echo ' ' . plMonth($month);
          else:
            echo 'Data zostanie opublikowana wkrótce!';
          endif;
          ?>
        </p>
      </div>
      <div class="col-md-6 col-lg-3 mb-5 mb-lg-0">
        <span class="mx-auto service-icon rounded-circle mb-3"><i class="icon-location-pin"></i></span>
        <h4><strong>Lokalizacja</strong></h4>
        <p class="mb-0 text-faded pe-auto">
          <a class="text-faded" href="https://maps.app.goo.gl/SgVzKAE4dEUTmtyL8" target="_blank">
            Politechnika Krakowska <br />im. Tadeusza Kościuszki
          </a>
        </p>
      </div>
      <div class="col-md-6 col-lg-3 mb-5 mb-lg-0">
        <span class="mx-auto service-icon rounded-circle mb-3"><i class="icon-user-follow"></i></span>
        <h4><strong>Rejestracja</strong></h4>
        <p class="mb-0">
          <a class="text-faded pe-auto" href="/zapisy/#register" target="_blank">Zajerestruj się</a>
        </p>
      </div>
      <div class="col-md-6 col-lg-3 mb-5 mb-lg-0">
        <span class="mx-auto service-icon rounded-circle mb-3"><i class="icon-eyeglass"></i></span>
        <h4><strong>Zaproszeni goście</strong></h4>
        <p class="mb-0">
          <a class="text-faded" href="/goscie">Dowiedz się więcej</a>
        </p>
      </div>
    </div>
  </div>
</section>