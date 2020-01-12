<?php

/**
 * Přidej k obrázkům v galerii atribut (např. pro Fancybox).
 */
add_filter('wp_get_attachment_link', 'add_rel_attribute');
function add_rel_attribute($link) {
	global $post;
	return str_replace('<a href', '<a data-fancybox="gallery" href', $link);
}



/**
 * Přidej samostatným obrázkům atribut (např. pro Fancybox).
 */
function add_rel_lightbox($content) {
	$string = '/<a href="(.*?).(jpg|jpeg|png|gif|bmp|ico)"><img(.*?)class="(.*?)wp-image-(.*?)" \/><\/a>/i';
	preg_match_all( $string, $content, $matches, PREG_SET_ORDER);

	foreach ($matches as $val) {
		$slimbox_caption = '';

		$post = get_post($val[5]);
		$slimbox_caption = esc_attr( $post->post_content );

		//Replace the instance with the lightbox and title(caption) references. Won't fail if caption is empty.
		$string = '<a href="' . $val[1] . '.' . $val[2] . '"><img' . $val[3] . 'class="' . $val[4] . 'wp-image-' . $val[5] . '" /></a>';
		$replace = '<a href="' . $val[1] . '.' . $val[2] . '" data-fancybox><img' . $val[3] . 'class="' . $val[4] . 'wp-image-' . $val[5] . '" /></a>';
		$content = str_replace( $string, $replace, $content);
	}

	return $content;
}
add_filter('the_content', 'add_rel_lightbox', 2);
