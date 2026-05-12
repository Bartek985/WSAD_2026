<?php



$show_partners = carbon_get_theme_option('crb_show_partners');
$partners = carbon_get_theme_option('crb_partners_list');


if ($show_partners && !empty($partners)):
?>

<section id="partners" class="content-section bg-light mb-10">
  <div class="container">
    <div class="content-section-heading text-center">
      <h2 class="mb-5">Partnerzy tegorocznych warsztatów</h2>

      <div class="container text-center p-4">
        <div class="row justify-content-center">

<?php foreach ($partners as $partner): ?>
  <div class="text-center mb-4 mx-5" >
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
endif;
?>