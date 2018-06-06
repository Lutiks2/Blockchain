<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package fstudia
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="http://gmpg.org/xfn/11">

    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <header class="container clearfix">
        <div class="site-branding">
            <h1><?php the_custom_logo(); ?></h1>
        </div><!-- .site-branding -->
        <nav class="site-navigation" id="menu">
            <a class="menu-bat" href="#">
                <span class="fa fa-bars"></span>
            </a>
            <?php
            wp_nav_menu(array(
                'theme_location' => 'primary',
                'menu_id' => 'primary-menu',
                'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                'menu_class' => 'site-list clearfix',
            ));
            ?>
        </nav><!-- #site-navigation -->



    </header><!-- #masthead -->

    <div id="content" class="site-content">
