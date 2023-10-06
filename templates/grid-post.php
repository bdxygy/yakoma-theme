<?php

require __DIR__ . '/../modules/get_grid_content.php';
require __DIR__ . '/../modules/formatted_date.php';
include __DIR__ . '/../modules/constant.php';

$colorIndex = array_rand($COLORS);
$cat_color = $COLORS[$colorIndex];

$post = $args["post_data"];

$posts = get_grid_content($post);

?>

<div class="container-page mb-10">
    <h1 class="carousel-title relative font-semibold pl-3"><?= strtoupper($post->post_title); ?></h1>
    <div class="grid w-full grid-col-1 lg:grid-cols-2 gap-4">
        <?php foreach ($posts as $index => $post) : ?>
            <a href="<?= $post['guid']; ?>" class="flex flex-col w-full relative group">
                <div class="relative">
                    <img src="<?= $post['thumbnail']; ?>" class="object-cover w-full aspect-video relative" alt="<?= $post['post_title']; ?>">
                    <div class="absolute top-0 bottom-0 left-0 right-0 bg-gradient-to-t from-black via-slate-950/50 to-white/0 group-hover:!bg-none"></div>
                    <?php if (count($post['categories']) > 0) : ?>
                        <span class="absolute bg-<?= $cat_color ?>-500 p-1 text-white text-sm font-semibold top-2 right-2"><?= strtoupper($post['categories'][0]->name) ?></span>
                    <?php endif; ?>
                </div>
                <span class="flex items-center py-1 font-semibold group-hover:opacity-80">
                    <small class="flex items-center mr-2"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-3 h-3 mr-1">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L6.832 19.82a4.5 4.5 0 01-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 011.13-1.897L16.863 4.487zm0 0L19.5 7.125" />
                        </svg>
                        <?= ucwords($post['author']->display_name); ?>
                    </small> |
                    <small class="ml-2"><?= get_formatted_date($post['post_date']); ?></small>
                </span>
                <h1 class="text-lg font-semibold group-hover:opacity-80"><?= ucwords($post['post_title']); ?></h1>
                <p class="group-hover:opacity-80"><?= ucfirst($post['post_excerpt']); ?></p>
            </a>
        <?php endforeach; ?>
    </div>
</div>