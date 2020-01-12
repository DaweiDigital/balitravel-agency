<?php

/**
 * Update jQuery
 */
function load_jquery() {
	wp_deregister_script( 'jquery' );
	$link = 'http://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js';
	$try_url = @fopen( $link, 'r' );
	if ( $try_url !== false ) {
		wp_register_script('jquery', '//ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js', null, null, true); // Load CDN jQuery
	}
	else {
		wp_register_script('jquery', get_template_directory_uri().'/assets/js/jquery.min.js', null, null, true); // Load local jQuery
	}
	wp_enqueue_script('jquery');
}
add_action('wp_enqueue_scripts', 'load_jquery');
