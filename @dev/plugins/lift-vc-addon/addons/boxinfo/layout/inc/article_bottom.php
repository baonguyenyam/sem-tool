<?php
$output .= $content ? '<div class="lift-content'.$applyClass.'"><p>' . do_shortcode($content) . '</p></div>' : null;
$output .= $add_button ? '<p class="lift-button">' . $this->extractLink($link, $title,false,false,true,$btn_font_size) . '</p>' : null;
$output .= '</article>';