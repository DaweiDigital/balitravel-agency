<?php get_header(); ?>


	<!-- Main -->
	<section class="main search-main" role="main">
		<div class="container search-container">


			<?php if ( have_posts() ) : ?>

				<header class="post-header">
					<h1 class="post-heading">
						<?php _e( 'Vyhledávání výrazu', 'template' ) ?> "<?php echo get_search_query(); ?>"
					</h1>
				</header> <!-- /.post-header -->


				<?php while ( have_posts() ) : the_post(); ?>
					<?php get_template_part( 'template-parts/content', 'excerpt' ); ?>
				<?php endwhile; ?>


				<?php else : ?>

					<p class="text-center"><?php _e( 'Žádný příspěvek nenalezen', 'template' ) ?></p>

			<?php endif; ?>


		</div> <!-- /.container -->
	</section> <!-- /.main -->


<?php get_footer(); ?>
