<?php

require __DIR__ . '/modules/formatted_date.php';

get_header();

$event_name = get_field("name");
$description = get_field("description");

$start_date = get_field("start_date");
$start_date = new DateTime($start_date);
$start_date->modify('+1 day');
$start_date = $start_date->format('Y-m-d');

$end_date = get_field("end_date");
$end_date = new DateTime($end_date);
$end_date->modify('+1 day');
$end_date = $end_date->format('Y-m-d');

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

    <div class="container-page mb-10 flex w-full flex-col">
        <div class="flex w-full h-full">
            <div class="flex flex-col w-full">
                <div class="font-semibold whitespace-nowrap">Nama :</div>
                <div><?= $event_name ?></div>
                <div class="font-semibold whitespace-nowrap">Deskripsi :</div>
                <div><?= $description ?></div>
                <div class="font-semibold whitespace-nowrap">Waktu Mulai :</div>
                <div><?= $start_time ?> WIB</div>
                <div class="font-semibold whitespace-nowrap">Tanggal Mulai :</div>
                <div><?= get_formatted_date($start_date) ?></div>
                <div class="font-semibold whitespace-nowrap">Tanggal Berakhir :</div>
                <div><?= get_formatted_date($end_date) ?></div>
                <div class="font-semibold whitespace-nowrap">Waktu Berakhir :</div>
                <div><?= $end_time ?> WIB</div>
                <div class="font-semibold whitespace-nowrap">Lokasi :</div>
                <div><?= $location ?></div>
            </div>
        </div><br>
        <div class="flex flex-col items-center justify-center w-full h-full mt-4">
            <div class="flex items-center">
                <h1 class="font-semibold mr-4">Tambahkan ke Kalender</h1> <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 3.75V16.5L12 14.25 7.5 16.5V3.75m9 0H18A2.25 2.25 0 0120.25 6v12A2.25 2.25 0 0118 20.25H6A2.25 2.25 0 013.75 18V6A2.25 2.25 0 016 3.75h1.5m9 0h-9" />
                </svg>

            </div>
            <add-to-calendar-button name="<?= $event_name ?>" description="<?= $description ?>" startDate="<?= $start_date ?>" startTime="<?= $start_time ?>" endDate="<?= $end_date ?>" endTime="<?= $end_time ?>" timeZone="Asia/Jakarta" location="<?= $location ?>" options="'Apple','Google','iCal','Outlook.com','Yahoo','Microsoft365','MicrosoftTeams'" buttonStyle="date" trigger="click" language="id"></add-to-calendar-button>
        </div>
    </div>



<?php
}

get_footer();
?>

<!-- <div class="h-[500px] flex items-center justify-center bg-red-500">
        <h1 class="font-bold text-2xl">Not Found Content!</h1>
    </div> -->