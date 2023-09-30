<?php

function yakoma_custom_styles()
{
    wp_enqueue_style(
        'yakoma_style',
        get_template_directory_uri() . '/dist/css/src.css'
    );
}

add_action('wp_enqueue_scripts', 'yakoma_custom_styles');
