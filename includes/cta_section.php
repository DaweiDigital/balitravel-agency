<?php if(get_field("cta_text")) { ?>
<div class="section cta-section">
    <div class="row align-items-md-center">
        <div class="col col-12 col-md-4 col-xl-3">
            <div class="cta-content">
                <div class="cta-image">
                    <?php echo file_get_contents(get_template_directory_uri() . '/assets/icons/calculator.svg'); ?>
                </div>
                <a href="#" class="btn btn-primary js-modal" data-modal="1"><?php the_field("button_text"); ?></a>
            </div>
        </div>
        <div class="col col-12 col-md-8 col-xl-9">
            <div class="cta-text">
                <?php the_field("cta_text"); ?>
            </div>
        </div>
    </div>
</div>
<?php } ?>