<?php

// Функция подключения стилей темы Storefront Child
function storefront_child_enqueue_styles() {
    wp_enqueue_style('storefront-child-style', get_stylesheet_uri(), array('storefront-style'), wp_get_theme()->get('Version'));
}
add_action('wp_enqueue_scripts', 'storefront_child_enqueue_styles');

// Функция подключения скриптов для работы с городами
function cities_enqueue_scripts() {
    wp_enqueue_script('cities-script', get_stylesheet_directory_uri() . '/assets/js/cities-script.js', ['jquery'], '1.0', true);

    // Передаем в JavaScript переменную cities_ajax с URL-адресом AJAX-обработчика
    wp_localize_script('cities-script', 'cities_ajax', [
        'ajax_url' => admin_url('admin-ajax.php')
    ]);
}
add_action('wp_enqueue_scripts', 'cities_enqueue_scripts');

// Подключаем дополнительные файлы из папки includes/
require_once get_stylesheet_directory() . '/includes/weather-api.php';      // Функции работы с погодным API
require_once get_stylesheet_directory() . '/includes/custom-post-types.php'; // Регистрация кастомного типа записи "Города"
require_once get_stylesheet_directory() . '/includes/taxonomies.php';        // Регистрация таксономий (например, страны)
require_once get_stylesheet_directory() . '/includes/meta-boxes.php';        // Метабоксы для хранения дополнительных данных (широта, долгота)
require_once get_stylesheet_directory() . '/includes/ajax-handlers.php';     // Обработчики AJAX-запросов
require_once get_stylesheet_directory() . '/includes/weather-widget.php';    // Виджет погоды

// Добавляем хук действия, который позволяет выводить дополнительную информацию после таблицы городов
add_action('after_cities_table', function() {
    echo '<p>Дополнительная информация о погоде</p>';
});
