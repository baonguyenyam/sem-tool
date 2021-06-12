<?php 

use Carbon_Fields\Container;
use Carbon_Fields\Field;


function Lift_tabCleanUp() {
	$data = array();
	if (class_exists( 'LIFT_WP_CLEAN_MAIN' ) ) {
		$data = array(
			Field::make( 'html', 'crb_html_2', __( 'Section Description' ) )
				->set_html('Clean Up can help us to clean up the wordpress dashboard.'),
			Field::make(
				'checkbox', 
				'___lift_remove_wp_logo',
				__('Remove WP Logo on Admin bar')
				)->set_option_value( 'yes' ),
			Field::make(
				'checkbox', 
				'___lift_remove_help_menu',
				__('Remove Admin Help Menu')
				)->set_option_value( 'yes' ),
			Field::make(
				'checkbox', 
				'___lift_remove_dashboard_quick_press',
				__('Remove Quick Draft on Dashboard')
				)->set_option_value( 'yes' ),
			Field::make(
				'checkbox', 
				'___lift_remove_dashboard_primary',
				__('Remove Wordpress Events and News on Dashboard')
				)->set_option_value( 'yes' ),
			Field::make(
				'checkbox', 
				'___lift_remove_yoast_db_widget',
				__('Remove Yoast SEO on Dashboard')
				)->set_option_value( 'yes' ),
			Field::make(
				'checkbox', 
				'___lift_remove_dashboard_site_health',
				__('Remove Site Health on Dashboard')
				)->set_option_value( 'yes' ),
			Field::make(
				'checkbox', 
				'___lift_remove_dashboard_activity',
				__('Remove Wordpress Activity on Dashboard')
				)->set_option_value( 'yes' ),
			Field::make(
				'checkbox', 
				'___lift_remove_dashboard_right_now',
				__('Remove At a Glance on Dashboard')
				)->set_option_value( 'yes' ),
			Field::make(
				'checkbox', 
				'___lift_remove_welcome_panel',
				__('Remove Welcome Panel on Dashboard')
				)->set_option_value( 'yes' ),
			Field::make(
				'checkbox', 
				'___lift_remove_update_nag',
				__('Remove Admin Update on Dashboard')
				)->set_option_value( 'yes' ),
			Field::make(
				'checkbox', 
				'___lift_remove_gutenberg_panel',
				__('Remove Gutenberg Panel on Dashboard')
				)->set_option_value( 'yes' ),
			);
	}
	return $data;
}

function Lift___men_c_o_p_y_r_i_g_h_t() {
	$data = array();
	$data = array(
		Field::make( 'html', 'crb_html_3', __( 'Section Description' ) )
				->set_html('
				
				<h1>Copyright</h1>
				<p>Copyright by LIFT Creations</p>
				<p>LIFT Creations is a marketing agency that creates beautiful websites that are optimized for SEO and structured for higher conversions. Creative content and quality execution for digital design, web development, social media, search engine optimization, paid search, print, and video.</p>
				<p>This is a product of LIFT Creations.</p>
				<p><strong>Author:</strong> <a href="https://baonguyenyam.github.io/cv/" target="_blank">Nguyen Pham</a></p>
				
				'),
	);
	return $data;
}

add_action( 'carbon_fields_register_fields', 'lift_option_attach_theme_options' );
function lift_option_attach_theme_options() {
    Container::make( 'theme_options', __( 'LIFT Settings' ) )
        ->add_tab( __( 'Images' ), array(
			Field::make( 'html', 'crb_html_1', __( 'Section Description' ) )
				->set_html('With the LIFT plugin, you can quickly rename all your image URLs based on the post title.'),
			Field::make(
				'checkbox', 
				'___lift_auto_rename_img',
				__('Rename image file by post title')
				)->set_option_value( 'yes' ),
		) )
		->add_tab( __( 'Clean-Up' ), Lift_tabCleanUp() )
		->add_tab( __( base64_decode('Q29weXJpZ2h0') ), Lift___men_c_o_p_y_r_i_g_h_t() )
		;
}

add_action( 'after_setup_theme', 'crb_load' );
function crb_load() {
    require_once( 'vendor/autoload.php' );
    \Carbon_Fields\Carbon_Fields::boot();
}