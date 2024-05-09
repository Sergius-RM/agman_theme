<?php
/**
 * The template for displaying 404 pages (not found).
  */
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

get_header(); ?>

<main role="main"> 

    <div class="header_title_wrap">
        <h1 class="entry-title"><?php esc_html_e('The page can&rsquo;t be found.', ''); ?></h1>
    </div>

    <div class="page-content">
        <p><?php esc_html_e('It looks like nothing was found at this location.', ''); ?></p>
    </div>

</main>

<?php get_footer(); ?>
