<?php
$start_date = $args['start_date'];
$end_date = $args['end_date'];
$number_of_days = $args['number_of_days'];
$month = $args['month'];
$year = $args['year'];


$show_schedule = carbon_get_theme_option('crb_show_schedule');
$schedule = carbon_get_theme_option('crb_schedule_list');
?>


<section id="schedule" class="content-section bg-light">
  <div class="container">
    <div class="content-section-heading text-center">
      <h2 class="mb-5">Harmonogram</h2>

      <div class="container text-center p-4">

        <?php

        if ($show_schedule && !empty($schedule)):

          for ($i = 0; $i < $number_of_days; $i++):
            $add_time = $i . ' day';
            $new_date = strtotime($start_date . ' + ' . $add_time);
            $new_day = date('d', $new_date);
            $new_month = date('n', $new_date);
            ?>
            <div class="mb-5">


              <h1 class="mb-4">
                <?php echo $new_day . ' ' . plMonth($new_month); ?>
              </h1>
              <table class="table table-bordered table-zebra">
                <thead>
                  <tr>
                    <th scope="col" class="align-middle text-center" style="width: 20%">Godzina</th>
                    <th scope="col" class="align-middle text-center" style="width: 50%">Temat</th>
                    <th scope="col" class="align-middle text-center" style="width: 30%">Prezentujący</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $filtered_array = array_filter($schedule, function ($event) use ($i) {
                    return $event['day'] == 'day_' . (int) $i + 1;
                  });

                  foreach ($filtered_array as $event): ?>
                    <tr>
                      <td class="align-middle text-center">
                        <?php echo esc_html($event['time_start']) . ' - ' . esc_html($event['time_end']); ?>
                      </td>
                      <td class="align-middle text-center">
                        <?php echo esc_html($event['title']); ?>
                      </td>
                      <td class="align-middle text-center">
                        <?php echo esc_html($event['presenter']); ?>
                      </td>
                    </tr>
                  <?php endforeach ?>
                </tbody>
              </table>
            </div>
            <?php
          endfor;
        else:
          ?>
          <p class="text-primary">
            Harmonogram zostanie opublikowany wkrótce! Bądź na biężąco i zaobserwuj naszą stronę na Facebooku!
          </p>
          <?php

        endif ?>
      </div>
    </div>
  </div>
</section>