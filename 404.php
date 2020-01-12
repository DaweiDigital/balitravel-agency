<?php get_header(); ?>



<div class="bs-block bs-page-header bs-page-header-404">
    <section class="container">
        <h1 class="only-title text-center"><?php _e('Vyskytla se chyba', 'template'); ?></h1>
    </section>
</div>
<div class="bs-block bs-first-block bs-block-404">
    <section class="container">
        <div class="error-page-header">
            <div class="error-page-header-content">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12 col-sm-12">
                            <h1 class="page-title-404"><?php _e('404', 'template'); ?></h1>
                            <h2 class="page-subtitle-404"><?php _e('Stránka nenalezena', 'template'); ?></h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="special-content">
            <p><?php _e('Pokud nemůžete nalézt požadovnaou stránku vraťte se na hlavní stránku webu nebo kontaktujte administrátora těchto astránek, který je uveden v patičce tohoto web.!', 'template'); ?></p>
            <div class="btn-wrap top-gap-medium">
                <a href="<?php echo get_bloginfo('url'); ?>" class="btn btn-primary"><?php _e('Jít na úvodní stránku', 'template'); ?></a>
            </div>
        </div>
    </section>
</div>


<?php get_footer(); ?>