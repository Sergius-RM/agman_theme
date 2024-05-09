<?php
/**
 * The template for displaying archive pages.
 *
 */
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

get_header(); ?>

<?php $site_width = get_field('is_site_width');?>
<main class="site-main" <?php if($site_width == 'fullwidth') :?>id="full-width"<?php endif;?> role="main">  

    <div class="page-header">
        <?php
            the_archive_title('<h1 class="entry-title">', '</h1>');
            the_archive_description('<p class="archive-description">', '</p>');
        ?>
    </div>

    <div class="page-content">
        <?php
            while (have_posts()) {
                the_post();
                $post_link = get_permalink();
        ?>
            <article class="post">
                <?php
                    printf('<h2 class="%s"><a href="%s">%s</a></h2>', 'entry-title', esc_url($post_link), esc_html(get_the_title()));
                    printf('<a href="%s">%s</a>', esc_url($post_link), get_the_post_thumbnail($post, 'large'));
                    the_excerpt();
                ?>
            </article>
        <?php } ?>
    </div>

    <?php wp_link_pages(); ?>

    <?php
        global $wp_query;
        if ($wp_query->max_num_pages > 1) :
    ?>
        <nav class="pagination" role="navigation">
            <?php /* Translators: HTML arrow */ ?>
                <div class="nav-previous">
                    <?php next_posts_link(sprintf(__('%s older', ''), '<span class="meta-nav">&larr;</span>')); ?>
                </div>
            <?php /* Translators: HTML arrow */ ?>
                <div class="nav-next">
                    <?php previous_posts_link(sprintf(__('newer %s', ''), '<span class="meta-nav">&rarr;</span>')); ?>
                </div>
        </nav>
    <?php endif; ?>

<!--?php get_sidebar(); ?-->

</main>

<?php get_footer(); ?>
