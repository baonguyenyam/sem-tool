<?php 

function gcms_admin_footer_credits( $text ) {
    $text = 'LIFT Creations';
    return $text;
}
add_filter( 'admin_footer_text', 'gcms_admin_footer_credits' );

// Remove Admin Logo 
function gcms_admin_bar_remove_logo() {
    global $wp_admin_bar;
    $wp_admin_bar->remove_menu( 'wp-logo' );
    // $wp_admin_bar->remove_menu( 'comments' );
    // $wp_admin_bar->remove_menu( 'view' );
    // $wp_admin_bar->remove_menu( 'archive' );
    // $wp_admin_bar->remove_menu( 'wp-admin-bar-site-name' );
    // $wp_admin_bar->remove_menu( 'tribe-events' );
    // $wp_admin_bar->remove_menu( 'updates' );
    // $wp_admin_bar->remove_menu( 'easy-updates-manager-admin-bar' );
}
add_action( 'wp_before_admin_bar_render', 'gcms_admin_bar_remove_logo', 0 );

// Admin MENU
function admin_lift_menu($meta = TRUE){
    global $wp_admin_bar;
        if ( !is_user_logged_in() ) { return; }
        if ( !is_admin_bar_showing() ) { return; }

    $wp_admin_bar->add_menu( array(
        'id' => 'custom_menu',
        'title' => __( '<span class="lifemx ab-icon ab-item"></span>LIFT Creations' ) ,
        'href'      => 'https://liftcreations.com/',
        'meta'   => array(
            'target'   => '_blank',
            'class'    => 'wpse--item',
            'tabindex' => PHP_INT_MAX,
        )
    ));

  $wp_admin_bar->add_menu( array(
    'parent'    => 'custom_menu',
    'title'     => '<span class="lifemm ab-icon"></span>About Us',
    'href'  => 'https://liftcreations.com/about/',
    'meta'  => array( target => '_blank' )
   ));

    $wp_admin_bar->add_menu( array(
        'parent'    => 'custom_menu',
        'title'     => '<span class="lifemm ab-icon"></span>Contact Us',
        'href'  => 'https://liftcreations.com/contact-us/',
        'meta'  => array( target => '_blank' )
    ));
}
add_action( 'admin_bar_menu', 'admin_lift_menu' , 100);

// Remove Admin Help Menu
function gcms_remove_help($old_help, $screen_id, $screen){
    $screen->remove_help_tabs();
    return $old_help;
}
// add_filter( 'contextual_help', 'gcms_remove_help', 999, 3 );
