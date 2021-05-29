<?php 

class LIFTCleanUPS {
    public $attrs = null;
    public function __construct($attrs) {
        $this->attrs = $attrs;
        if($this->attrs['removeLogo']) {
            add_action( 'wp_before_admin_bar_render', 'LIFTCleanUPS::removeLogo');
        };
        if($this->attrs['removeHelp']) {
            add_filter( 'contextual_help', 'LIFTCleanUPS::removeHelp', 999, 3 );
        };
        if($this->attrs['removeDashboardQuickPress']) {
            add_action( 'wp_dashboard_setup', 'LIFTCleanUPS::removeDashboardQuickPress' );
        };
        if($this->attrs['removeDashboardPrimary']) {
            add_action( 'wp_dashboard_setup', 'LIFTCleanUPS::removeDashboardPrimary' );
        };
        if($this->attrs['removeYoast']) {
            add_action( 'wp_dashboard_setup', 'LIFTCleanUPS::removeYoast' );
        };
        if($this->attrs['removeSiteHealth']) {
            add_action( 'wp_dashboard_setup', 'LIFTCleanUPS::removeSiteHealth' );
        };
        if($this->attrs['removeDashboardActivity']) {
            add_action( 'wp_dashboard_setup', 'LIFTCleanUPS::removeDashboardActivity' );
        };
        if($this->attrs['removeAtAGlance']) {
            add_action( 'wp_dashboard_setup', 'LIFTCleanUPS::removeAtAGlance' );
        };
        if($this->attrs['removeWelcome']) {
            add_action( 'wp_dashboard_setup', 'LIFTCleanUPS::removeWelcome' );
        };
        if($this->attrs['removeUpdate']) {
            add_action( 'wp_dashboard_setup', 'LIFTCleanUPS::removeUpdate' );
        };
        if($this->attrs['removeGutenbergPanel']) {
            add_action( 'wp_dashboard_setup', 'LIFTCleanUPS::removeGutenbergPanel' );
        };
    }
    public function removeLogo() {
        global $wp_admin_bar;
        $wp_admin_bar->remove_menu( 'wp-logo' );
    }
    public function removeDashboardQuickPress() {
        remove_meta_box( 'dashboard_quick_press', 'dashboard', 'side' );
    }
    public function removeDashboardPrimary() {
        remove_meta_box( 'dashboard_primary', 'dashboard', 'side' );
    }
    public function removeYoast() {
        remove_meta_box( 'yoast_db_widget', 'dashboard', 'normal' );
        remove_meta_box('wpseo-dashboard-overview','dashboard', 'normal');
    }
    public function removeSiteHealth() {
        remove_meta_box( 'dashboard_site_health', 'dashboard', 'normal' );
    }
    public function removeDashboardActivity() {
        remove_meta_box( 'dashboard_activity', 'dashboard', 'normal' );
    }
    public function removeAtAGlance() {
        remove_meta_box( 'dashboard_right_now', 'dashboard', 'normal' );
    }
    public function removeWelcome() {
        remove_action( 'welcome_panel', 'wp_welcome_panel' );
    }
    public function removeUpdate() {
        global $wp_admin_bar;
        $wp_admin_bar->remove_menu( 'updates' );
        $wp_admin_bar->remove_menu( 'easy-updates-manager-admin-bar' );
        remove_action( 'admin_notices', 'update_nag' );
    }
    public function removeGutenbergPanel() {
        remove_action( 'try_gutenberg_panel', 'wp_try_gutenberg_panel');
    }
    public function removeHelp($old_help, $screen_id, $screen) {
        $screen->remove_help_tabs();
        return $old_help;
    }
    public function liftCredits( $text ) {
        $text = 'LIFT Creations';
        return $text;
    }
}

// CLEAN UP 
add_filter( 'admin_footer_text', 'LIFTCleanUPS::liftCredits' );
add_action( 'carbon_fields_fields_registered', '___lift_clearUpSystem' );

function ___lift_clearUpSystem() {
    $attrs = array(
        'removeLogo' => carbon_get_theme_option('___lift_remove_wp_logo') ? true: false,
        'removeHelp' => carbon_get_theme_option('___lift_remove_help_menu') ? true: false,
        'removeDashboardQuickPress' => carbon_get_theme_option('___lift_remove_dashboard_quick_press') ? true: false,
        'removeDashboardPrimary' => carbon_get_theme_option('___lift_remove_dashboard_primary') ? true: false,
        'removeYoast' => carbon_get_theme_option('___lift_remove_yoast_db_widget') ? true: false,
        'removeSiteHealth' => carbon_get_theme_option('___lift_remove_dashboard_site_health') ? true: false,
        'removeDashboardActivity' => carbon_get_theme_option('___lift_remove_dashboard_activity') ? true: false,
        'removeAtAGlance' => carbon_get_theme_option('___lift_remove_dashboard_right_now') ? true: false,
        'removeWelcome' => carbon_get_theme_option('___lift_remove_welcome_panel') ? true: false,
        'removeUpdate' => carbon_get_theme_option('___lift_remove_update_nag') ? true: false,
        'removeGutenbergPanel' => carbon_get_theme_option('___lift_remove_gutenberg_panel') ? true: false,
    );
    new LIFTCleanUPS($attrs);
}
