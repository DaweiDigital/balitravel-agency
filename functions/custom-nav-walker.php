<?php


/**
 * Rozšiř hlavní navigace o třídy u položek a submenu
 */
class custom_walker_nav_menu extends Walker_Nav_Menu {

// Add classes to ul sub-menus
function start_lvl( &$output, $depth = 0, $args = array() ) {
	// depth dependent classes
	$indent = ( $depth > 0  ? str_repeat( "\t", $depth ) : '' ); // code indent
	$display_depth = ( $depth + 1); // because it counts the first submenu as 0
	$classes = array(
		'nav-sub-list',
		( $display_depth % 2  ? 'nav-odd' : 'nav-even' ),
		( $display_depth >=2 ? 'nav-sub-sub-list' : '' ),
		'nav-list-depth-' . $display_depth
		);
	$class_names = implode( ' ', $classes );

	// build html
	$output .= "\n" . $indent . '<ul class="' . $class_names . '">' . "\n";
}

// Add main/sub classes to li's and links
function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
	global $wp_query;
	$indent = ( $depth > 0 ? str_repeat( "\t", $depth ) : '' ); // code indent

	// Depth dependent classes
	$depth_classes = array(
		( $depth == 0 ? 'nav-item' : 'nav-sub-item' ),
		( $depth >=2 ? 'nav-sub-sub-item' : '' ),
		( $depth % 2 ? 'nav-item-odd' : 'nav-item-even' ),
		'nav-item-depth-' . $depth
	);
	$depth_class_names = esc_attr( implode( ' ', $depth_classes ) );

	// Passed classes
	$classes = empty( $item->classes ) ? array() : (array) $item->classes;
	$class_names = esc_attr( implode( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item ) ) );

	// Build html
	//$output .= $indent . '<li id="nav-menu-item-'. $item->ID . '" class="' . $depth_class_names . ' ' . $class_names . '">';
	$output .= $indent . '<li class="' . $depth_class_names . ' ' . $class_names . '">';

	// Link attributes
	$attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
	$attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
	$attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
	$attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : '';
	$attributes .= ' class="nav-link ' . ( $depth > 0 ? 'nav-sub-link' : '' ) . '"';

	$item_output = sprintf( '%1$s<a%2$s>%3$s%4$s%5$s</a>%6$s',
		$args->before,
		$attributes,
		$args->link_before,
		apply_filters( 'the_title', $item->title, $item->ID ),
		$args->link_after,
		$args->after
	);

	// Build html
	$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
	}
}