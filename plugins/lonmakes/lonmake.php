<?php
/**
 * Functions file for twentyfourteen child theme
 * @package lonmakes
 *
 * Plugin Name: Lonmake Additional WordPress Features
 * Description: Creates portable widgets and shortcodes for lonmakes sites
 * Author: Lon Koenig
 * Version: 1.0
 * Author URI: //lonk.me/
 */
 
 /**
 * Wrap content in <div class="pros-cons">
 *
 */
 function lonmakes_proscons_shortcode($atts, $content = '') {
	return '<div class="pros-cons">'.do_shortcode($content)."\n</div>\n";
}
add_shortcode( 'pros_cons', 'lonmakes_proscons_shortcode' );


 /**
 * Create "Pros" or "Cons" block
 *
 */
function lonmakes_proscons_blocks_shortcode($atts, $content = '', $shortcode_name = 'pros') {
  $section_name = strtolower($shortcode_name);
  $preamble = '<div class="' . $section_name . '">'
            . '<header>' . $section_name . '</header>'
            ;
  $coda = "</div>\n";
	return $preamble . do_shortcode($content) . $coda; 
}
add_shortcode( 'pros', 'lonmakes_proscons_blocks_shortcode' );
add_shortcode( 'cons', 'lonmakes_proscons_blocks_shortcode' );
