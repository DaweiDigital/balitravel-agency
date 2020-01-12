<?php


/**
 * Zruš generování srcset media velikostí
 */
add_filter( 'wp_calculate_image_srcset_meta', '__return_null' );
