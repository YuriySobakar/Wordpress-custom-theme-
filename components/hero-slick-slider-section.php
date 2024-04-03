<section class="container">
  <div class="slick-slider-wrapper mb-3" >
    <?php
      $args = array(
          'post_type' => 'slick-slide',
          'posts_per_page' => -1
      );
  
      $main_slides = new WP_Query($args);
  
      if ($main_slides->have_posts()) :
          while ($main_slides->have_posts()) : $main_slides->the_post();
  
              if (has_post_thumbnail()) {
                the_post_thumbnail();
              }
  
          endwhile; else:
            _e('Please upload your slides');
      endif;
  
    wp_reset_postdata();
  ?>
  </div>

  <div class="slick-slider-navigation shadow">
    <?php
    $args = array(
        'post_type' => 'slick-slide',
        'posts_per_page' => -1
    );
  
    $main_slides = new WP_Query($args);
  
    if ($main_slides->have_posts()) :
        while ($main_slides->have_posts()) : $main_slides->the_post();
  
            if (has_post_thumbnail()) {
              the_post_thumbnail('large', [
                'style' => 'height: 100%; cursor: pointer;',
                'class' => 'mx-2 img-fluid rounded'
              ]);
            }
  
        endwhile; else:
          _e('Please upload your slides');
    endif;
  
    wp_reset_postdata();
  ?>
  </div>
</section>