<?php


/**
 * Extended Pagination
 * @source: http://www.wpbeginner.com/wp-themes/how-to-add-numeric-pagination-in-your-wordpress-theme/
 */

function pagination_extended() {

	if( is_singular() )
		return;

	global $wp_query;

	/** Stop execution if there's only 1 page */
	if( $wp_query->max_num_pages <= 1 )
		return;

	$paged = get_query_var( 'paged' ) ? absint( get_query_var( 'paged' ) ) : 1;
	$max   = intval( $wp_query->max_num_pages );

	/**	Add current page to the array */
	if ( $paged >= 1 )
		$links[] = $paged;

	/**	Add the pages around the current page to the array */
	if ( $paged >= 3 ) {
		$links[] = $paged - 1;
		$links[] = $paged - 2;
	}

	if ( ( $paged + 2 ) <= $max ) {
		$links[] = $paged + 2;
		$links[] = $paged + 1;
	}

	echo '<div class="pagination-extended"><ul class="pagination-extended-list">' . "\n";

	/**	Previous Post Link */
	if ( get_previous_posts_link() )
		printf( '<li class="pagination-extended-item pagination-extended-previous">%s</li>' . "\n", get_previous_posts_link( __( 'Předchozí', 'template' ) ) );

	/**	Link to first page, plus ellipses if necessary */
	if ( ! in_array( 1, $links ) ) {
		$class = 1 == $paged ? ' class="pagination-extended-item pagination-extended-active"' : '';

		printf( '<li%s class="pagination-extended-item"><a class="pagination-extended-link" href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( 1 ) ), '1' );

		if ( ! in_array( 2, $links ) )
			echo '<li class="pagination-extended-item">…</li>';
	}

	/**	Link to current page, plus 2 pages in either direction if necessary */
	sort( $links );
	foreach ( (array) $links as $link ) {
		$class = $paged == $link ? ' class="pagination-extended-item pagination-extended-active"' : '';
		printf( '<li%s class="pagination-extended-item"><a class="pagination-extended-link" href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $link ) ), $link );
	}

	/**	Link to last page, plus ellipses if necessary */
	if ( ! in_array( $max, $links ) ) {
		if ( ! in_array( $max - 1, $links ) )
			echo '<li class="pagination-extended-item">…</li>' . "\n";

		$class = $paged == $max ? ' class="pagination-extended-item pagination-extended-active"' : '';
		printf( '<li%s class="pagination-extended-item"><a class="pagination-extended-link" href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $max ) ), $max );
	}

	/**	Next Post Link */
	if ( get_next_posts_link() )
		printf( '<li class="pagination-extended-item pagination-extended-next">%s</li>' . "\n", get_next_posts_link( __( 'Další', 'template' ) ) );

	echo '</ul></div>' . "\n";
}
