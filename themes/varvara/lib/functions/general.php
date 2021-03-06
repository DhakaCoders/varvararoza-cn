<?php
/**
 * Functions
 *
 * This file contains general functions
 *
 * @author    Varvara Roza Galleries
 * @copyright 2019 The PHA Group
 * @version   1.0
 */

define( 'THEME_DIRECTORY', get_template_directory() );

/*
Body classes
- add more classes to the body to enable more specific targeting if needed
*/
function ambrosite_body_class($classes) {$post_name_prefix = 'postname-';$page_name_prefix = 'pagename-';$single_term_prefix = 'single-';$single_parent_prefix = 'parent-';$category_parent_prefix = 'parent-category-';$term_parent_prefix = 'parent-term-';$site_prefix = 'site-';global $wp_query;if ( is_single() ) {$wp_query->post = $wp_query->posts[0];setup_postdata($wp_query->post);$classes[] = $post_name_prefix . $wp_query->post->post_name;$taxonomies = array_filter( get_post_taxonomies($wp_query->post->ID), "is_taxonomy_hierarchical" );foreach ( $taxonomies as $taxonomy ) {$tax_name = ( $taxonomy != 'category') ? $taxonomy . '-' : '';$terms = get_the_terms($wp_query->post->ID, $taxonomy);if ( $terms ) {foreach( $terms as $term ) {if ( !empty($term->slug ) )$classes[] = $single_term_prefix . $tax_name . sanitize_html_class($term->slug, $term->term_id);while ( $term->parent ) {$term = &get_term( (int) $term->parent, $taxonomy );if ( !empty( $term->slug ) )$classes[] = $single_parent_prefix . $tax_name . sanitize_html_class($term->slug, $term->term_id);}}}}} elseif ( is_archive() ) {if ( is_category() ) {$cat = $wp_query->get_queried_object();while ( $cat->parent ) {$cat = &get_category( (int) $cat->parent);if ( !empty( $cat->slug ) )$classes[] = $category_parent_prefix . sanitize_html_class($cat->slug, $cat->cat_ID);}} elseif ( is_tax() ) {$term = $wp_query->get_queried_object();while ( $term->parent ) {$term = &get_term( (int) $term->parent, $term->taxonomy );if ( !empty( $term->slug ) )$classes[] = $term_parent_prefix . sanitize_html_class($term->slug, $term->term_id);}}} elseif ( is_page() ) {$wp_query->post = $wp_query->posts[0];setup_postdata($wp_query->post);$classes[] = $page_name_prefix . $wp_query->post->post_name;}if ( is_multisite() ) {global $blog_id;$classes[] = $site_prefix . $blog_id;}return $classes;} add_filter('body_class', 'ambrosite_body_class');

/*
Disable the theme editor
- stop clients from breaking their website
*/
define('DISALLOW_FILE_EDIT', true);

/*
Remove version info
- makes it that little bit harder for hackers
*/
function complete_version_removal() {
    return '';
}
add_filter('the_generator', 'complete_version_removal');

/*
Remove info from headers
- remove the stuff we don't need
*/
remove_action('wp_head', 'rsd_link');
remove_action('wp_head', 'wp_generator');
remove_action('wp_head', 'feed_links', 2);
remove_action('wp_head', 'index_rel_link');
remove_action('wp_head', 'wlwmanifest_link');
remove_action('wp_head', 'feed_links_extra', 3);
remove_action('wp_head', 'start_post_rel_link', 10, 0);
remove_action('wp_head', 'parent_post_rel_link', 10, 0);
remove_action('wp_head', 'adjacent_posts_rel_link', 10, 0);
remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
remove_action( 'wp_print_styles', 'print_emoji_styles' );

/*
Excerpt
- this theme supports excerpts
*/
add_post_type_support( 'page', 'excerpt' );

function new_excerpt_more($more) {
     global $post;
	 return '...';
}

function excerpt($limit) {
  $excerpt = explode(' ', get_the_excerpt(), $limit);
  if (count($excerpt)>=$limit) {
	array_pop($excerpt);
	$excerpt = implode(" ",$excerpt).'...';
  } else {
	$excerpt = implode(" ",$excerpt);
  } 
  $excerpt = preg_replace('`\[[^\]]*\]`','',$excerpt);
  return $excerpt;
}

/*
Thumbnails
- this theme supports thumbnails
*/
add_theme_support( 'post-thumbnails' );
add_image_size ( 'full', 3000, 3000, true );
add_image_size ( 'slider', 1920, 1307, true );
add_image_size ( 'nextexhibition', 751, 764, true );
add_image_size ( 'upcomingexhibition', 529, 557, true );
add_image_size ( 'prevexhibition', 256, 269, true );
add_image_size ( 'gallery1', 331, 331, true );
add_image_size ( 'gallery2', 332, 417, true );
add_image_size ( 'gallerymob', 767, 767, true );
add_image_size ( 'about', 357, 536, true );
add_image_size ( 'aboutbg', 1500, 559, true );
add_image_size ( 'aboutgallery', 384, 360, true );
add_image_size ( 'news', 319, 319, true );
add_image_size ( 'galleryp1', 414, 253, true );
add_image_size ( 'galleryp2', 414, 338, true );


/*
Scripts & Styles
- include the scripts and stylesheets
*/
add_action( 'wp_enqueue_scripts', 'script_enqueues' );

add_filter('gform_init_scripts_footer', function() {
	return true;
});

function script_enqueues() {
	if ( wp_script_is( 'jquery', 'registered' ) ) {
		
		wp_deregister_script( 'jquery' );
		
	}

	wp_enqueue_script( 'jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js', array(), '2.2.1', false );
	
	wp_enqueue_script( 'vendor', get_template_directory_uri() . '/js/vendor.js', array(), '1.0.0', false );
	wp_enqueue_script( 'matchHeight', get_template_directory_uri() . '/js/jquery.matchHeight-min.js', array(), '1.0.0', false );
	wp_enqueue_script( 'custom', get_template_directory_uri() . '/js/main.js', array(), '1.0.0', false );

	wp_enqueue_style( 'style', get_template_directory_uri() . '/style.min.css', false, '1.0.0', 'all' );
	wp_enqueue_style('cbv-main-style', get_template_directory_uri() . '/css/main.css', array(), array(0, 99));
	wp_enqueue_script('cbv-custom', get_template_directory_uri() . '/js/cbv-main.js', array('jquery'), '1.0.0', true);
	
}

/*
Admin Bar
- hide the admin bar
*/
add_filter('show_admin_bar', '__return_false');

/*
Menus
- enable WordPress Menus
*/
if (function_exists('register_nav_menus')){register_nav_menus(array('header' => __( 'Main Nav' )));}

/*
Menu Classes
- add first and last to menu items
*/
function wpdev_first_and_last_menu_class($items) {
	$items[1]->classes[] = 'first';
	$items[count($items)]->classes[] = 'last';
	return $items;
}
add_filter('wp_nav_menu_objects', 'wpdev_first_and_last_menu_class');

/*
Admin Menus
- hide unused menu items
*/
function remove_menus(){
  
  remove_menu_page( 'edit-comments.php' );
  
}
add_action( 'admin_menu', 'remove_menus' );


/* ACF Options Page */

if( function_exists('acf_add_options_page') ) {
	
	acf_add_options_page();
	
}



