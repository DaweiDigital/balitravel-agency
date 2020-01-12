<?php


/**
 * Při vyhledávání hledej pouze v postech, nikoliv ve stránkách
 */
function search_filter($query) {
	if ($query->is_search) {
		$query->set('post_type', 'post');
		$query->set('post_type', array('post','attachment')); // Vyhleádávní i v Media knihovně
	}
	return $query;
}
add_filter('pre_get_posts','search_filter');