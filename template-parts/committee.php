<?php

$committee_list = carbon_get_theme_option('crb_committee_list');


?>


<section id="committee" class="content-section bg-primary text-white text-center">
  <div class="container">
    <div class="content-section-heading">
      <h2 class="mb-5">Komitet organizacyjny</h2>
    </div>
    <div class="row d-flex justify-content-center">
      <?php foreach ($committee_list as $member): ?>
        <div class="col-md-6 col-lg-3 mb-5 mb-lg-0 text-center">
          <?php get_template_part('template-parts/image-circle', null, array('photo' => $member['photo'])); ?>

          <h4><strong><?php echo $member['name']; ?></strong></h4>
          <p class="mb-0 text-faded"><?php echo $member['role']; ?></p>
        </div>
      <?php endforeach; ?>

    </div>
  </div>
</section>