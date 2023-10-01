<?
date_default_timezone_set('Asia/Jakarta')
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <? wp_head(); ?>
</head>

<body class="relative">
    <div id="mobile-navigation" class="fixed inset-0 hidden bg-white z-10 p-4">
        <button id="mobile-x-button" class="h-[40px] flex justify-end items-center w-full">
            <img src="<?= get_template_directory_uri() ?>/dist/icons/x.svg" alt="" class="h-full">
        </button>

        <ul class="flex flex-col items-center gap-7 justify-center text-lg">
            <li class="cursor-pointer"><a class="font-semibold hover:text-black/60" href="#">Home</a></li>
            <li class="cursor-pointer"><a class="font-semibold hover:text-black/60" href="#">Programs</a></li>
            <li class="cursor-pointer"><a class="font-semibold hover:text-black/60" href="#">Kajian</a></li>
            <li class="cursor-pointer"><a class="font-semibold hover:text-black/60" href="#">Ceramah</a></li>
            <li class=" cursor-pointer px-4 py-2 border border-red-500 rounded-full text-red-500 hover:bg-red-500/25"><a class="font-semibold " href="#">Donasi</a></li>
            <!-- [&:last-child]:text-red-100 -->
            <!-- <li class="cursor-pointer"><a class="font-semibold hover:text-black/60 flex items-center" href="#">Cari <img class="h-[18px] ml-4" src="<?= get_template_directory_uri() ?>/dist/icons/scope.svg" alt=""></a></li> -->
        </ul>
    </div>
    <!-- Navigation -->
    <section class="sticky top-0 bg-white">
        <!-- Articles Highlight -->

        <div class="container-page flex items-center w-full overflow-hidden border-b">
            <div id="current-time" class="hidden mr-2 md:block font-semibold"></div>
            <div class="bg-red-500 p-2 whitespace-nowrap text-white font-semibold">Article Terbaru</div>
            <div id="news-articles" class="p-2 whitespace-nowrap font-semibold"></div>
        </div>

        <!-- Articles Highlight End -->
        <nav class="h-[90px] container-page flex items-center justify-between">
            <a href="#"><img src="<?= get_template_directory_uri() ?>/dist/images/logo.png" alt="Yakoma Logo" class="h-[50px] flex items-center"></a>
            <ul class="hidden md:flex items-center gap-7 justify-center text-lg">
                <li class="cursor-pointer"><a class="font-semibold hover:text-black/60" href="#">Home</a></li>
                <li class="cursor-pointer"><a class="font-semibold hover:text-black/60" href="#">Programs</a></li>
                <li class="cursor-pointer"><a class="font-semibold hover:text-black/60" href="#">Kajian</a></li>
                <li class="cursor-pointer"><a class="font-semibold hover:text-black/60" href="#">Bedah Buku</a></li>
                <li class="cursor-pointer"><a class="font-semibold hover:text-black/60" href="#">Ceramah</a></li>
                <li class=" cursor-pointer px-4 py-2 border border-red-500 rounded-full text-red-500 hover:bg-red-500/25"><a class="font-semibold " href="#">Donasi</a></li>
                <!-- [&:last-child]:text-red-100 -->
                <!-- <li class="cursor-pointer"><a class="font-semibold hover:text-black/60" href="#">Ceramah</a></li> -->
            </ul>
            <button id="mobile-bar-button" class="block md:hidden h-[30px] text-black">
                <img src="<?= get_template_directory_uri() ?>/dist/icons/bar.svg" alt="" class="h-full w-full">
            </button>
        </nav>
    </section>
    <!-- Navigation End -->
    <main class="dark:text-white dark:bg-black">
        <section class="prose-xl container-page">