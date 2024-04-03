<?php

// add custom logo support
add_theme_support( 'custom-logo', array(
	'height'      => 100,
	'width'       => 400,
	'flex-height' => true,
	'flex-width'  => true,
	'header-text' => array( 'site-title', 'site-description' ),
));

// Register Custom Navigation Walker
// function register_navwalker(){
// 	require_once get_template_directory() . '/class-wp-bootstrap-navwalker.php';
// }

// add_action( 'after_setup_theme', 'register_navwalker' );


// add styles and scripts
function add_scripts_and_styles() {
    wp_enqueue_style('bootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css', array(), 'v5.3.3', 'all');
    wp_enqueue_style('slick-slider', '//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css', array(), '1.8.1', 'all');
    wp_enqueue_style('slick-slider-theme', '//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css', array(), '1.8.1', 'all');
    wp_enqueue_style('fancy-box', 'https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.css', array(), '5.0', 'all');
    wp_enqueue_style('styles', get_template_directory_uri() . '/assets/css/styles.css', array(), '1.0', 'all');
    wp_enqueue_style('styles-theme', get_template_directory_uri() . '/style.css', array(), '1.0', 'all');
    
    wp_enqueue_script('jquery', get_template_directory_uri() . 'assets/jQuery/jQuery-1-11.js', array('jquery'), 'v1.11.0', false);
    wp_enqueue_script( 'bootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js', array('jquery'), 'v5.3.3', true);
    
    wp_enqueue_script('jquery-migrate', '//code.jquery.com/jquery-migrate-1.2.1.min.js', array('jquery'), 'v1.2.1', false);
    wp_enqueue_script('slick-slider', get_template_directory_uri() . '/assets/slick/slick.min.js', array('jquery'), '1.8.1', true);
    wp_enqueue_script('slick-init', get_template_directory_uri() . '/assets/slick/slick-init.js', array('jquery'), '1.0', true);
    wp_enqueue_script('fancy-box', "https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.umd.js", array('jquery'), '5.0', true);
    wp_enqueue_script('fancy-box-snippet', get_template_directory_uri() . '/assets/fancy-box/fancy-box.js', array('jquery'), '1.0', true);    
    wp_enqueue_script('switch-theme-mode', get_template_directory_uri() . '/assets/js/main.js', array('jquery'), '1.0', true);
  }

add_action('wp_enqueue_scripts', 'add_scripts_and_styles'); 

// Add HTML5 theme support search-form.
function wpdocs_after_setup_theme() {
	add_theme_support('html5', array('search-form'));
}

add_action('after_setup_theme', 'wpdocs_after_setup_theme');

// Add Custom Post Type
function cptui_register_my_cpts_main_block_post() {

  // Post Type: main-block-posts.
	$labels = [
		"name" => esc_html__( "main-block-posts", "custom-post-type-ui" ),
		"singular_name" => esc_html__( "main-block-post", "custom-post-type-ui" ),
		"menu_name" => esc_html__( "Main block posts editor", "custom-post-type-ui" ),
		"all_items" => esc_html__( "Main posts list", "custom-post-type-ui" ),
		"add_new" => esc_html__( "Add new Main post", "custom-post-type-ui" ),
		"add_new_item" => esc_html__( "Main post", "custom-post-type-ui" ),
		"edit_item" => esc_html__( "Main post", "custom-post-type-ui" ),
		"new_item" => esc_html__( "Main post", "custom-post-type-ui" ),
		"view_item" => esc_html__( "Main post", "custom-post-type-ui" ),
		"view_items" => esc_html__( "Main posts", "custom-post-type-ui" ),
		"search_items" => esc_html__( "Find Main post", "custom-post-type-ui" ),
		"not_found" => esc_html__( "No Main posts found", "custom-post-type-ui" ),
		"not_found_in_trash" => esc_html__( "No Main posts found", "custom-post-type-ui" ),
		"featured_image" => esc_html__( "Main post head image", "custom-post-type-ui" ),
		"set_featured_image" => esc_html__( "Set Main post head image", "custom-post-type-ui" ),
		"remove_featured_image" => esc_html__( "Remove Main post head image", "custom-post-type-ui" ),
		"use_featured_image" => esc_html__( "Use as Main post head image", "custom-post-type-ui" ),
		"archives" => esc_html__( "Main post archives", "custom-post-type-ui" ),
		"insert_into_item" => esc_html__( "Insert into Main post", "custom-post-type-ui" ),
		"uploaded_to_this_item" => esc_html__( "Uploaded to this Main post", "custom-post-type-ui" ),
		"filter_items_list" => esc_html__( "Filter Main post", "custom-post-type-ui" ),
		"items_list_navigation" => esc_html__( "Main posts list navigation", "custom-post-type-ui" ),
		"items_list" => esc_html__( "Main posts list", "custom-post-type-ui" ),
		"attributes" => esc_html__( "Main post attributes", "custom-post-type-ui" ),
		"name_admin_bar" => esc_html__( "Main post", "custom-post-type-ui" ),
		"item_published" => esc_html__( "Main post published", "custom-post-type-ui" ),
		"item_published_privately" => esc_html__( "Main post published privately", "custom-post-type-ui" ),
		"item_reverted_to_draft" => esc_html__( "Main post reverted to draft", "custom-post-type-ui" ),
		"item_trashed" => esc_html__( "Main post trashed", "custom-post-type-ui" ),
		"item_scheduled" => esc_html__( "Main post scheduled", "custom-post-type-ui" ),
		"item_updated" => esc_html__( "Main post updated", "custom-post-type-ui" ),
	];

	$args = [
		"label" => esc_html__( "main-block-posts", "custom-post-type-ui" ),
		"labels" => $labels,
		"description" => "main block posts",
		"public" => true,
		"publicly_queryable" => true,
		"show_ui" => true,
		"show_in_rest" => true,
		"rest_base" => "",
		"rest_controller_class" => "WP_REST_Posts_Controller",
		"rest_namespace" => "wp/v2",
		"has_archive" => false,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"delete_with_user" => false,
		"exclude_from_search" => false,
		"capability_type" => "post",
		"map_meta_cap" => true,
		"hierarchical" => false,
		"can_export" => false,
		"rewrite" => [ "slug" => "main-block-post", "with_front" => true ],
		"query_var" => true,
		"menu_icon" => "dashicons-welcome-add-page",
		"supports" => [ "title", "editor", "thumbnail", "excerpt", "trackbacks", "custom-fields", "comments", "revisions", "author", "page-attributes", "post-formats" ],
		"taxonomies" => [ "category", "post_tag" ],
		"show_in_graphql" => false,
	];

	register_post_type( "main-block-post", $args );
}

add_action( 'init', 'cptui_register_my_cpts_main_block_post' );

// add theme support menus
add_theme_support('menus');

// register site menus and widgets
function register_site_menus_and_widgets() {
  register_nav_menus( array(
    'nav_menu' => __('Navigation menu'),
  ));

  register_sidebar( array(
    'name' => esc_html__( 'Right Sidebar', 'text-domain' ),
    'id' => 'right-sidebar-widget',
    'description' => esc_html__( 'Widgets in this area will be shown on the right side.', 'text-domain' ),
    'before_widget' => '<div class="container right-sidebar-widget">',
    'after_widget' => '</div>',
    'before_title' => '<h2 class="card-title mb-3 fs-3 right-sidebar-widget-title">',
    'after_title' => '</h2>',
  ));
};

add_action('init', 'register_site_menus_and_widgets');





