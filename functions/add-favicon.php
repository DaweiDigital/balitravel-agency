<?php

/**
 * Add Favicon
 */
function add_favicon() {
	?>
		<!-- Ico -->
		<link rel="apple-touch-icon" sizes="180x180" href="<?php echo network_home_url() ?>/apple-touch-icon.png">
		<link rel="icon" type="image/png" sizes="32x32" href="<?php echo network_home_url() ?>/favicon-32x32.png">
		<?php /* <link rel="icon" type="image/png" sizes="16x16" href="<?php echo network_home_url() ?>/favicon-16x16.png"> */ ?>
		<link rel="manifest" href="<?php echo network_home_url() ?>/site.webmanifest">
		<link rel="mask-icon" href="/safari-pinned-tab.svg" color="#009fe3">
		<meta name="msapplication-TileColor" content="#ffffff">
		<meta name="theme-color" content="#ffffff">
	<?php
}
add_action( 'wp_head', 'add_favicon', -100 );
