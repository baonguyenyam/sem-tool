<?php 

// Our custom post type function
function create_posttype() {
	// https://developer.wordpress.org/resource/dashicons/#album
 
    register_post_type('blocks', 
	array(	
		'label' => 'Block',
		'description' => 'Create content blocks which can be used in posts, pages and widgets.',
		'public' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'capability_type' => 'page',
		'hierarchical' => true,
		'rewrite' => array('slug' => ''),
		'query_var' => true,
		'has_archive' => true,
		'exclude_from_search' => true,
		'supports' => array(
			'title',
			'editor',
			'custom-fields',
			'revisions',
			'author',
			'thumbnail',
			),
			'labels' => array (
				'name' => 'Blocks',
				'singular_name' => 'Block',
				'menu_name' => 'LIFT Blocks',
				'add_new' => 'Add block',
				'add_new_item' => 'Add New block',
				'new_item' => 'New block',
				'edit' => 'Edit',
				'edit_item' => 'Edit block',
				'view' => 'View block',
				'view_item' => 'View block',
				'search_items' => 'Search Blocks',
				'not_found' => 'No Blocks Found',
				'not_found_in_trash' => 'No Blocks Found in Trash',
				'parent' => 'Parent block',)
			,)
 	);
  
}
// Hooking up our function to theme setup
add_action( 'init', 'create_posttype' );

  
  add_action( 'manage_blocks_posts_custom_column', 'tre_manage_blocks_columns', 10, 2 );
  function tre_manage_blocks_columns( $column, $post_id ) {
	  global $post;
  
	   $post_data = get_post($post_id, ARRAY_A);
	   $slug = $post_data['post_name'];
  
	  switch( $column ) {
		  case 'shortcode' :
			  echo '<span style="background:#eee;font-weight:bold;"> [blocks id="'.$slug.'"] </span>';
		  break;
	  }
  }
  
  
  add_filter( 'manage_edit-blocks_columns', 'tre_edit_blocks_columns' ) ;
  
  function tre_edit_blocks_columns( $columns ) {
  
	  $columns = array(
		  'cb' => '<input type="checkbox" />',
		  'title' => __( 'Title' ),
		  'shortcode' => __( 'Shortcode' ),
		  'date' => __( 'Date' )
	  );
  
	  return $columns;
  }
  
  
  function lift_block_shortcode($atts, $content = null) {	
	   extract( shortcode_atts( array(
		  'id' => ''
		 ), $atts ) );
  
	  // get content by slug
	  global $wpdb;
	  $post_id = $wpdb->get_var("SELECT ID FROM $wpdb->posts WHERE post_name = '$id'");
  
	  if($post_id){
		  $html =	get_post_field('post_content', $post_id);
  
		  $html = "<div class='liftadv'>".do_shortcode( $html ) ."</div>";
  
	  } else{
		  
		  $html = '<p><mark>Block <b>"'.$id.'"</b> not found! Wrong ID?</mark></p>';	
	  
	  }
  
	  return $html;
  }
  add_shortcode('blocks', 'lift_block_shortcode');
