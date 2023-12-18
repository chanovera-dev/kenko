<?php

// Estilos para todos los artículos
function kenko_single_styles() {
    if ( is_single() ) {
        wp_dequeue_style( 'wp-block-library' );
        wp_enqueue_style( 'single-styles', get_template_directory_uri() . '/assets/css/single.css' );
        wp_enqueue_style( 'forms-styles', get_template_directory_uri() . '/assets/css/forms.css' );
        wp_enqueue_script( 'single-js', get_template_directory_uri() . '/assets/js/single.js', array(), '1.0', true );
    }
}
add_action( 'wp_enqueue_scripts', 'kenko_single_styles' );



// componentes para las páginas de tipo 'page'
function kenko_page_styles() {
    if ( is_page() ) {
        wp_dequeue_style( 'wp-block-library' );
        wp_enqueue_style( 'page-styles', get_template_directory_uri() . '/assets/css/page.css' );
    }
}
add_action( 'wp_enqueue_scripts', 'kenko_page_styles' );



// Estilos para la página archivo
function kenko_archive_styles() {
    if ( is_home() or is_page_template('home.php') or is_archive() or is_search() ) {
        wp_dequeue_style( 'wp-block-library' );
        wp_enqueue_style( 'blog-styles', get_template_directory_uri() . '/assets/css/blog.css' );
        wp_enqueue_style( 'pagination-styles', get_template_directory_uri() . '/assets/css/pagination.css' );
        wp_enqueue_script( 'ajax-blog-js', get_template_directory_uri() . '/assets/js/ajax-blog.js', array(), '1.0', true );
    }
}
add_action( 'wp_enqueue_scripts', 'kenko_archive_styles' );



// Estilos para la página 404
function kenko_page404_styles() {
    if ( is_404() ) {
        wp_enqueue_style( 'error404-styles', get_template_directory_uri() . '/assets/css/error404.css' );
    }
}
add_action( 'wp_enqueue_scripts', 'kenko_page404_styles' );