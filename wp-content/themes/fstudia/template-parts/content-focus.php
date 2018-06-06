<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package fstudia
 */

?>

<li>
    <div class="focus-img">
        <?php the_post_thumbnail(); ?>
    </div>
    <h4 class="focus-title"><?php the_title(); ?></h4>
</li>