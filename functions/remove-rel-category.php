<?php


/**
 * Odstranění rel="category".
 */
add_filter( 'the_category', 'add_nofollow_cat' );  function add_nofollow_cat( $text ) { $text = str_replace('rel="category tag"', "", $text); return $text; }
