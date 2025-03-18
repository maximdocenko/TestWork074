<?php
/**
 * Template Name: Cities Temperature Table
 */

get_header();

// Подключаем стили и скрипты
wp_enqueue_style('cities-style', get_stylesheet_directory_uri() . '/assets/css/cities-style.css', [], '1.0');
wp_enqueue_script('cities-script', get_stylesheet_directory_uri() . '/assets/js/cities-script.js', ['jquery'], '1.0', true);

?>

<div class="cities-container">
    <?php do_action('before_cities_table'); ?>

    <input type="text" id="city-search" placeholder="Поиск города...">
    
    <table id="cities-table">
        <thead>
            <tr>
                <th>Страна</th>
                <th>Город</th>
                <th>Температура (°C)</th>
            </tr>
        </thead>
        <tbody>
            <tr><td colspan="3">Загрузка данных...</td></tr>
        </tbody>
    </table>

    <?php do_action('after_cities_table'); ?>
</div>

<?php get_footer(); ?>
