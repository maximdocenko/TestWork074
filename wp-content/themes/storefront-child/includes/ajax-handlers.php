<?php
function get_cities_ajax() {
    global $wpdb;

    $query = isset($_GET['query']) ? sanitize_text_field($_GET['query']) : '';

    // Запрос к базе данных с учетом страны
    $sql = $wpdb->prepare(
        "SELECT p.ID, p.post_title AS city, tax.name AS country, 
                meta_lat.meta_value AS latitude, meta_lon.meta_value AS longitude
        FROM {$wpdb->posts} p
        LEFT JOIN {$wpdb->term_relationships} tr ON p.ID = tr.object_id
        LEFT JOIN {$wpdb->term_taxonomy} tt ON tr.term_taxonomy_id = tt.term_taxonomy_id AND tt.taxonomy = 'countries'
        LEFT JOIN {$wpdb->terms} tax ON tt.term_id = tax.term_id
        LEFT JOIN {$wpdb->postmeta} meta_lat ON p.ID = meta_lat.post_id AND meta_lat.meta_key = '_latitude'
        LEFT JOIN {$wpdb->postmeta} meta_lon ON p.ID = meta_lon.post_id AND meta_lon.meta_key = '_longitude'
        WHERE p.post_type = 'cities' AND p.post_status = 'publish'
        AND p.post_title LIKE %s",
        '%' . $wpdb->esc_like($query) . '%'
    );

    $cities = $wpdb->get_results($sql);
    $results = [];

    foreach ($cities as $city) {
        $temperature = get_weather_data($city->latitude, $city->longitude);

        $results[] = [
            'country' => $city->country ?: 'Не указано',
            'city' => $city->city,
            'temperature' => $temperature
        ];
    }

    echo json_encode($results);
    wp_die();
}
add_action('wp_ajax_get_cities', 'get_cities_ajax');
add_action('wp_ajax_nopriv_get_cities', 'get_cities_ajax');
