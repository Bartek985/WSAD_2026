<?php
get_header();


get_template_part('template-parts/hero', null, [
  'button_text' => 'Strona główna',
  'link' => home_url(), // Przykładowy link z parametrem q ustawionym na 2024

]);
?>

<div class="containter text-center my-5 h-25">
  <div class="my-5 d-block"></div>
  <h2 class="mt-5">Bład 404. Strona nie została znaleziona</h2>
  <p class="mb-5">Przepraszamy, ale strona, której szukasz, nie istnieje. Możesz wrócić na <a
      href="<?php echo home_url(); ?>">stronę
      główną</a> lub skorzystać z menu, aby znaleźć interesujące Cię treści.</p>


  <a class="btn btn-primary btn-xl js-scroll-trigger d-none d-lg-inline-block" role="button"
    href="<?php echo home_url(); ?>">
    Strona głowna
  </a>
  <a class="btn btn-primary btn-lg js-scroll-trigger d-lg-none fs-4 pe-auto" role="button"
    href="<?php echo home_url(); ?>">
    Strona głowna
  </a>
</div>

<?php

get_footer();


?>