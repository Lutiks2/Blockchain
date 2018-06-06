<?php
/**
 * fstudia functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package fstudia
 */

if (!function_exists('fstudia_setup')) :
    /**
     * Sets up theme defaults and registers support for various WordPress features.
     *
     * Note that this function is hooked into the after_setup_theme hook, which
     * runs before the init hook. The init hook is too late for some features, such
     * as indicating support for post thumbnails.
     */
    function fstudia_setup()
    {
        /*
         * Make theme available for translation.
         * Translations can be filed in the /languages/ directory.
         * If you're building a theme based on fstudia, use a find and replace
         * to change 'fstudia' to the name of your theme in all the template files.
         */
        load_theme_textdomain('fstudia', get_template_directory() . '/languages');

        // Add default posts and comments RSS feed links to head.
        add_theme_support('automatic-feed-links');

        /*
         * Let WordPress manage the document title.
         * By adding theme support, we declare that this theme does not use a
         * hard-coded <title> tag in the document head, and expect WordPress to
         * provide it for us.
         */
        add_theme_support('title-tag');

        /*
         * Enable support for Post Thumbnails on posts and pages.
         *
         * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
         */
        add_theme_support('post-thumbnails');

        // This theme uses wp_nav_menu() in one location.
        register_nav_menus(array(
            'primary' => esc_html__('Primary', 'fstudia'),
            'team-link' => esc_html__( 'Teem', 'fstudia' ),
            'social' => esc_html__('Social', 'fstudia'),
        ));

        /*
         * Switch default core markup for search form, comment form, and comments
         * to output valid HTML5.
         */
        add_theme_support('html5', array(
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
        ));

        // Set up the WordPress core custom background feature.
        add_theme_support('custom-background', apply_filters('fstudia_custom_background_args', array(
            'default-color' => 'ffffff',
            'default-image' => '',
        )));

        // Add theme support for selective refresh for widgets.
        add_theme_support('customize-selective-refresh-widgets');

        /**
         * Add support for core custom logo.
         *
         * @link https://codex.wordpress.org/Theme_Logo
         */
        add_theme_support('custom-logo', array(
            'height' => 250,
            'width' => 250,
            'flex-width' => true,
            'flex-height' => true,
        ));
    }
endif;
add_action('after_setup_theme', 'fstudia_setup');

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function fstudia_content_width()
{
    // This variable is intended to be overruled from themes.
    // Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
    // phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
    $GLOBALS['content_width'] = apply_filters('fstudia_content_width', 640);
}

add_action('after_setup_theme', 'fstudia_content_width', 0);

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function fstudia_widgets_init()
{
    register_sidebar(array(
        'name' => esc_html__('Sidebar', 'fstudia'),
        'id' => 'sidebar-1',
        'description' => esc_html__('Add widgets here.', 'fstudia'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget' => '</section>',
        'before_title' => '<h2 class="widget-title">',
        'after_title' => '</h2>',
    ));
}

add_action('widgets_init', 'fstudia_widgets_init');

/**
 * Enqueue scripts and styles.
 */
function fstudia_scripts()
{
    wp_enqueue_style('fstudia-style', get_stylesheet_uri());
    // font awesome
    wp_enqueue_style('font-awesome', 'https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css');
    // fonts
    wp_enqueue_style('open-sans', 'https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i&amp;subset=cyrillic" rel="stylesheet"');
    wp_enqueue_style('muli', 'https://fonts.googleapis.com/css?family=Muli:300,400,700" rel="stylesheet"');
    //slick style
    wp_enqueue_style('theme-slider', 'https://cdn.jsdelivr.net/gh/kenwheeler/slick@1.8.1/slick/slick.css');
    // main css
    wp_enqueue_style('main-style', get_template_directory_uri() . '/css/main.css');

    wp_enqueue_script('fstudia-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true);

    wp_enqueue_script('fstudia-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true);

    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
}

add_action('wp_enqueue_scripts', 'fstudia_scripts');

function jquery_init()
{
    if (!is_admin()) {
        wp_enqueue_script('jquery');
    }
}

add_action('wp_enqueue_scripts', 'jquery_init');

function add_my_scripts()
{
    wp_enqueue_script('slider-js', 'https://cdn.jsdelivr.net/gh/kenwheeler/slick@1.8.1/slick/slick.min.js');
    wp_enqueue_script('main-js', get_template_directory_uri() . '/js/main.js');
}

add_action('wp_enqueue_scripts', 'add_my_scripts');
/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if (defined('JETPACK__VERSION')) {
    require get_template_directory() . '/inc/jetpack.php';
}

add_action('init', 'true_register_focus');

function true_register_focus()
{
    $labels = array(
        'name' => 'Focus',
        'singular_name' => 'Focus',
        'add_new' => 'Add focus',
        'add_new_item' => 'Add new focus',
        'edit_item' => 'Edit focus',
        'new_item' => 'New focus',
        'all_items' => 'All focus',
        'view_item' => 'View focus',
        'search_items' => 'Search focus',
        'not_found' => 'Focus not found.',
        'menu_name' => 'Focuses'
    );
    $args = array(
        'labels' => $labels,
        'public' => true,
        'menu_icon' => 'dashicons-cart',
        'menu_position' => 6,
        'has_archive' => true,
        'supports' => array('title', 'editor', 'thumbnail'),
        'taxonomies' => array('post_tag')
    );
    register_post_type('focus', $args);
}

add_action('init', 'true_register_team');

function true_register_team()
{
    $labels = array(
        'name' => 'Team',
        'singular_name' => 'Team',
        'add_new' => 'Add team',
        'add_new_item' => 'Add new team',
        'edit_item' => 'Edit team',
        'new_item' => 'New team',
        'all_items' => 'All team',
        'view_item' => 'View team',
        'search_items' => 'Search team',
        'not_found' => 'Focus not team.',
        'menu_name' => 'Team'
    );
    $args = array(
        'labels' => $labels,
        'public' => true,
        'menu_icon' => 'dashicons-groups',
        'menu_position' => 6,
        'has_archive' => true,
        'supports' => array('title', 'editor', 'thumbnail'),
        'taxonomies' => array('post_tag')
    );
    register_post_type('team', $args);
}

/// new exerpt length
function new_excerpt_length($length)
{
    return 18;
}

add_filter('excerpt_length', 'new_excerpt_length');

add_filter('excerpt_more', function ($more) {
    return '...';
});

function add_custom_child_script()
{
    wp_enqueue_script('ajax_events', get_stylesheet_directory_uri() . ('/js/ajax_events.js'), array('jquery'
    ));
    wp_localize_script('ajax_events', 'ajaxevents', array(
        'ajaxurl' => admin_url('admin-ajax.php')
    ));

}

add_action('wp_enqueue_scripts', 'add_custom_child_script');


/* Ajax load more events */
//

function true_load_posts()
{

    $args = unserialize(stripslashes($_POST['query']));
    $args['paged'] = $_POST['page'] + 1; // следующая страница
    $args['post_status'] = 'publish';

    // обычно лучше использовать WP_Query, но не здесь
    query_posts($args);
    // если посты есть
    if (have_posts()) :

        // запускаем цикл
        while (have_posts()): the_post();

            get_template_part('template-parts/news/content', 'front-news');

        endwhile;

    endif;
    die();
}

add_action('wp_ajax_loadmore', 'true_load_posts');
add_action('wp_ajax_nopriv_loadmore', 'true_load_posts');