<?php

// Estilos para la página de detalles de producto
add_action( 'template_redirect', 'template_redirect_action' );
function template_redirect_action() {
    if ( ! is_admin() && is_product() ) {
        add_filter( 'body_class', function ( $classes ) {
            global $post;
            $product = wc_get_product( $post->ID );
            $tipo    = $product->get_type();
            wp_enqueue_style( 'single-product-styles', get_template_directory_uri() . '/assets/css/woocommerce/single-product.css' );
            // JS de ajustes
            wp_enqueue_script( 'ajustes', get_template_directory_uri() . '/assets/js/single-product.js', '', 1, true );
            /* estilos css para los formularios */
            wp_enqueue_style( 'forms-styles', get_template_directory_uri() . '/assets/css/forms.css' );
            /* listas */
            wp_enqueue_style( 'lists-styles', get_template_directory_uri() . '/assets/css/woocommerce/lists.css' );
            return array_merge( $classes, array( $tipo ) );
        } );
        // remueve la sidebar
        remove_action( 'woocommerce_sidebar', 'woocommerce_get_sidebar', 10 );
    }
}



// Estilos para los archivos de la tienda
function shop_styles() {
    if ( is_shop() || is_product_category() || is_tax(get_object_taxonomies( 'product' )) ) {
        wp_enqueue_style( 'shop-styles', get_template_directory_uri() . '/assets/css/woocommerce/shop.css' );
        /* listas */
        wp_enqueue_style( 'lists-styles', get_template_directory_uri() . '/assets/css/woocommerce/lists.css' );
        /* estilos css para la paginación */
        wp_enqueue_style( 'pagination-styles', get_template_directory_uri() . '/assets/css/pagination.css' );
        // remueve la sidebar
        remove_action( 'woocommerce_sidebar', 'woocommerce_get_sidebar', 10 );
    }
}
add_action( 'wp_enqueue_scripts', 'shop_styles' );



// Estilos para el template de la página testing
function kenko_testing_styles() {
    if ( is_page_template('testing.php') ) {
        wp_enqueue_style( 'shop-styles', get_template_directory_uri() . '/assets/css/woocommerce/shop.css' );
        /* listas */
        wp_enqueue_style( 'lists-styles', get_template_directory_uri() . '/assets/css/woocommerce/lists.css' );
        /* js */
        wp_enqueue_script( 'filters-js', get_template_directory_uri() . '/assets/js/filters.js', array(), '1.0', true );
    }
}
add_action( 'wp_enqueue_scripts', 'kenko_testing_styles' );