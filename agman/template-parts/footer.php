<?php
/**
 * The template for displaying footer.
 */
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}
?>

<footer id="site-footer" class="site-footer" role="contentinfo">

    <div class="container">
        <div class="row">

            <div class="col-sm">
                <div class="site-branding">
                    <?php
                    $site_name = get_bloginfo( 'name' );
                    $tagline   = get_bloginfo( 'description', 'display' ); ?>
                    
                        <?php the_custom_logo();?>
                        <p><?php echo esc_html( $site_name ); ?></p>
                </div>

                <div class="footer_adres">
                    <?php if (have_rows('physical_adress', 'option')) {
                        while (have_rows('physical_adress', 'option')) {
                            the_row(); ?>
                                <p ><?php the_sub_field('short_physical_adress');?></p>
                        <?php } ?>
                    <?php } ?>
                </div>      
                        
                <div class="footer_mail">
                    <?php if (have_rows('topbaremails', 'option')) {
                        while (have_rows('topbaremails', 'option')) {
                            the_row(); ?>
                                <a href="<?php the_sub_field('top_bar_email_link');?>" target="_blank"><?php the_sub_field('top_bar_email');?></a>
                        <?php } ?>
                    <?php } ?>
                </div>  

                <div class="title_wrap">
                    <a href="/yhteystiedot/"><h3>KATSO KAIKKI YHTEYSTIEDOT</h3></a>
                </div>

            </div>

        </div>
    </div>
	
	<div class="container">
		<div class="row">
			<div class="social-style-one">
				<?php if ( get_field( 'facebook_link', 'option') ) :?>
					<a href="<?php the_field('facebook_link', 'option'); ?>"><i class="fab fa-facebook-f"></i></a>
				<?php endif;?>
				<?php if ( get_field( 'linkedin_link', 'option') ) :?>
					<a href="<?php the_field('linkedin_link', 'option'); ?>"><i class="fab fa-linkedin-in"></i></a>
				<?php endif;?>
				<?php if ( get_field( 'instagram_link', 'option') ) :?>
					<a href="<?php the_field('instagram_link', 'option'); ?>"><i class="fab fa-instagram"></i></a>
				<?php endif;?>
			</div>
		</div>
	</div>
    
	
    <?php if ( get_field( 'is_copyright', 'option') ) :?>
        <div class="full-width">
            <div class="copyright">
                <?php the_field('is_copyright', 'option'); ?>
            </div>
        </div>
    <?php endif;?>

</footer>
