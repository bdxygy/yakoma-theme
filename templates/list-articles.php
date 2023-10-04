<?php
get_header();



while (have_posts()) {
    the_post();

    $post_id = get_the_ID();
    $thumbnail = get_the_post_thumbnail_url($post_id);

?>

    <article class="prose prose-headings:font-bold container-page">
        <h1><?php the_title() ?></h1>
        <img class="mx-auto" src="<?= $thumbnail; ?>" alt="">
        <?php the_excerpt() ?>
    </article>
<?php
}

get_footer();
?>