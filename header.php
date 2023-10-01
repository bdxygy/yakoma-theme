<?
date_default_timezone_set('Asia/Jakarta');

$headerMenus = wp_get_nav_menu_items('main-menu-header');

foreach ($headerMenus as $menu) {
    var_dump("===============\n");

    var_dump($menu);
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <? wp_head(); ?>
</head>

<body class="relative">
    <div id="mobile-navigation" class="fixed inset-0 hidden bg-slate-950 text-white z-10 p-4">
        <button id="mobile-x-button" class="h-[40px] flex justify-end items-center w-full">
            <svg class="h-full" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
            </svg>

        </button>

        <ul class="flex flex-col items-center gap-7 justify-center text-lg">
            <li class="cursor-pointer"><a class="font-semibold hover:text-black/60" href="#">Home</a></li>
            <li class="cursor-pointer"><a class="font-semibold hover:text-black/60" href="#">Programs</a></li>
            <li class="cursor-pointer"><a class="font-semibold hover:text-black/60" href="#">Kajian</a></li>
            <li class="cursor-pointer"><a class="font-semibold hover:text-black/60" href="#">Ceramah</a></li>
            <li class=" cursor-pointer px-6 py-2 border border-red-500 rounded-full bg-red-500 hover:bg-red-500/25"><a class="font-semibold " href="#">Donasi</a></li>
            <!-- [&:last-child]:text-red-100 -->
            <!-- <li class="cursor-pointer"><a class="font-semibold hover:text-black/60 flex items-center" href="#">Cari <img class="h-[18px] ml-4" src="<?= get_template_directory_uri() ?>/dist/icons/scope.svg" alt=""></a></li> -->
        </ul>
    </div>
    <!-- Navigation -->
    <section class="sticky top-0 text-white bg-slate-950">
        <!-- Articles Highlight -->
        <div class="bg-white text-black">
            <div class="container-page flex items-center w-full overflow-hidden  p-0">
                <div id="current-time" class="hidden mr-2 md:block font-semibold"></div>
                <div class="bg-red-500 p-2 whitespace-nowrap text-white font-semibold">Article Terbaru</div>
                <div id="news-articles" class="p-2 whitespace-nowrap font-semibold"></div>
            </div>
        </div>
        <!-- Articles Highlight End -->

        <nav class="h-[90px] container-page flex items-center justify-between">
            <a href="#"><img src="<?= get_template_directory_uri() ?>/dist/images/logo.png" alt="Yakoma Logo" class="h-[50px] flex items-center"></a>
            <ul class="nav-dekstop-ul">
                <?
                foreach ($headerMenus as $menu) {
                ?>
                    <li class="nav-item"><a href="<?= $menu->url; ?>"><?= $menu->title; ?></a></li>
                <?
                }
                ?>

                <!-- <li class="cursor-pointer font-semibold hover:text-red-500"><a class="" href="#">Kajian</a></li>
                <li class="cursor-pointer font-semibold hover:text-red-500"><a class="" href="#">Bedah Buku</a></li>
                <li class="cursor-pointer font-semibold hover:text-red-500"><a class="" href="#">Ceramah</a></li>
                <li class=" cursor-pointer px-7 py-2 border border-red-500 rounded-full bg-red-500 hover:bg-red-500/25 text-white"><a class="font-semibold " href="#">Donasi</a></li> -->
                <!-- [&:last-child]:text-red-100 -->
                <!-- <li class="cursor-pointer"><a class="font-semibold hover:text-black/60" href="#">Ceramah</a></li> -->
            </ul>
            <button id="mobile-bar-button" class="block md:hidden h-[30px]">
                <svg class="h-full w-full" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentcolor" class="w-5 h-5">
                    <path fill-rule="evenodd" d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10zm0 5.25a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75a.75.75 0 01-.75-.75z" clip-rule="evenodd" />
                </svg>
            </button>
        </nav>
    </section>
    <!-- Navigation End -->
    <main class="dark:text-white dark:bg-black">
        <section class="prose-xl container-page">