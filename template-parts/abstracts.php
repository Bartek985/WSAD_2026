<?php
$presentations = carbon_get_theme_option('crb_schedule_list');
$show_schedule = carbon_get_theme_option('crb_show_schedule');
?>

<section id="abstracts"
  class="content-section text-center <?php echo $color_scheme === 'blue' ? 'bg-primary text-white' : 'bg-light'; ?>">
  <div class="container">
    <div class="content-section-heading">
      <h2 class="mb-5">Przyjęte abstrakty</h2>
      <div class="mb-5"></div>
    </div>
    <div class="h4 m-auto flex-wrap mb-5 ">
      <?php
      if (!$show_schedule):
        foreach ($presentations as $presentation): ?>

          <div class="col-md-6 mb-5 m-auto pb-5">
            <h4><strong>
                <?php echo esc_html($presentation['title']); ?>
              </strong></h4>
            <h6 class="mb-0" style="font-weight: normal;">
              <?php echo esc_html($presentation['presenter']); ?>
            </h6>
            <span class="pt-5 d-block" style="font-size: 0.9em;">
              <?php echo esc_html($presentation['abstract']); ?>
            </span>
          </div>

        <?php endforeach;
      else: ?>
        <div>
          <p class="text-muted">Abstrakty zostaną opublikowane wkrótce. Bądź na biężąco i zaobserwuj naszą stronę na Facebooku!</p>
        </div>
      <?php endif; ?>
    </div>
  </div>
</section>