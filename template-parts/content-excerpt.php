	<article <?php post_class( 'excerpt-article' ); ?>>

		<header class="excerpt-header">
			<div class="excerpt-thumbnail">
				<?php the_post_thumbnail( 'medium' ); ?>
			</div> <!-- /.excerpt-thumbnail -->

			<h1 class="excerpt-heading">
				<a title="<?php the_title(); ?>" href="<?php the_permalink(); ?>">
					<?php the_title(); ?>
				</a>
			</h1>
		</header> <!-- /.excerpt-header -->


		<div class="excerpt-content">
			<?php the_excerpt(); ?>
			<a title="<?php the_title(); ?>" href="<?php the_permalink(); ?>"><?php _e( 'Čti více', 'template' ); ?></a>
		</div> <!-- /.excerpt-content -->


		<footer class="excerpt-footer">
			<?php get_template_part( 'includes/post-edit-link' ); ?>
		</footer> <!-- /.excerpt-footer -->

	</article> <!-- /.excerpt-article -->
