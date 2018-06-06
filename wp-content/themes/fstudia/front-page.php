<?php
/**
 * * The front page template file
 * Created by PhpStorm.
 * User: luda
 * Date: 03.05.2018
 * Time: 10:20
 */

get_header();
?>
<section class="welcome"
         style="background: url('<?php echo get_theme_mod('set_background'); ?>') no-repeat center/cover">
</section>
<section class="about container" id="about">
    <div class="about-block">
        <h2><?php echo get_bloginfo('description', 'display'); ?></h2>
        <a class="about-button buttons"
           href="<?php echo get_theme_mod('about_url_button'); ?>"
           style="background: <?php echo get_theme_mod('about_button_color'); ?>">
            <?php echo get_theme_mod('about_button'); ?>
        </a>
    </div>
    <div class="about-descript clearfix">
        <div class="about-descript-text">
            <h3 class="heading"><?php echo get_theme_mod('about_heading'); ?></h3>
            <p class="text-descr"><?php echo get_theme_mod('about_description'); ?></p>
            <p class="text-descr"><?php echo get_theme_mod('about_description_next'); ?></p>
        </div>
        <div class="about-descript-image">
            <img src="<?php echo get_theme_mod('about_img'); ?>" alt="tel">
        </div>
    </div>
</section>
<section class="focus container" id="career">
    <h3 class="heading"><?php echo get_theme_mod('focus_heading'); ?></h3>
    <ul class="focus-list">
        <?php
        $args = [
            'post_type' => 'focus',
            'order' => 'ASC',
            'posts_per_page' => 6,
        ];
        query_posts($args);
        while (have_posts()) : the_post();
            get_template_part('template-parts/content', 'focus');
        endwhile;
        ?>
    </ul>
</section>
<section class="about-second" style="background: <?php echo get_theme_mod('about_second_backgr_color'); ?>">
    <div class="container clearfix">
        <div class="about-second-descript-image">
            <img src="<?php echo get_theme_mod('about_second_img'); ?>" alt="clock">
        </div>
        <div class="about-second-descript-text">
            <h3 class="heading"><?php echo get_theme_mod('about_second_heading'); ?></h3>
            <p class="text-descr"><?php echo get_theme_mod('about_second_description'); ?></p>
            <a class="about-second-button buttons"
               href="<?php echo get_theme_mod('about_second_url_button'); ?>"
               style="background: <?php echo get_theme_mod('about_second_button_color'); ?>">
                <?php echo get_theme_mod('about_second_button'); ?>
            </a>
        </div>
    </div>
</section>
<section class="team container">
    <h3 class="heading"><?php echo get_theme_mod('team_heading'); ?></h3>
    <div class="multiple-items">
            <?php
            $args = [
                'post_type' => 'team',
            ];
            query_posts($args);
            while (have_posts()) : the_post();
            get_template_part('template-parts/content', 'team');
            endwhile;
            ?>
    </div>

</section>
<section class=" never container clearfix">
    <div class="never-text">
        <h3 class="heading"><?php echo get_theme_mod('never_heading'); ?></h3>
        <p class="text-descr"><?php echo get_theme_mod('never_description'); ?></p>
        <ul class="never-list">
            <li>
                <a href="#">
                    <img src="<?php echo get_theme_mod('app_img'); ?>" alt="app">
                </a>
            </li>
            <li>
                <a href="#">
                    <img src="<?php echo get_theme_mod('google_img'); ?>" alt="app">
                </a>
            </li>
        </ul>
    </div>
    <div class="never-image">
        <img src="<?php echo get_theme_mod('never_img'); ?>" alt="tel">
    </div>
</section>
<section class="news container" id="news">
    <h3 class="heading"><?php echo get_theme_mod('news_heading'); ?></h3>
    <div class="news-list">
        <?php
        $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
        $args = [
//                'order' => 'ASC',
            'posts_per_page' => 3,
            'paged' => $paged,
        ];
        query_posts($args);
        while (have_posts()) :
            the_post();
            get_template_part('template-parts/news/content', 'front-news');
        endwhile; ?>
        <?php if ($wp_query->max_num_pages > 1) : ?>
            <script>
              var ajaxurl = '<?php echo site_url() ?>/wp-admin/admin-ajax.php'
              var true_posts = '<?php echo serialize($wp_query->query_vars); ?>'
              var current_page = <?php echo (get_query_var('paged')) ? get_query_var('paged') : 1; ?>;
              var max_pages = '<?php echo $wp_query->max_num_pages; ?>'
            </script>
            <div id="true_loadmore" class="load-my-posts">Load more</div>
        <?php endif; ?>
        <?php wp_reset_query();
        ?>
    </div>
</section>
<section class="partners container">
    <h3 class="heading"><?php echo get_theme_mod('partners_heading'); ?></h3>
    <?php $partners = get_post_meta(5, 'partner', false); ?>
    <ul class="partners-list">
        <?php foreach ($partners as $partner) {
            echo '<li>' . $partner . '</li>';
        } ?>
    </ul>
</section>
<section class="contact container" id="contact">
    <div class="contact-form">
        <h3 class="heading"><?php echo get_theme_mod('contact_heading'); ?></h3>

        <?php echo do_shortcode('[contact-form-7 id="97" title="Contact us"]'); ?>
    </div>
</section>


<?php get_footer(); ?>
