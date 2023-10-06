<?php

require __DIR__ . '/../modules/formatted_date.php';

$posts_id = $args['posts_id'];
$title = $args['title'];

$posts = [];

foreach ($posts_id as $post_id) {
    $current_post = new ArrayObject(get_post($post_id));
    $current_post['thumbnail'] = get_the_post_thumbnail_url($post_id);
    $current_post['author'] = get_userdata($current_post['post_author']);

    array_push($posts, $current_post);
}
?>

<div class="ml-4 lg:container-page font-semibold w-full">
    <h1 class="py-1 relative carousel-title pl-3"><?= strtoupper($title); ?></h1>
</div>
<swiper-container slides-per-view="1" speed="500" loop="true" class="container-page mb-10 w-full" navigation="true">
    <?php foreach ($posts as $post) : ?>
        <swiper-slide class="relative md:h-[459px] w-full">
            <div class="relative h-full">
                <img src="<?= $post['thumbnail']; ?>" alt="<?= $post['post_title']; ?>" style="object-fit: cover;" class="w-full h-full relative">
            </div>
            <a href="<?= $post['guid']; ?>" class="absolute inset-0 bg-gradient-to-t from-black via-slate-950/50 to-white/0"></a>
            <!-- <div class="absolute inset-0 bg-gradient-to-t from-black via-slate-950/50 to-white/0"></div> -->
            <a href="<?= $post['guid']; ?>" class="absolute p-4 text-white bottom-0">
                <small><?= get_formatted_date($post['post_date']); ?></small>
                <h1 class="font-semibold text-4xl"><?= $post['post_title']; ?></h1>
                <small class="flex items-center"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-3 h-3 mr-1">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L6.832 19.82a4.5 4.5 0 01-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 011.13-1.897L16.863 4.487zm0 0L19.5 7.125" />
                    </svg>
                    <?= ucwords($post['author']->display_name); ?>
                </small>
            </a>
        </swiper-slide>
    <?php endforeach; ?>
</swiper-container>