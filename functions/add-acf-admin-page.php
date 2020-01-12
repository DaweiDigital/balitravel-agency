<?php

/**
 * ACF Admin Options
 */
if ( function_exists('acf_add_options_page') ) {
	acf_add_options_page(array(
		'page_title' => 'Slidery',
		'menu_title' => 'Slidery',
		'menu_slug' => 'theme-general-settings',
		'capability' => 'edit_posts',
		'redirect' => true,
		'update_button' => __( 'Aktualizovat', 'acf' ),
		'updated_message' => __( 'Aktualizováno', 'acf' ),
		'icon_url' => 'dashicons-images-alt',
		'position' => '42'
	));

	// acf_add_options_sub_page(array(
	// 	'page_title' 	=> 'Slidery',
	// 	'menu_title'	=> 'Slidery',
	// 	'parent_slug'	=> 'theme-general-settings',
	// ));
}
