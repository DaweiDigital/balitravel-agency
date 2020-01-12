<?php


/**
 * Doplnění tlačítka Read More k automaticky generovanému the_excerpt()
 */
// function wpdocs_excerpt_more( $more ) {
//     return sprintf( '...<p class="text-right"><a class="read-more" href="%1$s">%2$s</a></p>',
//         get_permalink( get_the_ID() ),
//         __( 'Read More', 'textdomain' )
//     );
// }
// add_filter( 'excerpt_more', 'wpdocs_excerpt_more' );

function wpdocs_excerpt_more( $more ) {
    return '...';
}
add_filter( 'excerpt_more', 'wpdocs_excerpt_more' );





/**
 * Modify the_content() Read More
 */
// function modify_read_more_link() {
//     return '<p><a class="button excerpt-more-link" href="' . get_permalink() . '"><img class="button-icon" src="' . get_template_directory_uri() . '/assets/images/icon-circle-right-blue.svg" alt="?"> ' . __( 'Read More', 'translation' ) . '</a></p>';
// }
// add_filter( 'the_content_more_link', 'modify_read_more_link' );
