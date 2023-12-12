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
        'primary' => __( 'Primary', 'kenko' ),
        'secondary' => __( 'Secondary', 'kenko' ),
        'tertiary' => __( 'Tertiary', 'kenko' ),
        'social' => __( 'Social', 'kenko' ), 
    ) 
);



// Anexos

// Anexo para definir los componentes personalizados en las plantillas
require_once(get_template_directory() . '/functions/components.php');



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
