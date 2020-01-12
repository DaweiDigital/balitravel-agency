<?php

/**
 * Při vkládání médií (především obrázků) nastav jako výchozí odkaz na "žádný".
 */
// update_option('image_default_link_type','none');
function my_gallery_default_type_set_link( $settings ) {
    $settings['galleryDefaults']['link'] = 'file';
    return $settings;
}
add_filter( 'media_view_settings', 'my_gallery_default_type_set_link');