<?php

while (have_posts()) {
    the_post(); ?>
    <h1><a href="<? the_permalink() ?>"><? the_title() ?></a></h1>
    <? the_content() ?>
    <?php
}

?>
