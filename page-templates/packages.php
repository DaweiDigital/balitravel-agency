<?php
/* Template Name: Packages */
get_header();
//get_template_part( 'index' ); // Inherit index.php
?>
<?php
$attachment_id = get_field('background_header_image');

/*LG Screen*/
$sizeLgHeader = "background-image-lg";
$lgHeader = wp_get_attachment_image_src($attachment_id, $sizeLgHeader);

/*MD Screen*/
$sizeMdHeader = "background-image-md";
$mdHeader = wp_get_attachment_image_src($attachment_id, $sizeMdHeader);

/*SM Screen*/
$sizeSmHeader = "background-image-sm";
$smHeader = wp_get_attachment_image_src($attachment_id, $sizeSmHeader);

/*XS Screen*/
$sizeXsHeader = "background-image-xs";
$xsHeader = wp_get_attachment_image_src($attachment_id, $sizeXsHeader);
?>
<section class="page-header lazy-bg" role="banner" data-lazy-bg-lg="<?php echo $lgHeader[0]; ?>" data-lazy-bg-md="<?php echo $mdHeader[0]; ?>" data-lazy-bg-sm="<?php echo $smHeader[0]; ?>" data-lazy-bg-xs="<?php echo $xsHeader[0]; ?>" style="background-image:url()">
    <div class="container">
        <h1>
            <?php the_title(); ?>
        </h1>
        <p>
            <?php the_field("header_annotation"); ?>
        </p>
    </div>
</section>
<section class="bs-section bg-grey">
    <div class="container bg-white padding-xl box-shadow">
        <h2 class="text-center size-xl mb-4">Top <span class="color-primary">Bali tours</span> packages</h2>
        <div class="title-line text-center">
            <div class="tl-1"></div>
            <div class="tl-2"></div>
            <div class="tl-3"></div>
        </div>
        <p class="text-center size-xl">World's leading tour and travels Booking website,Over 30,000 packages worldwide. Book travel packages and enjoy your holidays with distinctive experience</p>

        <ul class="packages-list pl-0 pt-5 mt-5">
            <?php
            $args = array(
                'post_type' => 'packages',
                'post_parent' => $post->post_parent,
                'post__not_in' => array($post->ID),
                'posts_per_page' => 5,
                'orderby' => 'ASC'
            );
            $the_query = new WP_Query($args);
            ?>
            <?php if ($the_query->have_posts()) : ?>
                <?php while ($the_query->have_posts()) : $the_query->the_post(); ?>
                    <?php

                            $image = get_field('background_header_image', $post->ID);
                            $sizeXsImage = "background-image-xs";
                            $xsImage = wp_get_attachment_image_src($image, $sizeXsImage);
                            ?>
                    <li class="package-list-item">
                        <div class="row">
                            <div class="col-12 col-md-6">
                                <div class="package-list-image" style="background-image: url(<?php echo $xsImage[0]; ?>)">
                                    <?php if (get_field("package_old_price")) { ?>
                                        <span class="package-aside-cta-deal on-left xs-size">
                                            <?php
                                                        $actualprice = get_field("package_price");
                                                        $normalprice = get_field("package_old_price");

                                                        $percentCalc = ($actualprice / $normalprice) * 100;
                                                        $discountPercent = 100 - $percentCalc;
                                                        ?>
                                            <?php echo $discountPercent; ?>%
                                            <?php echo __('OFF', 'balitravel'); ?>
                                        </span>
                                    <?php } ?>
                                    <?php if (get_field("package_best_seller") === TRUE) { ?>
                                        <span class="package-aside-bestseller">

                                        </span>
                                    <?php } ?>
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="package-list-item-header">
                                    <h4 class="h3 package-list-title">
                                        <?php the_title(); ?>
                                    </h4>
                                    <ul class="customer-reviews">
                                        <?php
                                                $starNumber = get_field('package_user_rating');

                                                for ($x = 1; $x <= $starNumber; $x++) {
                                                    echo '<li class="customer-reviews-item">';
                                                    echo '<i class="fas fa-star"></i>';
                                                    echo '</li>';
                                                }
                                                if (strpos($starNumber, '.')) {
                                                    echo '<li class="customer-reviews-item">';
                                                    echo '<i class="fas fa-star-half-alt"></i>';
                                                    echo '</li>';
                                                    $x++;
                                                }
                                                while ($x <= 5) {
                                                    echo '<li class="customer-reviews-item">';
                                                    echo '<i class="far fa-star"></i>';
                                                    echo '</li>';
                                                    $x++;
                                                }
                                                ?>
                                    </ul>
                                </div>
                                <div class="package-list-item-main">
                                    <div class="package-list-text">
                                        <?php the_content(); ?>
                                    </div>
                                    <div class="additional-information-row mt-4 d-flex align-items-center">
                                        <span class="available"><i class="far fa-check-circle mr-3"></i><?php echo __('Available tomorrow', 'balitravel'); ?></span>
                                        <span><?php echo __('Start time:', 'balitravel'); ?> <?php the_field("package_start_time"); ?></span>
                                        <span><?php echo __('Duration:', 'balitravel'); ?> <?php the_field("package_duration"); ?> <?php the_field("package_duration_in_hoursdays"); ?></span>
                                    </div>
                                    <h4 class="icon-yes xs-size mt-4 color-fifth">
                                        <span class="title-icon xs-size">
                                            <i class="fas fa-island-tropical"></i>
                                        </span>
                                        <?php echo __('Package include', 'balitravel'); ?>
                                    </h4>
                                    <?php
                                            $values = get_field('package_include');
                                            if ($values) {
                                                echo '<ul class="ul-list icon-yes right-check d-flex align-items-center">';

                                                foreach ($values as $value) {
                                                    echo '<li class="mt-0 mr-4">' . $value . '</li>';
                                                }

                                                echo '</ul>';
                                            }
                                            ?>
                                </div>
                                <div class="package-list-item-footer d-flex align-items-start mt-4 pt-2">
                                    <a href="#" class="btn btn-xs btn-primary mr-md-4">
                                        <?php echo __('Book now', 'balitravel'); ?>
                                    </a>
                                    <a href="<?php the_permalink(); ?>" rel="post-<?php the_ID(); ?>" class="btn btn-xs btn-secondary">
                                        <?php echo __('View this package', 'balitravel'); ?>
                                    </a>
                                    <div class="package-list-price d-flex align-items-center text-md-right">
                                        <span class="package-list-price-title mr-4"><?php echo __('Price', 'balitravel'); ?></span>
                                        <span class="package-list-price-text">$<?php the_field("package_price"); ?></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                <?php endwhile; ?>
            <?php endif; ?>
        </ul>
        <?php wp_reset_query(); ?>
    </div>
</section>
</div> <!-- /.container -->

<?php get_footer(); ?>