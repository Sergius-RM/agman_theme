<?php
/**
 * The template for displaying singular post-types: posts, pages and user-defined custom post types.
 *
 */
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

get_header();?>
 
<?php while (have_posts()): the_post();?>

    <main role="main">  
 
        <div class="page-content single-post">
		
			<div class="slider_wrap"></div>
			<div class="container hero_slider">
				<div class="row">
					<div class="tns-outer" id="base-ow">				
					<div class="item tns-item">
						<?php the_post_thumbnail(); ?>
					</div>
					</div>
				</div>
			</div>
			
		<div class="container">
		<div class="row">
			<div class="header_title_wrap">
				<h1><?php the_title(); ?></h1>
			</div>
		</div>
        </div>
			<?php the_content(); ?>	
        </div>

    </main>

<?php endwhile; ?>

<?php get_footer();?>
