<?php get_header(); ?>


	<!-- Main -->
	<section class="main home-main" role="main">

		<div class="container home-container">


			<!-- Vanilla Query -->
			<?php if ( have_posts() ) : ?>

				<?php while ( have_posts() ) : the_post(); ?>
					<?php get_template_part( 'template-parts/content', 'excerpt' ); ?>
				<?php endwhile; ?>

				<?php pagination( 'pagination' ); ?>

			<?php else : ?>

				<p class="text-center"><?php _e( 'Žádný příspěvek nenalezen', 'template' ) ?></p>

			<?php endif; ?>




			<!-- WP_Query -->
			<!-- http://wordpress.stackexchange.com/questions/50761/when-to-use-wp-query-query-posts-and-pre-get-posts/#answer-50763 -->
			<?php
				// $paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1; // Pagination
				$the_query = new WP_Query( array(
					'posts_per_page' => 6,
					'cat' => -45,-47,
					// 'paged' => $paged
				) );
			?>

			<?php if ( $the_query->have_posts() ) : ?>
				<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
					<?php // global $more; $more = 0; // Only when we got issues with "Read More" ?>
					<?php get_template_part( 'template-parts/content', 'excerpt' ); ?>
				<?php endwhile; ?>

				<?php // pagination( 'pagination' ); ?>

				<?php wp_reset_postdata(); ?>

			<?php else : ?>

				<p class="text-center"><?php _e( 'Žádný příspěvek nenalezen', 'template' ) ?></p>

			<?php endif; ?>


		</div> <!-- .container -->
	</section> <!-- .main -->


<?php get_footer(); ?>
