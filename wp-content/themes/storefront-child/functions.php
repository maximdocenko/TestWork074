<?php

function storefront_child_enqueue_styles() {
    wp_enqueue_style('storefront-child-style', get_stylesheet_uri(), array('storefront-style'), wp_get_theme()->get('Version'));
}
add_action('wp_enqueue_scripts', 'storefront_child_enqueue_styles');

function cities_enqueue_scripts() {
    wp_enqueue_script('cities-script', get_stylesheet_directory_uri() . '/assets/js/cities-script.js', ['jquery'], '1.0', true);

    wp_localize_script('cities-script', 'cities_ajax', [
        'ajax_url' => admin_url('admin-ajax.php')
    ]);
}
add_action('wp_enqueue_scripts', 'cities_enqueue_scripts');



// Подключаем дополнительные файлы из includes/
require_once get_stylesheet_directory() . '/includes/weather-api.php';
require_once get_stylesheet_directory() . '/includes/custom-post-types.php';
require_once get_stylesheet_directory() . '/includes/taxonomies.php';
require_once get_stylesheet_directory() . '/includes/meta-boxes.php';
require_once get_stylesheet_directory() . '/includes/ajax-handlers.php';
require_once get_stylesheet_directory() . '/includes/weather-widget.php';
