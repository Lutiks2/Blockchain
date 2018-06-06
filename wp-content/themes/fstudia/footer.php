<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package fstudia
 */

?>

</div><!-- #content -->

<footer class="footer" style="background: <?php echo get_theme_mod('footer_backgr_color'); ?>">
    <div class="container clearfix">
        <div class="footer-block-copy">
            <div>
                <?php echo get_theme_mod('copywrite'); ?>
            </div>
        </div>
        <div class="footer-social">
            <?php wp_nav_menu(array(
                'theme_location' => 'social',
                'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                'menu_class' => 'social-nav',
            )); ?>
        </div>
    </div>
</footer>

<?php wp_footer(); ?>

</body>
</html>
