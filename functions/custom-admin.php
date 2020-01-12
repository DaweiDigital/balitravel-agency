<?php


/**
 * Customizuj administraci.
 */
function my_custom_login_logo() { // login logo
	echo '
		<style type="text/css">
			h1 a {
				width: 300px !important;
				height: 75px !important;
				background-size: contain !important;
				background-image: url(/android-chrome-512x512.png) !important;
			}
		</style>
	'; }
add_action('login_head',  'my_custom_login_logo');
