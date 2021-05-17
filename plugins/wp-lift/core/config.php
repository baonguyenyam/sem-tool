<?php 
// add_action( 'wp_footer', 'my_deregister_scripts' );

// Remove Version Wordpress 
remove_action('wp_head', 'wp_generator');

function custom_admin_title( $admin_title ) {
    return str_replace( ' &#8212; WordPress', ' - by LIFT Creations', $admin_title );
}
add_filter( 'admin_title', 'custom_admin_title' );

// Disable Admin bar 
add_action('after_setup_theme', 'remove_admin_bar');
function remove_admin_bar() {
    show_admin_bar(false);
    // if (!current_user_can('administrator') && !is_admin()) {
    // }
}

