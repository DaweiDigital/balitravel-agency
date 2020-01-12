<?php

/**
 * Displaying Child Pages on the Parent Page in WordPress
 */
function wpb_list_child_pages() { 

    global $post; 

    if ( is_page() && $post->post_parent )
        $childpages = wp_list_pages( 'sort_column=menu_order&title_li=&child_of=' . $post->post_parent . '&echo=0' );
    else
        $childpages = wp_list_pages( 'sort_column=menu_order&title_li=&child_of=' . $post->ID . '&echo=0' );
    if ( $childpages ) {
        $string = '
        <nav class="side-page-nav">
               <ul class="side-page-list">'
                   .$childpages.
               '</ul>
        </nav>';
    }
    return $string;
}

add_shortcode('wpb_childpages', 'wpb_list_child_pages');
