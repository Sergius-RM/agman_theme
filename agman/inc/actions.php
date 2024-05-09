<?php
/**
 * Actions
 *
 */
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

// без этого в админке просто не будет пункта "меню"
add_theme_support('menus');

/**
 * Register navigation menus.
 */
register_nav_menus(
  [
    'menu-1' => esc_html__('Primary menu', 'greatcompany'),
    'footer-1' => esc_html__('Footer menu', 'greatcompany'),
  ]
);

register_sidebar(array(
    'name'          => __('Header Widget Area', 'wedding'),
    'id'            => 'header_1',
    'description'   => __('Appears on posts and pages in the sidebar.', 'wedding'),
    'before_widget' => '<aside id="%1$s" class="widget %2$s">',
    'after_widget'  => '</aside>',
    'before_title'  => '<h3 class="widget-title">',
    'after_title'   => '</h3>',
));

register_sidebar(array(
    'name'          => __('Left Sidebar Widget Area', 'wedding'),
    'id'            => 'l_sidebar_1',
    'description'   => __('Appears on posts and pages in the sidebar.', 'wedding'),
    'before_widget' => '<aside id="%1$s" class="widget %2$s">',
    'after_widget'  => '</aside>',
    'before_title'  => '<h3 class="widget-title">',
    'after_title'   => '</h3>',
));

register_sidebar(array(
    'name'          => __('Right Sidebar Area', 'wedding'),
    'id'            => 'r_sidebar_1',
    'description'   => __('Appears on posts and pages in the sidebar.', 'wedding'),
    'before_widget' => '<aside id="%1$s" class="widget %2$s">',
    'after_widget'  => '</aside>',
    'before_title'  => '<h3 class="widget-title">',
    'after_title'   => '</h3>',
));

register_sidebar(array(
    'name'          => __('Footer Widget Area', 'wedding'),
    'id'            => 'footer_1',
    'description'   => __('Appears on posts and pages in the sidebar.', 'wedding'),
    'before_widget' => '<aside id="%1$s" class="widget %2$s">',
    'after_widget'  => '</aside>',
    'before_title'  => '<h3 class="widget-title">',
    'after_title'   => '</h3>',
));