<?php

/**
 * Remove Type Attribute
 */
add_filter('style_loader_tag', 'myplugin_remove_type_attr', 10, 2);
add_filter('script_loader_tag', 'myplugin_remove_type_attr', 10, 2);

function myplugin_remove_type_attr($tag, $handle) {
	return preg_replace( "/type=['\"]text\/(javascript|css)['\"]/", '', $tag );
}
