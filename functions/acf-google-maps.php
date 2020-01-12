<?php

/**
 * ACF google map API KEY
 */
function my_acf_google_map_api( $api ){
	
	$api['key'] = 'xxx';
	
	return $api;
	
}

add_filter('acf/fields/google_map/api', 'my_acf_google_map_api');
