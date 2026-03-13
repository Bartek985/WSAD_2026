<div
  class="service-icon rounded-circle mb-3 mx-auto d-flex align-items-center justify-content-center overflow-hidden  bg-transparent">
  <?php if (!empty($args['photo'])): ?>
    <div class="w-100 h-100"
      style="background-image: url('<?php echo wp_get_attachment_image_url($args['photo'], 'full'); ?>'); background-size: cover; background-position: center; background-repeat: no-repeat;">
    </div>

  <?php else: ?>
    <span class="mx-auto service-icon rounded-circle mb-3"><i class="icon-user"></i></span>
  <?php endif; ?>
</div>