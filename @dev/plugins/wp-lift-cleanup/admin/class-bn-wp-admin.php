<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       baonguyenyam.github.io
 * @since      1.0.0
 *
 * @package    LIFT_WP_CLEAN
 * @subpackage LIFT_WP_CLEAN/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    LIFT_WP_CLEAN
 * @subpackage LIFT_WP_CLEAN/admin
 * @author     Nguyen Pham <baonguyenyam@gmail.com>
 */
class LIFT_WP_CLEAN_Admin {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in LIFT_WP_CLEAN_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The LIFT_WP_CLEAN_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		// if( (current_user_can('editor') || current_user_can('author')) && wp_get_current_user() !== 'admin' ) {
		// 	// Stuff here for administrators or editors
		// 	wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/lift-wp-admin.css', array(), $this->version . '3', 'all' );
		// }
		// // Stuff here for administrators or editors
		// wp_enqueue_style('alladminper', plugin_dir_url( __FILE__ ) . 'css/lift-wp-admin-all.css', array(), $this->version. '10', 'all' );

	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in LIFT_WP_CLEAN_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The LIFT_WP_CLEAN_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		// wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/lift-wp-admin.js', array( 'jquery' ), $this->version . '16', false );

	}
	

}
