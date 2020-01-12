<?php


/**
 * Polylang jazykové stringy
 *
 * Použití např. <?php pll_e( 'Z naší společnosti' ); ?>
 */
// pll_register_string( 'Enquiry form', 'Enquiry form' );





/**
 * Přidej Polylang jazykovou mutaci do body class
 */
add_filter('body_class', 'my_custom_body_class', 10, 2);
function my_custom_body_class( $classes ) {
	$classes[] = pll_current_language();
	return $classes;
}





/**
 * Funkce pro Polylang page link (obdoba samotné get_page_link() )
 */
function pll_get_page_link( $page_id ) {
	$tr_id = pll_get_post( $page_id ); // Translate the post in the current language
	echo get_page_link( $tr_id ); // Displays the link
}
