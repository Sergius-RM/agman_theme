<?php
/**
 * Template Name: Blog
 *
 */
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

get_header(); ?>

<main role="main">
   
    <div class="page-content">
	
       <div class="container">
		<div class="row">
			<div class="header_title_wrap">
				<h1><?php the_title(); ?></h1>
			</div>
		</div>
        </div>

		<ul class="container wooposts_list products columns-1">
			<?php
			if ( have_posts() ) :
			  query_posts('category=11&orderby=date&showposts=10');
			  while (have_posts()) : the_post();  
			?>
				
				<div class="row blog_list_link">

					<div class="col-sm-3 post_thumbnail">
						<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?></a>
					</div>
					
					<div class="col-sm-9 content">
						<h3 class="title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
						<p><?php the_excerpt(); ?></p>
						<a class="readmore" href="<?php the_permalink(); ?>">Lue lisää <i class="fa-solid fa-angles-right"></i></a>
					</div>

				</div>


			<?php  endwhile; 
			endif;
			wp_reset_query();                
			?>
		</ul>	
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
    </div>

</main>

<?php get_footer(); ?>


