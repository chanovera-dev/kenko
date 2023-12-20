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
add_action('wp_footer', 'dlanau_actualizar_importe_carrito');
function dlanau_actualizar_importe_carrito() {
    if (is_cart()) :
        ?>
        <script>
            jQuery(document).ready(function ($) {
                $('div.woocommerce').on('change', '.qty', function () {
                    // Recopilar datos del formulario del carrito
                    var data = {
                        action: 'actualizar_carrito', // Nombre de la acción en WordPress
                        security: '<?php echo wp_create_nonce("actualizar_carrito_nonce"); ?>', // Nonce de seguridad
                        quantity: $(this).val(), // Cantidad seleccionada
                        product_key: $(this).data('product-key'), // Clave del producto (si es necesario)
                    };

                    // Realizar la solicitud AJAX
                    $.post(ajaxurl, data, function (response) {
                        // Actualizar partes específicas de la página con la respuesta del servidor
                        // Puedes adaptar esto según la estructura de tu página
                        $('.woocommerce-cart-form').replaceWith($(response).find('.woocommerce-cart-form'));
                        $('.cart_totals').replaceWith($(response).find('.cart_totals'));
                    });
                });
            });
        </script>
        <?php
    endif;
}

// Función de acción AJAX para manejar la actualización del carrito
add_action('wp_ajax_actualizar_carrito', 'actualizar_carrito_ajax');
add_action('wp_ajax_nopriv_actualizar_carrito', 'actualizar_carrito_ajax'); // Si no estás autenticado en WordPress

function actualizar_carrito_ajax() {
    check_ajax_referer('actualizar_carrito_nonce', 'security');

    // Obtener la cantidad y la clave del producto desde la solicitud AJAX
    $quantity = isset($_POST['quantity']) ? wc_stock_amount(wp_unslash($_POST['quantity'])) : 0;
    $product_key = isset($_POST['product_key']) ? wc_clean(wp_unslash($_POST['product_key'])) : '';

    // Realizar las operaciones necesarias aquí, como actualizar el carrito, el total, etc.
    // Puedes utilizar las funciones de WooCommerce, por ejemplo:
    // wc_update_product_stock($product_id, $quantity);
    // wc_update_cart_info();

    // Obtener la nueva vista del carrito después de la actualización
    ob_start();
    woocommerce_cart(); // Esto generará la salida HTML del carrito
    $cart_html = ob_get_clean();

    // Obtener la nueva vista de los totales después de la actualización
    ob_start();
    woocommerce_cart_totals(); // Esto generará la salida HTML de los totales del carrito
    $totals_html = ob_get_clean();

    // Devolver las vistas actualizadas como respuesta AJAX
    echo json_encode(array('cart_html' => $cart_html, 'totals_html' => $totals_html));

    wp_die();
}
