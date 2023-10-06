<?php

require __DIR__ . '/modules/get_landing_content.php';

get_header();

$featured_post = get_field('content');

?>

<?php if (!empty($featured_post)) : ?>
    <?php get_landing_content($featured_post); ?>
<?php else : ?>
    <div class="h-[500px] flex items-center justify-center bg-red-500">
        <h1 class="font-bold text-2xl">Not Found Content!</h1>
    </div>
<?php endif; ?>

<?php
get_footer();
?>