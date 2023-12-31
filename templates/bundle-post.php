<?php

include __DIR__ . '/../modules/formatted_date.php';
require __DIR__ . '/../modules/get_post_by_category_id.php';
include __DIR__ . '/../modules/constant.php';

$colorIndex = array_rand($COLORS);
$cat_color = $COLORS[$colorIndex];

$category_id = $args['category_id'];
$title = $args['title'];

$post_response = get_post_by_category_id($category_id, 5);
$cat_name = get_cat_name($category_id);
$cat_url = get_category_link($category_id);

$post_response = $post_response->posts;

if (!empty($post_response)) {
    foreach ($post_response as $post) {
        $post->thumbnail = get_the_post_thumbnail_url($post->ID);
        $post->author = get_userdata($post->post_author);
    };
};


?>

<div class="bundle-post-container border p-4">
    <div class="flex w-full justify-between">
        <h1 class="p-1 px-2 font-semibold text-black border my-1 w-fit border-black"><?= $title; ?></h1>
        <a class="bg-<?= $cat_color; ?>-500 p-1 px-2 ml-2 my-1 rounded-sm text-white font-semibold flex items-center w-fit hover:opacity-60" href="<?= $cat_url; ?>">LIHAT SEMUA <?= strtoupper($cat_name); ?>
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 ml-2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12.75 15l3-3m0 0l-3-3m3 3h-7.5M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>

        </a>
    </div>
    <div class="bundle-post-container-content">
        <?php if (!empty($post_response)) : ?>
            <?php foreach ($post_response as $index => $post) : ?>
                <a href="<?= $post->guid; ?>" class="bundle-post-item relative <?= $index == 0 ? 'expanded' : ''; ?>">
                    <div class="absolute bg-<?= $cat_color; ?>-500 p-1 px-2 text-white font-semibold right-0 m-4 text-xs"><?= strtoupper($cat_name); ?></div>
                    <div class="title-container text-white">
                        <small><?= get_formatted_date($post->post_date); ?></small>
                        <h1><?= $post->post_title; ?></h1>
                        <small class="flex items-center"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-3 h-3 mr-1">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L6.832 19.82a4.5 4.5 0 01-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 011.13-1.897L16.863 4.487zm0 0L19.5 7.125" />
                            </svg>
                            <?= ucwords($post->author->display_name); ?>
                        </small>
                    </div>
                    <div class="overlay-background"></div>
                    <img src="<?= $post->thumbnail; ?>" style="object-fit: cover;" alt="<?= $post->post_title; ?>" class="">
                </a>
            <?php endforeach; ?>
        <?php else : ?>
        <?php endif; ?>
    </div>
</div>