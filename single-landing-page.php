<?php

require __DIR__ . '/modules/get_landing_content.php';

get_header();

$featured_post = get_field('content');

get_landing_content($featured_post);

get_footer();
