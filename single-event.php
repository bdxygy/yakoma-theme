<?php

get_header();

$event_name = get_field("name");
$description = get_field("description");
$start_date = get_field("start_date");
$end_date = get_field("end_date");

$start_time = get_field("start_time");
$start_time = new DateTime($start_time);
$start_time->modify('+7 hours');
$start_time = $start_time->format('H:i:s');

$end_time = get_field("end_time");
$end_time = new DateTime($end_time);
$end_time->modify('+7 hours');
$end_time = $end_time->format('H:i:s');

$location = get_field("location");

while (have_posts()) {
    the_post();

    $post_id = get_the_ID();
    $thumbnail = get_the_post_thumbnail_url($post_id);

?>

    <article class="prose prose-headings:font-semibold container-page mb-10">
        <h1><?php the_title() ?></h1>
        <small><?php the_author() ?></small>

        <?php if ($thumbnail) : ?>
            <img class="mx-auto" src="<?= $thumbnail; ?>" alt="">
        <?php endif; ?>

        <?php the_content() ?>
    </article>

    <div class="container-page">
        <div class="flex">
            <span class="font-semibold whitespace-nowrap">Name :</span> <span class="ml-4"><?= $event_name ?></span>
        </div>

        <div class="flex">
            <span class="font-semibold whitespace-nowrap">Deskripsi :</span> <span class="ml-4"><?= $description ?></span>
        </div>

        <div class="flex">
            <span class="font-semibold whitespace-nowrap">Tanggal Mulai :</span> <span class="ml-4"><?= $start_date ?></span>
        </div>
        <div class="flex">
            <span class="font-semibold whitespace-nowrap">Waktu Mulai :</span> <span class="ml-4"><?= $start_time ?> WIB</span>
        </div>
        <div class="flex">
            <span class="font-semibold whitespace-nowrap">Tanggal Berakhir :</span> <span class="ml-4"><?= $end_date ?></span>
        </div>
        <div class="flex">
            <span class="font-semibold whitespace-nowrap">Waktu Berakhir :</span> <span class="ml-4"><?= $end_time ?> WIB</span>
        </div>
        <div class="flex">
            <span class="font-semibold whitespace-nowrap">Lokasi :</span> <span class="ml-4"><?= $location ?></span>
        </div>
    </div>

<?php
}

get_footer();
?>

<!-- <div class="h-[500px] flex items-center justify-center bg-red-500">
        <h1 class="font-bold text-2xl">Not Found Content!</h1>
    </div> -->