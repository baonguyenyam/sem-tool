<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       baonguyenyam.github.io
 * @since      1.0.0
 *
 * @package    LIFT_WP_CLEAN
 * @subpackage LIFT_WP_CLEAN/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    LIFT_WP_CLEAN
 * @subpackage LIFT_WP_CLEAN/includes
 * @author     Nguyen Pham <baonguyenyam@gmail.com>
 */
class LIFT_WP_CLEAN_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'bn-wp',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}
