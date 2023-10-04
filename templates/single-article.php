<?php
get_header();



while (have_posts()) {
    the_post();

    $post_id = get_the_ID();
    $thumbnail = get_the_post_thumbnail_url($post_id);

?>

    <article class="prose-lg prose-headings:font-semibold container-page">
        <h1><?php the_title() ?></h1>

        <?php if ($thumbnail) : ?>
            <img class="mx-auto" src="<?= $thumbnail; ?>" alt="">
        <?php endif; ?>

        <?php the_content() ?>
    </article>

<?php
}

get_footer();
?>