<?php
/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://liftcreations.com
 * @since             1.0.0
 * @package           LIFT_WP_EX_MAIN
 *
 * @wordpress-plugin
 * Plugin Name:       @LIFT Creations - LIFT Export 1 post
 * Plugin URI:        https://liftcreations.com
 * Description:       This plugins add export link into Wordpress site.
 * Version:           1.0.0
 * Author:            Nguyen Pham
 * Author URI:        https://baonguyenyam.github.io/cv
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       bn-wp-ex
 */

require_once( __DIR__ . '/class-export-one-post.php' );

$export_one_post = new LIFT_Export_One_Post();
