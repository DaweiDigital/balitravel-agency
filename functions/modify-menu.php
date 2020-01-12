<?php

/**
 * Add a custom link to the end of a specific menu that uses the wp_nav_menu() function
 *
 * Source:
 * https://wpscholar.com/blog/append-items-to-wordpress-nav-menu/
 * https://isabelcastillo.com/add-menu-items-before-and-after-wp_nav_menu
 */

add_filter('wp_nav_menu_items', 'add_admin_link', 10, 2);
function add_admin_link($items, $args)
{
	if ($args->theme_location == 'main') {
		$new_item = '<li class="nav-item"><a class="nav-link" title="Admin" href="' . get_home_url() . '">Admin</a></li>';
	}

	$new_menu = $new_item . $items;
	return $new_menu;
}
