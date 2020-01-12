<?php

// Add Shortcode
function show_childpages_shortcode($id) {
    ob_start();
    $args = array(
        'parent' => $id,
        'post_type' => 'page',
        'post_status' => 'publish'
    );
    $pages = get_pages($args);
        ?>
        <ul class="nav-images"> 
        <?php foreach ($pages as $page) { ?>
                <li class="nav-images-item">
                    <a href="<?php echo get_permalink($page->ID); ?>" rel="bookmark" title="<?php echo $page->post_title; ?>" class="nav-images-link">
                        <div class="nav-images-thumbnail"><?php echo get_the_post_thumbnail($page->ID, 'small-thumb'); ?></div>
                        <span class="nav-images-title"><?php echo $page->post_title; ?></span>
                    </a>
                </li>
        <?php } ?>
        </ul>
            <?php
            return ob_get_clean();
    }
add_shortcode('show_childpages', 'show_childpages_shortcode');
    