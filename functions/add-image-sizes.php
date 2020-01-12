<?php

/**
 * Add Custom Image Sizes
 */
add_image_size('thumbnail', '600', '600', true);
add_image_size('medium', '1024', '1024', false);
add_image_size('large', '1920', '1080', false);
add_image_size('slider', '1600', '900', array('center', 'center'));

if (function_exists('add_image_size')) {
    add_image_size('background-image-lg', 1980, 2000, false);
    add_image_size('background-image-md', 1290, 2000, false);
    add_image_size('background-image-sm', 1000, 2000, false);
    add_image_size('background-image-xs', 768, 2000, false);
}
