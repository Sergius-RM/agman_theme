
<?php
/**
 * The template for displaying the footer.

 */
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

    get_template_part('template-parts/footer');
?>

     <?php wp_footer(); ?>

    <script src="<?php bloginfo('template_directory'); ?>/assets/js/scripts.js" defer ></script>

    <script>
    jQuery.noConflict(); (function($) {

        $(document).ready(function() {
            $('.menu-burger__header').click(function(){
                $('.menu-burger__header').toggleClass('open-menu');
                $('.header__nav').toggleClass('open-menu');
                $('body').toggleClass('fixed-page');
            });

        });

        $(document).ready(function() {
                const $newLi = document.createElement('span');
                $newLi.className = 'menu_arrow';
                const $menuitem = document.querySelector('#menu-item-89');
                $menuitem.appendChild($newLi);
            });

        $(document).ready(function() {
              $(".menu_arrow").click(function() {
                if ($('.menu-item-has-children').hasClass("clicked")) {
                    $('.sub-menu').toggleClass('hide');
                    event.preventDefault();
                } else {
                  $('.menu-item-has-children').addClass("clicked");
                }
                return false;
              });
        });

    })(jQuery);
    </script>

<?php if (wp_is_mobile()) : ?>
    <script type="text/javascript">
      var slider = tns({
        container: '.carousel_images',
        items: 1,
        swipeAngle: false,
        autoplay: true,
        loop: true,
        speed: 400
      });
    </script>
<?php else : ?>
    <script type="text/javascript">
      var slider = tns({
        container: '.carousel_images',
        items: 4,
        center: true,
        loop: true,
        swipeAngle: false,
        speed: 400,
        gutter: 100,
        mouseDrag: true,
        autoplay: true
      });
    </script>
<?php endif ;?>

  <script type="text/javascript">
    var slider = tns({
      container: '.hero_slider_images',
      autoHeight: true,
      items: 1,
      loop: true,
      swipeAngle: false,
      speed: 400,
      mouseDrag: true,
      autoplay: true
    });
  </script>

<script>
jQuery.noConflict(); (function($) {
 $(document).ready(function(){
    $('.sb-icon-search').click(function () {
        $('.search-form').toggleClass('form_on');
        });
    });

 $(document).ready(function(){
    $('#billing_new_fild7').click(function () {
        $('.spec_form_field').toggleClass('spec_formfield_on');
        });
    });
})(jQuery);
</script>

<!-- скрипт динамического обновления цены при выборе вариативного товара -->
<script>
    jQuery(document).ready(function($) {
        $('select').change( function(){
        // console.log($( 'input.variation_id' ));
        window.setTimeout( change_price , 200 );
          function change_price(){
            if( '' != $('input.variation_id').val() ){
                $('p.price').html($('div.woocommerce-variation-price > span.price').html()).append('<p class="availability">'+'</p>');
                console.log($('input.variation_id').val());
            } else {
                $('p.price').html($('div.hidden-variable-price').html());
                if($('p.availability'))
                    $('p.availability').remove();
                console.log('NULL');
            }
          }
        });
    });
</script>

</body>
</html>
