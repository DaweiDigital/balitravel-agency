</main>
<!-- Footer -->
<footer class="footer bg-black" role="contentinfo">
    <div class="footer-content">
        <div class="container">
            <div class="row">
                <?php
                $args = array(
                    'post_type' => 'packages',
                    'post_parent' => $post->post_parent,
                    'post__not_in' => array($post->ID),
                    'posts_per_page' => 4,
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
                        <div class="col-12 col-md-3">
                            <div class="d-flex package-list-wrap">
                                <div class="package-list-image dynamic-height" style="background-image: url(<?php echo $xsImage[0]; ?>)">

                                </div>
                                <div class="package-list-content text-center">
                                    <?php if (get_field("package_old_price")) { ?>
                                        <div class="text-center">
                                            <?php
                                            $actualprice = get_field("package_price");
                                            $normalprice = get_field("package_old_price");

                                            $percentCalc = ($actualprice / $normalprice) * 100;
                                            $discountPercent = 100 - $percentCalc;
                                            ?>
                                            <span class="text-xl text-yellow text-bold"><?php echo $discountPercent; ?>%</span>
                                            <span class="text-xs"><?php echo __('OFF', 'balitravel'); ?></span>
                                    </div>
                                    <?php } ?>
                                    <span class="d-block mb-5 text-center h3 package-list-title text-white text-xs">
                                        <?php the_title(); ?>
                                    </span>
                                    <a href="<?php the_permalink(); ?>" rel="post-<?php the_ID(); ?>" class="btn btn-xs btn-primary">
                                        <?php echo __('View this package', 'balitravel'); ?>
                                    </a>
                                </div>
                            </div>
                        </div>
                    <?php endwhile; ?>
                <?php endif; ?>
            </div>
            <?php wp_reset_query(); ?>
            <div class="row mt-5 pt-5">
                <div class="col col-12 col-md-6 col-xl-3">
                    <?php dynamic_sidebar('footer-widget-one'); ?>
                </div>
                <div class="col col-12 col-md-6 col-xl-3 mt-4 mt-md-0">
                    <?php dynamic_sidebar('footer-widget-two'); ?>
                </div>
                <div class="col col-12 col-md-6 col-xl-3 mt-4 mt-md-0">
                    <?php dynamic_sidebar('footer-widget-three'); ?>
                </div>
                <div class="col col-12 col-md-6 col-xl-3 mt-4 mt-md-0">
                    <?php dynamic_sidebar('footer-widget-four'); ?>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-credentials text-center">
        &copy; <?php echo date('Y'); ?> <?php echo get_bloginfo(); ?>. <?php echo __('All rights reserved.', 'balitravel') ?>
    </div>
    </div>
</footer> <!-- /.footer -->

<?php /*
  <!-- Cookies Info -->
  <div class="cookies-info">
  <?php _e( 'Vážený uživateli, tento web používá k analýze návštěvnosti soubory cookie.', '' ) ?>
  <a class="cookies-info-link" title="<?php _e( 'Více informací o cookies', '' ) ?>" href="http://ec.europa.eu/ipg/basics/legal/cookies/index_en.htm" target="_blank"><?php _e( 'Více informací o cookies', '' ) ?></a>

  <button class="button cookies-info-button"><?php _e( 'Souhlasím', '' ) ?></button>
  </div> <!-- .cookies-info -->
 */ ?>
<?php wp_footer(); ?>

</body>

</html>