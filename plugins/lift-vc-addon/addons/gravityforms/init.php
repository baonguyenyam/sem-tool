<?php

/**
 * the WPBakery Visual Composer plugin by Nguyen Pham
 * https://visualcomposer.com/help/api/
 * https://kb.wpbakery.com/docs/developers-how-tos/add-design-options-tab-with-css-editor-to-your-element/
 * https://www.wpelixir.com/how-to-customize-default-elements-visual-composer/
 *
 */

if (!defined('ABSPATH')) {
	die('Silly human what are you doing here');
}


if (!class_exists('liftVC_Addons_GravityForms')) {

	class liftVC_Addons_GravityForms extends LIFT_Helpers
	{

		public $name = 'gravityforms';
		public $pNicename = 'LIFT Gravity Forms';

		public function __construct()
		{

			add_action('wp_enqueue_scripts', array($this, 'load_scripts'));
			add_shortcode('lift-' . $this->name . '-shortcode', array($this, 'output'));

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

			global $wpdb;
			$results = $wpdb->get_results( "SELECT * FROM {$wpdb->prefix}gf_form WHERE is_active = 1", OBJECT );
			$taxonomies = array();
			foreach ($results as &$value) {
				$taxonomies[esc_html__($value->title, 'js_composer')] = $value->id;
			}
			$arrapList = array(
				'param_name'    => 'content',
				'heading'       => __('Gravity Forms', 'js_composer'),
				'description' => esc_html__('Error! You need install Gravity Forms first', 'js_composer'),
				'group' => $this->pNicename,
			);

			if($taxonomies) {
				$arrapList = array(
					'param_name'    => 'content',
					'type'          => 'dropdown',
					'value' =>  $taxonomies,
					'admin_label' => true,
					'heading'       => __('Gravity Forms', 'js_composer'),
					'description' => esc_html__('Add Gravity Forms', 'js_composer'),
					'group' => $this->pNicename,
				);
			}

			return array(
				'name'        => esc_html__($this->pNicename, 'js_composer'),
				'description' => esc_html__('Add new ' . $this->pNicename, 'js_composer'),
				'base'        => 'lift_vc_' . $this->name,
				'category' => __('LIFT Addons', 'js_composer'),
				'icon' => 'icon-lift-adminicon icon-lift-' . $this->name,
				'show_settings_on_create' => true,
				'params'      => array(
					$arrapList,
					array(
						'type' => 'dropdown',
						'heading' => esc_html__( 'Display Form Title', 'js_composer' ),
						'param_name' => 'title',
						'value' => array(
							esc_html__( 'No', 'js_composer' ) => 'false',
							esc_html__( 'Yes', 'js_composer' ) => 'true',
						),
						'save_always' => true,
						'description' => esc_html__( 'Would you like to display the forms title?', 'js_composer' ),
						'group' => $this->pNicename,
					),
					array(
						'type' => 'dropdown',
						'heading' => esc_html__( 'Display Form Description', 'js_composer' ),
						'param_name' => 'description',
						'value' => array(
							esc_html__( 'No', 'js_composer' ) => 'false',
							esc_html__( 'Yes', 'js_composer' ) => 'true',
						),
						'save_always' => true,
						'description' => esc_html__( 'Would you like to display the forms description?', 'js_composer' ),
						'group' => $this->pNicename,
					),
					array(
						'type' => 'dropdown',
						'heading' => esc_html__( 'Enable AJAX?', 'js_composer' ),
						'param_name' => 'ajax',
						'value' => array(
							esc_html__( 'No', 'js_composer' ) => 'false',
							esc_html__( 'Yes', 'js_composer' ) => 'true',
						),
						'save_always' => true,
						'description' => esc_html__( 'Enable AJAX submission?', 'js_composer' ),
						'group' => $this->pNicename,
					),
					array(
						'type' => 'textfield',
						'heading' => esc_html__( 'Tab Index', 'js_composer' ),
						'param_name' => 'tabindex',
						'description' => esc_html__( '(Optional) Specify the starting tab index for the fields of this form. Leave blank if you\'re not sure what this is.', 'js_composer' ),
						'group' => $this->pNicename,
					),
					array(
						'type' => 'dropdown',
						'heading' => esc_html__( 'Form layout', 'js_composer' ),
						'param_name' => 'theme',
						'admin_label' => true,
						'value' => array(
							esc_html__( 'Default', 'js_composer' ) => 'default',
							esc_html__( 'Style 1', 'js_composer' ) => 'style-1',
							esc_html__( 'Style 2', 'js_composer' ) => 'style-2',
						),
						'save_always' => true,
						'not_empty' => true,
						'description' => esc_html__( 'Select form layout.', 'js_composer' ),
						'group' => __('Format', 'js_composer')
					),
					array(
						"type" => "textfield",
						'param_name' => 'prevoew_0',
						"heading" => __( "Default", "js_composer" ),
						"description" => __( "<a href='".plugin_dir_url(__FILE__) .'img/0.png'."' target='_blank'><img src='".plugin_dir_url(__FILE__) .'img/0.png'."' style='max-width: 200px; border: 1px solid #acadb0; border-radius: 3px;'></a>", "js_composer" ),
						'save_always' => true,
						'dependency' => array(
							'element' => 'theme',
							'value' =>'default'
						),
						'group' => __('Format', 'js_composer')
					),
					array(
						"type" => "textfield",
						'param_name' => 'prevoew_1',
						"heading" => __( "Style 1", "js_composer" ),
						"description" => __( "<a href='".plugin_dir_url(__FILE__) .'img/1.png'."' target='_blank'><img src='".plugin_dir_url(__FILE__) .'img/1.png'."' style='max-width: 200px; border: 1px solid #acadb0; border-radius: 3px;'></a>", "js_composer" ),
						'save_always' => true,
						'dependency' => array(
							'element' => 'theme',
							'value' =>'style-1'
						),
						'group' => __('Format', 'js_composer')
					),
					array(
						"type" => "textfield",
						'param_name' => 'prevoew_2',
						"heading" => __( "Style 2", "js_composer" ),
						"description" => __( "<a href='".plugin_dir_url(__FILE__) .'img/2.png'."' target='_blank'><img src='".plugin_dir_url(__FILE__) .'img/2.png'."' style='max-width: 200px ;border: 1px solid #acadb0; border-radius: 3px;'></a>", "js_composer" ),
						'save_always' => true,
						'dependency' => array(
							'element' => 'theme',
							'value' =>'style-2'
						),
						'group' => __('Format', 'js_composer')
					),
					array(
						"type" => "lift_group_header",
						"class" => "",
						"heading" => esc_html__("Text format", "js_composer" ),
						"param_name" => "group_header_2",
						"edit_field_class" => "",
						"value" => '',
						'group' => __('Format', 'js_composer')
					),
					array(
						'type' => 'colorpicker',
						'heading' => esc_html__( 'Text color', 'js_composer' ),
						'param_name' => 'text_color',
						'value' => '',
						'edit_field_class' => 'vc_col-sm-4',
						'group' => __('Format', 'js_composer')
					),
					array(
						'type' => 'colorpicker',
						'heading' => esc_html__( 'Link color', 'js_composer' ),
						'param_name' => 'link_color',
						'value' => '',
						'edit_field_class' => 'vc_col-sm-4',
						'group' => __('Format', 'js_composer')
					),
					array(
						'type' => 'colorpicker',
						'heading' => esc_html__( 'Link hover color', 'js_composer' ),
						'param_name' => 'link_hover_color',
						'value' => '',
						'edit_field_class' => 'vc_col-sm-4',
						'group' => __('Format', 'js_composer')
					),
					array(
						"type" => "lift_group_header",
						"class" => "",
						"heading" => esc_html__("Input format", "js_composer" ),
						"param_name" => "group_header_4",
						"edit_field_class" => "",
						"value" => '',
						'group' => __('Format', 'js_composer')
					),
					array(
						'type' => 'colorpicker',
						'heading' => esc_html__( 'Input text', 'js_composer' ),
						'param_name' => 'input_color',
						'value' => '',
						'edit_field_class' => 'vc_col-sm-4',
						'group' => __('Format', 'js_composer')
					),
					array(
						'type' => 'colorpicker',
						'heading' => esc_html__( 'Input text hover', 'js_composer' ),
						'param_name' => 'input_hover_color',
						'value' => '',
						'edit_field_class' => 'vc_col-sm-4',
						'group' => __('Format', 'js_composer')
					),
					array(
						'type' => 'colorpicker',
						'heading' => esc_html__( 'Input background', 'js_composer' ),
						'param_name' => 'input_bg',
						'value' => '',
						'edit_field_class' => 'vc_col-sm-4',
						'group' => __('Format', 'js_composer')
					),
					array(
						'type' => 'colorpicker',
						'heading' => esc_html__( 'Input hover background', 'js_composer' ),
						'param_name' => 'input_hover_bg',
						'value' => '',
						'edit_field_class' => 'vc_col-sm-4',
						'group' => __('Format', 'js_composer')
					),
					array(
						'type' => 'colorpicker',
						'heading' => esc_html__( 'Input border color', 'js_composer' ),
						'param_name' => 'input_border_color',
						'value' => '',
						'edit_field_class' => 'vc_col-sm-4',
						'group' => __('Format', 'js_composer')
					),
					array(
						'type' => 'colorpicker',
						'heading' => esc_html__( 'Input border hover', 'js_composer' ),
						'param_name' => 'input_border_hover',
						'value' => '',
						'edit_field_class' => 'vc_col-sm-4',
						'group' => __('Format', 'js_composer')
					),
					array(
						'type' => 'dropdown',
						'heading' => esc_html__( 'Input border', 'js_composer' ),
						'param_name' => 'input_border',
						'value' => array(
							esc_html__( 'Default', 'js_composer' ) => 'default',
							esc_html__( '1px', 'js_composer' ) => '1',
							esc_html__( '2px', 'js_composer' ) => '2',
							esc_html__( '3px', 'js_composer' ) => '3',
							esc_html__( '4px', 'js_composer' ) => '4',
						),
						'description' => esc_html__( 'Select Input border', 'js_composer' ),
						'edit_field_class' => 'vc_col-sm-6',
						'group' => __('Format', 'js_composer')
					),
					array(
						'type' => 'dropdown',
						'heading' => esc_html__( 'Input border style', 'js_composer' ),
						'param_name' => 'input_border_style',
						'value' => array(
							esc_html__( 'Default', 'js_composer' ) => 'default',
							esc_html__( 'all', 'js_composer' ) => 'all',
							esc_html__( 'top', 'js_composer' ) => 'top',
							esc_html__( 'left', 'js_composer' ) => 'left',
							esc_html__( 'right', 'js_composer' ) => 'right',
							esc_html__( 'bottom', 'js_composer' ) => 'bottom',
						),
						'description' => esc_html__( 'Select Input border style', 'js_composer' ),
						'edit_field_class' => 'vc_col-sm-6',
						'group' => __('Format', 'js_composer')
					),
					array(
						'type' => 'dropdown',
						'heading' => esc_html__( 'Input border radius', 'js_composer' ),
						'param_name' => 'input_border_radius',
						'value' => array(
							esc_html__( 'Default', 'js_composer' ) => 'rounded-0',
							esc_html__( 'pill', 'js_composer' ) => 'rounded-pill',
							esc_html__( 'rounded', 'js_composer' ) => 'rounded',
							esc_html__( '3px', 'js_composer' ) => '3px',
							esc_html__( '5px', 'js_composer' ) => '5px',
							esc_html__( '10px', 'js_composer' ) => '10px',
						),
						'description' => esc_html__( 'Select Input border radius', 'js_composer' ),
						'edit_field_class' => 'vc_col-sm-6',
						'group' => __('Format', 'js_composer')
					),
					array(
						'type' => 'textfield',
						'heading' => esc_html__( 'Input Padding', 'js_composer' ),
						'param_name' => 'input_padding',
						'value' => '',
						"description" => esc_html__("Enter value in your string. e.g. 40px 20px or 1rem or 1rem 2rem .5rem 10px", "js_composer"),
						'edit_field_class' => 'vc_col-sm-6',
						'group' => __('Format', 'js_composer')
					),
					array(
						"type" => "lift_group_header",
						"class" => "",
						"heading" => esc_html__("Button format", "js_composer" ),
						"param_name" => "group_header_3",
						"edit_field_class" => "",
						"value" => '',
						'group' => __('Format', 'js_composer')
					),
					array(
						'type' => 'colorpicker',
						'heading' => esc_html__( 'Button text', 'js_composer' ),
						'param_name' => 'btn_text_color',
						'value' => '',
						'edit_field_class' => 'vc_col-sm-4',
						'group' => __('Format', 'js_composer')
					),
					array(
						'type' => 'colorpicker',
						'heading' => esc_html__( 'Button text hover', 'js_composer' ),
						'param_name' => 'btn_text_hover_color',
						'value' => '',
						'edit_field_class' => 'vc_col-sm-4',
						'group' => __('Format', 'js_composer')
					),
					array(
						'type' => 'colorpicker',
						'heading' => esc_html__( 'Button background', 'js_composer' ),
						'param_name' => 'btn_bg',
						'value' => '',
						'edit_field_class' => 'vc_col-sm-4',
						'group' => __('Format', 'js_composer')
					),
					array(
						'type' => 'colorpicker',
						'heading' => esc_html__( 'Button hover background', 'js_composer' ),
						'param_name' => 'btn_hover_bg',
						'value' => '',
						'edit_field_class' => 'vc_col-sm-4',
						'group' => __('Format', 'js_composer')
					),
					array(
						'type' => 'colorpicker',
						'heading' => esc_html__( 'Button border color', 'js_composer' ),
						'param_name' => 'btn_border_color',
						'value' => '',
						'edit_field_class' => 'vc_col-sm-4',
						'group' => __('Format', 'js_composer')
					),
					array(
						'type' => 'colorpicker',
						'heading' => esc_html__( 'Button border hover', 'js_composer' ),
						'param_name' => 'btn_border_hover',
						'value' => '',
						'edit_field_class' => 'vc_col-sm-4',
						'group' => __('Format', 'js_composer')
					),
					
					array(
						'type' => 'dropdown',
						'heading' => esc_html__( 'Button border', 'js_composer' ),
						'param_name' => 'btn_border',
						'value' => array(
							esc_html__( 'Default', 'js_composer' ) => 'default',
							esc_html__( '1px', 'js_composer' ) => '1',
							esc_html__( '2px', 'js_composer' ) => '2',
							esc_html__( '3px', 'js_composer' ) => '3',
							esc_html__( '4px', 'js_composer' ) => '4',
						),
						'description' => esc_html__( 'Select Button border', 'js_composer' ),
						'edit_field_class' => 'vc_col-sm-6',
						'group' => __('Format', 'js_composer')
					),

					array(
						'type' => 'dropdown',
						'heading' => esc_html__( 'Button border style', 'js_composer' ),
						'param_name' => 'btn_border_style',
						'value' => array(
							esc_html__( 'Default', 'js_composer' ) => 'default',
							esc_html__( 'all', 'js_composer' ) => 'all',
							esc_html__( 'top', 'js_composer' ) => 'top',
							esc_html__( 'left', 'js_composer' ) => 'left',
							esc_html__( 'right', 'js_composer' ) => 'right',
							esc_html__( 'bottom', 'js_composer' ) => 'bottom',
						),
						'description' => esc_html__( 'Select Button border style', 'js_composer' ),
						'edit_field_class' => 'vc_col-sm-6',
						'group' => __('Format', 'js_composer')
					),
					

					
					array(
						'type' => 'dropdown',
						'heading' => esc_html__( 'Button border radius', 'js_composer' ),
						'param_name' => 'btn_border_radius',
						'value' => array(
							esc_html__( 'Default', 'js_composer' ) => 'rounded-0',
							esc_html__( 'pill', 'js_composer' ) => 'rounded-pill',
							esc_html__( 'rounded', 'js_composer' ) => 'rounded',
							esc_html__( '3px', 'js_composer' ) => '3px',
							esc_html__( '5px', 'js_composer' ) => '5px',
							esc_html__( '10px', 'js_composer' ) => '10px',
						),
						'description' => esc_html__( 'Select Button border radius', 'js_composer' ),
						'edit_field_class' => 'vc_col-sm-6',
						'group' => __('Format', 'js_composer')
					),

					
					
					array(
						'type' => 'textfield',
						'heading' => esc_html__( 'Button Padding', 'js_composer' ),
						'param_name' => 'btn_padding',
						'value' => '',
						"description" => esc_html__("Enter value in your string. e.g. 40px 20px or 1rem or 1rem 2rem .5rem 10px", "js_composer"),
						'edit_field_class' => 'vc_col-sm-6',
						'group' => __('Format', 'js_composer')
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
					array(
						'type' => 'css_editor',
						'heading' => esc_html__('CSS box', 'js_composer'),
						'param_name' => 'css',
						'group' => esc_html__('Design Options', 'js_composer'),
					),
				),
			);
		}

		public function output($atts, $content = null)
		{

			$block_id = isset($atts['el_id']) ? ' id="'.$atts['el_id'].'"' : '';
			$attribute = isset($atts['el_attribute']) ? ' ' . $atts['el_attribute'] : '';
			$theme = isset($atts['theme']) ? ' lift-' . $atts['theme'] : '';
			$css = isset($atts["css"]) ? $atts["css"] : '';
			$css_class = apply_filters(VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class($css, ' '), $this->settings['base'], $atts);
			// SETTINGS
			$title = isset($atts['title']) ? $atts['title'] : 'false';
			$description = isset($atts['description']) ? $atts['description'] : 'false';
			$ajax = isset($atts['ajax']) ? $atts['ajax'] : 'false';
			$tabindex = isset($atts['tabindex']) ? $atts['tabindex'] : '0';
			// VALUE 
			$text_color = isset($atts['text_color']) ? $atts['text_color'] : '';
			$link_color = isset($atts['link_color']) ? $atts['link_color'] : '';
			$link_hover_color = isset($atts['link_hover_color']) ? $atts['link_hover_color'] : '';

			$input_color = isset($atts['input_color']) ? $atts['input_color'] : '';
			$input_hover_color = isset($atts['input_hover_color']) ? $atts['input_hover_color'] : '';
			$input_bg = isset($atts['input_bg']) ? $atts['input_bg'] : '';
			$input_hover_bg = isset($atts['input_hover_bg']) ? $atts['input_hover_bg'] : '';
			$input_border_color = isset($atts['input_border_color']) ? $atts['input_border_color'] : '';
			$input_border_hover = isset($atts['input_border_hover']) ? $atts['input_border_hover'] : '';
			$input_border = isset($atts['input_border']) ? $atts['input_border'] : '';
			$input_border_style = isset($atts['input_border_style']) ? $atts['input_border_style'] : '';
			$input_border_radius = isset($atts['input_border_radius']) ? $atts['input_border_radius'] : '';
			$input_padding = isset($atts['input_padding']) ? $atts['input_padding'] : '';

			$btn_bg = isset($atts['btn_bg']) ? $atts['btn_bg'] : '';
			$btn_hover_bg = isset($atts['btn_hover_bg']) ? $atts['btn_hover_bg'] : '';
			$btn_text_color = isset($atts['btn_text_color']) ? $atts['btn_text_color'] : '';
			$btn_text_hover_color = isset($atts['btn_text_hover_color']) ? $atts['btn_text_hover_color'] : '';
			$btn_border = isset($atts['btn_border']) ? $atts['btn_border'] : '';
			$btn_border_style = isset($atts['btn_border_style']) ? $atts['btn_border_style'] : '';
			$btn_border_radius = isset($atts['btn_border_radius']) ? $atts['btn_border_radius'] : '';
			$btn_padding = isset($atts['btn_padding']) ? $atts['btn_padding'] : '';
			$btn_border_color = isset($atts['btn_border_color']) ? $atts['btn_border_color'] : '';
			$btn_border_hover = isset($atts['btn_border_hover']) ? $atts['btn_border_hover'] : '';


			// Admin
			$settings = shortcode_atts(array(
				'el_attribute' => '',
				'el_id' => '',
				'el_class' => '',
			), $atts);
			extract($settings);
			// FrontEnd
			$output = $css ? '<style>' . $css . '</style>' : '';
			$output .= '<section'. $block_id .' class="lift-elements lift-' . $this->name . $css_class. $theme.'"' . str_replace('``', '', $attribute) . '>';
			$output .= $content ?  do_shortcode('[gravityform id="'.$content.'" title="'.$title.'" description="'.$description.'" ajax="'.$ajax.'" tabindex="'.$tabindex.'"]') : null;
			$output .= '</section>';
			$output .= '<!-- .lift-' . $this->name . ' -->';

			return apply_filters(
				'lift_' . $this->name . '_output',
				$output,
				$content,
				$settings
			);
		}
	}
}
new liftVC_Addons_GravityForms;
