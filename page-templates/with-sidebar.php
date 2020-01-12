<?php
/* Template Name: With Sidebar */
get_header();
//get_template_part( 'index' ); // Inherit index.php
?>

<!-- Main -->
<section class="main page-main" role="main">
    <div class="container page-container main-container">
        <div class="row">
            <div class="col col-12 col-md-3 sidebar">
                <div class="sidebar-container">
                    <?php get_template_part('includes/icon_in_sidebar', 'page'); ?>
                    <?php
                    if (get_field("sidebar_menu") == TRUE) {
                        dynamic_sidebar('sidebar-widget-menu');
                    } else {
                        echo wpb_list_child_pages();
                    }
                    ;?>
                </div>
            </div>
            <div class="col col-12 col col-md-9 article-main-content">
                <!-- Vanilla Query -->
                <?php while (have_posts()) : the_post(); ?>
                    <?php get_template_part('template-parts/content', 'page'); ?>
                <?php endwhile; ?>
                <?php get_template_part('includes/cta_section', 'page'); ?>
            </div>
        </div>
    </div> <!-- /.container -->
</section> <!-- /.main -->

<?php get_footer(); ?>