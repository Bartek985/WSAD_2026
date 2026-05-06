<?php
$show_guests = carbon_get_theme_option('crb_show_guests');
$guests_data = carbon_get_theme_option('crb_guests_list');
$color_scheme = $args['color_scheme'] ?? 'blue';
$filter = $args['filter'] ?? true;
?>

<section id="guests"
  class="content-section text-center <?php echo $color_scheme === 'blue' ? 'bg-primary text-white' : 'bg-light'; ?>">
  <div class="container">
    <div class="content-section-heading">
      <h2 class="mb-5">Zaproszeni goście</h2>
      <div class="mb-5"></div>
    </div>
    <div
      class="h4 <?php echo $color_scheme === 'blue' ? 'd-flex justify-content-center' : ' m-auto'; ?> flex-wrap mb-5 ">
      <?php
      $filtered_array = $guests_data;

      if ($filter) {
        $filtered_array = array_filter($filtered_array, function ($item) use ($filter) {
          return $item['show_on_main_page'] === true;
        });
      }


      if ($filtered_array && !empty($filtered_array) && $show_guests):
        foreach ($filtered_array as $guest):
          if ($filter) {
            get_template_part('template-parts/guest-card-main', null, array('guest' => $guest));
          } else {
            get_template_part('template-parts/guest-card', null, array('guest' => $guest));
          }
        endforeach;
      else: ?>
        <p>Więcej szczegółów niebawem! Bądź na biężąco i zaobserwuj naszą stronę na Facebooku!</p>
      <?php endif; ?>
    </div>
  </div>
</section>