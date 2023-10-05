<?php

$post_data = $args["post"];

$post = new ArrayObject(get_post($post_data->ID));
$post['thumbnail'] = get_the_post_thumbnail_url($post_data->ID);

// var_dump($post);
?>

<div class="ml-4 lg:container-page font-semibold w-full overflow-hidden mb-1" title="<?= strtoupper($post['post_title']); ?>">
    <a href="<?= $post['guid']; ?>" class="relative carousel-title pl-3 whitespace-nowrap"><?= strtoupper($post['post_title']); ?></a>
</div>
<div class="relative md:h-[462px] w-full">
    <a href="<?= $post['guid']; ?>" class="relative h-full">
        <img src="<?= $post['thumbnail']; ?>" alt="<?= $post['post_title']; ?>" style="object-fit: cover;" class="w-full h-full relative">
    </a>
</div>