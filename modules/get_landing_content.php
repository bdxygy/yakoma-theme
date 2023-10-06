<?php


if (!function_exists('get_landing_content')) {
    function get_landing_content($post_feature)
    {
        if (!is_object($post_feature) && count($post_feature) > 0) {
            foreach ($post_feature as $index => $post) {
                switch ($post->post_type) {
                    case 'grid-post':
                        get_template_part('templates/grid-post', null, [
                            "post_data" => $post
                        ]);
                        unset($post_feature[$index]);
                        break;
                    case 'bundle-post':
                        get_template_part('templates/bundle-post', null, [
                            "category_id" => $post->category,
                            'title' => $post->bundle_title,
                        ]);
                        unset($post_feature[$index]);
                        break;

                    case 'carousel':
                        get_template_part('templates/carousel', null, [
                            'posts_id' => $post->posts,
                            'title' => $post->carousel_title,
                        ]);
                        unset($post_feature[$index]);
                        break;

                    case 'flex-post':
                        get_template_part('templates/flex-post', null, [
                            'posts' => $post,
                        ]);
                        unset($post_feature[$index]);
                        break;

                    case 'landing-page':
                        get_template_part('templates/landing', null, [
                            'post' => $post,
                        ]);
                        unset($post_feature[$index]);
                        break;

                    default:
                        break;
                }
            }
        } else if (is_object($post_feature) && !empty($post_feature)) {
            switch ($post_feature->post_type) {
                case 'bundle-post':
                    get_template_part('templates/bundle-post', null, [
                        "category_id" => $post_feature->category,
                        'title' => $post_feature->bundle_title,
                    ]);
                    break;

                case 'carousel':
                    get_template_part('templates/carousel', null, [
                        'posts_id' => $post_feature->posts,
                        'title' => $post_feature->carousel_title,
                    ]);
                    break;

                case 'landing-page':
                    get_template_part('templates/landing', null, [
                        'post' => $post_feature,
                    ]);
                    break;

                default:
                    break;
            }
        };
    }
}
