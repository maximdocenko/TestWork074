<?php

// Регистрируем виджет
function register_weather_widget() {
    register_widget('Weather_Widget');
}
add_action('widgets_init', 'register_weather_widget');

class Weather_Widget extends WP_Widget {
    public function __construct() {
        parent::__construct(
            'weather_widget',
            'Погода в городе',
            array('description' => 'Показывает погоду для выбранного города')
        );
    }

    // Форма настроек виджета в админке
    public function form($instance) {
        $selected_city = !empty($instance['city_id']) ? $instance['city_id'] : '';
        $cities = get_posts(array('post_type' => 'cities', 'numberposts' => -1));

        ?>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('city_id')); ?>">Выберите город:</label>
            <select id="<?php echo esc_attr($this->get_field_id('city_id')); ?>" 
                    name="<?php echo esc_attr($this->get_field_name('city_id')); ?>">
                <option value="">-- Выберите город --</option>
                <?php foreach ($cities as $city) : ?>
                    <option value="<?php echo esc_attr($city->ID); ?>" <?php selected($selected_city, $city->ID); ?>>
                        <?php echo esc_html($city->post_title); ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </p>
        <?php
    }

    // Сохранение настроек виджета
    public function update($new_instance, $old_instance) {
        $instance = array();
        $instance['city_id'] = (!empty($new_instance['city_id'])) ? sanitize_text_field($new_instance['city_id']) : '';
        return $instance;
    }

    // Вывод виджета на сайте
    public function widget($args, $instance) {
        if (empty($instance['city_id'])) return;

        $city_id = $instance['city_id'];
        $city_name = get_the_title($city_id);
        $latitude = get_post_meta($city_id, '_latitude', true);
        $longitude = get_post_meta($city_id, '_longitude', true);
        $api_key = '195df3487fdf4a89ce3fee69e81b8937';

        $temperature = get_weather_data($latitude, $longitude);

        echo $args['before_widget'];
        echo "<p><strong>$city_name</strong></p>";
        echo "<p>Температура: $temperature</p>";
        echo $args['after_widget'];
    }
}
