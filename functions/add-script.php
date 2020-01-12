<?php

/**
 * Add Script
 */
function add_script()
{
    echo "<script type='text/javascript'>
            document.getElementsByTagName('html')[0].className = document.getElementsByTagName('html')[0].className.replace(/\bjs-disable\b/, '');
            document.getElementsByTagName('html')[0].className += 'js-on-air';
        </script>" . "\n";
    wp_enqueue_script('clipboard', 'https://cdn.jsdelivr.net/npm/clipboard@2/dist/clipboard.min.js', array('jquery'), null, true);
    wp_enqueue_script('lightgallery', get_template_directory_uri() . '/assets/js/lightgallery.min.js', array('jquery'), null, true);
    wp_enqueue_script('add_script', get_template_directory_uri() . '/assets/js/main.min.js?65d339eba2', array('jquery'), null, true);
}

add_action('wp_enqueue_scripts', 'add_script');
