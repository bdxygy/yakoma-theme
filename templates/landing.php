<?php

$post_data = $args["post"];

$post = new ArrayObject(get_post($post_data->ID));
$post['thumbnail'] = get_the_post_thumbnail_url($post_data->ID);

?>
<div class="lg:container-page mb-10">
    <div class="font-semibold w-full overflow-hidden py-1" title="<?= strtoupper($post['post_title']); ?>">
        <a href="<?= $post['guid']; ?>" class="relative carousel-title pl-3 whitespace-nowrap"><?= strtoupper($post['post_title']); ?></a>
    </div>
    <div class="relative md:h-[462px] w-full">
        <a href="<?= $post['guid']; ?>" class="relative h-full group">
            <img src="<?= $post['thumbnail']; ?>" alt="<?= $post['post_title']; ?>" style="object-fit: cover;" class="w-full h-full relative">
            <div class="absolute top-0 bottom-0 left-0 right-0 bg-gradient-to-t from-black via-slate-950/50 to-white/0 group-hover:opacity-60"></div>
            <div class="absolute bottom-0 p-4 font-semibold text-white">
                <h1 class="text-xl"><?= ucfirst($post['post_excerpt']) ?></h1>
            </div>
        </a>
    </div>
</div>