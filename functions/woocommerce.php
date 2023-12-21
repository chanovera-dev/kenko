<?php

// Agrega soporte para woocommerce
function soporte_woocommerce(){ add_theme_support( 'woocommerce' ); }
add_action( 'after_setup_theme', 'soporte_woocommerce' );



add_theme_support( 'wc-product-gallery-zoom' );
add_theme_support( 'wc-product-gallery-lightbox' );
add_theme_support( 'wc-product-gallery-slider' );



//Disable all woocommerce stylesheets
add_filter( 'woocommerce_enqueue_styles', '__return_false' );



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



// Anexos
// Estilos particulares para los templates
require_once(get_template_directory() . '/functions/woocommerce/woocommerce-components.php');



// C O N T E N E D O R E S   P A R A    S I N G L E    P R O D U C T

// Agregar contenido HTML antes del gancho woocommerce_output_content_wrapper
function my_custom_content_before_wrapper() {
    echo '<main id="main"><div class="container"><section class="section">';
}
add_action('woocommerce_before_main_content', 'my_custom_content_before_wrapper', 10);

// Agregar contenido HTML después del gancho woocommerce_output_content_wrapper
function my_custom_content_after_wrapper() {
    echo '</section></div></main>';
}
add_action('woocommerce_after_main_content', 'my_custom_content_after_wrapper', 10);

// Agregar contenido HTML antes de las migas de pan (breadcrumb)
function my_custom_content_before_breadcrumb() {
    echo '</section></div><div class="container"><section class="section">';
}
add_action('woocommerce_before_main_content', 'my_custom_content_before_breadcrumb', 20);

// Personalizar el gancho woocommerce_output_content_wrapper para excluir las migas de pan
remove_action('woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10);
add_action('woocommerce_before_main_content', 'my_custom_content_wrapper_start', 10);
add_action('woocommerce_after_main_content', 'my_custom_content_wrapper_end', 10);

function my_custom_content_wrapper_start() {}
function my_custom_content_wrapper_end() {}

// Agregar contenido HTML antes del gancho woocommerce_before_single_product
function my_custom_content_before_single_product() {
    echo '</section></div><div class="container"><section class="section">';
}
add_action('woocommerce_before_single_product', 'my_custom_content_before_single_product', 10);

// Personalizar el gancho woocommerce_before_single_product
remove_action('woocommerce_before_single_product', 'wc_print_notices', 10);
add_action('woocommerce_before_single_product', 'my_custom_content_single_product_start', 10);
add_action('woocommerce_after_single_product', 'my_custom_content_single_product_end', 10);

function my_custom_content_single_product_start() {
	echo 'bla';
}
function my_custom_content_single_product_end() {
	echo '</section></div><div class="container"><section class="section">';
}

