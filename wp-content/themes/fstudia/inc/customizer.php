<?php
/**
 * fstudia Theme Customizer
 *
 * @package fstudia
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function fstudia_customize_register($wp_customize)
{
    $wp_customize->get_setting('blogname')->transport = 'postMessage';
    $wp_customize->get_setting('blogdescription')->transport = 'postMessage';
    $wp_customize->get_setting('header_textcolor')->transport = 'postMessage';

    if (isset($wp_customize->selective_refresh)) {
        $wp_customize->selective_refresh->add_partial('blogname', array(
            'selector' => '.site-title a',
            'render_callback' => 'fstudia_customize_partial_blogname',
        ));
        $wp_customize->selective_refresh->add_partial('blogdescription', array(
            'selector' => '.site-description',
            'render_callback' => 'fstudia_customize_partial_blogdescription',
        ));
    }
//// welcome settings

    $wp_customize->add_section('welcome', array(
        'title' => __('Welcome settings'),
        'description' => __('Add settings here'),
        'panel' => '', // Not typically needed.
        'priority' => 20,
        'capability' => 'edit_theme_options',
        'theme_supports' => '', // Rarely needed.
    ));

    // add  welcome background
    $wp_customize->add_setting('set_background', array(
        'type' => 'theme_mod', // or 'option'
        'capability' => 'edit_theme_options',
        'theme_supports' => '', // Rarely needed.
        'default' => '',
        'transport' => 'refresh', // or postMessage
        'sanitize_callback' => '',
        'sanitize_js_callback' => '', // Basically to_json.
    ));
    $wp_customize->add_control(new WP_Customize_Media_Control($wp_customize, 'set_background', array(
        'label' => __('Featured Home Page Image', 'fstudia'),
        'section' => 'welcome',
        'type' => 'background',
    )));


    //////////////add about section///////////
    ///
    $wp_customize->add_section('about', array(
        'title' => __('About'),
        'description' => __('Add settings here'),
        'panel' => '', // Not typically needed.
        'priority' => 30,
        'capability' => 'edit_theme_options',
        'theme_supports' => '', // Rarely needed.
    ));
    ////add about heading
    $wp_customize->add_setting('about_heading', array(
        'type' => 'theme_mod', // or 'option'
        'capability' => 'edit_theme_options',
        'theme_supports' => '', // Rarely needed.
        'default' => 'About',
        'transport' => 'refresh', // or postMessage
        'sanitize_callback' => '',
        'sanitize_js_callback' => '', // Basically to_json.
    ));
    $wp_customize->add_control('about_heading', array(
        'label' => __('Section heading', 'fstudia'),
        'section' => 'about',
        'settings' => 'about_heading',
        'type' => 'text',
    ));
    ///// add about button


    $wp_customize->add_setting('about_button', array(
        'default' => __('White paper', 'fstudia'),
        'transport' => 'refresh',
    ));
    $wp_customize->add_control('about_button', array(
        'label' => __('Text button', 'fstudia'),
        'section' => 'about',
        'settings' => 'about_button',
        'type' => 'text',
    ));
    $wp_customize->add_setting('welcome_url_button', array(
        'default' => __('Url button', 'fstudia'),
        'transport' => 'refresh',
    ));
    $wp_customize->add_control('about_url_button', array(
        'label' => __('Button url', 'fstudia'),
        'section' => 'about',
        'settings' => 'about_url_button',
        'type' => 'text',
    ));
    $wp_customize->add_setting('about_button_color', array(
        'default' => '#ffffff',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'about_button_color', array(
        'label' => 'Button Color',
        'section' => 'about',
        'settings' => 'about_button_color',
    )));


    //add about description
    $wp_customize->add_setting('about_description', array(
        'type' => 'theme_mod', // or 'option'
        'capability' => 'edit_theme_options',
        'theme_supports' => '', // Rarely needed.
        'default' => 'This is Photoshop’s version  of Lorem Ipsum. Proin gravida nibh vel velit auctor aliquet. Aenean 
        sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit. Duis sed
         odio sit amet nibh vulputate cursus a sit amet mauris. Morbi accumsan ipsum velit. Nam nec tellus a odio tinci
         dunt.',
        'transport' => 'refresh', // or postMessage
        'sanitize_callback' => '',
        'sanitize_js_callback' => '', // Basically to_json.
    ));
    $wp_customize->add_control('about_description', array(
        'label' => __('About', 'fstudia'),
        'section' => 'about',
        'settings' => 'about_description',
        'type' => 'textarea',
    ));
    $wp_customize->add_setting('about_description_next', array(
        'type' => 'theme_mod', // or 'option'
        'capability' => 'edit_theme_options',
        'theme_supports' => '', // Rarely needed.
        'default' => 'This is Photoshop’s version  of Lorem Ipsum. Proin gravida nibh vel velit auctor aliquet. Aenean 
        sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit. Duis sed
         odio sit amet nibh vulputate cursus a sit amet mauris. Morbi accumsan ipsum velit. Nam nec tellus a odio tinci
         dunt.',
        'transport' => 'refresh', // or postMessage
        'sanitize_callback' => '',
        'sanitize_js_callback' => '', // Basically to_json.
    ));
    $wp_customize->add_control('about_description_next', array(
        'label' => __('About-next', 'fstudia'),
        'section' => 'about',
        'settings' => 'about_description_next',
        'type' => 'textarea',
    ));
    //about img
    $wp_customize->add_setting('about_img', array(
        'default' => '',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'about_img', array(
        'label' => 'About img',
        'section' => 'about',
        'settings' => 'about_img',
    )));

    //////////////add focus section///////////
    ///
    $wp_customize->add_section('focus', array(
        'title' => __('Focus'),
        'description' => __('Add settings here'),
        'panel' => '', // Not typically needed.
        'priority' => 30,
        'capability' => 'edit_theme_options',
        'theme_supports' => '', // Rarely needed.
    ));
    ////add focus heading
    $wp_customize->add_setting('focus_heading', array(
        'type' => 'theme_mod', // or 'option'
        'capability' => 'edit_theme_options',
        'theme_supports' => '', // Rarely needed.
        'default' => 'Focus area',
        'transport' => 'refresh', // or postMessage
        'sanitize_callback' => '',
        'sanitize_js_callback' => '', // Basically to_json.
    ));
    $wp_customize->add_control('focus_heading', array(
        'label' => __('Section heading', 'fstudia'),
        'section' => 'focus',
        'settings' => 'focus_heading',
        'type' => 'text',
    ));

    ///////add section about-second
    $wp_customize->add_section('about_second', array(
        'title' => __('About-second'),
        'description' => __('Add settings here'),
        'panel' => '', // Not typically needed.
        'priority' => 50,
        'capability' => 'edit_theme_options',
        'theme_supports' => '', // Rarely needed.
    ));
    // add about-second background color
    $wp_customize->add_setting('about_second_backgr_color', array(
        'default' => '#2c4c91',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'about-second_backgr_color', array(
        'label' => 'Bg Color',
        'section' => 'about_second',
        'settings' => 'about_second_backgr_color',
    )));
    ////add about-second heading
    $wp_customize->add_setting('about_second_heading', array(
        'type' => 'theme_mod', // or 'option'
        'capability' => 'edit_theme_options',
        'theme_supports' => '', // Rarely needed.
        'default' => 'About',
        'transport' => 'refresh', // or postMessage
        'sanitize_callback' => '',
        'sanitize_js_callback' => '', // Basically to_json.
    ));
    $wp_customize->add_control('about_second_heading', array(
        'label' => __('Section heading', 'fstudia'),
        'section' => 'about_second',
        'settings' => 'about_second_heading',
        'type' => 'text',
    ));

    //add about-second description
    $wp_customize->add_setting('about_second_description', array(
        'type' => 'theme_mod', // or 'option'
        'capability' => 'edit_theme_options',
        'theme_supports' => '', // Rarely needed.
        'default' => 'This is Photoshop’s version  of Lorem Ipsum. Proin gravida nibh vel velit auctor aliquet. Aenean 
        sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit.',
        'transport' => 'refresh', // or postMessage
        'sanitize_callback' => '',
        'sanitize_js_callback' => '', // Basically to_json.
    ));
    $wp_customize->add_control('about_second_description', array(
        'label' => __('About-second', 'fstudia'),
        'section' => 'about_second',
        'settings' => 'about_second_description',
        'type' => 'textarea',
    ));
    //about-second img
    $wp_customize->add_setting('about_second_img', array(
        'default' => '',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'about_second_img', array(
        'label' => 'About-second img',
        'section' => 'about_second',
        'settings' => 'about_second_img',
    )));
    ///// add button about-second


    $wp_customize->add_setting('about_second_button', array(
        'default' => __('Get Early Access', 'fstudia'),
        'transport' => 'refresh',
    ));
    $wp_customize->add_control('about_second_button', array(
        'label' => __('Text button', 'fstudia'),
        'section' => 'about_second',
        'settings' => 'about_second_button',
        'type' => 'text',
    ));
    $wp_customize->add_setting('about_second_url_button', array(
        'default' => __('Url button', 'fstudia'),
        'transport' => 'refresh',
    ));
    $wp_customize->add_control('about_second_url_button', array(
        'label' => __('Button url', 'fstudia'),
        'section' => 'about_second',
        'settings' => 'about_second_url_button',
        'type' => 'text',
    ));
    $wp_customize->add_setting('about_second_button_color', array(
        'default' => '#ffffff',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'about_second_button_color', array(
        'label' => 'Button Color',
        'section' => 'about_second',
        'settings' => 'about_second_button_color',
    )));

    //////////////add team section///////////
    ///
    $wp_customize->add_section('team', array(
        'title' => __('Team'),
        'description' => __('Add settings here'),
        'panel' => '', // Not typically needed.
        'priority' => 30,
        'capability' => 'edit_theme_options',
        'theme_supports' => '', // Rarely needed.
    ));
    ////add contact heading
    $wp_customize->add_setting('team_heading', array(
        'type' => 'theme_mod', // or 'option'
        'capability' => 'edit_theme_options',
        'theme_supports' => '', // Rarely needed.
        'default' => 'Team members',
        'transport' => 'refresh', // or postMessage
        'sanitize_callback' => '',
        'sanitize_js_callback' => '', // Basically to_json.
    ));
    $wp_customize->add_control('team_heading', array(
        'label' => __('Section heading', 'fstudia'),
        'section' => 'team',
        'settings' => 'team_heading',
        'type' => 'text',
    ));

    //////////////add never section///////////
    ///
    $wp_customize->add_section('never', array(
        'title' => __('Never'),
        'description' => __('Add settings here'),
        'panel' => '', // Not typically needed.
        'priority' => 30,
        'capability' => 'edit_theme_options',
        'theme_supports' => '', // Rarely needed.
    ));
    ////add never heading
    $wp_customize->add_setting('never_heading', array(
        'type' => 'theme_mod', // or 'option'
        'capability' => 'edit_theme_options',
        'theme_supports' => '', // Rarely needed.
        'default' => 'Never miss a thing',
        'transport' => 'refresh', // or postMessage
        'sanitize_callback' => '',
        'sanitize_js_callback' => '', // Basically to_json.
    ));
    $wp_customize->add_control('never_heading', array(
        'label' => __('Section heading', 'fstudia'),
        'section' => 'never',
        'settings' => 'never_heading',
        'type' => 'text',
    ));
    //add never description
    $wp_customize->add_setting('never_description', array(
        'type' => 'theme_mod', // or 'option'
        'capability' => 'edit_theme_options',
        'theme_supports' => '', // Rarely needed.
        'default' => 'This is Photoshop’s version  of Lorem Ipsum. Proin gravida nibh vel velit auctor aliquet. Aenean 
        sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum ',
        'transport' => 'refresh', // or postMessage
        'sanitize_callback' => '',
        'sanitize_js_callback' => '', // Basically to_json.
    ));
    $wp_customize->add_control('never_description', array(
        'label' => __('Never', 'fstudia'),
        'section' => 'never',
        'settings' => 'never_description',
        'type' => 'textarea',
    ));
    //never img
    $wp_customize->add_setting('never_img', array(
        'default' => '',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'never_img', array(
        'label' => 'Never img',
        'section' => 'never',
        'settings' => 'never_img',
    )));
    //never app
    $wp_customize->add_setting('app_img', array(
        'default' => '',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'app_img', array(
        'label' => 'App img',
        'section' => 'never',
        'settings' => 'app_img',
    )));
    //never google
    $wp_customize->add_setting('google_img', array(
        'default' => '',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'google_img', array(
        'label' => 'Google img',
        'section' => 'never',
        'settings' => 'google_img',
    )));
    //////////////add news section///////////
    ///
    $wp_customize->add_section('news', array(
        'title' => __('News'),
        'description' => __('Add settings here'),
        'panel' => '', // Not typically needed.
        'priority' => 30,
        'capability' => 'edit_theme_options',
        'theme_supports' => '', // Rarely needed.
    ));
    ////add news heading
    $wp_customize->add_setting('news_heading', array(
        'type' => 'theme_mod', // or 'option'
        'capability' => 'edit_theme_options',
        'theme_supports' => '', // Rarely needed.
        'default' => 'News',
        'transport' => 'refresh', // or postMessage
        'sanitize_callback' => '',
        'sanitize_js_callback' => '', // Basically to_json.
    ));
    $wp_customize->add_control('news_heading', array(
        'label' => __('Section heading', 'fstudia'),
        'section' => 'news',
        'settings' => 'news_heading',
        'type' => 'text',
    ));
    //////////////add partners section///////////
    ///
    $wp_customize->add_section('partners', array(
        'title' => __('Partners'),
        'description' => __('Add settings here'),
        'panel' => '', // Not typically needed.
        'priority' => 30,
        'capability' => 'edit_theme_options',
        'theme_supports' => '', // Rarely needed.
    ));
    ////add partners heading
    $wp_customize->add_setting('partners_heading', array(
        'type' => 'theme_mod', // or 'option'
        'capability' => 'edit_theme_options',
        'theme_supports' => '', // Rarely needed.
        'default' => 'Strategic Partners',
        'transport' => 'refresh', // or postMessage
        'sanitize_callback' => '',
        'sanitize_js_callback' => '', // Basically to_json.
    ));
    $wp_customize->add_control('partners_heading', array(
        'label' => __('Section heading', 'fstudia'),
        'section' => 'partners',
        'settings' => 'partners_heading',
        'type' => 'text',
    ));
    //////////////add contact section///////////
    ///
    $wp_customize->add_section('contact', array(
        'title' => __('Contact'),
        'description' => __('Add settings here'),
        'panel' => '', // Not typically needed.
        'priority' => 30,
        'capability' => 'edit_theme_options',
        'theme_supports' => '', // Rarely needed.
    ));
    ////add contact heading
    $wp_customize->add_setting('contact_heading', array(
        'type' => 'theme_mod', // or 'option'
        'capability' => 'edit_theme_options',
        'theme_supports' => '', // Rarely needed.
        'default' => 'Contact us',
        'transport' => 'refresh', // or postMessage
        'sanitize_callback' => '',
        'sanitize_js_callback' => '', // Basically to_json.
    ));
    $wp_customize->add_control('contact_heading', array(
        'label' => __('Section heading', 'fstudia'),
        'section' => 'contact',
        'settings' => 'contact_heading',
        'type' => 'text',
    ));
    ///////footer
    $wp_customize->add_section('footer', array(
        'title' => __('Footer'),
        'description' => __('Add settings here'),
        'panel' => '', // Not typically needed.
        'priority' => 50,
        'capability' => 'edit_theme_options',
        'theme_supports' => '', // Rarely needed.
    ));
    // add footer background color
    $wp_customize->add_setting('footer_backgr_color', array(
        'default' => '232a38',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'footer_backgr_color', array(
        'label' => 'Bg Color',
        'section' => 'footer',
        'settings' => 'footer_backgr_color',
    )));
    ////add footer copywrite
    $wp_customize->add_setting('copywrite', array(
        'type' => 'theme_mod', // or 'option'
        'capability' => 'edit_theme_options',
        'theme_supports' => '', // Rarely needed.
        'default' => 'Copyright © 2017',
        'transport' => 'refresh', // or postMessage
        'sanitize_callback' => '',
        'sanitize_js_callback' => '', // Basically to_json.
    ));
    $wp_customize->add_control('copywrite', array(
        'label' => __('Copywrite', 'fstudia'),
        'section' => 'footer',
        'settings' => 'copywrite',
        'type' => 'text',
    ));
}

add_action('customize_register', 'fstudia_customize_register');

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function fstudia_customize_partial_blogname()
{
    bloginfo('name');
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function fstudia_customize_partial_blogdescription()
{
    bloginfo('description');
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function fstudia_customize_preview_js()
{
    wp_enqueue_script('fstudia-customizer', get_template_directory_uri() . '/js/customizer.js', array('customize-preview'), '20151215', true);
}

add_action('customize_preview_init', 'fstudia_customize_preview_js');
