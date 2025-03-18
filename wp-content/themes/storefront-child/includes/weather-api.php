<?php

function get_weather_data($latitude, $longitude) {
    $api_key = '195df3487fdf4a89ce3fee69e81b8937';

    // Проверяем, есть ли координаты
    if (empty($latitude) || empty($longitude)) {
        return 'Ошибка: отсутствуют координаты.';
    }

    // Делаем запрос к OpenWeatherMap API
    $weather_url = "https://api.openweathermap.org/data/2.5/weather?lat=$latitude&lon=$longitude&appid=$api_key&units=metric&lang=ru";
    $weather_response = wp_remote_get($weather_url);

    if (is_wp_error($weather_response)) {
        return 'Ошибка получения данных о погоде: ' . $weather_response->get_error_message();
    }

    $weather_data = json_decode(wp_remote_retrieve_body($weather_response), true);

    return isset($weather_data['main']['temp']) ? round($weather_data['main']['temp']) : 'Ошибка получения температуры.';
}
