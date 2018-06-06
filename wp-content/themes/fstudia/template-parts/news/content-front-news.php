<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package fstudia
 */

?>

<div class="news-list-wrap">
    <div class="news-list-img">
        <?php the_post_thumbnail(); ?>
    </div>
    <h4 class="news-title"><?php the_title(); ?></h4>
    <span class="time"><?php the_time('j. m. Y'); ?></span>
    <p><?php the_excerpt(); ?></p>
    <a class="reed" href="<?php the_permalink(); ?>">Reed more</a>
</div>