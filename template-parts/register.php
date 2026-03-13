<?php
$form_link = carbon_get_theme_option("crb_form_link");

$date_start = carbon_get_theme_option("crb_registration_start_date");
$date_end = carbon_get_theme_option("crb_registration_end_date");
$date_end_active = carbon_get_theme_option("crb_registration_end_date_active");

$show_form = carbon_get_theme_option("crb_show_form");


$start_day = date("d", strtotime($date_start));
$end_day = date("d", strtotime($date_end));
$end_day_active = date("d", strtotime($date_end_active));

$start_month = plMonth(date("n", strtotime($date_start)));
$end_month = plMonth(date("n", strtotime($date_end)));
$end_month_active = plMonth(date("n", strtotime($date_end_active)));

?>
<section id="register" class="content-section bg-light">
  <div class="container">
    <div class="content-section-heading text-center">
      <h2 class="mb-5">Harmonogram rejestracji</h2>


      <div class="container text-center p-4">
        <?php if ($show_form && $date_start && $date_end && $date_end_active && $form_link): ?>

          <table class="table table-bordered align-middle text-center">
            <thead>
              <tr class="align-middle">
                <th scope="col" class="align-middle"></th>
                <th scope="col" class="align-middle">Słuchacze</th>
                <th scope="col" class="align-middle">Aktywni uczestniczy</th>
              </tr>
            </thead>
            <tbody>
              <tr class="align-middle">
                <th scope="row" class="align-middle">Data otwarcia zapisów</th>
                <td class="align-middle">
                  <?php echo $start_day . ' ' . $start_month; ?>
                </td>
                <td class="align-middle">
                  <?php echo $start_day . ' ' . $start_month; ?>
                </td>


              </tr>
              <tr class="align-middle">
                <th scope="row" class="align-middle">Data zamknięcia zapisów</th>
                <td class="align-middle">
                  <?php echo $end_day . ' ' . $end_month; ?>
                </td>
                <td class="align-middle"><?php echo $end_day_active . ' ' . $end_month_active; ?></td>
              </tr>

            </tbody>
          </table>
          <div class="mt-5">

            <?php
            $today = strtotime(date('Y-m-d'));
            $date_start = strtotime($date_start);
            $date_end = strtotime($date_end);

            if ($today < $date_start): ?>
              <p class="fs-4 mt-4">Zapisy jeszcze się nie rozpoczęły. Zapraszamy do rejestracji od
                <?php echo $start_day . ' ' . $start_month; ?>.
              </p>

            <?php elseif ($today <= $date_end): ?>

              <a class="btn btn-primary btn-xl js-scroll-trigger" role="button" target="_blank"
                href="<?php echo $form_link; ?>">
                Rejestracja
              </a>
            <?php else: ?>
              <p class="fs-4 mt-4">Zapisy zostały zakończone. Dziękujemy za zainteresowanie.</p>
            <?php endif; ?>


          </div>
        <?php endif; ?>








      </div>
    </div>
  </div>
</section>