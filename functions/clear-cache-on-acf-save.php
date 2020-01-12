<?php

/**
 * Clear Cache on ACF save
 */
function clear_cache_on_acf_save( $post_id ) {
	if ( $post_id == 'options' ) {
		wp_cache_clear_cache();
	}
}
add_action( 'acf/save_post', 'clear_cache_on_acf_save' );
