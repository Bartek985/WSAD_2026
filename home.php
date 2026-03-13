<?php get_header();








$show_date = carbon_get_theme_option('crb_show_date');

$start_date = carbon_get_theme_option('crb_event_start');
$end_date = carbon_get_theme_option('crb_event_end');
$month = plMonth(date('n', strtotime($start_date)));
$year = date('Y', strtotime($start_date));
$number_of_days = date_diff(date_create($start_date), date_create($end_date))->days + 1; // 



$date = [
  'start_date' => $start_date,
  'end_date' => $end_date,
  'month' => $month,
  'year' => $year,
  'number_of_days' => $number_of_days,
  'show_date' => $show_date
];



get_template_part('template-parts/hero', null, [
  'date' => $date,
  'button_text' => 'Dowiedz się więcej',
  'link' => '#about',
]);

?>





<main>
  <?php
  get_template_part('template-parts/about');
  get_template_part('template-parts/guests');
  get_template_part('template-parts/services', null, $date);
  get_template_part('template-parts/schedule', null, $date);
  get_template_part('template-parts/committee');
  ?>



</main>

<?php get_footer(); ?>