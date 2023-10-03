<?php


function get_post_by_category_id(string $id, int $post_length = 6)
{

    // var_dump($id, "ID");

    $queryParams = array(
        'cat' => $id,
        'post_type' => 'post',
        'posts_per_page' => $post_length,
        'orderby' => 'date',
        'order' => 'DESC',
    );

    return new WP_Query($queryParams);
}
