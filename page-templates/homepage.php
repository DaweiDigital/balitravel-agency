<?php
/**
 * Template Name: Homepage
 *
 * Template for displaying a main page / homepage / index
 *
 */
get_header();
//get_template_part( 'index' ); // Inherit index.php
?>

<!-- Main -->
<section class="main page-main homepage" role="main">
    <?php get_template_part('includes/main-banner', 'page'); ?>
        <!-- Vanilla Query -->
        <?php while (have_posts()) : the_post(); ?>
            <?php get_template_part('template-parts/content', 'page'); ?>
        <?php endwhile; ?>
        <?php get_template_part('includes/cta_section', 'page'); ?>
</section> <!-- /.main -->

<?php get_footer(); ?>
