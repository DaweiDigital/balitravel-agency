<?php


/**
 * Pomocí funkce zobraz jako CSS background-image obrázek
 * <?php post_header_image( 'page-header-image' ); ?>
 */
function post_header_image( $post_image_thumbnail ) {
	$post_image_id = get_post_thumbnail_id($post_to_use->ID);
	if ( $post_image_id ) {
		$thumbnail = wp_get_attachment_image_src( $post_image_id, $post_image_thumbnail, false);
		if ($thumbnail) (string)$thumbnail = $thumbnail[0];
	}
	if ( has_post_thumbnail() ) {
		echo "style='background-image: url($thumbnail)'";
	}
}
