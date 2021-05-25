<?php

if ( ! defined( 'ABSPATH' ) ) {
    die('-1');
}
// FRAMEWORK
require_once plugin_dir_path( __FILE__ ) . 'freemius/start.php';
// IMPORT
require_once plugin_dir_path( __FILE__ ) . 'helpers/helpers.php';
require_once plugin_dir_path( __FILE__ ) . 'helpers/lift_helpers.php';
require_once plugin_dir_path( __FILE__ ) . 'addons/boxinfo/init.php';
require_once plugin_dir_path( __FILE__ ) . 'addons/block/init.php';
require_once plugin_dir_path( __FILE__ ) . 'addons/custompost/init.php';
require_once plugin_dir_path( __FILE__ ) . 'addons/gravityforms/init.php';
