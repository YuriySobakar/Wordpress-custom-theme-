<?php get_header(); ?>

  <?php
    $post_type = get_post_type();
    $thumbnail_image_URL = get_the_post_thumbnail_url(get_the_ID());
    $custom_field_image_object = get_field($post_type);
    $has_image_URL = !empty($custom_field_image_object['url']);
    $has_thumbnail_URL = !empty($thumbnail_image_URL);
  ?>

  <div class="container vh-100 single-post-main-container">
    <div class="single-post-image-container" >
      <?php 
            if ($has_image_URL || $has_thumbnail_URL) :
              $image_URL = isset($custom_field_image_object['url']) 
                ? esc_url($custom_field_image_object['url']) 
                : $thumbnail_image_URL; ?>

              <img
                class="single-post-image shadow"
                alt="<?= the_title(); ?> image"
                src="<?= $image_URL ?>"
              >
              <?php else: _e('');
            endif;?>
    </div>

    <div class="container single-post-content-container">
      <article>
        <h1 class="single-post-title">
          <?= get_the_title(); ?>
        </h1>
      
        <p class="text fs-5">
          <?php echo wp_strip_all_tags(get_the_content()); ?>
        </p>
      </article>
    </div>
  </div>

<?php get_footer(); ?>

