<?php
// Регистрируем кастомный тип записи "Cities"
function register_cpt_cities() {
    $args = array(
        'label' => 'Города',
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'show_in_rest' => true, 
        'supports' => array('title', 'editor', 'thumbnail'),
        'menu_icon' => 'dashicons-location-alt',
    );
    register_post_type('cities', $args);
}
add_action('init', 'register_cpt_cities');
