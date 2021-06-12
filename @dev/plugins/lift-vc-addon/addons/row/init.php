<?php


if (!defined('ABSPATH')) {
	die('Silly human what are you doing here');
}


if (!class_exists('liftVC_Addons_Row')) {

	class liftVC_Addons_Row extends LIFT_Helpers
	{

		public $name = 'row';
		public $pNicename = 'LIFT Row';

		public function __construct()
		{

			add_action('wp_enqueue_scripts', array($this, 'load_scripts'));
			add_shortcode('lift-' . $this->name . '-shortcode', array($this));

			// Map shortcode to Visual Composer
			if (function_exists('vc_lean_map')) {
				vc_lean_map('lift-' . $this->name . '-shortcode', array($this, 'functionLoader'));

			}
		}

		public function load_scripts()
		{
			wp_enqueue_script(
				'lift-' . $this->name,
				plugin_dir_url(__FILE__) . 'js/dist/main.prod.js',
				array('jquery'),
				LIFT_VERSION
			);
			wp_enqueue_style(
				'lift-' . $this->name,
				plugin_dir_url(__FILE__) . 'css/dist/main.min.css',
				array(),
				LIFT_VERSION
			);
		}

		public function functionLoader()
		{

			return array(
				'name'        => esc_html__($this->pNicename, 'js_composer'),
				'description' => esc_html__('Add new ' . $this->pNicename, 'js_composer'),
				// 'base'        => 'lift_vc_' . $this->name,
				'is_container' => true,
				'class' => 'vc_main-sortable-element',
				'category' => __('LIFT Addons', 'js_composer'),
				'icon' => 'icon-lift-adminicon icon-lift-' . $this->name,
				'show_settings_on_create' => false,
				'params'      => array(
					array(
						'type' => 'dropdown',
						'heading' => __( 'Row stretch', 'js_composer' ),
						'param_name' => 'full_width',
						'value' => array(
							__( 'Default', 'js_composer' ) => '',
							__( 'Stretch row', 'js_composer' ) => 'stretch_row',
							__( 'Stretch row and content', 'js_composer' ) => 'stretch_row_content',
							__( 'Stretch row and content (no paddings)', 'js_composer' ) => 'stretch_row_content_no_spaces',
						),
						'description' => __( 'Select stretching options for row and content (Note: stretched may not work properly if parent container has "overflow: hidden" CSS property).', 'js_composer' ),
					),
					array(
						'type' => 'el_id',
						'heading' => esc_html__('Element ID', 'js_composer'),
						'param_name' => 'el_id',
						'group' => __('General', 'js_composer')
					),
					array(
						'type' => 'textfield',
						'heading' => esc_html__('Extra class name', 'js_composer'),
						'param_name' => 'el_class',
						'description' => esc_html__('Style particular content element differently - add a class name and refer to it in custom CSS.', 'js_composer'),
						'group' => __('General', 'js_composer')
					),
					array(
						'type' => 'textfield',
						'heading' => esc_html__('HTML Attribute', 'js_composer'),
						'param_name' => 'el_attribute',
						'description' => esc_html__('Enter html attr (Example: "data-bg").', 'js_composer'),
						'group' => __('General', 'js_composer')
					),
				),
				'js_view' => 'VcRowView',
			);
		}

	}
}
new liftVC_Addons_Row;
