<?php
$guest = $args['guest'];
$photo_link = wp_get_attachment_image_url($guest['photo'], 'full');



?>

<div class="col-md-6 col-lg-3 m-3 mb-5">

  <?php get_template_part('template-parts/image-circle', null, array('photo' => $guest['photo'])); ?>


  <h4 class="text-nowrap">
      <strong>
      <?php echo esc_html($guest['title']) . ' ' . esc_html($guest['name']); ?>
    </strong>
  </h4>
  <h6 class="mb-0 text-faded" style="font-weight: normal; ">
    <?php echo esc_html($guest['job']); ?>
  </h6>


</div>