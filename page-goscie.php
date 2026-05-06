<?php get_header(); ?>
<?php get_template_part('template-parts/hero', null, array(
  'button_text' => 'Poznaj naszych gości',
  'link' => '#guests'
));


get_template_part('template-parts/guests', null, array(
  'color_scheme' => 'light',
  'filter' => false
));
get_template_part('template-parts/abstracts');

?>




<?php get_footer(); ?>