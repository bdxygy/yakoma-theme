<?php



if (!function_exists('get_grid_content')) {
    function get_grid_content(WP_Post $featured_post)
    {
        $posts = [];
        $array_posts = [];

        $query_params = [
            'post_type' => 'post',
            'posts_per_page' => 4,
            'orderby' => 'date',
            'order' => 'DESC',
        ];

        if ($featured_post->choose == 'latest') {
            $posts = new WP_Query($query_params);
            $posts = $posts->posts;
        } else if ($featured_post->choose == 'category') {
            $query_params['cat'] = $featured_post->category;
            $posts = new WP_Query($query_params);
            $posts = $posts->posts;
        } else {
            foreach ($featured_post->posts as $p) {
                array_push($posts, get_post($p));
            }
        }


        foreach ($posts as $post) {
            array_push($array_posts, new ArrayObject($post));
        }

        foreach ($array_posts as $post) {
            $post['thumbnail'] = get_the_post_thumbnail_url($post['ID']);
            $post['author'] = get_userdata($post['post_author']);

            $categories = wp_get_post_categories($post['ID']);
            $cats = [];
            foreach ($categories as $cat) {
                array_push($cats, get_category($cat));
            }

            $post['categories'] = $cats;
        }

        return $array_posts;
    }
}
