<?php


/**
 * Přesměrovávej Custom Post Type na úvodní stranu.
 */
function cpt_redirect() {
	$queried_post_type = get_query_var( 'post_type' );
	if ( is_singular( 'investice' ) ) {
		wp_redirect( home_url(), 301 );
		exit;
	}
}

add_action( 'template_redirect', 'cpt_redirect' );
