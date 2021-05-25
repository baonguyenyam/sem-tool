<?php 
// Admin MENU
function admin_lift_menu($meta = TRUE){
    global $wp_admin_bar;
        if ( !is_user_logged_in() ) { return; }
        if ( !is_admin_bar_showing() ) { return; }

    $wp_admin_bar->add_menu( array(
        'id' => 'lift_admin_bar_menu',
        'title' => __( '<span class="lifemx ab-icon ab-item"></span>LIFT Creations' ) ,
        'href'      => 'https://liftcreations.com/',
        'meta'   => array(
            'target'   => '_blank',
            'class'    => 'wpse--item',
            'tabindex' => PHP_INT_MAX,
        )
    ));

  $wp_admin_bar->add_menu( array(
    'parent'    => 'lift_admin_bar_menu',
    'title'     => '<span class="dashicons-before dashicons dashicons-groups"></span>About Us',
    'href'  => 'https://liftcreations.com/about/',
    'meta'  => array( 'target' => '_blank' )
   ));

    $wp_admin_bar->add_menu( array(
        'parent'    => 'lift_admin_bar_menu',
        'title'     => '<span class="dashicons-before dashicons dashicons-location"></span>Contact Us',
        'href'  => 'https://liftcreations.com/contact-us/',
        'meta'  => array( 'target' => '_blank' )
    ));
}
add_action( 'admin_bar_menu', 'admin_lift_menu' , 100);


add_filter( 'wp_handle_upload_prefilter', 'lift_custom_upload_filter' );
function lift_custom_upload_filter( $file ) {
    if ( ! isset( $_REQUEST['post_id'] ) ) {
        return $file;
    }
    $id           = intval( $_REQUEST['post_id'] );
    $parent_post  = get_post( $id );
    $post_name    = sanitize_title( $parent_post->post_title );
    $file['name'] = $post_name . '-' . $file['name'];
    return $file;
}
