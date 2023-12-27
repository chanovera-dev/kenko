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
// contenedores y agregados para la plantilla de single product
require_once(get_template_directory() . '/functions/woocommerce/single-product.php');



// Mostrar el porcentaje de descuento
add_filter( 'woocommerce_get_price_html', 'change_displayed_sale_price_html', 10, 2 ); 
function change_displayed_sale_price_html( $price, $product ) { 
    if( $product->is_on_sale() && ! is_admin() ) {
        $regular_price = (float) $product->get_regular_price();
        $sale_price = (float) $product->get_price();
        
        if ( $product->is_type('variable') ) {
            // Variable product: Calculate percentage for each variation
            $variations = $product->get_available_variations();
            
            $min_percentage = 100; // Initialize with a high value
            
            foreach ( $variations as $variation ) {
                $variation_regular_price = (float) $variation['display_regular_price'];
                $variation_sale_price = (float) $variation['display_price'];
                
                $percentage = round( 100 - ( $variation_sale_price / $variation_regular_price * 100 ), 1 );
                
                if ( $percentage < $min_percentage ) {
                    $min_percentage = $percentage;
                }
            }
            
            $saving_percentage = $min_percentage . '%';
        } else {
            // Simple product
            $saving_percentage = round( 100 - ( $sale_price / $regular_price * 100 ), 1 ) . '%';
        }

        $price .= sprintf( __('<small><span class="onsale">-%s</span></small>', 'woocommerce' ), $saving_percentage );
    }

    return $price; 
}



// A J U S T E S   A L   L O O P   D E   W O O C O M M E R C E

// quita el contenedor link de la plantilla del loop de woocommerce
remove_action('woocommerce_before_shop_loop_item', 'woocommerce_template_loop_product_link_open', 10);
remove_action('woocommerce_after_shop_loop_item', 'woocommerce_template_loop_product_link_close', 5);

// los agrega arriba y debajodel título
add_action('woocommerce_shop_loop_item_title', 'woocommerce_template_loop_product_link_open', 9);
add_action('woocommerce_shop_loop_item_title', 'woocommerce_template_loop_product_link_close', 11);



// desactiva el mensaje de oferta
remove_action('woocommerce_before_shop_loop_item_title', 'woocommerce_show_product_loop_sale_flash', 10);



// desactivar la calificación
remove_action('woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating', 5);



// mostrar solamente el precio final
    // Elimina la etiqueta de precio regular
    remove_action('woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_price', 10);

    // Añade la etiqueta de precio final
    add_action('woocommerce_after_shop_loop_item_title', 'custom_display_final_price', 10);
    function custom_display_final_price() {
        global $product;

        // Obtiene el precio final
        $final_price = wc_get_price_to_display($product);

        // Muestra el precio final
        echo '<span class="price">' . wc_price($final_price) . '</span>';
    }



// desactivar los botones de agregar al carrito y seleccionar opciones
remove_action('woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10);