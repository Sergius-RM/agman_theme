<?php
/**
 * The site's entry point.
 */
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

get_header();

//get_sidebar();

if (is_page()) {
    get_template_part('template-parts/page');
} elseif (is_archive() || is_home()) {
    get_template_part('template-parts/archive');
} elseif (is_singular()) {
    get_template_part('template-parts/single');
} elseif (is_search()) {
    get_template_part('template-parts/search');
} else {
    get_template_part('template-parts/404');
}

get_footer();
