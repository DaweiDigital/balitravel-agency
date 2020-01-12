<?php

/**
 * Disable author archives
 */
function disable_author_archive() {
	if ( is_author() ) {
		global $wp_query;
		$wp_query->set_404();
		status_header(404);

	} else {
		redirect_canonical();
	}
}
remove_filter( 'template_redirect', 'redirect_canonical' );
add_action( 'template_redirect', 'disable_author_archive' );
