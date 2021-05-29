<?php 
// https://developer.wordpress.org/resource/dashicons/#album

function lift_create_posttype_cp() {

	$name = 'Locations';
	$shortname = 'Locations';
	$slug = 'location';
 
    register_post_type($slug.'s', 
	array(	
		'label' => $shortname,
		'description' => 'Create content '.$slug.'s which can be used in posts, pages and widgets.',
		'public' => true,
		'show_ui' => true,
		'capability_type' => 'post',
		'hierarchical' => true,
		'rewrite' => array('slug' => 'view-'.$slug),
		'query_var' => true,
		'has_archive' => true,
		'show_in_admin_bar' => true,
		'show_in_menu' => true,
		'show_in_nav_menus' => true,
		'exclude_from_search' => false,
		'can_export' => true,
		'delete_with_user' => true,
		'supports' => array(
			'title',
			'editor',
			'custom-fields',
			'revisions',
			'author',
			'post-formats',
			'thumbnail',
			'comments',
			),
			'labels' => array (
				'name' => $shortname,
				'singular_name' => $shortname,
				'menu_name' => $name,
				'add_new' => 'Add '.$slug.'',
				'add_new_item' => 'Add New '.$slug.'',
				'new_item' => 'New '.$slug.'',
				'edit' => 'Edit',
				'edit_item' => 'Edit '.$slug.'',
				'view' => 'View '.$slug.'',
				'view_item' => 'View '.$slug.'',
				'search_items' => 'Search '.$slug.'',
				'not_found' => 'No '.$slug.'s Found',
				'not_found_in_trash' => 'No '.$slug.'s Found in Trash',
				'parent' => 'Parent customer',),
				'menu_position'       => 6,
        		'menu_icon'           => 'dashicons-edit-page'
			,)
 	);

	register_taxonomy($slug.'_categories',$slug.'s',array(
	'hierarchical' => true,
	'labels' => array(
		'name'              => _x( 'Categories', 'taxonomy general name' ),
		'singular_name'     => _x( 'Category', 'taxonomy singular name' ),
		'search_items'      => __( 'Search Categories' ),
		'all_items'         => __( 'All Categories' ),
		'parent_item'       => __( 'Parent Category' ),
		'parent_item_colon' => __( 'Parent Category:' ),
		'edit_item'         => __( 'Edit Category' ),
		'update_item'       => __( 'Update Category' ),
		'add_new_item'      => __( 'Add New Category' ),
		'new_item_name'     => __( 'New Category Name' ),
		'menu_name'         => __( 'Categories' ),
	),
	'show_ui'           => true,
	'show_admin_column' => true,
	'query_var'         => true,
	'rewrite' => array( 'slug' => $slug.'-categories' ),
	));
	  
  register_taxonomy($slug.'_tag',$slug.'s',array(
    'hierarchical' => false,
    'labels' => array(
		'name' => _x( 'Tags', 'taxonomy general name' ),
		'singular_name' => _x( 'Tag', 'taxonomy singular name' ),
		'search_items' =>  __( 'Search Tags' ),
		'popular_items' => __( 'Popular Tags' ),
		'all_items' => __( 'All Tags' ),
		'parent_item' => null,
		'parent_item_colon' => null,
		'edit_item' => __( 'Edit Tag' ), 
		'update_item' => __( 'Update Tag' ),
		'add_new_item' => __( 'Add New Tag' ),
		'new_item_name' => __( 'New Tag Name' ),
		'separate_items_with_commas' => __( 'Separate tags with commas' ),
		'add_or_remove_items' => __( 'Add or remove tags' ),
		'choose_from_most_used' => __( 'Choose from the most used tags' ),
		'menu_name' => __( 'Tags' ),
	),
    'show_ui' => true,
	'show_admin_column' => true,
    'query_var' => true,
    'update_count_callback' => '_update_post_term_count',
    'rewrite' => array( 'slug' => $slug.'-tag' ),
  ));

}
// Hooking up our function to theme setup
add_action( 'init', 'lift_create_posttype_cp' );

