<?php 

function gcms_remove_default_admin_widget() {
    // Quick Draft 
    // remove_meta_box( 'dashboard_quick_press', 'dashboard', 'side' );
    // Wordpress Events and News 
    // remove_meta_box( 'dashboard_primary', 'dashboard', 'side' );
    // Yaot SEO
    // remove_meta_box( 'yoast_db_widget', 'dashboard', 'normal' );
    // Site Health 
    // remove_meta_box( 'dashboard_site_health', 'dashboard', 'normal' );
    // WP Activity
    // remove_meta_box( 'dashboard_activity', 'dashboard', 'normal');
    // At a Glance
    // remove_meta_box( 'dashboard_right_now', 'dashboard', 'normal' );

    // remove_meta_box( 'dashboard_incoming_links', 'dashboard', 'normal' );
    // remove_meta_box( 'dashboard_plugins', 'dashboard', 'normal' );
    // remove_meta_box( 'dashboard_secondary', 'dashboard', 'normal' );
    // remove_meta_box( 'themefusion_news', 'dashboard', 'normal' );
    // remove_meta_box( 'tribe_dashboard_widget', 'dashboard', 'normal' );
    // remove_meta_box( 'dashboard_recent_drafts', 'dashboard', 'side' );
    // remove_meta_box( 'dashboard_recent_comments', 'dashboard', 'normal' );
    // remove_meta_box( 'rg_forms_dashboard', 'dashboard', 'normal' );
    // remove_meta_box( 'bbp-dashboard-right-now', 'dashboard', 'normal' );
    // remove_meta_box( 'cws-wp-help-dashboard-widget', 'dashboard', 'normal' );
	// remove_meta_box('icl_dashboard_widget','dashboard','normal'); // Multi Language Plugin
	// remove_meta_box('give_dashboard_sales','dashboard', 'normal'); // Activity
	// remove_meta_box('themeisle','dashboard', 'normal'); // Activity
	// remove_meta_box('wpseo-dashboard-overview','dashboard', 'normal'); // Activity
	// remove_meta_box('jetpack_summary_widget','dashboard', 'normal'); // Activity
	// remove_meta_box('monsterinsights_reports_widget','dashboard', 'normal'); // Activity
	// remove_meta_box('monsterinsights_show_dashboard_widget','dashboard', 'normal'); // Activity
	// remove_meta_box('dashboard_mailster','dashboard', 'normal'); // Activity
	// remove_meta_box('mailster','dashboard', 'normal'); // Activity

    // remove_meta_box( 'linktargetdiv', 'link', 'normal' );
    // remove_meta_box( 'linkxfndiv', 'link', 'normal' );
    // remove_meta_box( 'linkadvanceddiv', 'link', 'normal' );
    // remove_meta_box( 'postexcerpt', 'post', 'normal' );
    // remove_meta_box( 'trackbacksdiv', 'post', 'normal' );
    // remove_meta_box( 'postcustom', 'post', 'normal' );
    // remove_meta_box( 'commentstatusdiv', 'post', 'normal' );
    // remove_meta_box( 'commentsdiv', 'post', 'normal' );
    // remove_meta_box( 'revisionsdiv', 'post', 'normal' );
    // remove_meta_box( 'authordiv', 'post', 'normal' );
    // remove_meta_box( 'sqpt-meta-tags', 'post', 'normal' );
    
	// remove_meta_box( 'wordfence_activity_report_widget', 'dashboard', 'normal' );
	// remove_meta_box( 'wbcr-factory-adverts-widget', 'dashboard', 'normal' );
    // remove_action( 'welcome_panel', 'wp_welcome_panel' );
    // remove_action( 'admin_notices', 'update_nag' );
	// remove_action( 'try_gutenberg_panel', 'wp_try_gutenberg_panel'); // Try Gutenberg

}
add_action( 'wp_dashboard_setup', 'gcms_remove_default_admin_widget' );
