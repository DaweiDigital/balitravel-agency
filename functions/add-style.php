<?php

/**
 * Add Style
 */
function add_style() {
	wp_enqueue_style( 'style', get_template_directory_uri().'/style.css?1d91554a39', null, null, 'screen' );
	wp_enqueue_style('google-fonts', 'https://fonts.googleapis.com/css?family=Poppins:400,500,700|Quicksand:400,500,700&display=swap', null, null, 'screen' );
}
add_action( 'wp_enqueue_scripts', 'add_style', 1 );
