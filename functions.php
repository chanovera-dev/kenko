<?php

// carga componentes (estilos, javascript, etc) en el header
function load_components_header() {
    // Estilos globales
    wp_register_style( 'global', get_template_directory_uri() . '/style.css', '', 1, 'all' );
    wp_enqueue_style( 'global' );
}
add_action( 'wp_enqueue_scripts', 'load_components_header' );



// Carga componentes (estilos, javascript, etc) en el footer
function load_components_footer(){
    // JS de efectos en la cabecera
    wp_enqueue_script( 'header-scripts', get_template_directory_uri() . '/assets/js/header.js', array(), '1.0', true );
    wp_enqueue_script( 'cart-scripts', get_template_directory_uri() . '/assets/js/cart.js', array(), '1.0', true );
}
add_action( 'get_footer', 'load_components_footer' );



function kenko_theme_support(){ 
    
    add_theme_support( 'title-tag' );
    
    add_theme_support( 'automatic-feed-links' );
    
    add_theme_support( 'custom-logo', array( 
    'height' => 240,
    'width' => 240, 
    'flex-height' => true,
    ) );

    add_theme_support( 'html5', array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
    ) );
    
    add_theme_support( 'post-formats', array(
        'aside',
        'image', 
        'video',
        'quote',
        'link',
        'gallery',
        'status',
        'audio',
        'chat',
    ) );
    
    add_theme_support( 'customize-selective-refresh-widgets' );

    add_theme_support( 'post-thumbnails', array( 'post' ) ); // Add it for posts
	set_post_thumbnail_size( 200, 200, true ); // Normal post thumbnails, hard crop mode
	add_image_size( 'post-image', 600, 200, true ); // Post thumbnails, hard crop mode
	add_image_size( 'slider-image', 920, 300, true ); // Post thumbnails for slider, hard crop mode

	add_theme_support('custom-background');

} 
add_action('after_setup_theme', 'kenko_theme_support');



// Registro de menús
register_nav_menus( 
    array(
        'mobile' => __( 'Mobile', 'kenko' ),
        'primary' => __( 'Primary', 'kenko' ),
        'secondary' => __( 'Secondary', 'kenko' ),
        'social' => __( 'Social', 'kenko' ), 
    ) 
);



// Anexos

// Anexo para definir los componentes personalizados en las plantillas
require_once(get_template_directory() . '/functions/components.php');
// Anexo para establecer los breakpoints
require_once(get_template_directory() . '/functions/breakpoints.php');
// Anexo para establecer iconos
require_once(get_template_directory() . '/functions/icons.php');
// anexo para activar woocommerce
if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {
    require_once(get_template_directory() . '/functions/woocommerce.php');
} else {}
// Anexo para definir el contador de la lista de deseos
require_once(get_template_directory() . '/functions/wishlist.php');



// cambia el tamaño del avatar de los comentarios en wordpress
function custom_comment_avatar_size($avatar) {
    // Cambiar el tamaño del avatar a 60 píxeles (o el tamaño deseado)
    $avatar = preg_replace('/(width|height)="\d*"\s/', '', $avatar);
    $avatar = preg_replace('/style=["\'](.*?)["\']/', '', $avatar);
    $avatar = preg_replace('/src=([\'"])((?:(?!\1).)*?)\1/', 'src=$1$2$1 width="60" height="60"', $avatar);

    return $avatar;
}

// Aplicar el filtro
add_filter('get_avatar', 'custom_comment_avatar_size', 10, 1);



// Delimita el tamaño del excerpt a 15 palabras
function limite_excerpt($limite) { return 15; }
add_filter ('excerpt_length', 'limite_excerpt', 999);



// ajax para el blog
function filter_posts() {
    $catSlug = $_POST['category'];

    $ajaxposts = new WP_Query([
        'post_type' => 'post',
        'posts_per_page' => -1,
        'category_name' => $catSlug,
        'orderby' => 'menu_order', 
        'order' => 'desc',
    ]);
    $response = '';

    if($ajaxposts->have_posts()) {
        while($ajaxposts->have_posts()) : $ajaxposts->the_post();
        $response .= get_template_part( 'templates/content', 'archive' ); 
        endwhile;
    } else {
        $response = 'empty';
    }

    echo $response;
    exit;
}
add_action('wp_ajax_filter_projects', 'filter_posts');
add_action('wp_ajax_nopriv_filter_projects', 'filter_posts');



// deshabilita contact form 7 en todas las páginas, excepciones en components.php
add_filter( 'wpcf7_load_js', '__return_false' );
add_filter( 'wpcf7_load_css', '__return_false' );



// Registra los sidebars
function widgets_areas(){
    
    register_sidebar(
        array(
            'name' => __('Shop Sidebar','renata'),
            'id' => 'shop-sidebar',
            'description' => __('Sidebar Widget Area','renata'),
            'before_title' => '<h3 class="widget-title">',
            'after_title' => '</h3>',
            'before_widget' => '',
            'after_widget' => '',
        )
    );
}
add_action( 'widgets_init', 'widgets_areas' );



function filter_products() {
    $catIds = $_POST['catIds'];
    $creatorIds = $_POST['creatorIds'];
    $args = [
        'post_type' => 'product',
        'posts_per_page' => -1,
        'post_status'  => 'publish',
        'orderby'        => 'date',
                'order'          => 'desc',
    ];
    if ( $ajaxproducts->have_posts() ) {
        ob_start();
        while ( $ajaxproducts->have_posts() ) : $ajaxproducts->the_post();
            $response .= wc_get_template_part( 'content', 'product-dibbz' );
        endwhile;
        $output = ob_get_contents();
        ob_end_clean();
    } else {
        echo __( 'No products found' );
    }
        
    $result = [
        'total' => $counter,
        'html' => $output,
    ];
    echo json_encode($result);
    wp_reset_postdata();
    exit;
}
add_action('wp_ajax_filter_products', 'filter_products');
add_action('wp_ajax_nopriv_filter_products', 'filter_products');