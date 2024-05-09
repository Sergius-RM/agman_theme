<?php
/**
 * The template for displaying product content within loops
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.6.0
 */

defined( 'ABSPATH' ) || exit;

global $product;

// Ensure visibility.
if ( empty( $product ) || ! $product->is_visible() ) {
    return;
}
?>

<?php
    global $product;
    $enddate = substr($product->get_attribute('paivamaara'), -10);
       // echo strtotime($enddate), "\n";
    $today = date('d.m.Y');
       // echo strtotime($today), "\n";
?>

<?php if(strtotime($enddate) < strtotime($today)) :?>
    <!-- event is over -->
<?php else:?>
<a  class="wooposts_list_link" href="<?php the_permalink(); ?>">
<div class="row woo_post">

    <div class="col-sm-2 date">

        <!-- span><?php the_date(); ?></span -->

        <span>
            <?php global $product;
                echo $product->get_attribute('paivamaara'); ?>
        </span>
    </div>

    <div class="col-sm-8 content">
        <h3 class="title">
            <?php the_title(); ?>
        </h3>

        <?php /*
        <div class="text">
            <?php the_excerpt(); ?>
        </div>
        */ ?>
    </div>

    <div class="col-sm-2 readmore">
    <i class="bi bi-caret-right-fill"></i>Hae koulutukseen
    <br>
    <?php echo $product->get_price_html(); ?>
    </div>

</div>
</a>
<?php endif;?>