<?php
/**
 * The template for displaying search results.
 *
 */
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

get_header();?>

    <main class="search_page" role="main">  

    <div class="container header_title_wrap">
        <h1 class="entry-title">
            <?php esc_html_e('Hakutulokset: ', 'agman');?>
            <span><?php echo get_search_query(); ?></span>
        </h1>
    </div>

    <div class="container page-content">
        <div class="row">

            <?php if (have_posts()): ?>

                <?php while (have_posts()): ?>
                    <?php the_post(); ?>

                    <div class="col-sm-2"><?php the_post_thumbnail(); ?></div>

                    <div class="col-sm-10">
                        <?php printf('<h2><a href="%s">%s</a></h2>', esc_url(get_permalink()), esc_html(get_the_title())); ?>
                        <?php the_excerpt(); ?>
                    </div>
                <?php endwhile; ?>

            <?php else: ?>

                <p><?php esc_html_e('Mitään ei löytynyt.', 'agman');?></p>

            <?php endif;?>
            
        </div>
    </div>

    <?php wp_link_pages();?>

    <?php
        global $wp_query;
        if ($wp_query->max_num_pages > 1) :
    ?>
        <nav class="pagination" role="navigation">
            <?php /* Translators: HTML arrow */?>
            <div class="nav-previous">
                <?php next_posts_link(sprintf(__('%s vanhemmat', 'agman'), '<span class="meta-nav">&larr;</span>'));?>
            </div>
            <?php /* Translators: HTML arrow */?>
            <div class="nav-next">
                <?php previous_posts_link(sprintf(__('uudemmat %s', 'agman'), '<span class="meta-nav">&rarr;</span>'));?>
            </div>
        </nav>
    <?php endif; ?>

</main>

<?php get_footer();?>
