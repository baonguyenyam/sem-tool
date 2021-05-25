<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

class LIFT_Helpers extends WPBakeryShortCode {

	public function applyQuery($query = null,$offset=0) {
		$paged = get_query_var('paged') ? get_query_var('paged') : 1;
		$size = -1;
		$order_by = 'ID';
		$order = 'DESC';
		$post_type = 'post';
		foreach ( explode("|",$query) as $key => $value ) {
			if ( preg_match( '/size/', $value ) ) {
				$size = explode(":",$value)[1];
			}
			if ( preg_match( '/order_by/', $value ) ) {
				$order_by = explode(":",$value)[1];
			}
			if ( preg_match( '/order/', $value ) ) {
				$order = explode(":",$value)[1];
			}
			if ( preg_match( '/post_type/', $value ) ) {
				$post_type = explode(":",$value)[1];
			}
			if ( preg_match( '/ignore_sticky_posts/', $value ) ) {
				$ignore_sticky_posts = explode(":",$value)[1];
			}
			if ( preg_match( '/authors/', $value ) ) {
				$authors = explode(":",$value)[1];
			}
			if ( preg_match( '/categories/', $value ) ) {
				$categories = explode(":",$value)[1];
			}
			if ( preg_match( '/tags/', $value ) ) {
				$tags = explode(":",$value)[1];
			}
			if ( preg_match( '/tax_query/', $value ) ) {
				$tax_query = explode(":",$value)[1];
			}
		}

		$qu = (object) array(
			'post_type'=>  explode(',', $post_type),
			'orderby'    => $order_by,
			'post_status' => 'publish',
			'order'    => $order,
			'posts_per_page' => intval($size),
			'offset' => intval($offset),
			'paged' => $paged,
			);
		if($ignore_sticky_posts) {
			$qu->ignore_sticky_posts = intval($ignore_sticky_posts);
		}
		if($categories) {
			$qu->author__in = explode(',', $authors);
		}
		if($categories) {
			$qu->category__in = explode(',', $categories);
		}
		if($categories) {
			$qu->tag__in = explode(',', $tags);
		}
		return $qu;
	}
	public function applyHeading($font_container_data, $title = null, $link = null, $line_height= null, $font_size= null) {
		$styles = $initStyles = '';
		$tag = 'h2';
		foreach ( explode("|",$font_container_data) as $key => $value ) {
			if ( preg_match( '/tag/', $value ) ) {
				$tag = ''.explode(":",$value)[1];
			}
			if ( preg_match( '/color/', $value ) ) {
				$color = 'color:'.urldecode(explode(":",$value)[1]).';';
			}
		}
		if($line_height) {
			$pattern = '/^(\d*(?:\.\d+)?)\s*(px|\%|in|cm|mm|em|rem|ex|pt|pc|vw|vh|vmin|vmax)?$/';
			preg_match( $pattern, $line_height, $matches );
			$lineheight = isset( $matches[2] ) ? 'line-height:'.$matches[0].';' : 'line-height:'.$matches[0].';';	
		}
		if($color) {
			$initStyles = ' style="'.$color.''.$lineheight.'"';
		}
		if($font_size) {
			$fontsize = ' '.$font_size.'';
		}
		$url = $this->extractLink($link,$title,false,$initStyles,false,false,$fontsize);
		if($url) {
			$styles = '<'.$tag.' class="lift-title'.$fontsize.'"'.$initStyles.'>' . $url . '</'.$tag.'>';
		} else {
			$styles = '<'.$tag.' class="lift-title"'.$fontsize.''.$initStyles.'>' .  $title . '</'.$tag.'>';
		}
		return $styles;
	}
	public function applyDesc($desc_color = null, $desc_line_height = null) {
		$styles = '';
		if($desc_color) {
			$color = 'color:'.$desc_color.';';
		}
		if($desc_line_height) {
			$pattern = '/^(\d*(?:\.\d+)?)\s*(px|\%|in|cm|mm|em|rem|ex|pt|pc|vw|vh|vmin|vmax)?$/';
			preg_match( $pattern, $desc_line_height, $matches );
			$lineheight = isset( $matches[2] ) ? 'line-height:'.$matches[0].';' : 'line-height:'.$matches[0].';';	
		}
		if($color || $lineheight) {
			$styles = ' style="'.$color.''.$lineheight.'"';
		}
		return $styles;
	}
	public function applyClass($class = null) {
		$styles = '';
		if($class) {
			$styles = ' '.$class.'';
		}
		return $styles;
	}
	public function applyGoogleFont($font = null) {
		$styles = '';
		if($font) {
			foreach ( explode("|",$font) as $key => $value ) {
				if ( preg_match( '/font_family/', $value ) ) {
					$font_family = urldecode(explode(":",$value)[1]);
				}
				if ( preg_match( '/font_style/', $value ) ) {
					$font_style = urldecode(explode(":",$value)[1]);
				}
			}
			wp_enqueue_style( 'lift_font_family_' . vc_build_safe_css_class( $font_family ), 'https://fonts.googleapis.com/css?family=' . $font_family , [], WPB_VC_VERSION );
			$styles = ' '.$font.'';
		}
		return $styles;
	}
	public function getGoogleFont($font = null) {
		$styles = '';
		if($font) {
			foreach ( explode("|",$font) as $key => $value ) {
				if ( preg_match( '/font_family/', $value ) ) {
					$font_family = urldecode(explode(":",$value)[1]);
				}
				if ( preg_match( '/font_style/', $value ) ) {
					$font_style = urldecode(explode(":",$value)[1]);
				}
			}
			$newF = explode(":",$font_family);
			$newS = explode(":",$font_style);
			if($newF[0]) {
				$ff = 'font-family:'.$newF[0].';';
			}
			if($newS[1]) {
				$fw = 'font-weight:'.$newS[1].';';
			}
			if($newS[2]) {
				$fs = 'font-style:'.$newS[2].';';
			}
			
			if($ff || $fs || $fw) {
				$styles = ' style="'.$ff.''.$fw.''.$fs.'"';
			}
		}
		return $styles;
	}
	public function applyIcon($icon = null, $icon_size = null) {
		$styles = $doIcon = $fontsize = '';
		if($icon_size) {
			$pattern = '/^(\d*(?:\.\d+)?)\s*(px|\%|in|cm|mm|em|rem|ex|pt|pc|vw|vh|vmin|vmax)?$/';
			preg_match( $pattern, $icon_size, $matches );
			$fontsize = isset( $matches[2] ) ? ' style="font-size:'.$matches[0].';"' : ' style="font-size:'.$matches[0].'px;"';
		}
		if($icon) {
			$styles = ' class="'.$icon.'"';
			$doIcon = '<i'.$styles.''.$fontsize.'></i>';
		}
		return $doIcon;
	}
	public function textAlign($font_container_data) {
		$align = '';
		foreach ( explode("|",$font_container_data) as $key => $value ) {
			if ( preg_match( '/text_align/', $value ) ) {
				$align = ' text-'.explode(":",$value)[1].'';
			}
		}
		return $align;
	}
	public function extractLink($link, $title, $settile = true, $initStyles = null,$removeTitle = false,$btn = false, $fontsize) {
		$URL = $returnURL = $target = $rel = '';
		foreach ( explode("|",$link) as $key => $value ) {
			if ( preg_match( '/url/', $value ) ) {
				$URL = urldecode(explode(":",$value)[1]);
			}
			if ( preg_match( '/title/', $value ) && $settile) {
				$title = urldecode(explode(":",$value)[1]);
			}
			if ( preg_match( '/target/', $value )) {
				$target = ' target="'. explode(":",$value)[1].'"';
			}
			if ( preg_match( '/rel/', $value )) {
				$rel = ' rel="'. explode(":",$value)[1].'"';
			}
		}
		$btn ? $btn = ' btn btn-primary' : '';
		if($removeTitle) {
			$returnURL = '<a class="lift-title-link'.$fontsize.$btn.' hold-click" href="'.$URL.'"'.$target.''.$rel.''.$initStyles.'></a>';
		} else {
			$returnURL = '<a class="lift-title-link'.$fontsize.$btn.'" href="'.$URL.'"'.$target.''.$rel.''.$initStyles.'>'.$title.'</a>';
		}
		return $returnURL;
	}

}
