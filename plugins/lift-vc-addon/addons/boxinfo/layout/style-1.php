<?php 

$output .= '<section'. $block_id .' class="lift-elements lift-' . $this->name . $theme . $css_class .''.($add_box_button ? ' lift-hold-click' : '').$applyPadding.$applyMargin.$initial_loading_animation.'"' . str_replace('``', '', $attribute) . '>';
$output .= '<article class="lift-ctn'.$textAlign.'"'.$getGoogleFont.'>';
$icon_position && $icon_position === 'style-1' ? include 'inc/icon.php' : null;
$output .= $title ? $applyHeading : null;
$icon_position && $icon_position === 'style-2' ? include 'inc/icon.php' : null;
$output .= '<figure class="img-with-aniamtion-wrap'.$dynamic_el_styles. $css_animation .$textAlign.'" '.$wrap_image_attrs_escaped.'>
<img class="img-with-animation1 skip-lazy '.esc_attr($img_class).'" '.$image_attrs_escaped.' />
<figcaption></figcaption>
</figure>';
$output .= $content ? '<div class="lift-content'.$applyClass.'"'.$applyDesc.'><p>' . do_shortcode($content) . '</p></div>' : null;
$output .= $add_button ? '<p class="lift-button mt-2">' . $this->extractLink($link, $title,true,null,false,true,null) . '</p>' : null;
$output .= '</article>';
$output .= $add_box_button ? '' . $this->extractLink($link, $title,false,null,true,false,null) . '' : null;
$output .= '</section><!-- .lift-' . $this->name . ' -->';