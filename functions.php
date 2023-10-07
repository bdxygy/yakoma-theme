<?php

// function yakoma_custom_styles()
// {
//     wp_enqueue_style(
//         'yakoma_style',
//         get_template_directory_uri() . '/dist/main.min.css'
//     );
// }

// add_action('wp_enqueue_scripts', 'yakoma_custom_styles');

function yakoma_custom_scripts()
{
    wp_enqueue_script(
        'yakoma_script',
        get_template_directory_uri() . '/dist/main.min.js',
        [],
        null,
        true
    );
}

add_action('wp_enqueue_scripts', 'yakoma_custom_scripts');

function yakoma_features()
{
    // register_nav_menu('mainHeaderMenuNavigation', 'Main Header Menu Navigation');
    register_nav_menus([
        'main-header-menu-navigation' => __("New Main Header Menu Navigation", 'Yakoma-theme'),
    ]);

    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');

    $logoOptions = [
        'height'               => 50,
        'flex-height'          => true,
        'flex-width'           => true,
        'header-text'          => array('site-title', 'site-description'),
        'unlink-homepage-logo' => true
    ];
    add_theme_support('custom-logo', $logoOptions);
}


add_action('after_setup_theme', 'yakoma_features');


function enable_page_excerpts()
{
    add_post_type_support('page', 'excerpt');
    add_post_type_support('landing-page', 'excerpt');
}
add_action('init', 'enable_page_excerpts');
