<?php

/**
 * Widget registrations
 */
register_sidebar(array(
    'id' => 'footer-widget-one',
    'name' => __('Footer content Widget one', $text_domain),
    'description' => __('This sidebar is located above the age logo.', $text_domain),
    'before_widget' => '<div id="%1$s" class="footer-widget widget %2$s">',
    'after_widget' => '</div>',
    'before_title' => '<span class="footer-title">',
    'after_title' => '</span>'
));

register_sidebar(array(
    'id' => 'footer-widget-two',
    'name' => __('Footer content Widget two', $text_domain),
    'description' => __('This sidebar is located above the age logo.', $text_domain),
    'before_widget' => '<div id="%1$s" class="footer-widget widget %2$s">',
    'after_widget' => '</div>',
    'before_title' => '<span class="footer-title">',
    'after_title' => '</span>'
));

register_sidebar(array(
    'id' => 'footer-widget-three',
    'name' => __('Footer content Widget three', $text_domain),
    'description' => __('This sidebar is located above the age logo.', $text_domain),
    'before_widget' => '<div id="%1$s" class="footer-widget widget %2$s">',
    'after_widget' => '</div>',
    'before_title' => '<span class="footer-title">',
    'after_title' => '</span>'
));

register_sidebar(array(
    'id' => 'footer-widget-four',
    'name' => __('Footer content Widget four', $text_domain),
    'description' => __('This sidebar is located above the age logo.', $text_domain),
    'before_widget' => '<div id="%1$s" class="footer-widget widget %2$s">',
    'after_widget' => '</div>',
    'before_title' => '<span class="footer-title">',
    'after_title' => '</span>'
));

register_sidebar(array(
    'id' => 'header-widget',
    'name' => __('Header Widget', $text_domain),
    'description' => __('This sidebar is located above the age logo.', $text_domain),
    'before_widget' => '<div id="%1$s" class="header-widget widget %2$s">',
    'after_widget' => '</div>',
    'before_title' => '<span class="header-title">',
    'after_title' => '</span>'
));