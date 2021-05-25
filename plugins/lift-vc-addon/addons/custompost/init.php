<?php

/**
 * the WPBakery Visual Composer plugin by Nguyen Pham
 * https://developer.wordpress.org/reference/classes/wp_query/
 * https://visualcomposer.com/help/api/
 * https://kb.wpbakery.com/docs/developers-how-tos/add-design-options-tab-with-css-editor-to-your-element/
 * https://www.wpelixir.com/how-to-customize-default-elements-visual-composer/
 *
 */

if (!defined('ABSPATH')) {
	die('Silly human what are you doing here');
}


if (!class_exists('liftVC_Addons_CustomPost')) {

	class liftVC_Addons_CustomPost extends LIFT_Helpers
	{

		public $name = 'custompost';
		public $pNicename = 'LIFT Custom Posts';

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
						"type" => "loop",
						"holder" => "div",
						"class" => "",
						"heading" => __( "Field Label", "js_composer" ),
						"param_name" => "field_name",
						"value" => __( "", "js_composer" ),
						"description" => __( "Select post types to populate posts from. Note: If no post type is selected, WordPress will use default Post value.", "js_composer" ),
						'admin_label' => true,
						'group' => $this->pNicename,
					),
					array(
						'type' => 'dropdown',
						'heading' => esc_html__( 'Offset', 'js_composer' ),
						'param_name' => 'offset',
						'value' => array(
							esc_html__( 'Default', 'js_composer' ) => '0',
							esc_html__( 'Offset 1', 'js_composer' ) => '1',
							esc_html__( 'Offset 2', 'js_composer' ) => '2',
							esc_html__( 'Offset 3', 'js_composer' ) => '3',
							esc_html__( 'Offset 4', 'js_composer' ) => '4',
							esc_html__( 'Offset 5', 'js_composer' ) => '5',
							esc_html__( 'Offset 6', 'js_composer' ) => '6',
							esc_html__( 'Offset 7', 'js_composer' ) => '7',
							esc_html__( 'Offset 8', 'js_composer' ) => '8',
							esc_html__( 'Offset 9', 'js_composer' ) => '9',
							esc_html__( 'Offset 10', 'js_composer' ) => '10',
							esc_html__( 'Offset 11', 'js_composer' ) => '11',
							esc_html__( 'Offset 12', 'js_composer' ) => '12',
							esc_html__( 'Offset 13', 'js_composer' ) => '13',
							esc_html__( 'Offset 14', 'js_composer' ) => '14',
							esc_html__( 'Offset 15', 'js_composer' ) => '15',
							esc_html__( 'Offset 16', 'js_composer' ) => '16',
							esc_html__( 'Offset 17', 'js_composer' ) => '17',
							esc_html__( 'Offset 18', 'js_composer' ) => '18',
							esc_html__( 'Offset 19', 'js_composer' ) => '19',
							esc_html__( 'Offset 20', 'js_composer' ) => '20',
						),
						'description' => esc_html__( 'Offset posts', 'js_composer' ),
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
						"admin_label" => false,
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

			$field_name = isset($atts['field_name']) ? ' ' . $atts['field_name'] : '';
			$offset = isset($atts['offset']) ? ' ' . $atts['offset'] : '';
			$result = new WP_Query($this->applyQuery($field_name,$offset));

			// var_dump($result);

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

			// foreach ($result->posts as &$value) {
			// 	var_dump($value->post_name);
			// }

			// https://wordpress.stackexchange.com/questions/120407/how-to-fix-pagination-for-custom-loops
			// foreach ($result->posts as &$value) {
			// 	var_dump($value->post_name);
			// }

			if($result->have_posts()) {

				// while($result->have_posts()):$result->the_post();
				// 	// var_dump($result->have_posts());
				// //Loop goes here...
				// endwhile;
				//support for page-navi plugin, please refer readme.txt for further instructions
				if ( function_exists('wp_pagenavi') )
				{
					wp_pagenavi();
				}
				else if ( get_next_posts_link() || get_previous_posts_link() )
				{
					?>
					<div class="wp-navigation clearfix">
						<div class="alignleft"><?php next_posts_link('&laquo; Older Entries'); ?></div>
						<div class="alignright"><?php previous_posts_link('Newer Entries &raquo;'); ?></div>
					</div>
			<?php } //if wp_pagenavi
		}


        // echo paginate_links( array(
        //     'base'         => str_replace( 999999999, '%#%', esc_url( get_pagenum_link( 999999999 ) ) ),
        //     'total'        => 10,
        //     'current'      => max( 1, get_query_var( 'paged' ) ),
        //     'format'       => '?paged=%#%',
        //     'show_all'     => false,
        //     'type'         => 'plain',
        //     'end_size'     => 2,
        //     'mid_size'     => 1,
        //     'prev_next'    => true,
        //     'prev_text'    => sprintf( '<i></i> %1$s', __( 'Newer Posts', 'text-domain' ) ),
        //     'next_text'    => sprintf( '%1$s <i></i>', __( 'Older Posts', 'text-domain' ) ),
        //     'add_args'     => false,
        //     'add_fragment' => '',
        // ) );

			$output .= '</section><!-- .lift-' . $this->name . ' -->';

			return apply_filters(
				'lift_' . $this->name . '_output',
				$output,
				$content,
				$settings
			);
		}
	}
}
new liftVC_Addons_CustomPost;
