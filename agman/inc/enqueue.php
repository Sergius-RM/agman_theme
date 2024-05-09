<?php
/**
 * Actions
 *
 */
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

/**
 * Enqueue scripts and styles.
 */

function theme_styles()
{
    // Регистрирую стили
    wp_register_style('main_style', get_template_directory_uri() . '/style.css', '', '1.1', 'all');

    // Подключаю стили
    wp_enqueue_style('main_style');

    // Подключаю скрипты
    wp_enqueue_script('custom_script', get_template_directory_uri() . '/assets/js/scripts.js');

};
// Создаем экшн в котором подключаем скрипты подключенные внутри функции theme_styles
add_action('wp_enqueue_scripts', 'theme_styles');
