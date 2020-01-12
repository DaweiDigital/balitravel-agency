<?php get_header(); ?>

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
<!-- Main -->
<section class="bs-section">
    <div class="container">
        <!-- Vanilla Query -->
        <?php while (have_posts()) : the_post(); ?>
            <?php get_template_part('template-parts/content', 'page'); ?>
        <?php endwhile; ?>
        <?php get_template_part('includes/cta_section', 'page'); ?>
    </div> <!-- /.container -->
</section> <!-- /.main -->


<?php get_footer(); ?>