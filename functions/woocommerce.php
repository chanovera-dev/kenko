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



// A N E X O S
// Estilos particulares para los templates
require_once(get_template_directory() . '/functions/woocommerce/woocommerce-components.php');
// contenedores y agregados para la plantilla de single product
require_once(get_template_directory() . '/functions/woocommerce/single-product.php');
// loop de woocommerce
require_once(get_template_directory() . '/functions/woocommerce/loop.php');



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



function agregar_script_personalizado() {
    ?>
    <script type="text/javascript">
        document.addEventListener('DOMContentLoaded', function() {
            // Espera a que el DOM esté listo

            // Agrega la clase 'show' a la clase 'show-more' al hacer hover sobre 'woocommerce-LoopProduct-link'
            var enlaces = document.querySelectorAll('.woocommerce-LoopProduct-link');

            enlaces.forEach(function(enlace) {
                enlace.addEventListener('mouseover', function() {
                    // Encuentra el elemento más cercano con la clase 'show-more' y agrega la clase 'show'
                    var showMore = encontrarElementoCercano(this, '.show-more');
                    if (showMore && typeof showMore.classList !== 'undefined') {
                        showMore.classList.add('show');
                    }
                });

                enlace.addEventListener('mouseout', function() {
                    // Al salir del hover, elimina la clase 'show'
                    var showMore = encontrarElementoCercano(this, '.show-more');
                    if (showMore && typeof showMore.classList !== 'undefined') {
                        showMore.classList.remove('show');
                    }
                });
            });

            function encontrarElementoCercano(elemento, clase) {
                // Encuentra el elemento más cercano con la clase especificada
                while (elemento && (typeof elemento.classList === 'undefined' || !elemento.classList.contains(clase))) {
                    elemento = elemento.parentNode;
                }
                return elemento;
            }
        });
    </script>
    <?php
}
add_action('wp_footer', 'agregar_script_personalizado');