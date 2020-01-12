<?php


/**
 * Na úvodní stránce modifikuj query_post.
 *
 * Takto by se správně mělo řešit omezování queries na stránkách.
 * http://wordpress.stackexchange.com/questions/85653/pagination-with-custom-post-types-results-in-404-issues
 */
function my_home_category( $query ) {
	if ( $query->is_home() && $query->is_main_query() ) {
		$query->set( 'posts_per_page', '1' );
	}
}
add_action( 'pre_get_posts', 'my_home_category' );