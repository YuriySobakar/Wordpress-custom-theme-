<section class="container">
  <div class="row d-flex justify-content-around">
    <div class="col-12 col-md-4 d-flex flex-column align-items-center">
      <div class="container p-0 mt-3">
        <h5 class="card-title mb-2 fs-4">
          Stay In The Know
        </h5>
        <div class="border-bottom border-dark-subtle mb-1 mt-2"></div>
        <p class="text-start mb-2 fs-5">
          Enter your email to join our mailing list.
        </p>
      </div>

      <div class="align-self-start p-0 ">
        <?= do_shortcode('[contact-form-7 id="00d6743" title="Stay In The Know"]'); ?>
      </div>

      <p class="align-self-start">
        <a href="#"
          class="link-secondary link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover fs-5"
        >
          To unsubscribe click here >
        </a>
      </p>
    </div>
      <?php
        $args = array(
            'post_type' => 'info-post',
            'posts_per_page' => -1
        );
  
        $info_posts = new WP_Query($args);
        $caption_count = 1;
        $max_caption_count = 3;

      if ($info_posts->have_posts()) :
        while ($info_posts->have_posts() && $caption_count <= $max_caption_count) : $info_posts->the_post(); ?>

          <div class="col-12 col-md-2 d-flex flex-column align-items-center">
            <div class="container p-0 mt-3">
              <h5 class="card-title mb-2 fs-4">
                <a 
                  href="<?= get_permalink(); ?>"
                  data-id="<?= get_the_ID(); ?>"
                >
                  <?= get_the_title(); ?>
                </a>
              </h5>
              <div class="border-bottom border-dark-subtle mb-1 mt-2"></div>
                <p class="text-start mb-1 fs-5">
                  <?= get_the_excerpt(); ?>
                </p>
              </div>
          </div>

          <?php
        endwhile; else : _e('<p class="text-start mb-1 fs-5">Please upload your slides</p>');
      endif;  
    wp_reset_postdata();?>
  </div>
</section>