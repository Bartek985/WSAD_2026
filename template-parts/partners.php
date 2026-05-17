<?php



$show_partners = carbon_get_theme_option('crb_show_partners');
$partners = carbon_get_theme_option('crb_partners_list');


if ($show_partners && !empty($partners)):
  ?>

  <section id="partners" class="bg-light">
    <div class="container">
      <div class="content-section-heading text-center">
        <h2 class="mb-5">Partnerzy tegorocznych warsztatów</h2>

        <div class="container text-center p-4">
          <div class="row justify-content-center">

            <?php foreach ($partners as $partner): ?>
              <div class="text-center mb-4 mx-5">
                <?php
                $img = wp_get_attachment_image_url($partner['photo'], 'medium');
                $link = $partner['url'];
                $size = $partner['size'];
                if ($link): ?>
                  <a href="<?php echo $link; ?>" target="_blank">
                  <?php endif; ?>
                  <img src="<?php echo $img; ?>" class="img-fluid " alt="" style="height:<?php echo $size; ?>px">

                  <?php if ($link): ?>
                  </a>
                <?php endif; ?>
              </div>
            <?php endforeach; ?>


          </div>
        </div>
      </div>
    </div>
  </section>

  <?php
endif;
?>