<?php
get_header();


get_template_part('template-parts/hero', null, [
  'button_text' => 'Zobacz poprzednie edycje',
  'link' => '#gallery',

]);
get_template_part('template-parts/last-edition');
get_footer();
?>