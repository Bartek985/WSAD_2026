<?php
$edycje = carbon_get_theme_option('crb_previous_editions');
$year = isset($_GET['q']) && !empty($_GET['q']) ? $_GET['q'] : null;

if ($year && !in_array($year, array_column($edycje, 'year-archive'))) {
  // Jeśli rok z parametru q nie istnieje w danych, ustawiamy $year na null, aby pokazać pierwszą edycję
  $year = null;
}

if (!empty($edycje)): ?>

  <style>
    /* Stabilizacja layoutu */
    .custom-tabs-container {
      margin-bottom: 50px;
    }

    .tab-content {
      min-height: 300px;
      border: 1px solid #dee2e6;
      border-top: none;
      background: #fff;
      padding: 30px;
    }

    .gallery-link img {
      height: 200px;
      width: 100%;
      object-fit: cover;
      transition: 0.3s;
      border-radius: 8px;
    }

    .gallery-link:hover img {
      transform: translateY(-5px);
      box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
    }

    body.is-open {
      overflow: hidden !important;
      height: 100vh !important;
    }
  </style>

  <div id="gallery" class="container custom-tabs-container mt-5 g-4">
    <h2 class="text-center m-5">Poprzednie edycje</h2>
    <ul class="nav nav-tabs justify-content-center" id="manualEditionsTab" role="tablist">
      <?php foreach ($edycje as $index => $edycja):

        if ($year) {
          $active_class = ($edycja['year-archive'] == $year) ? 'active' : '';
        } else {
          $active_class = ($index === 0) ? 'active' : '';
        }
        ?>
        <li class="nav-item">
          <a class="nav-link <?php echo $active_class; ?>" data-toggle="tab" href="#edition-content-<?php echo $index; ?>"
            role="tab">
            <?php echo esc_html($edycja['title']); ?>
            (<?php echo esc_html($edycja['year-archive']); ?>)
          </a>
        </li>
      <?php endforeach; ?>
    </ul>

    <div class="tab-content" id="manualEditionsContent">
      <?php foreach ($edycje as $index => $edycja):
        if ($year) {
          $active_class = ($edycja['year-archive'] == $year) ? 'active' : '';
        } else {
          $active_class = ($index === 0) ? 'active' : '';
        }
        $zdjecia = $edycja['photos'];
        ?>
        <div class="tab-pane fade <?php echo $active_class ? 'show active' : ''; ?>"
          id="edition-content-<?php echo $index; ?>" role="tabpanel">
          <h3 class="text-center mb-4">Edycja <?php echo esc_html($edycja['title']); ?>
            (<?php echo esc_html($edycja['year-archive']); ?>)</h3>

          <div class="row g-4 gallery-container">
            <?php if (!empty($zdjecia)):
              foreach ($zdjecia as $img_id):
                $img_thumb = wp_get_attachment_image_url($img_id, 'medium');
                $img_full = wp_get_attachment_image_url($img_id, 'full');
                // Pobieramy alt dla lepszego SEO i dostępności
                $alt = get_post_meta($img_id, '_wp_attachment_image_alt', true);
                ?>
                <div class="col-6 col-md-4 col-lg-3 mb-4">
                  <a href="<?php echo esc_url($img_full); ?>" class="gallery-link d-block">
                    <img src="<?php echo esc_url($img_thumb); ?>" class="img-fluid rounded shadow-sm"
                      alt="<?php echo esc_attr($alt); ?>"
                      style="height: 250px; width: 100%; object-fit: cover; transition: transform 0.3s ease;">
                  </a>
                </div>
              <?php endforeach;
            else: ?>
              <div class="col-12 py-5 text-center">
                <p class="text-muted fst-italic">Brak zdjęć w tej edycji.</p>
              </div>
            <?php endif; ?>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  </div>


  <script>
    // Używamy czystego JavaScriptu, aby poczekać na załadowanie wszystkich zasobów
    window.addEventListener('load', function () {
      // Sprawdzamy, czy jQuery jest już dostępne
      if (typeof jQuery !== 'undefined') {
        (function ($) {
          console.log("jQuery załadowane, uruchamiam galerię...");

          function setupGallery() {
            if (typeof baguetteBox !== 'undefined') {
              baguetteBox.run('.gallery-container', {
                animation: 'slideIn',
                noScrollbars: true,
                afterShow: function () { $('body').addClass('is-open'); },
                afterHide: function () { $('body').removeClass('is-open'); }
              });
            }
          }

          setupGallery();

          // Obsługa Bootstrap 4 Tabs
          $('a[data-toggle="tab"]').on('shown.bs.tab', function () {
            setupGallery();
          });

        })(jQuery);
      } else {
        console.error("Błąd: jQuery nie zostało załadowane przez motyw!");
      }
    });
  </script>

<?php endif; ?>