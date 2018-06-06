<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package fstudia
 */

?>

<div class="team-wrap">
    <div class="team-img">
        <?php the_post_thumbnail(); ?>
    </div>
    <h4 class="team-title"><?php the_title(); ?></h4>
    <p class="team-content"><?php the_content(); ?></p>
    <div>
        <?php wp_nav_menu(array(
            'theme_location' => 'team-link',
            'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',
            'menu_class' => 'social-nav',
        )); ?>
    </div>
</div>