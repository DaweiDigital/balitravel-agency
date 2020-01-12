<?php get_header(); ?>


	<!-- Main -->
	<section class="single-main">
		<div class="container single-container main-container">

			<!-- Vanilla query -->
			<?php while ( have_posts() ) : the_post(); ?>
				<?php get_template_part( 'template-parts/content', 'single' ); ?>
			<?php endwhile; ?>

		</div> <!-- /.container -->
	</section> <!-- /.main -->


<?php get_footer(); ?>
