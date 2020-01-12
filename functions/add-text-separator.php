<?php

/**
 * Add shortcode for text separator with icon
 */
function separator_shortcode($atts) {
    ob_start();
    extract(shortcode_atts(array(
        'icon' => $icon
                    ), $atts));
    ?>
    <div class="text-separator">
        <?php
        if ($icon === "star") {
            echo file_get_contents(get_template_directory_uri() . '/assets/icons/icon-star.svg');
        } else if ($icon === "flower") {
            echo file_get_contents(get_template_directory_uri() . '/assets/icons/icon-flower.svg');
        } else if ($icon === "lines") {
            echo file_get_contents(get_template_directory_uri() . '/assets/icons/icon-lines.svg');
        }
        ?>
    </div>
        <?php
        return ob_get_clean();
    }

    add_shortcode('separator', 'separator_shortcode');
    