<?php
// Добавляем метабокс для широты и долготы
function add_city_meta_box() {
    add_meta_box('city_meta', 'Географические координаты', 'city_meta_box_callback', 'cities', 'normal', 'high');
}
add_action('add_meta_boxes', 'add_city_meta_box');

function city_meta_box_callback($post) {
    $latitude = get_post_meta($post->ID, '_latitude', true);
    $longitude = get_post_meta($post->ID, '_longitude', true);
    ?>
    <p>
        <label for="latitude">Широта:</label>
        <input type="text" id="latitude" name="latitude" value="<?php echo esc_attr($latitude); ?>" />
    </p>
    <p>
        <label for="longitude">Долгота:</label>
        <input type="text" id="longitude" name="longitude" value="<?php echo esc_attr($longitude); ?>" />
    </p>
    <?php
}

// Сохраняем данные метабокса
function save_city_meta($post_id) {
    if (!isset($_POST['latitude']) || !isset($_POST['longitude'])) return;
    if (!current_user_can('edit_post', $post_id)) return;
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return;

    update_post_meta($post_id, '_latitude', sanitize_text_field($_POST['latitude']));
    update_post_meta($post_id, '_longitude', sanitize_text_field($_POST['longitude']));
}
add_action('save_post_cities', 'save_city_meta');
