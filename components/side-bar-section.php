<aside id="right-sidebar" class="container d-flex flex-column align-items-center">

      <?php dynamic_sidebar( 'right-sidebar-widget' ); ?>

      <div class="right-sidebar-gallery">
        <div class="card-title-wrapper mt-3">
          <h2 class="card-title mb-2 fs-3">Fancy box image gallery</h2>
          <div class="border-bottom border-dark-subtle mb-3"></div>
        </div>

        <div class="d-flex flex-row flex-wrap justify-content-center fancy-box-container">
        <?php 
            $args = array(
              'post_type' => 'fancy-gallery-image',
              'posts_per_page' => -1
             );
            
            $fancy_gallery_images = new WP_Query($args);

            if ($fancy_gallery_images->have_posts()) :
              $caption_count = 1;
              $max_caption_count = 6;

                while ($fancy_gallery_images->have_posts() && $caption_count <= $max_caption_count) : $fancy_gallery_images->the_post();
                    $image_URL = get_field('fancy_gallery_image');
                        if ($image_URL) : ?>
                          <a 
                            class="fancy-gallery-image-link"
                            data-fancybox="gallery"
                            data-caption="<?php the_title(); ?>"
                            data-src="<?= esc_url($image_URL['url']); ?>"
                          >
                            <img 
                              class="fancy-gallery-image"
                              src="<?= esc_url($image_URL['url']); ?>" 
                              alt="<?php the_title(); ?>"
                            >
                         </a>
                  <?php    $caption_count++;
                        endif;
                endwhile;
              wp_reset_postdata();
            endif; ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</aside>