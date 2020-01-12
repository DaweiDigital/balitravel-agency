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

        ;
        ?>

<div class="section main-banner-section lazy-bg" data-lazy-bg-lg="<?php echo $lgHeader[0]; ?>" data-lazy-bg-md="<?php echo $mdHeader[0]; ?>" data-lazy-bg-sm="<?php echo $smHeader[0]; ?>" data-lazy-bg-xs="<?php echo $xsHeader[0]; ?>" style="background-image:url()">
	<div class="container">
		<div class="row align-items-md-center">
			<div class="col col-12 col-md-6 col-xl-6">
				
			</div>
			<div class="col col-12 col-md-6 col-xl-6 text-right">
			<span class="main-banner-title">
					<?php echo __('Nobody can go back and start a new beginning but anyone can make a new ending', 'coachmate') ?>
				</span>
				<a href="<?php echo __('#coaching', 'coachmate') ?>" class="btn btn-hook"><?php echo __('Lets start new life', 'coachmate') ?></a>
			</div>
		</div>
	</div>
</div>