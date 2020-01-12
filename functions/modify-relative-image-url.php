<?php


/**
 * Vkládej obrázky v editoru s relativní adresou od rootu.
 */
add_filter('image_send_to_editor','image_to_relative',5,8);
function image_to_relative($html, $id, $caption, $title, $align, $url, $size, $alt)
{
	$sp = strpos($html,"src=") + 5;
	$ep = strpos($html,"\"",$sp);

	$imageurl = substr($html,$sp,$ep-$sp);

	$relativeurl = str_replace("http://","",$imageurl);
	$sp = strpos($relativeurl,"/");
	$relativeurl = substr($relativeurl,$sp);

	$html = str_replace($imageurl,$relativeurl,$html);

	return $html;
}
