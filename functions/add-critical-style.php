<?php

/**
 * Add Critical CSS
 */
function add_critical_style() {
	?>
		<!-- Critical CSS -->
		<style media="screen">
			<?php get_template_part('includes/critical' ); ?>
		</style>
	<?php
}
add_action( 'wp_head', 'add_critical_style', -200 );
