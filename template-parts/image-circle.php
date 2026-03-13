<style>
  .service-icon {
    width: 100px;
    height: 100px;
  }
</style>

<div
  class="service-icon rounded-circle mb-3 mx-auto d-flex align-items-center justify-content-center overflow-hidden  bg-transparent">
  <?php if (!empty($args['photo'])): ?>
    <img src="<?php echo wp_get_attachment_image_url($args['photo'], 'full'); ?>"
      class="w-100 h-100 object-fit-cover d-block" />

  <?php else: ?>

    <span class="mx-auto service-icon rounded-circle mb-3"><i class="icon-user"></i></span>
  <?php endif; ?>
</div>