<?php

$post_data = $args["posts"];

$post = get_post($post_data->ID);
$main_content = get_post($post->main_content);
$secondary_content = get_post($post->secondary_content);

// var_dump($main_content->post_type, $secondary_content->post_type);
?>

<div class="container-page flex flex-col lg:flex-row w-full gap-4 text-xs leading-none overflow-hidden 
 <?= boolval($post->reverse_column) ? 'flex-col-reverse lg:flex-row-reverse' : '' ?>">
    <div class="w-full lg:w-3/4">
        <?= get_landing_content($main_content) ?>
    </div>
    <div class="w-full lg:w-1/4">
        <?= get_landing_content($secondary_content) ?>
    </div>
</div>