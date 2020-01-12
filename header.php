<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-touch ">
    <head>
        <!-- Meta -->
        <meta charset="utf-8">
        <!-- <meta name="author" content="Query (www.query.cz)"> -->
        <meta name="viewport" content="width=device-width, viewport-fit=cover">
        <title><?php wp_title(''); ?></title>
        <?php wp_head(); ?>
    </head>
    <body <?php body_class(); ?>>
        <!-- Header -->
        <header class="header bs-page-header" role="banner">
            <div class="container header-container">
                <!-- Logo -->
                <a title="David Adam - Life Coach" href="<?php echo get_home_url(); ?>" class="header-logo-link">
                    <img class="header-logo" src="<?php echo get_template_directory_uri(); ?>/assets/images/bali-travel-logo.png" alt="Bali Travel">
                </a>
                <!-- Hamburger -->
                <button class="hamburger hamburger--collapse">
                    <span class="hamburger-box">
                        <span class="hamburger-inner"></span>
                        <span class="hamburger-text">MENU</span>
                    </span>
                </button> 
                <!-- Nav -->
                <nav class="nav nav-mobile" role="navigation">
                    <span class="nav-mobile-close js-close"></span>
                    <?php
                    wp_nav_menu(array(
                        'menu' => 'main-navigation',
                        'menu_class' => 'nav-list',
                        'menu_id' => 'nav-list',
                        'container' => false,
                        'theme_location' => 'main',
                        'walker' => new custom_walker_nav_menu
                    ));
                    ?>
                    <?php dynamic_sidebar('header-widget'); ?>
                </nav> <!-- /.nav -->
            </div>
        </header> <!-- /.header -->
        <main role="main" class="main">
