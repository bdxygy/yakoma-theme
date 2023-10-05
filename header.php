<?php
date_default_timezone_set('Asia/Jakarta');

$headerMenus = wp_get_nav_menu_items('main-menu-header');
$custom_logo_id = get_theme_mod('custom_logo');
$image = wp_get_attachment_image_src($custom_logo_id, 'full');

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php wp_head(); ?>
</head>

<body class="relative">
    <div class="hidden bg-blue-500"></div>
    <div class="hidden bg-red-500"></div>
    <div class="hidden bg-cyan-500"></div>
    <div class="hidden bg-zinc-500"></div>
    <!-- Mobile Navigation -->
    <div id="mobile-navigation" class="fixed inset-0 hidden lg:hidden bg-slate-950 text-white z-50 p-4">
        <button id="mobile-x-button" class="h-[40px] flex justify-end items-center w-full">
            <svg class="h-full" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
            </svg>
        </button>

        <ul class="flex flex-col items-center gap-7 justify-center text-lg">
            <?
            foreach ($headerMenus as $menu) {
            ?>
                <li class="nav-item"><a href="<?= $menu->url; ?>"><?= ucwords($menu->title); ?></a></li>
            <?
            }
            ?>
        </ul>
    </div>
    <!-- Mobile Navigation End -->

    <!-- Navigation -->
    <section class="sticky top-0 text-white bg-slate-950 mb-5 z-20">
        <!-- Articles Highlight -->
        <div class="bg-white text-black">
            <div class="container-page flex items-center w-full overflow-hidden p-0">
                <div id="current-time" class="hidden mr-2 md:block font-semibold"></div>
                <div class="bg-red-500 p-2 whitespace-nowrap text-white font-semibold">Article Terbaru</div>
                <div id="news-articles" class="p-2 whitespace-nowrap font-semibold"></div>
            </div>
        </div>
        <!-- Articles Highlight End -->

        <!-- Navigation List -->
        <nav class="h-[90px] container-page flex items-center justify-between">
            <?php if (has_custom_logo()) : ?>
                <a href="<?= site_url() ?>">
                    <img src="<?= $image[0]; ?>" alt="<?= get_bloginfo('name'); ?>" class="h-[50px] w-fit">
                </a>
            <?php else : ?>
                <h1 class="font-bold"><?= ucwords(get_bloginfo('name')); ?></h1>
            <?php endif; ?>

            <ul class="nav-dekstop-ul">
                <?
                foreach ($headerMenus as $menu) {
                ?>
                    <?php if ($menu->type_label == "Category") : ?>
                        <li class="nav-item" aria-label="button-link">
                            <button onclick="getRelatedCategory('<?= $menu->object_id; ?>', '<?= $menu->url; ?>')" class="flex items-center" aria-label="button-link"><?= ucwords($menu->title); ?>
                                <svg aria-label="button-link" class="h-4 w-4 ml-1" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                                </svg>
                            </button>
                        </li>
                    <?php else : ?>
                        <li class="nav-item">
                            <a href="<?= $menu->url; ?>"><?= ucwords($menu->title); ?></a>
                        </li>
                    <?php endif; ?>
                <?
                }
                ?>
            </ul>

            <button id="mobile-bar-button" class="block md:hidden h-[30px]">
                <svg class="h-full w-full" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentcolor" class="w-5 h-5">
                    <path fill-rule="evenodd" d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10zm0 5.25a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75a.75.75 0 01-.75-.75z" clip-rule="evenodd" />
                </svg>
            </button>
        </nav>
        <!-- Navigation List End -->

        <div id="category-list" class="hidden">
            <div class="flex w-full container-page pt-10">
                <a id="category-to-all" class="font-semibold text-red-500 flex items-center whitespace-nowrap cursor-pointer hover:opacity-60">Lihat Semua <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 ml-4">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12h15m0 0l-6.75-6.75M19.5 12l-6.75 6.75" />
                    </svg>
                </a>
            </div>
            <div id="category-list-content" class="hidden container-page md:grid md:grid-cols-2 lg:grid-cols-4 xl:grid-cols-5 gap-4 pt-5 pb-10">
            </div>
        </div>

    </section>
    <!-- Navigation End -->
    <main class="dark:text-white dark:bg-black">