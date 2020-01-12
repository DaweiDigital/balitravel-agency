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
			<?php the_field("package_header_annonation"); ?>
		</p>
	</div>
</section>
<section class="cta-panel">
	<div class="container">
		<div class="row align-items-center text-center">
			<div class="col-md-3">
				<?php _e('Location', 'balitravel') ?>:
				<?php the_field("package_trip_location"); ?>
			</div>
			<div class="col-md-3">
				<?php _e('Price', 'balitravel') ?>:
				$<?php the_field("package_price"); ?>
			</div>
			<div class="col-md-3">
				<?php _e('Duration', 'balitravel') ?>:
				<?php the_field("package_duration"); ?>
				<?php the_field("package_duration_in_hoursdays"); ?>
			</div>
			<div class="col-md-3">
				<a href="#" class="btn btn-primary btn-md border-radius-none"><?php _e('Book now', 'balitravel') ?></a>
			</div>
		</div>
	</div>
</section>

<div class="container mt-5 pt-5">
	<div class="row">
		<div class="col-12 col-md-8 col-lg-9">
			<section class="bs-section pt-0">
				<header class="bs-section-header d-flex align-items-center">
					<h2 class="mb-0"><?php _e('The Best of Bali', 'balitravel') ?></h2>
					<ul class="customer-reviews ml-3 mt-3">
						<?php
						$starNumber = get_field('package_user_rating');

						for ($x = 1; $x <= $starNumber; $x++) {
							echo '<li class="customer-reviews-item">';
							echo '<i class="fas fa-star"></i>';
							echo '</li>';
						}
						if (strpos($starNumber, '.')) {
							echo '<li class="customer-reviews-item">';
							echo '<i class="fas fa-star-half-alt"></i>';
							echo '</li>';
							$x++;
						}
						while ($x <= 5) {
							echo '<li class="customer-reviews-item">';
							echo '<i class="far fa-star"></i>';
							echo '</li>';
							$x++;
						}
						?>
						<li class="customer-reviews-item">
							<span class="reviews-number">
								<?php the_field("package_user_rating"); ?>
							</span>
						</li>
					</ul>
				</header>
				<header class="bs-section-header mt-5 pt-5">
					<h2 class="h3 icon-yes">
						<span class="title-icon">
							<i class="fas fa-island-tropical"></i>
						</span>
						<?php _e('Description', 'balitravel') ?>
					</h2>
				</header>
				<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
						<?php the_content(); ?>
					<?php endwhile; ?>
				<?php endif; ?>
			</section>
			<section class="bs-section pt-0">
				<header class="bs-section-header">
					<h2 class="h3 icon-yes">
						<span class="title-icon">
							<i class="fas fa-camera"></i>
						</span>
						<?php _e('Photo gallery', 'balitravel') ?>
					</h2>
				</header>
				<?php
				$images = get_field('package_photo_gallery');
				if ($images) : ?>
					<ul class="gallery-list" id="aniimated-thumbnials">
						<?php foreach ($images as $image) : ?>
							<li class="gallery-list-item" data-src="<?php echo esc_url($image['sizes']['thumbnail']); ?>">
								<a href="<?php echo esc_url($image['url']); ?>" class="gallery-list-link">
									<img src="<?php echo esc_url($image['sizes']['thumbnail']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
								</a>
								<p class="gallery-list-caption">
									<?php echo esc_html($image['caption']); ?>
								</p>
							</li>
						<?php endforeach; ?>
					</ul>
				<?php endif; ?>
			</section>
			<section class="bs-section">
				<header class="bs-section-header">
					<h2 class="h3 icon-yes">
						<span class="title-icon">
							<i class="fas fa-info"></i>
						</span>
						<?php _e('About The Tour', 'balitravel') ?>
					</h2>
				</header>
				<div class="row">
					<div class="col-12 col-md-4 pr-md-0">
						<h4 class="border-bottom">
							<?php _e('Places covered', 'balitravel') ?>
						</h4>
						<?php if (have_rows('package_iterinary')) : ?>
							<ul class="ul-list border-style">
								<?php while (have_rows('package_iterinary')) : the_row();
										// vars
										$title = get_sub_field('package_iterinary_title');
										?>
									<li>
										<?php echo $title; ?>
									</li>
								<?php endwhile; ?>
							</ul>
						<?php endif; ?>
					</div>
					<div class="col-12 col-md-4 pl-md-0 pr-md-0">
						<h4 class="border-bottom">
							<?php _e('Includes', 'balitravel') ?>
						</h4>
						<?php
						$values = get_field('package_include');
						if ($values) {
							echo '<ul class="ul-list border-style">';

							foreach ($values as $value) {
								echo '<li>' . $value . '</li>';
							}

							echo '</ul>';
						}
						?>
					</div>
					<div class="col-12 col-md-4 pl-md-0">
						<h4 class="border-bottom">
							<?php _e('Excludes', 'balitravel') ?>
						</h4>
						<?php
						$values = get_field('package_exclusion');
						if ($values) {
							echo '<ul class="ul-list border-style">';

							foreach ($values as $value) {
								echo '<li>' . $value . '</li>';
							}

							echo '</ul>';
						}
						?>
					</div>
				</div>
			</section>
			<section class="bs-section">
				<header class="bs-section-header">
					<h2 class="h3 icon-yes">
						<span class="title-icon">
							<i class="fas fa-clock"></i>
						</span>
						<?php _e('Detailed Day Wise Itinerary', 'balitravel') ?>
					</h2>
				</header>
				<?php if (have_rows('package_iterinary')) : ?>
					<ul class="timeline-list mt-5 pt-2">
						<?php while (have_rows('package_iterinary')) : the_row();
								// vars
								$time = get_sub_field('package_iterinary_time');
								$title = get_sub_field('package_iterinary_title');
								$content = get_sub_field('package_iterinary_content');
								?>
							<li class="timeline-list-item">
								<h4 class="timeline-list-header">
									<span class="time-point">
										<?php echo $time; ?> -
									</span>
									<span class="time-point-place">
										<?php echo $title; ?>
									</span>
								</h4>
								<div class="timeline-list-content">
									<?php echo $content; ?>
								</div>
							</li>
						<?php endwhile; ?>
					</ul>
				<?php endif; ?>
			</section>
		</div>
		<div class="col-12 col-md-4 col-lg-3">
			<aside class="package-aside">
				<div class="package-aside-cta text-center mb-5" style="background-image: url(<?php echo $xsHeader[0]; ?>)">
					<?php if (get_field("package_old_price")) { ?>
						<span class="package-aside-cta-deal">
							<?php
								$actualprice = get_field("package_price");
								$normalprice = get_field("package_old_price");

								$percentCalc = ($actualprice / $normalprice) * 100;
								$discountPercent = 100 - $percentCalc;
								?>
							<?php echo $discountPercent; ?>%
							<?php echo __('OFF', 'balitravel'); ?>
						</span>
					<?php } ?>
					<div class="package-aside-cta-inner">
						<span class="package-aside-cta-title">
							<?php echo __('Special offer', 'balitravel'); ?>
						</span>
						<div class="cta-price">
							<span class="actual-price">$<?php the_field("package_price"); ?></span>
							<?php if (get_field("package_old_price")) { ?>
								<span class="old-price">$<?php the_field("package_old_price"); ?></span>
							<?php } ?>
						</div>
						<a href="#" class="btn btn-secondary"><?php _e('Book now', 'balitravel') ?></a>
					</div>
				</div>
				<div class="package-aside-inner">
					<span class="package-aside-title">
						<?php echo __('Trip information', 'balitravel'); ?>
					</span>
					<div class="package-aside-inner-content">
						<?php
						$values = get_field('package_include');
						if ($values) {
							echo '<ul class="ul-list icon-yes right-check">';

							foreach ($values as $value) {
								echo '<li>' . $value . '</li>';
							}

							echo '</ul>';
						}
						?>
					</div>
				</div>
				<div class="package-aside-inner">
					<span class="package-aside-title">
						<?php echo __('Share this package', 'balitravel'); ?>
					</span>
					<div class="package-aside-inner-content">
						<ul class="social-list">
							<li class="social-list-item">
								<a href="https://www.facebook.com/sharer/sharer.php?u=&quote=" target="_blank" title="Share on Facebook" class="social-list-link">
									<i class="fab fa-facebook-f"></i>
								</a>
							</li>
							<li class="social-list-item">
								<a href="https://twitter.com/intent/tweet?source=&text=:%20" target="_blank" title="Tweet" class="social-list-link">
									<i class="fab fa-twitter"></i>
								</a>
							</li>
							<li class="social-list-item">
								<a href="http://www.linkedin.com/shareArticle?mini=true&url=&title=&summary=&source=" target="_blank" title="Share on LinkedIn" class="social-list-link">
									<i class="fab fa-linkedin-in"></i>
								</a>
							</li>
							<li class="social-list-item">
								<a href="https://wa.me/?text=<?php echo get_permalink(); ?>" target="_blank" class="social-list-link">
									<i class="fab fa-whatsapp"></i>
								</a>
							</li>
							<li class="social-list-item">
								<div data-clipboard-text="<?php echo get_permalink(); ?>" class="social-list-link copy-link js-copy-text">
									<i class="fas fa-link"></i>
									<span class="tooltip-clipboard">
										Copied!
									</span>
								</div>
							</li>
						</ul>

					</div>
				</div>
				<div class="package-aside-inner">
					<span class="package-aside-title">
						<?php echo __('Help and support', 'balitravel'); ?>
					</span>
					<div class="package-aside-inner-content text-center">
						<div class="contact-person text-center">
							<h4 class="mb-3">
								<?php echo __('Contact our travel agent', 'balitravel'); ?>
							</h4>
							<div class="contact-person-image d-inline-block" style="background-image:url(<?php echo get_template_directory_uri() . '/assets/images/luh-sukreni.jpg'; ?>);">
							</div>
							<h5 class="mb-0 mt-2">
								<?php echo __('Luh Sukreni', 'balitravel'); ?>
							</h5>
						</div>
						<ul class="contact-list">
							<li class="contact-list-item">
								<a href="https://wa.me/6281934333611" target="_blank" class="contact-list-link whatsapp">
									<div class="contact-list-link-inner">
										<i class="fab fa-whatsapp"></i>
										<span class="contact-list-text d-block"><?php echo __('WhatsApp', 'balitravel'); ?></span>
									</div>
								</a>
							</li>
							<li class="contact-list-item">
								<a href="" class="contact-list-link email">
									<div class="contact-list-link-inner">
										<i class="fal fa-envelope"></i>
										<span class="contact-list-text d-block"><?php echo __('E-mail', 'balitravel'); ?></span>
									</div>
								</a>
							</li>
							<li class="contact-list-item">
								<a href="" class="contact-list-link facebook-messenger">
									<div class="contact-list-link-inner">
										<i class="fab fa-facebook-messenger"></i>
										<span class="contact-list-text d-block"><?php echo __('Facebook', 'balitravel'); ?></span>
									</div>
								</a>
							</li>
							<li class="contact-list-item">
								<a href="" class="contact-list-link skype">
									<div class="contact-list-link-inner">
										<i class="fab fa-skype"></i>
										<span class="contact-list-text d-block"><?php echo __('Skype', 'balitravel'); ?></span>
									</div>
								</a>
							</li>
						</ul>
					</div>
				</div>
				<div class="package-aside-inner">
					<span class="package-aside-title">
						<?php echo __('Popular packages', 'balitravel'); ?>
					</span>
					<div class="package-aside-inner-content">
						<ul class="v-related-packages-list">
							<?php
							$args = array(
								'post_type' => 'packages',
								'post_parent' => $post->post_parent,
								'post__not_in' => array($post->ID),
								'posts_per_page' => 5,
								'orderby' => 'ASC'
							);
							$the_query = new WP_Query($args);
							?>

							<?php if ($the_query->have_posts()) : ?>
								<?php while ($the_query->have_posts()) : $the_query->the_post(); ?>
									<li class="v-r-p-item">
										<?php
												$image = get_field('background_header_image', $post->ID);
												$sizeXsImage = "background-image-xs";
												$xsImage = wp_get_attachment_image_src($image, $sizeXsImage);
												?>
										<div class="v-r-p-image" style="background-image: url(<?php echo $xsImage[0]; ?>)">

										</div>
										<h4 class="v-r-p-title">
											<?php the_title(); ?>
										</h4>
										<p class="v-r-p-text">
											<?php the_field("package_header_annonation"); ?>
										</p>
										<a href="<?php the_permalink(); ?>" rel="post-<?php the_ID(); ?>" class="btn btn-primary">
											<?php echo __('View this package', 'balitravel'); ?>
										</a>
									</li>
								<?php endwhile; ?>
							<?php endif; ?>
						</ul>
						<?php wp_reset_query(); ?>
					</div>
				</div>
			</aside>
		</div>
	</div>
</div>
<section class="bs-section bs-section-cta padding-xl bg-primary">
	<div class="container">
		<div class="row align-items-center">
			<div class="col-12 col-md-6">
				<h2 class="line-top text-white mb-0 text-uppercase">
					<?php echo __("Pick up a date for your choosen trip"); ?>
				</h2>
			</div>
			<div class="col-12 col-md-6">
				<form class="d-flex align-items-center">
					<input placeholder="Choose your date" type="text" id="date-picker-example" class="input input-date input-ghost datepicker mb-0 p-0 pb-3 pt-2 mr-5">
					<button type="button" class="btn btn-white ml-4"><?php echo __("Reserve now") ?></button>
			</div>
		</div>
	</div>
</section>

<?php get_footer(); ?>