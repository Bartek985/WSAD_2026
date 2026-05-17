<?php



$show_partners = carbon_get_theme_option('crb_show_partners');
$partners = carbon_get_theme_option('crb_orginiser_list');
?>

<section id="partners" class="bg-light">
  <div class="container">
    <div class="content-section-heading text-center">
      <h2 class="mb-5">Organizatorzy</h2>

      <div class="container text-center">
        <div class="row justify-content-center">

          <?php foreach ($partners as $partner): ?>
            <div class="text-center mb-4 mx-4 d-flex align-items-center justify-content-center">
              <?php
              $img = wp_get_attachment_image_url($partner['photo'], 'medium');
              ?>
              <img src="<?php echo $img; ?>" class="img-fluid " alt="" style="height:64px">
            </div>

          <?php endforeach; ?>
        </div>
      </div>
    </div>
  </div>
</section>

<?php
?>