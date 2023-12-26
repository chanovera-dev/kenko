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

// quita la equita de de oferta
remove_action ('woocommerce_before_single_product_summary', 'woocommerce_show_product_sale_flash', 10);

// Agregar contenido HTML antes del gancho woocommerce_output_content_wrapper
function my_custom_content_before_wrapper() {
    echo '<main id="main"><div class="container breadcrumb-wrapper"><section class="section breadcrumb-and-pagination">';
	echo '
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
    echo '</section></div><div class="container product-wrapper"><section class="section">';
}
add_action('woocommerce_before_single_product', 'my_custom_content_before_single_product', 10);

// Personalizar el gancho woocommerce_before_single_product
remove_action('woocommerce_before_single_product', 'wc_print_notices', 10);
add_action('woocommerce_before_single_product', 'my_custom_content_single_product_start', 10);
add_action('woocommerce_after_single_product', 'my_custom_content_single_product_end', 10);

function my_custom_content_single_product_start() {}
function my_custom_content_single_product_end() {}

// Agregar contenido HTML antes de las pestañas de WooCommerce
function agregar_contenido_antes_de_tabs() {
    ?>
    </section></div><div class="container"><section class="section">
    <?php
}
add_action('woocommerce_after_single_product_summary', 'agregar_contenido_antes_de_tabs', 9);



// mueve el meta a antes de los productos relacionados
remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40);
add_action('woocommerce_after_single_product_summary', 'woocommerce_template_single_meta', 18);

// Agregar contenido HTML antes del gancho woocommerce_template_single_meta
function my_custom_single_meta_before_wrapper() {
	echo '</section></div><div class="container meta-wrapper"><section class="section">';
}
add_action('woocommerce_after_single_product_summary', 'my_custom_single_meta_before_wrapper', 17);

// Agregar contenido HTML después del gancho woocommerce_output_content_wrapper
function my_custom_single_meta_after_wrapper() {
	echo '</section></div><div class="container"><section class="section">';
}
add_action('woocommerce_after_single_product_summary', 'my_custom_single_meta_after_wrapper', 19);


// quita el h2 de las pestañas de woocommerce
add_filter( 'woocommerce_product_description_heading', '__return_null' );
add_filter( 'woocommerce_product_additional_information_heading', '__return_null' );



// personalizar el  título de la pestaña valoraciones
add_filter( 'woocommerce_product_reviews_tab_title', 'remove_reviews_tab_heading' );

function remove_reviews_tab_heading( $title ) {
    return sprintf( __( 'Valoraciones <span>%d</span>', 'woocommerce' ), get_comments_number() );
}



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




/* mueve de lugar el star rating */
remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_rating', 10);
add_action('woocommerce_single_product_summary', 'woocommerce_template_single_rating', 25);



// deshabilita el botón de reset variations
add_filter('woocommerce_reset_variations_link', '__return_empty_string');



// Desactivar variaciones agotadas
add_filter( 'woocommerce_variation_is_active', 'variation_gray_out', 10, 2 );
function variation_gray_out( $active, $variation ) {
    // check if the variation is in stock
    if( ! $variation->is_in_stock() ) {
        // set the active variable to false
        $active = false;
    }
    // return the active variable
    return $active;
}



// agrega el botón de agregar a la wishlist y de compartir con redes sociales al final del resumen del producto
add_action( 'woocommerce_single_product_summary', 'add_whislist_button_and_share', 40 );

function add_whislist_button_and_share(){
    echo '<div class="wishlist-button-and-share--wrapper">' .
        do_shortcode('[yith_wcwl_add_to_wishlist]');
        include(TEMPLATEPATH . '/parts/widgets/share.php');
    echo '
    </div>';
}



// remueve la sidebar del single product
add_action( 'wp', 'kenko_remove_sidebar_product_pages' );
 
function kenko_remove_sidebar_product_pages() {
if ( is_product() ) {
remove_action( 'woocommerce_sidebar', 'woocommerce_get_sidebar', 10 );
}
}