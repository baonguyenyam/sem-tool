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
    $wp_admin_bar->remove_menu( 'comments' );
    $wp_admin_bar->remove_menu( 'view' );
    $wp_admin_bar->remove_menu( 'archive' );
    $wp_admin_bar->remove_menu( 'wp-admin-bar-site-name' );
    $wp_admin_bar->remove_menu( 'tribe-events' );
    $wp_admin_bar->remove_menu( 'updates' );
    $wp_admin_bar->remove_menu( 'easy-updates-manager-admin-bar' );
}
add_action( 'wp_before_admin_bar_render', 'gcms_admin_bar_remove_logo', 0 );

// Remove Admin Help Menu
function gcms_remove_help($old_help, $screen_id, $screen){
    $screen->remove_help_tabs();
    return $old_help;
}
add_filter( 'contextual_help', 'gcms_remove_help', 999, 3 );
