<?php

// Add Shortcode
function show_reviews_shortcode($atts)
{
    ob_start();
    extract(shortcode_atts(array(
        'id' => $id,
        'class' => $class
    ), $atts));
    $args = array(
        'post_type' => $id,
        'post_status' => 'publish',
        'order' => 'ASC',
        "orderby" => "menu_order",
        "order" => "ASC",
        "posts_per_page" => 20,
    );

    $reviews = new WP_Query($args);
    if ($reviews->have_posts()) :
        ?>
        <section class="bs-section <?php echo $class ?>">
            <div class="container">
                <ul class="reviews-list">
                    <?php
                    while ($reviews->have_posts()) :
                        $reviews->the_post();
                        ?>
                        <li class="reviews-item">
                            <div class="reviews-thumbnail">
                                <?php echo get_the_post_thumbnail($page->ID, 'medium-thumb'); ?>
                            </div>
                            <div class="reviews-content">
                                <h3 class="reviews-title">
                                    <?php echo get_the_title(); ?>
                                </h3>
                                <h4 class="reviews-location">
                                    <?php the_field("reviews-location"); ?>
                                </h4>
                                <div class="reviews-text">
                                    <?php echo get_the_content(); ?>
                                </div>
                            </div>
                        </li>
                    <?php
                    endwhile;
                    wp_reset_postdata();
                    ?>
                </ul>
            </div>
        </section>
    <?php
    else :
        esc_html_e('No reviews in the diving taxonomy!', 'text-domain');
    endif;
    ?>
    <?php
    return ob_get_clean();
}

add_shortcode('show_reviews', 'show_reviews_shortcode');
