<?php

/**
 * Disallow Robots Indexing for Dev Environment
 */
function dev_noindex() {
	if ( preg_match('/(.*).qdv.cz/', $_SERVER['SERVER_NAME'] ) ) {
		echo '<meta name="robots" content="noindex,nofollow">';
	}
}
add_action( 'wp_head', 'dev_noindex', 400 );
