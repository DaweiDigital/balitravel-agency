<?php get_header(); ?>


	<!-- Main -->
	<section class="main category-main" role="main">
		<div class="container category-container main-container">


			<!-- Vanilla Query -->
			<?php if ( have_posts() ) : ?>

				<header class="category-header main-header">
					<h1 class="category-heading main-heading"><?php single_cat_title(); ?></h1>

					<?php if ( category_description() ) : ?>
						<?php echo category_description(); ?>
					<?php endif; ?>
				</header> <!-- /.category-header -->


				<?php while ( have_posts() ) : the_post(); ?>
					<?php get_template_part( 'template-parts/content', 'excerpt' ); ?>
				<?php endwhile; ?>


				<?php pagination(); ?>


				<?php else : ?>

					<p class="text-center"><?php _e( 'Žádný příspěvek nenalezen', '' ) ?></p>

			<?php endif; ?>


		</div> <!-- /.container -->
	</section> <!-- /.main -->


<?php get_footer(); ?>
