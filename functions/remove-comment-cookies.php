<?php


/**
 * Odstranění komentářových cookies
 */
remove_action( 'set_comment_cookies', 'wp_set_comment_cookies' );
