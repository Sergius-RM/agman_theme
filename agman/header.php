<?php
/**
 * The template for displaying the header
 *
 */
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

?>

<!DOCTYPE html>
<html
    <?php language_attributes(); ?>
    class="no-js"
>

    <head>
		<!-- Google Tag Manager -->
			<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
			new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
			j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
			'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
			})(window,document,'script','dataLayer','GTM-KNWP3MP');</script>
		<!-- End Google Tag Manager -->
		<!-- Facebook Domain Verification Tag -->
			<meta name="facebook-domain-verification" content="3p1pnubr6vykh3ixx3umttuv3vhfer" />
		<!-- End Facebook Domain Verification Tag -->
		
        <meta charset="<?php bloginfo('charset'); ?>">
        <?php $viewport_content = apply_filters('hello_elementor_viewport_content', 'width=device-width, initial-scale=1'); ?>
        <meta
            name="viewport"
            content="<?php echo esc_attr($viewport_content); ?>"
        >

        <!-- favicon here -->

        <link rel="profile" href="http://gmpg.org/xfn/11">
        <?php wp_head(); ?>

        <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/tiny-slider@2.9.3/dist/tiny-slider.css' type='text/css' media='all' />
	    <script src="https://cdnjs.cloudflare.com/ajax/libs/tiny-slider/2.9.2/min/tiny-slider.js"></script>

    </head>

    <body <?php body_class();?>>
		<!-- Google Tag Manager (noscript) -->
			<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-KNWP3MP"
			height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
		<!-- End Google Tag Manager (noscript) -->

        <?php wp_body_open();
            get_template_part('template-parts/header');
        ?>
