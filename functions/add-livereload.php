<?php

/**
 * Add LiveReload
 */
function add_livereload() {
	if ( substr( $_SERVER['REMOTE_ADDR'], 0, 4 ) == '127.' || $_SERVER['REMOTE_ADDR'] == '::1' ) {
		echo '<!-- LiveReload -->';
		echo '<script src="//localhost:35729/livereload.js"></script>';
	}
}
add_action( 'wp_head', 'add_livereload', 300 );
