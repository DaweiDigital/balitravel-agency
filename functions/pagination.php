<?php


/**
 * Funkce pro jednoduché stránkování
 */
function pagination() {
	global $wp_query;

	if ( $wp_query->max_num_pages > 1 ) : ?>
		<nav class="pagination clearfix">
			<div class="page-previous">
				<?php next_posts_link( __( '<i class="fa fa-chevron-left"></i> Starší příspěvky' ) ); ?></div>
			<div class="page-next">
				<?php previous_posts_link( __( 'Novější příspěvky <i class="fa fa-chevron-right"></i>' ) ); ?></div>
		</nav>
	<?php endif;
}
