<?php


/**
 * Omezení délky excerptu
 */
function wpdocs_custom_excerpt_length( $length ) {
	return 22;
}
add_filter( 'excerpt_length', 'wpdocs_custom_excerpt_length', 999 );
