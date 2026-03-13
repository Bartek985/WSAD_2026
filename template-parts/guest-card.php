<?php
$guest = $args['guest'];
$photo_link = wp_get_attachment_image_url($guest['photo'], 'full');



?>

<div class="col-md-6  mb-5 m-auto pb-5">

    <?php get_template_part('template-parts/image-circle', null, array('photo' => $guest['photo'])); ?>


    <h4><strong><?php echo esc_html($guest['title']) . ' ' . esc_html($guest['name']); ?></strong></h4>
    <h6 class="mb-0" style="font-weight: normal;"><?php echo esc_html($guest['job']); ?></h6>

    <span class="pt-5 d-block" style="font-size: 0.9em;">
        <?php echo esc_html($guest['description']); ?>
    </span>
</div>