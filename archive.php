<?php get_header(); ?>

<section class="archive-main category-main">
	<div class="container archive-container category-container main-container">


		<!-- Vanilla Query -->
		<?php if (have_posts()) : ?>

			<header class="archive-header category-header main-header">
				<h1 class="archive-heading category-heading main-heading"><?php post_type_archive_title(); ?></h1>

				<?php if (category_description()) : ?>
					<?php echo category_description(); ?>
				<?php endif; ?>
			</header> <!-- /.archive-header -->


			<?php while (have_posts()) : the_post(); ?>
				<?php get_template_part('template-parts/content', 'excerpt'); ?>
			<?php endwhile; ?>


			<?php pagination(); ?>

		<?php else : ?>

			<p class="text-center"><?php _e('Žádný příspěvek nenalezen', '') ?></p>

		<?php endif; ?>


	</div> <!-- /.container -->
</section>


<?php get_footer(); ?>