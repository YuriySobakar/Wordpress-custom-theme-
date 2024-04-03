<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php bloginfo('name'); ?></title>
  <?php wp_head(); ?>
</head>
<body>
  <header class="sticky-top shadow-lg border-bottom mb-3" >
    <nav class="navbar navbar-expand-lg bg-body-tertiary" data-bs-theme="dark">
      <div class="container-fluid ">
        <span class="d-flex mx-2">
          <a class="navbar-brand m-0 " href="<?php bloginfo('url') ?>">
            <?php 
            $custom_logo_id = get_theme_mod( 'custom_logo' );
            $custom_logo_url = wp_get_attachment_image_url( $custom_logo_id , 'full' );
            echo '<img src="' . esc_url( $custom_logo_url ) . '" alt="">';?>
          </a>
        </span>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">

            <?php 
            $locations = get_nav_menu_locations();
            $menu_location = 'nav_menu';

            if (isset($locations[$menu_location])) : 
              $nav_menu = wp_get_nav_menu_object($locations[$menu_location]);

              if ($nav_menu) :
                $nav_items = wp_get_nav_menu_items($nav_menu->term_id);

                  if ($nav_items && !is_wp_error($nav_items)) : ?>

                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                      <li class="nav-item ">
                        <a 
                          class="nav-link fs-5 fw-medium <?= is_home() ? 'active' : ''; ?>" 
                          aria-current="page" 
                          href="<?php bloginfo('url') ?>"
                        >
                          Home
                        </a>
                      </li>

                      <?php 
                        foreach ($nav_items as $item) :
                          $item_url = rtrim($item->url, '/');
                          $current_url = rtrim($_SERVER["REQUEST_URI"], '/');
                          $item_url_fragment = basename($item_url);
                          $current_url_fragment = basename($current_url);
                        ?>

                        <li class="nav-item">
                          <a
                            class="nav-link fs-5 fw-medium <?= $item_url_fragment === $current_url_fragment ? 'active' : ''; ?>"
                            href="<?= esc_url($item->url); ?>"
                          >
                            <?= esc_html($item->title); ?>
                          </a>
                        </li>
                      <?php 
                        endforeach;
                  endif;
              endif;
            endif;?>

            <li class="nav-item dropdown">
              <a 
                class="nav-link dropdown-toggle fs-5 fw-medium" 
                href="#" 
                role="button" 
                data-bs-toggle="dropdown"
                aria-expanded="false"
              >
                Post list
              </a>

              <?php
                $args = array(
                  'post_type' => 'main-block-post',
                  'posts_per_page' => -1
                );

                $main_posts = new WP_Query($args);
              ?>

              <ul class="dropdown-menu">
            <?php  
                  if ($main_posts->have_posts()) : 
                    while ($main_posts->have_posts()) : $main_posts->the_post(); ?>
                      <li>
                        <a 
                          class="dropdown-item" 
                          href="<?= get_permalink(get_the_ID()) ?>"
                        >
                        <?= get_the_title() ?>
                        </a>
                      </li>
            <?php   endwhile;
                  endif; 
                  wp_reset_postdata(); ?>
                <li>
                  <hr class="dropdown-divider">
                </li>
                <li>
                  <a 
                    class="dropdown-item" 
                    href="mailto:some@adress.com">Mail Us</a>
                </li>
              </ul>
            </li>
          </ul>
          <form 
            class="d-flex" 
            role="search" 
            method="get" 
            action="<?php echo home_url( '/' ); ?>"
          >
            <input 
              title="<?php echo esc_attr_x( 'Search for:', 'label' ) ?>" 
              class="form-control me-2 shadow" 
              type="search"
              placeholder="<?php echo esc_attr_x( 'Search …', 'placeholder' ) ?>"
              value="<?php echo get_search_query() ?>" 
              name="s" 
              aria-label="Search"
            >

            <button 
              class="btn btn-outline-success shadow me-1" 
              type="submit"
              value="<?php echo esc_attr_x( 'Search', 'submit button' ) ?>"
            >
              Search
            </button>
          </form>
        </div>
      </div>
    </nav>
  </header>