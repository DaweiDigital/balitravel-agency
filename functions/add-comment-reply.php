<?php


/**
 * Přidání podpory odpovědí na komentáře
 */
function enable_reply_comments() {
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'enable_reply_comments' );
