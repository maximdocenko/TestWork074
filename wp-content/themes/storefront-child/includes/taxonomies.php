<?php
// Регистрируем кастомную таксономию "Countries"
function register_taxonomy_countries() {
    $args = array(
        'label' => 'Countries',
        'public' => true,
        'hierarchical' => true,
        'show_in_rest' => true,
    );
    register_taxonomy('countries', 'cities', $args);
}
add_action('init', 'register_taxonomy_countries');
