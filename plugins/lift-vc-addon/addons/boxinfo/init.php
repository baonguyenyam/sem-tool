<?php

/**
 * the WPBakery Visual Composer plugin by Nguyen Pham
 * https://visualcomposer.com/help/api/
 * https://kb.wpbakery.com/docs/inner-api/vc_map/
 * https://kb.wpbakery.com/docs/developers-how-tos/add-design-options-tab-with-css-editor-to-your-element/
 * https://www.wpelixir.com/how-to-customize-default-elements-visual-composer/
 *
 */

if (!defined('ABSPATH')) {
	die('Silly human what are you doing here');
}


if (!class_exists('liftVC_Addons_BoxInfo')) {

	class liftVC_Addons_BoxInfo extends LIFT_Helpers
	{

		public $name = 'boxinfo';
		public $pNicename = 'LIFT Box Info';

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
			return array(
				'name'        => esc_html__($this->pNicename, 'js_composer'),
				'description' => esc_html__('Add new ' . $this->pNicename, 'js_composer'),
				'base'        => 'lift_vc_' . $this->name,
				'category' => __('LIFT Addons', 'js_composer'),
				'icon' => 'icon-lift-adminicon icon-lift-' . $this->name,
				'show_settings_on_create' => true,
				'params'      => array(
					array(
						'type'       => 'attach_image',
						'holder' => 'img',
						'heading' => __('Image', 'js_composer'),
						'param_name' => 'bgimg',
						'class' => 'lift-bgimg',
						'weight' => 0,
						'group' => $this->pNicename,
					),
					array(
						'type' => 'textfield',
						'holder' => 'h2',
						'class' => 'lift-title',
						'heading' => __('Heading', 'js_composer'),
						'param_name' => 'title',
						'weight' => 0,
						'group' => $this->pNicename,
					),
					array(
						'type' => 'textarea_html',
						'holder' => 'div',
						'class' => 'lift-content',
						'heading' => __('Description', 'js_composer'),
						'param_name' => 'content',
						'value' => __('', 'js_composer'),
						'description' => __('To add link highlight text or url and click the chain to apply hyperlink', 'js_composer'),
						'group' => $this->pNicename,
					),
					array(
						'type' => 'vc_link',
						'heading' => esc_html__('URL (Link)', 'js_composer'),
						'param_name' => 'link',
						'description' => esc_html__('Add link to custom heading.', 'js_composer'),
						'group' => $this->pNicename,
					),
					array(
						'type' => 'checkbox',
						'heading' => esc_html__( 'Add button', 'js_composer' ) . '?',
						'description' => esc_html__( 'Add button into box.', 'js_composer' ),
						'param_name' => 'add_button',
						'edit_field_class' => 'vc_col-sm-6',
						'group' => $this->pNicename,
					),
					array(
						'type' => 'checkbox',
						'heading' => esc_html__( 'Add box click', 'js_composer' ) . '?',
						'description' => esc_html__( 'Add box click.', 'js_composer' ),
						'param_name' => 'add_box_button',
						'edit_field_class' => 'vc_col-sm-6',
						'group' => $this->pNicename,
					),
					array(
						'type' => 'dropdown',
						'heading' => esc_html__( 'Box layout', 'js_composer' ),
						'param_name' => 'theme',
						'admin_label' => true,
						'value' => array(
							esc_html__( 'Default', 'js_composer' ) => 'default',
							esc_html__( 'Image bottom', 'js_composer' ) => 'style-1',
							esc_html__( 'Image left', 'js_composer' ) => 'style-2',
							esc_html__( 'Image right', 'js_composer' ) => 'style-3',
							esc_html__( 'Box hover', 'js_composer' ) => 'style-4',
							esc_html__( 'Flip X', 'js_composer' ) => 'style-5',
							esc_html__( 'Flip Y', 'js_composer' ) => 'style-6',
						),
						'description' => esc_html__( 'Select box layout.', 'js_composer' ),
						'group' => __('Format', 'js_composer')
					),
					array(
						'type' => 'font_container',
						'param_name' => 'font_container',
						'value' => 'tag:h2|text_align:left',
						'settings' => array(
							'fields' => array(
								'tag' => 'h2',
								'text_align',
								'color',
								// 'font_size',
								// 'line_height',
								'tag_description' => esc_html__('Select element tag.', 'js_composer'),
								'text_align_description' => esc_html__('Select text alignment.', 'js_composer'),
								'font_size_description' => esc_html__('Enter heading font size.', 'js_composer'),
								'line_height_heading' => esc_html__('Heading line height', 'js_composer'),
								'line_height_description' => esc_html__('Enter heading line height.', 'js_composer'),
								'color_description' => esc_html__('Select heading color.', 'js_composer'),
							),
						),
						'group' => __('Format', 'js_composer')
					),
					array(
						'type' => 'dropdown',
						'heading' => esc_html__( 'Heading font size', 'js_composer' ),
						'param_name' => 'font_size',
						'value' => array(
							esc_html__( 'Default', 'js_composer' ) => 'default',
							esc_html__( 'Display 1', 'js_composer' ) => 'display-1',
							esc_html__( 'Display 2', 'js_composer' ) => 'display-2',
							esc_html__( 'Display 3', 'js_composer' ) => 'display-3',
							esc_html__( 'Display 4', 'js_composer' ) => 'display-4',
							esc_html__( 'Display 5', 'js_composer' ) => 'display-5',
							esc_html__( 'Display 6', 'js_composer' ) => 'display-6',
							esc_html__( 'Display 7', 'js_composer' ) => 'fs-1',
							esc_html__( 'Display 8', 'js_composer' ) => 'fs-2',
							esc_html__( 'Display 9', 'js_composer' ) => 'fs-3',
							esc_html__( 'Display 10', 'js_composer' ) => 'fs-4',
							esc_html__( 'Display 11', 'js_composer' ) => 'fs-5',
							esc_html__( 'Display 12', 'js_composer' ) => 'fs-6',
						),
						'description' => esc_html__( 'Select heading font size', 'js_composer' ),
						'group' => __('Format', 'js_composer')
					),
					array(
						'type' => 'textfield',
						'heading' => esc_html__( 'Heading line height', 'js_composer' ),
						'param_name' => 'line_height',
						'description' => esc_html__( 'Enter heading line height. e.g. 1.5 or 1.5rem', 'js_composer' ),
						'value' => '',
						'group' => __('Format', 'js_composer')
					),
					array(
						'type' => 'colorpicker',
						'heading' => esc_html__( 'Description color', 'js_composer' ),
						'param_name' => 'desc_color',
						'description' => esc_html__( 'Select description color.', 'js_composer' ),
						'value' => '',
						'group' => __('Format', 'js_composer')
					),
					array(
						'type' => 'dropdown',
						'heading' => esc_html__( 'Description font size', 'js_composer' ),
						'param_name' => 'desc_font_size',
						'value' => array(
							esc_html__( 'Default', 'js_composer' ) => 'default',
							esc_html__( 'Display 1', 'js_composer' ) => 'display-1',
							esc_html__( 'Display 2', 'js_composer' ) => 'display-2',
							esc_html__( 'Display 3', 'js_composer' ) => 'display-3',
							esc_html__( 'Display 4', 'js_composer' ) => 'display-4',
							esc_html__( 'Display 5', 'js_composer' ) => 'display-5',
							esc_html__( 'Display 6', 'js_composer' ) => 'display-6',
							esc_html__( 'Display 7', 'js_composer' ) => 'fs-1',
							esc_html__( 'Display 8', 'js_composer' ) => 'fs-2',
							esc_html__( 'Display 9', 'js_composer' ) => 'fs-3',
							esc_html__( 'Display 10', 'js_composer' ) => 'fs-4',
							esc_html__( 'Display 11', 'js_composer' ) => 'fs-5',
							esc_html__( 'Display 12', 'js_composer' ) => 'fs-6',
						),
						'description' => esc_html__( 'Select description font size.', 'js_composer' ),
						'group' => __('Format', 'js_composer')
					),
					array(
						'type' => 'textfield',
						'heading' => esc_html__( 'Description line height', 'js_composer' ),
						'param_name' => 'desc_line_height',
						'description' => esc_html__( 'Enter description line height. e.g. 1.5 or 1.5rem', 'js_composer' ),
						'value' => '',
						'group' => __('Format', 'js_composer')
					),
					array(
						"type" => "lift_group_header",
						"class" => "",
						"heading" => esc_html__("Font format", "js_composer" ),
						"param_name" => "group_header_1",
						"edit_field_class" => "",
						"value" => '',
						'group' => __('Format', 'js_composer')
					),
					array(
						'type' => 'checkbox',
						'heading' => esc_html__('Use theme default font family?', 'js_composer'),
						'param_name' => 'use_theme_fonts',
						'value' => array(esc_html__('Yes', 'js_composer') => 'yes'),
						'description' => esc_html__('Use font family from the theme.', 'js_composer'),
						'group' => __('Format', 'js_composer')
					),
					array(
						'type' => 'google_fonts',
						'param_name' => 'google_fonts',
						'value' => 'font_family:Abril%20Fatface%3Aregular|font_style:400%20regular%3A400%3Anormal',
						'settings' => array(
							'fields' => array(
								'font_family_description' => esc_html__('Select font family.', 'js_composer'),
								'font_style_description' => esc_html__('Select font styling.', 'js_composer'),
							),
						),
						'dependency' => array(
							'element' => 'use_theme_fonts',
							'value_not_equal_to' => 'yes',
						),
						'group' => __('Format', 'js_composer')
					),
					array(
						'type' => 'dropdown',
						'heading' => __('Icon library', 'js_composer'),
						'value' => array(
							esc_html__('None', 'js_composer') => 'none',
							esc_html__('Font Awesome', 'js_composer') => 'fontawesome',
							esc_html__('Iconsmind', 'js_composer') => 'iconsmind',
							esc_html__('Linea', 'js_composer') => 'linea',
							esc_html__('Steadysets', 'js_composer') => 'steadysets',
							esc_html__('Linecons', 'js_composer') => 'linecons',
						),
						'save_always' => true,
						'param_name' => 'icon_family',
						'description' => __('Select icon library.', 'js_composer'),
						'group' => __('Icons', 'js_composer')
					),
					array(
						"type" => "iconpicker",
						"heading" => esc_html__("Icon", "js_composer"),
						"param_name" => "icon_fontawesome",
						"settings" => array("iconsPerPage" => 240),
						"dependency" => array('element' => "icon_family", 'emptyIcon' => false, 'value' => 'fontawesome'),
						"description" => esc_html__("Select icon from library.", "js_composer"),
						'group' => __('Icons', 'js_composer')
					),
					array(
						"type" => "iconpicker",
						"heading" => esc_html__("Icon", "js_composer"),
						"param_name" => "icon_iconsmind",
						"settings" => array('type' => 'iconsmind', 'emptyIcon' => false, "iconsPerPage" => 240),
						"dependency" => array('element' => "icon_family", 'value' => 'iconsmind'),
						"description" => esc_html__("Select icon from library.", "js_composer"),
						'group' => __('Icons', 'js_composer')
					),
					array(
						"type" => "iconpicker",
						"heading" => esc_html__("Icon", "js_composer"),
						"param_name" => "icon_linea",
						"settings" => array('type' => 'linea', "emptyIcon" => false, "iconsPerPage" => 240),
						"dependency" => array('element' => "icon_family", 'value' => 'linea'),
						"description" => esc_html__("Select icon from library.", "js_composer"),
						'group' => __('Icons', 'js_composer')
					),
					array(
						"type" => "iconpicker",
						"heading" => esc_html__("Icon", "js_composer"),
						"param_name" => "icon_linecons",
						"settings" => array('type' => 'linecons', 'emptyIcon' => false, "iconsPerPage" => 240),
						"dependency" => array('element' => "icon_family", 'value' => 'linecons'),
						"description" => esc_html__("Select icon from library.", "js_composer"),
						'group' => __('Icons', 'js_composer')
					),
					array(
						"type" => "iconpicker",
						"heading" => esc_html__("Icon", "js_composer"),
						"param_name" => "icon_steadysets",
						"settings" => array('type' => 'steadysets', 'emptyIcon' => false, "iconsPerPage" => 240),
						"dependency" => array('element' => "icon_family", 'value' => 'steadysets'),
						"description" => esc_html__("Select icon from library.", "js_composer"),
						'group' => __('Icons', 'js_composer')
					),
					array(
						'type' => 'dropdown',
						'heading' => esc_html__( 'Icon Position', 'js_composer' ),
						'param_name' => 'icon_position',
						'value' => array(
							esc_html__( 'None', 'js_composer' ) => 'none',
							esc_html__( 'Above heading', 'js_composer' ) => 'style-1',
							esc_html__( 'Below heading', 'js_composer' ) => 'style-2',
						),
						'description' => esc_html__( 'Select icon position.', 'js_composer' ),
						'group' => __('Icons', 'js_composer')
					),
					array(
						"type" => "textfield",
						"heading" => esc_html__("Icon Size", "js_composer"),
						"param_name" => "icon_size",
						"dependency" => array('element' => "icon_family", 'value' => array('fontawesome', 'iconsmind', 'linea', 'steadysets', 'linecons')),
						"description" => esc_html__("Don't include \"px\" in your string. e.g. 40", "js_composer"),
						'group' => __('Icons', 'js_composer')
					),
					array(
						"type" => "dropdown",
						"class" => "",
						'save_always' => true,
						"heading" => esc_html__("Image Loading", "salient-core"),
						"param_name" => "image_loading",
						"value" => array(
							"Default" => "default",
							"Lazy Load" => "lazy-load",
						),
						"description" => esc_html__("Determine whether to load the image on page load or to use a lazy load method for higher performance.", "salient-core"),
						'std' => 'default',
						'group' => __('General', 'js_composer')
					),
					array(
						'type' => 'textfield',
						'heading' => esc_html__('Image size', 'js_composer'),
						'param_name' => 'img_size',
						'value' => 'full',
						'description' => esc_html__('Enter image size (Example: "thumbnail", "medium", "large", "full" or other sizes defined by theme). Alternatively enter size in pixels (Example: 200x100 (Width x Height)).', 'js_composer'),
						'group' => __('General', 'js_composer')
					),
					vcadd_css_animation(),
					array(
						"type" => "textfield",
						"heading" => esc_html__("Animation Delay", "salient-core"),
						"param_name" => "delay",
						"description" => esc_html__("Enter delay (in milliseconds) if needed e.g. 150. This parameter comes in handy when creating the animate in \"one by one\" effect.", "salient-core"),
						'group' => __('General', 'js_composer')
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
						'type' => 'dropdown',
						'heading' => esc_html__( 'Content Padding', 'js_composer' ),
						'param_name' => 'content_padding',
						'value' => array(
							esc_html__( 'Default', 'js_composer' ) => 'default',
							esc_html__( 'Padding 0', 'js_composer' ) => 'p-0',
							esc_html__( 'Padding 1', 'js_composer' ) => 'p-1',
							esc_html__( 'Padding 2', 'js_composer' ) => 'p-2',
							esc_html__( 'Padding 3', 'js_composer' ) => 'p-3',
							esc_html__( 'Padding 4', 'js_composer' ) => 'p-4',
							esc_html__( 'Padding 5', 'js_composer' ) => 'p-5',
						),
						'description' => esc_html__( 'Select heading font size', 'js_composer' ),
						'group' => __('Design Options', 'js_composer')
					),
					array(
						'type' => 'dropdown',
						'heading' => esc_html__( 'Content Margin', 'js_composer' ),
						'param_name' => 'content_margin',
						'value' => array(
							esc_html__( 'Default', 'js_composer' ) => 'default',
							esc_html__( 'Margin 0', 'js_composer' ) => 'm-0',
							esc_html__( 'Margin 1', 'js_composer' ) => 'm-1',
							esc_html__( 'Margin 2', 'js_composer' ) => 'm-2',
							esc_html__( 'Margin 3', 'js_composer' ) => 'm-3',
							esc_html__( 'Margin 4', 'js_composer' ) => 'm-4',
							esc_html__( 'Margin 5', 'js_composer' ) => 'm-5',
						),
						'description' => esc_html__( 'Select heading font size', 'js_composer' ),
						'group' => __('Design Options', 'js_composer')
					),
					array(
						'type' => 'animation_style',
						'heading' => esc_html__( 'Initial loading animation', 'js_composer' ),
						'param_name' => 'initial_loading_animation',
						'value' => '',
						"admin_label" => true,
						'description' => esc_html__( 'Select initial loading animation for grid element.', 'js_composer' ),
						'group' => esc_html__('Design Options', 'js_composer'),
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

			// INIT
			$has_dimension_data = false;
			$image_srcset = null;
			$image_width  = '100';
			$image_height = '100';
			$img_class = '';
			$image_src = wp_get_attachment_image_src($atts['bgimg'], $atts['img_size'])[0];
			$image_meta = wp_get_attachment_metadata($atts['bgimg']);
			$image_loading = isset($atts['image_loading']) ? $atts['image_loading'] : '';
			$parsed_animation = str_replace(" ","-",$atts['css_animation']);
			$theme = isset($atts["theme"]) ? ' lift-theme-'. $atts["theme"] : '';
			$css = isset($atts["css"]) ? $atts["css"] : '';
			$delay = isset($atts['delay']) ? $atts['delay'] : '';
			$title = isset($atts['title']) ? $atts['title'] : '';
			$link = isset($atts['link']) ? $atts['link'] : '';
			$desc_color = isset($atts['desc_color']) ? $atts['desc_color'] : '';
			$desc_font_size = isset($atts['desc_font_size']) ? $atts['desc_font_size'] : '';
			$font_size = isset($atts['font_size']) ? $atts['font_size'] : '';
			$desc_line_height = isset($atts['desc_line_height']) ? $atts['desc_line_height'] : '';
			$line_height = isset($atts['line_height']) ? $atts['line_height'] : '';
			$add_button = isset($atts['add_button']) ? true : false;
			$add_box_button = isset($atts['add_box_button']) ? true : false;
			$attribute = isset($atts['el_attribute']) ? ' ' . $atts['el_attribute'] : '';
			$font_container_data = isset($atts['font_container']) ? $atts['font_container'] : '';
			$google_fonts_data = isset($atts['google_fonts']) ? $atts['google_fonts'] : '';
			$icon_fontawesome = isset($atts['icon_fontawesome']) ? $atts['icon_fontawesome'] : '';
			$icon_iconsmind = isset($atts['icon_iconsmind']) ? $atts['icon_iconsmind'] : '';
			$icon_linea = isset($atts['icon_linea']) ? $atts['icon_linea'] : '';
			$icon_linecons = isset($atts['icon_linecons']) ? $atts['icon_linecons'] : '';
			$icon_steadysets = isset($atts['icon_steadysets']) ? $atts['icon_steadysets'] : '';
			$icon_position = isset($atts['icon_position']) ? $atts['icon_position'] : '';
			$content_padding = isset($atts['content_padding']) ? $atts['content_padding'] : '';
			$content_margin = isset($atts['content_margin']) ? $atts['content_margin'] : '';
			$initial_loading_animation = isset($atts['initial_loading_animation']) ? ' wpb_animate_when_almost_visible wpb_' . $atts['initial_loading_animation']. ' ' . $atts['initial_loading_animation'] : '';
			$icon_size = isset($atts['icon_size']) ? $atts['icon_size'] : '';
			// SET VALUE
			$css_animation = isset($atts['css_animation']) ? ' wpb_animate_when_almost_visible wpb_' . $atts['css_animation'] . ' ' . $atts['css_animation'] : '';
			$cssname = vc_shortcode_custom_css_class($css, '.');
			$block_id = isset($atts['el_id']) ? ' id="'. $atts['el_id'].'"' : '';
			$csscontent = '';
			$css_class = apply_filters(VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class($css, ' '), $this->settings['base'], $atts);
			$applyHeading = $this->applyHeading($font_container_data,$title,$link,$line_height,$font_size);
			$applyDesc = $this->applyDesc($desc_color,$desc_line_height);
			$applyClass = $this->applyClass($desc_font_size);
			$applyPadding = $this->applyClass($content_padding);
			$applyMargin = $this->applyClass($content_margin);
			$applyGoogleFont = $this->applyGoogleFont($google_fonts_data);
			$getGoogleFont = $this->getGoogleFont($google_fonts_data);
			$textAlign = $this->textAlign($font_container_data);
			if ($icon_fontawesome || $icon_iconsmind || $icon_linea || $icon_linecons || $icon_steadysets) {
				$icon = $icon_fontawesome.$icon_iconsmind.$icon_linea.$icon_linecons.$icon_steadysets;
			}
			
			// Attributes applied to img.
			$margin_style_attr = '';
			$wrap_image_attrs_escaped  = 'data-max-width="100%" ';
			$wrap_image_attrs_escaped .= 'data-max-width-mobile="100%" ';
			$wrap_image_attrs_escaped .= 'data-animation="'.esc_attr(strtolower($parsed_animation)).'" ';
			$wrap_image_attrs_escaped .= $margin_style_attr;
			if( function_exists('nectar_el_dynamic_classnames') ) {
				$dynamic_el_styles = nectar_el_dynamic_classnames('image_with_animation', $atts);
			} else {
				$dynamic_el_styles = '';
			}
			if (function_exists('wp_get_attachment_image_srcset')) {

				$image_srcset_values = wp_get_attachment_image_srcset($atts['bgimg'], $atts['img_size']);
				if ($image_srcset_values) {

					if( 'lazy-load' === $image_loading ) {
						$image_srcset = 'data-nectar-img-srcset="';
					} else {
						$image_srcset = 'srcset="';
					}
					$image_srcset .= $image_srcset_values;
					$image_srcset .= '" sizes="(min-width: 1450px) 75vw, (min-width: 1000px) 85vw, 100vw"';
				}
			}
			if (isset($image_meta['width']) && !empty($image_meta['width'])) {
				$image_width = $image_meta['width'];
			}
			if (isset($image_meta['height']) && !empty($image_meta['height'])) {
				$image_height = $image_meta['height'];
			}
			$wp_img_alt_tag = get_post_meta($atts['bgimg'], '_wp_attachment_image_alt', true);
			if (!empty($wp_img_alt_tag)) {
				$alt_tag = $wp_img_alt_tag;
			}
			$image_url = (isset($image_src)) ? $image_src : '';
			if (!empty($image_meta['width']) && !empty($image_meta['height'])) {
				$has_dimension_data = true;
			}
			$image_attrs_escaped = 'data-delay="' . esc_attr($delay) . '" ';
			$image_attrs_escaped .= 'height="' . esc_attr($image_height) . '" ';
			$image_attrs_escaped .= 'width="' . esc_attr($image_width) . '" ';
			$image_attrs_escaped .= 'data-animation="' . esc_attr(strtolower($parsed_animation)) . '" ';
			if( 'lazy-load' === $image_loading && true === $has_dimension_data ) {
				$img_class .= ' nectar-lazy';
				$image_attrs_escaped .= 'data-nectar-img-src="' . esc_url($image_src) . '" ';
			} else {
				$image_attrs_escaped .= 'src="' . esc_url($image_src) . '" ';
			}
			$image_attrs_escaped .= 'alt="' . esc_attr($alt_tag) . '" ';
			$image_attrs_escaped .= $image_srcset;

			// Admin
			$settings = shortcode_atts(array(
				'el_attribute' => '',
				'el_id' => '',
				'el_class' => '',
			), $atts);
			extract($settings);
			// FrontEnd
			$output = $css ? '<style>' . $css . '</style>' : '';
			
			if($atts["theme"] === 'style-1') {
				include 'layout/style-1.php';
			} 
			else if($atts["theme"] === 'style-3') {
				include 'layout/style-3.php';
			} 
			else if($atts["theme"] === 'style-4') {
				include 'layout/style-4.php';
			} 
			else {
				include 'layout/default.php';
			}

			// DEV
			// var_dump($cssname);

			return apply_filters(
				'lift_' . $this->name . '_output',
				$output,
				$content,
				$settings
			);
		}
	}
}
new liftVC_Addons_BoxInfo;
