<?php
/*
Theme Name: ARCHITECTURE for EVERYONE
Theme URI: https://bien.studio/
Author: Noa Turk
Author URI: https://github.com/noaturk
Description: Custom WordPress tema izrađena za zadatak prema Figma predlošku.
Version: 1.0
Text Domain: architecture-for-everyone
*/

/* ==========================================================================
   1. Setup funkcije teme
   ========================================================================== */
function afe_theme_setup() {
    // Automatski dodaje <title> tag u <head>
    add_theme_support('title-tag');

    // Omogućuje "featured image" podršku
    add_theme_support('post-thumbnails');

    // Registracija glavnog navigacijskog menija
    register_nav_menus(array(
        'primary' => __('Primary Menu', 'architecture-for-everyone'),
    ));
}
add_action('after_setup_theme', 'afe_theme_setup');

/* ==========================================================================
   2. Učitavanje stilova i skripti
   ========================================================================== */
function afe_enqueue_assets() {
    // === Osnovni stil (style.css u rootu teme) ===
    wp_enqueue_style('afe-style', get_stylesheet_uri());

    // === Glavni CSS iz assets/css/style.css ===
    wp_enqueue_style(
        'afe-main-css',
        get_template_directory_uri() . '/assets/css/style.css',
        array(),
        filemtime(get_template_directory() . '/assets/css/style.css')
    );

    // === Fontovi ===
    wp_enqueue_style(
        'afe-fonts',
        get_template_directory_uri() . '/assets/fonts/fonts.css',
        array(),
        filemtime(get_template_directory() . '/assets/fonts/fonts.css')
    );

    // === AOS (Animate On Scroll) CSS ===
    wp_enqueue_style(
        'aos-css',
        'https://unpkg.com/aos@2.3.1/dist/aos.css',
        array(),
        '2.3.1'
    );

    // === AOS (Animate On Scroll) JS ===
    wp_enqueue_script(
        'aos-js',
        'https://unpkg.com/aos@2.3.1/dist/aos.js',
        array(),
        '2.3.1',
        true // Učitava se u footer
    );

    // === Inicijalizacija AOS-a ===
    wp_add_inline_script('aos-js', 'AOS.init();');
}
add_action('wp_enqueue_scripts', 'afe_enqueue_assets');