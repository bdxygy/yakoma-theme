<?php
require __DIR__ . '/modules/utils.php';

get_header();

$featured_post = get_field('content');

foreach ($featured_post as $post) {

    switch ($post->post_type) {
        case 'bundle-post':
            get_template_part('templates/bundle-post', null, [
                "category_id" => $post->category,
                'title' => $post->bundle_title,
            ]);
            break;

        default:
            # code...
            break;
    }
}

get_footer();
