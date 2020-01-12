<?php


/**
 * Jako výchozí zobrazuj v galerii obrázek, ne stránku s přílohou.
 */
// add_filter( 'shortcode_atts_gallery',
// 	function( $out ){
// 		$out['link'] = 'file';
// 		return $out;
// 	}
// );
function my_gallery_shortcode( $atts ) {
	$atts['link'] = 'file';
	return gallery_shortcode( $atts );
}
