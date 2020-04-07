<?php 

// Register Exhibitions CPT
function exhibitions_cpt() {

	$labels = array(
		'name'                  => _x( 'Exhibitions', 'Post Type General Name', 'varvara' ),
		'singular_name'         => _x( 'Exhibition', 'Post Type Singular Name', 'varvara' ),
		'menu_name'             => __( 'Exhibitions', 'varvara' ),
		'name_admin_bar'        => __( 'Exhibition', 'varvara' ),
		'archives'              => __( 'Item Archives', 'varvara' ),
		'attributes'            => __( 'Item Attributes', 'varvara' ),
		'parent_item_colon'     => __( 'Parent Item:', 'varvara' ),
		'all_items'             => __( 'All Items', 'varvara' ),
		'add_new_item'          => __( 'Add New Item', 'varvara' ),
		'add_new'               => __( 'Add New', 'varvara' ),
		'new_item'              => __( 'New Item', 'varvara' ),
		'edit_item'             => __( 'Edit Item', 'varvara' ),
		'update_item'           => __( 'Update Item', 'varvara' ),
		'view_item'             => __( 'View Item', 'varvara' ),
		'view_items'            => __( 'View Items', 'varvara' ),
		'search_items'          => __( 'Search Item', 'varvara' ),
		'not_found'             => __( 'Not found', 'varvara' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'varvara' ),
		'featured_image'        => __( 'Featured Image', 'varvara' ),
		'set_featured_image'    => __( 'Set featured image', 'varvara' ),
		'remove_featured_image' => __( 'Remove featured image', 'varvara' ),
		'use_featured_image'    => __( 'Use as featured image', 'varvara' ),
		'insert_into_item'      => __( 'Insert into item', 'varvara' ),
		'uploaded_to_this_item' => __( 'Uploaded to this item', 'varvara' ),
		'items_list'            => __( 'Items list', 'varvara' ),
		'items_list_navigation' => __( 'Items list navigation', 'varvara' ),
		'filter_items_list'     => __( 'Filter items list', 'varvara' ),
	);
	$args = array(
		'label'                 => __( 'Exhibition', 'varvara' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'thumbnail' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
	);
	register_post_type( 'exhibitions', $args );

}
add_action( 'init', 'exhibitions_cpt', 0 );