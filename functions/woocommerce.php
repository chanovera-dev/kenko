<?php

// Agrega soporte para woocommerce
function soporte_woocommerce(){ add_theme_support( 'woocommerce' ); }
add_action( 'after_setup_theme', 'soporte_woocommerce' );



add_theme_support( 'wc-product-gallery-zoom' );
add_theme_support( 'wc-product-gallery-lightbox' );
add_theme_support( 'wc-product-gallery-slider' );



// mostrar el carrito en tiempo real
add_filter( 'woocommerce_add_to_cart_fragments', 'woocommerce_header_add_to_cart_fragment' );

function woocommerce_header_add_to_cart_fragment( $fragments ) {
	global $woocommerce;

	ob_start();

    echo '
	<a id="open-cart-panel" class="counter cart-customlocation" href="#">'.
        esc_html__('Carrito', 'kenko').'
        <div class="wrapper"><span class="parentesis">'.esc_html__('(', 'kenko').'</span><span class="number">'; echo sprintf ( WC()->cart->get_cart_contents_count() );  echo'</span><span class="parentesis">'.esc_html__(')', 'kenko').'</span></div>
    </a>';
	$fragments['a.cart-customlocation'] = ob_get_clean();
	return $fragments;
}



//Disable all woocommerce stylesheets
add_filter( 'woocommerce_enqueue_styles', '__return_false' );



// Anexos
// Estilos particulares para los templates
require_once(get_template_directory() . '/functions/woocommerce/woocommerce-components.php');



/* Actualizar de manera asincrona los importes de carrito al cambiar cantidades */

add_action( 'wp_footer', 'dlanau_actualizar_importe_carrito_' );
function dlanau_actualizar_importe_carrito_() {
if (is_cart()) :
?>
<script>
jQuery('div.woocommerce').on('change', '.qty', function(){
jQuery("[name='update_cart']").prop("disabled", false);
jQuery("[name='update_cart']").trigger("click"); 
});
</script>
<?php
endif;
}