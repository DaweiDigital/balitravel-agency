<?php


/**
 * Vlastní Tiny MCE
 */
function my_mce_buttons_2( $buttons ) {
	array_unshift( $buttons, 'styleselect' );
	return $buttons;
}
add_filter( 'mce_buttons_2', 'my_mce_buttons_2' );

function my_mce_before_init_insert_formats( $init_array ) {
	$style_formats = array(
		array(
			'title' => 'Oranžové tlačítko',
			'inline' => 'span',
			'classes' => 'button button-orange',
			'wrapper' => false,

		),
		array(
			'title' => 'Blokový text',
			'block' => 'div',
			'classes' => 'block-text',
			'wrapper' => true,
		),
	);
	$init_array['style_formats'] = json_encode( $style_formats );
	return $init_array;

}
add_filter( 'tiny_mce_before_init', 'my_mce_before_init_insert_formats' );