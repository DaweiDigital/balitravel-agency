	<article <?php post_class( 'single-article main-article' ); ?>>

		<header class="single-header main-header">
			<div class="single-thumbnail main-thumbnail">
				<?php the_post_thumbnail(); ?>
			</div> <!-- /.single-thumbnail -->

			<h1 class="single-heading main-heading">
				<?php the_title(); ?>
			</h1>
		</header> <!-- /.single-header -->


		<div class="single-content main-content">
			<?php the_content(); ?>
		</div> <!-- /.single-content -->


		<footer class="single-footer main-footer">
			<?php get_template_part( 'includes/post-edit-link' ); ?>
		</footer> <!-- /.single-article -->

	</article> <!-- /.single-container -->
