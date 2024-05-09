<?php
/**
 * Template Name: Main Page
 *
 */
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

get_header(); ?>

<main role="main">
   
    <div class="page-content">
        <?php the_content(); ?>
    </div>

</main>

<?php get_footer(); ?>
