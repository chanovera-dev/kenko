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



// agrega la clase permalink a el link al hacer hover sobre el li del producto
function show_permalink_with_hover() {
    ?>
    <script type="text/javascript">
        jQuery(document).ready(function($) {
            $('.product').hover(
                function() {
                    // Cuando se hace hover sobre .product
                    $(this).find('.show').addClass('permalink');
                },
                function() {
                    // Cuando se sale del hover sobre .product
                    $(this).find('.show').removeClass('permalink');
                }
            );
        });
    </script>
    <?php
}
add_action('wp_footer', 'show_permalink_with_hover');



// Agregar contenido HTML antes del gancho woocommerce_output_content_wrapper
function my_custom_content_before_wrapper() {
    echo '<main id="main"><div class="container breadcrumb-wrapper">';
    // contenido de la parte superior de shop
    if ( is_shop() || is_product_category() || is_tax(get_object_taxonomies( 'product' )) ) {
        echo '
        <section class="section breadcrumb-filter-search">
            <div class="filters">';
                if ( is_active_sidebar('shop-sidebar') ) { dynamic_sidebar('shop-sidebar'); }
            echo '
            </div>';
        
    }
    // contenido de la parte superior de single product
	if ( is_product() ) {
		echo '
        <section class="section breadcrumb-and-pagination">
            <div class="single-product-pagination">
                <div class="left">';
                    global $post;

                    // Obtener el producto anterior
                    $prev_product = wc_get_product(get_previous_post()->ID);
                    if ($prev_product) :
                        echo '
                        <a href="' .esc_url(get_permalink($prev_product->get_id())) . '" class="previous-post-link">
                            <i class="nm-font nm-font-media-play flip"></i>
                        </a>';
                    endif;
                echo '
                </div>
                <div class="right">';

                    // Obtener el producto siguiente
                    $next_product = wc_get_product(get_next_post()->ID);
                    if ($next_product) :
                        echo '
                        <a href="' . esc_url(get_permalink($next_product->get_id())) . '" class="next-post-link">
                            <i class="nm-font nm-font-media-play"></i>
                        </a>';
                    endif;
                    echo '
                </div>
            </div>';
	}
	
}
add_action('woocommerce_before_main_content', 'my_custom_content_before_wrapper', 10);



// evita que se muestre el título de la página tienda   
add_filter( 'woocommerce_show_page_title' , 'woo_hide_page_title' );
function woo_hide_page_title() { return false; }



// Ajax para productos de WooCommerce
function filter_products() {
    $catSlug = $_POST['category'];

    $args = array(
        'post_type'      => 'product',
        'posts_per_page' => -1,
        'product_cat'    => $catSlug,
        'orderby'        => 'menu_order',
        'order'          => 'desc',
    );

    $ajaxproducts = new WP_Query($args);
    $response = '';

    if ($ajaxproducts->have_posts()) {
        while ($ajaxproducts->have_posts()) : $ajaxproducts->the_post();
            $product_id = get_the_ID();
            $product = wc_get_product($product_id);
            
            ob_start();
            wc_get_template_part('content', 'product');
            $response .= ob_get_clean();
        endwhile;
    } else {
        $response = 'empty';
    }

    echo $response;
    exit;
}
add_action('wp_ajax_filter_products', 'filter_products');
add_action('wp_ajax_nopriv_filter_products', 'filter_products');
