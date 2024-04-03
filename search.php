<?php get_header(); ?>

<section class="container">
  <div class="row ">
    <div class="col-12 col-md-8">
      <h1>
        Search results for: <q><?= get_search_query(); ?></q>
      </h1>

      <div 
        id="main-posts-container" class="container w-100 d-flex flex-row flex-wrap">
        <?php 
              if (have_posts()) : while (have_posts()) : the_post();
            ?>

        <div class="card  border-0 main-post-container ">
          <div class="card-body ">
            <div class="card-title-wrapper">
              <h5 class="card-title mb-2 fs-3">
                <a 
                  class="card-title mb-3 fs-3 main-post-title" 
                  href="<?php echo get_permalink(get_the_ID()) ?>"
                  data-id="<?php echo get_the_ID(); ?>"
                >
                  <?php echo get_the_title() ?>
                </a>
              </h5>

              <div class="border-bottom border-dark-subtle mb-3"></div>
            </div>

            <div class="d-flex justify-content-center">
              <?php
                if (has_post_thumbnail()) {
                  the_post_thumbnail('large', [
                    'class' => 'card-img-top large-post-image',
                    'alt' => 'main post image',
                    'style' => 'width: 100%; height: 100%;',
                  ]);
                }
              ?>
            </div>

            <?php
              $content = apply_filters('the_content', get_the_content());
              $excerpt = get_the_excerpt();
              echo '<p class="card-text fs-5">' . $excerpt . '</p>';
            ?>
            <a href="<?php the_permalink(); ?>" class="btn btn-dark w-50">OPEN</a>
          </div>
        </div>
        <?php endwhile; else: 
          _e('<p class="fs-4 text text-center">
                Sorry, no posts matches with your search criteria
              </p>'); 
          endif; 
          wp_reset_postdata();
        ?>
      </div>
    </div>

    <div class="col-12 col-lg-4">
      <?php get_template_part('components/side-bar-section'); ?>
    </div>
  </div>
</section>

<?php get_footer(); ?>