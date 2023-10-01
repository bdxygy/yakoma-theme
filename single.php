<?php
get_header();

$featured_post = get_field('content');

if ($featured_post) {
    foreach ($featured_post as $post) {
        var_dump($post->post_type);
    }
}

while (have_posts()) {
    the_post(); ?>
    <h1><? the_title() ?></h1>
    <? the_content() ?>
<?php
}

get_footer();
?>