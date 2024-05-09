<?php
// https://codex.wordpress.org/Function_Reference

// https://misha.agency/wordpress/wp_enqueue_style.html
// http://rightblog.ru/2974
// https://gnatkovsky.com.ua/podklyuchenie-stilej-v-wordpress.html


/* Отключение XML-RPC */
add_filter('xmlrpc_enabled', '__return_false');

/**
 * Настройка хаков Advanced Custom Fields
 */
require get_template_directory() . '/inc/acf.php';

/**
 * Подключение меню и виджетов
 */
require get_template_directory() . '/inc/actions.php';

/**
 * Подключение скриптов и стилей
 */
require get_template_directory() . '/inc/enqueue.php';

/**
 * Настройка и дублирование постов/страниц
 */
require get_template_directory() .'/inc/post.php';

/**
 * Media.
 */
require get_template_directory() .'/inc/media.php';

/**
 * Pagination.
 */
require get_template_directory() . '/inc/pagination.php';

/**
 * Woocomerce
 */
require get_template_directory() .'/inc/woo.php';

// Защита от вредоносных URL-запросов
if (strpos($_SERVER['REQUEST_URI'], "eval(") || strpos($_SERVER['REQUEST_URI'], "CONCAT") || strpos($_SERVER['REQUEST_URI'], "UNION+SELECT") || strpos($_SERVER['REQUEST_URI'], "base64")) {
    @header("HTTP/1.1 400 Bad Request");
    @header("Status: 400 Bad Request");
    @header("Connection: Close");
    @exit;
}



// Защита от автоматического спама
function true_stop_spam($commentdata)
{
    // обычное поле комментирования мы скроем через CSS
    $fake = trim($_POST['comment']);
    // заполнение его роботами будет приводить к ошибке, комментарий отправляться не будет
    if (!empty($fake)) {
        wp_die('Спамный коммент!');
    }
    // затем мы присвоим ему значение поля комментария, которое для людей
    $_POST['comment'] = trim($_POST['true_comment']);

    return $commentdata;
}

add_filter('pre_comment_on_post', 'true_stop_spam');


// Запрет пингбэков и трэкбэков на самого себя
function true_disable_self_ping(&$links)
{
    foreach ($links as $l => $link) {
        if (0 === strpos($link, get_option('home'))) {
            unset($links[$l]);
        }
    }
}

add_action('pre_ping', 'true_disable_self_ping');


// Скрываем версию WordPress
function true_remove_wp_version_wp_head_feed()
{
    return '';
}

add_filter('the_generator', 'true_remove_wp_version_wp_head_feed');


function my_customize_register( $wp_customize ) {
    $wp_customize->add_setting('header_logo_2', array(
        'default' => '',
        'sanitize_callback' => 'absint',
    ));

    $wp_customize->add_control(new WP_Customize_Media_Control($wp_customize, 'header_logo_2', array(
        'section' => 'title_tagline',
        'label' => 'Логотип'
    )));

    $wp_customize->selective_refresh->add_partial('header_logo_2', array(
        'selector' => '.header-logo',
        'render_callback' => function() {
            $logo = get_theme_mod('header_logo_2');
            $img = wp_get_attachment_image_src($logo, 'full');
            if ($img) {
                return '<img src="' . $img[0] . '" alt="">';
            } else {
                return '';
            }
        }
    ));
}
add_action( 'customize_register', 'my_customize_register' );


/**
 * Allow only one course in cart.
 */
add_filter( 'woocommerce_add_to_cart_validation', 'agmen_only_one_in_cart', 9999, 2 );
function agmen_only_one_in_cart( $passed, $added_product_id ) {
   wc_empty_cart();
   return $passed;
}

/**
 * Hide company fields if not company.
 */
add_filter( 'woocommerce_checkout_fields' , 'agmen_hide_company_checkout_fields' );
function agmen_hide_company_checkout_fields( $fields ) {
    
    $findme = 'yrityslaskutus';

    $cart = WC()->cart;

    if ( isset( $cart->cart_contents ) ) {
        foreach ( $cart->cart_contents as $item ) {
            if ( isset( $item['variation'] ) ) {
                if ( isset( $item['variation']['attribute_valitse-lippu'] ) ) {
                    if ( stripos( $item['variation']['attribute_valitse-lippu'], $findme ) === false && isset( $fields['billing']['billing_address_1'] ) && isset( $fields['billing']['billing_address_2'] ) ) {
                        unset( $fields['billing']['billing_address_1'] );
                        unset( $fields['billing']['billing_address_2'] );
                    }
                }
            }
        }
    }

    return $fields;
  
}

add_filter( 'wpseo_metabox_prio', function() { return 'low'; } );

/**
 * Display WPFORM bellow Koulutuskalenteri.
 */

add_action('woocommerce_after_main_content', 'miami_wpform', 10);

function miami_wpform() {
    if( is_shop () ) :
        echo do_shortcode( '[wpforms id="2413" title="true" description="true"]' );
    endif;
}

