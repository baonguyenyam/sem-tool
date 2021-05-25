<?php

function vcadd_css_animation( $label = true ) {
    $data = array(
        'type' => 'animation_style',
        'heading' => esc_html__( 'CSS Animation', 'js_composer' ),
        'param_name' => 'css_animation',
        'admin_label' => $label,
        'value' => '',
        'settings' => array(
            'type' => 'in',
            'custom' => array(
                array(
                    'label' => esc_html__( 'Default', 'js_composer' ),
                    'values' => array(
                        esc_html__( 'Top to bottom', 'js_composer' ) => 'top-to-bottom',
                        esc_html__( 'Bottom to top', 'js_composer' ) => 'bottom-to-top',
                        esc_html__( 'Left to right', 'js_composer' ) => 'left-to-right',
                        esc_html__( 'Right to left', 'js_composer' ) => 'right-to-left',
                        esc_html__( 'Appear from center', 'js_composer' ) => 'appear',
                    ),
                ),
            ),
        ),
        'description' => esc_html__( 'Select type of animation for element to be animated when it "enters" the browsers viewport (Note: works only in modern browsers).', 'js_composer' ),
        'group' => __('General', 'js_composer')
    );

    return apply_filters( 'vcadd_css_animation', $data, $label );
}

vc_add_shortcode_param( 'lift_group_header', 'lift_header' );
function lift_header( $settings, $value ) {
    
    return '<input name="' . $settings['param_name'] . '" class="nguyennguyen wpb_vc_param_value wpb-textinput ' . $settings['param_name'] . ' ' . $settings['type'] . '" type="hidden" value=""/>';

}