<?php
/**
 * The template for displaying header.
 *
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
$site_name = get_bloginfo( 'name' );
$tagline   = get_bloginfo( 'description', 'display' );
?>

<header class="full-width" role="banner">

<div class="site-header">
	<div class="site-branding">

		<?php
		if ( has_custom_logo() ) :?>
 
				<span class="is_onmobile">
				<a href="/" class="custom-logo-link">
					<?php
					$header_logo_2 = get_theme_mod('header_logo_2');
					$img = wp_get_attachment_image_src($header_logo_2, 'full');
					if ($img) :
						?>
						<img src="<?php echo $img[0]; ?>" alt="">
					<?php endif; ?>
				</a>
				</span>

				<span class="no_mobile"><?php the_custom_logo();?></span>

		<?php elseif ( $site_name ) : ?>
			<h1 class="site-title">
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php esc_attr_e( 'Home', '' ); ?>" rel="home">
					<?php echo esc_html( $site_name ); ?>
				</a>
			</h1>
			<p class="site-description">
				<?php
				if ( $tagline ) {
					echo esc_html( $tagline );
				}
				?>
			</p>
		<?php endif;?>

	</div>


	<span class="is_onmobile">
		<div class="menu-burger__header">
			<span></span>
		</div>
		<nav class="site-navigation header__nav" role="navigation">
			<?php wp_nav_menu( array( 'theme_location' => 'menu-1' ) ); ?>

			<?php global $woocommerce; ?>
			<?php if ($woocommerce->cart->cart_contents_count > 0):?>
			<div class="woo_cart_btn">
				<a href="<?php echo $woocommerce->cart->get_cart_url() ?>">
					<i class="bi bi-cart-fill"></i>
					<span class="basket-btn__counter">(<?php echo sprintf($woocommerce->cart->cart_contents_count); ?>)</span>
				</a>
			</div>
			<?php endif;?>
			
			<?php get_search_form (); ?>
		</nav>
	</span>

	<span class="no_mobile">
		<nav class="site-navigation" role="navigation">
			<?php wp_nav_menu( array( 'theme_location' => 'menu-1' ) ); ?>

			<?php global $woocommerce; ?>
			<?php if ($woocommerce->cart->cart_contents_count > 0):?>
			<div class="woo_cart_btn">
				<a href="<?php echo $woocommerce->cart->get_cart_url() ?>">
					<i class="bi bi-cart-fill"></i>
					<span class="basket-btn__counter">(<?php echo sprintf($woocommerce->cart->cart_contents_count); ?>)</span>
				</a>
			</div>
			<?php endif;?>

		</nav>

	</span>


	<span class="sb-icon-search"></span>

	<div id="sb-search" class="sb-search">
		<?php get_search_form (); ?> 	
	</div>
	
</div>
	
</header>
