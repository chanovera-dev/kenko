<?php

function kenko_theme_custom_breakpoints() {
    ?>
        <style>
            :root{
                /* blog */
                --categories-list--padding:30px 0;
                --categories-list--display:block;
                --categories-list-link--font-size:16px;
                --categories-list-link--margin:0;

                /* single post */
                --aspect-ratio--featured-picture:1/1;
                --padding-top--post-wrapper:0;
                --width-single-post-pagination:min(100% - 30px);
                --padding--single-post-pagination:40px 0 39px;
                --single-post-pagination--title-post:none;
                --single-post-pagination--svg-opacity:1;
                --single-post-pagination--svg-grid-row:1/2;
                --single-post-pagination--svg-size:30px;

                /* single-product */
                --background--product-wrapper:#fff;
                --display--breadcrumb-single-product:none;
                --display--gallery-trigger:none;
                --padding--tabs-panel:28px 0 42px;
                --width--tab-description:min(100%, 820px);
                    /* resumen */
                    --font-size--product-title:24px;
                    /* info meta */
                    --text-align--meta:left;
                    --display--product-meta:grid;
                    /* valoraciones */
                    --display--avatar:none;
                    --font-size--review--published-date:16px;
                    --font-size--review--description:14px;
                    --margin--comment-text:0 0 34px 0;
                    /* productos relacionados */
                    --padding--related-products:42px 0 7px;

                /* error 404 */
                --padding-not-found:46px 0 55px;
                --padding--featured-product:41px 0;
                --font-size--featured-products-title--error404:18px;
                --margin-bottom--featured-products-title--error404:39px;

                /* contacto */
                --height--map:340px;

                /* panel carrito */
                --width--cart-panel:360px;
                --padding-cart-panel:28px 21px;
                --padding-close--cart-panel:28px;
                --spacing-cart:55.88px;
            }

            @media screen and (min-width: 31px) and (max-width: 1023px){
                /* galería */
                .woocommerce-product-gallery__image a img{width:100%;}
                /* navegación de galerías */
                .flex-control-nav{display:flex; align-items:center; justify-content:center; gap:16px; padding:12px 18px; border-bottom:1px solid #eee;}
                .flex-control-nav li{display:grid; place-content:center; height:28px;}
                .flex-control-nav li img.flex-active{background-color:#DC9817;}
                .flex-control-nav li img{width:6px; height:6px; padding: 6px 6px 0 0; border-radius:50%; background-color:#aaa;}
            }

            @media(min-width:768px){
                :root{
                    /* blog */
                    --categories-list--padding:29px 0 39px;
                    --categories-list--display:inline-flex;
                    --categories-list-link--font-size:18px;
                    --categories-list-link--margin:0 17px;

                    /* single post */
                    --aspect-ratio--featured-picture:16/9;
                    --padding--single-post-pagination:44px 0;
                    --single-post-pagination--title-post:inherit;
                    --single-post-pagination--svg-opacity:.3;
                    --single-post-pagination--svg-grid-row:1/3;
                    --single-post-pagination--svg-size:50px;

                    /* single-product */
                    --padding-top--gallery:20px;
                    --display--breadcrumb-single-product:block;
                    --padding--tabs-panel:41px 0 53px;
                        /* info meta */
                        --text-align--meta:center;
                        --display--product-meta:inherit;
                        /* valoraciones */
                        --display--avatar:inherit;
                        --font-size--review--published-date:14px;
                        --font-size--review--description:16px;
                        --margin--comment-text:0 0 34px 81px;
                        /* productos relacionados */
                        --padding--related-products:56px 0 19px;

                    /* error 404 */
                    --padding-not-found:68px 0 82px;
                    --padding--featured-product:44px 0 25px;
                    --font-size--featured-products-title--error404:20px;
                    --margin-bottom--featured-products-title--error404:43px;

                    /* contacto */
                    --height--map:500px;

                    /* panel carrito */
                    --width--cart-panel:410px;
                    --padding-cart-panel:28px 37px;
                }
                /* cabecera */
                    /* botón del menú */
                    .mobile-menu--button .bars{width:21px; height:16px;}
                    .mobile-menu--button .bars :is(.bar1, .bar2, .bar3){width:21px; height:1px;}
                    .mobile-menu--button .bars > div:not(:last-child){margin-bottom:6px;}
                    .mobile-menu--button .bars.active .bar3{transform:translateY(-5px) rotate(90deg);}
                    /* carrito */
                    #main-header .mobile-header .header-content .attachment-list .cart-wrapper .counter{font-size:16px;}
                    #main-header .mobile-header .header-content .attachment-list .cart-wrapper .counter .parentesis{display:none;}
                    #main-header .mobile-header .header-content .attachment-list :is(.wishlist-wrapper, .cart-wrapper) .counter .number{position:relative; top:-7px; color:var(--wp--preset--color--links);}
                /* blog */
                    /* lista de categorías */
                    #main .container .section .categories-list li:not(:last-child):after{content:'/'; color:var(--wp--preset--color--border-input-focus);}

                /* single post */
                    /* imágenes */
                        /* galería */
                        .single-post #main .container .section .post .wp-block-gallery{display:flex; grid-template-columns:1fr 1fr;}
                        .single-post #main .container .section .post .wp-block-gallery.grid{display:grid; grid-template-columns:1fr 1fr;}
                        .wp-block-gallery.has-nested-images.columns-default figure.wp-block-image:not(#individual-image),
                        .wp-block-gallery.has-nested-images.columns-default figure.wp-block-image:not(#individual-image):first-child:nth-last-child(2), 
                        .wp-block-gallery.has-nested-images.columns-default figure.wp-block-image:not(#individual-image):first-child:nth-last-child(2)~figure.wp-block-image:not(#individual-image){width:calc(33.33% - var(--wp--style--unstable-gallery-gap, 16px)*.66667)!important;}
                        .wp-block-gallery.grid.has-nested-images.columns-default figure.wp-block-image:not(#individual-image),
                        .wp-block-gallery.grid.has-nested-images.columns-default figure.wp-block-image:not(#individual-image):first-child:nth-last-child(2), 
                        .wp-block-gallery.grid.has-nested-images.columns-default figure.wp-block-image:not(#individual-image):first-child:nth-last-child(2)~figure.wp-block-image:not(#individual-image){width:100%!important;}
                    /* paginación */
                    .single-post #main .container .single-post-pagination :is(.left, .right) :is(.previous-post-link, .next-post-link){height:42.58px;}
                    /* formulario */
                    .comment-form{display:grid; grid-template-columns:1fr 1fr; gap:0 30px;}
                    .comment-form :is(.comment-notes, .comment-form-comment, .comment-form-url, .comment-form-cookies-consent, .form-submit){grid-column:1/-1;}

                /* contacto */
                .contact-page .info-and-contact--wrapper :is(.info, .contact){grid-template-columns:226px 1fr;}
                .contact-page .info-and-contact--wrapper .contact .wpcf7-form{grid-template-columns:1fr 1fr;}

                /* footer */
                #main-footer .footer-content{display:grid; grid-template-columns:auto 1fr; gap:18px 14px; align-items:baseline;}
                    /* footer parrafo */
                    #main-footer p{font-size:14px; padding:3px; grid-column:2/3;}
                    /* menú secundario */
                    #main-footer .secondary{grid-column:1/2;}
                    #main-footer .secondary ul{display:inline-flex; gap:18px;}
                    #main-footer .secondary ul li{border-bottom:none;}
                    /* menú social */
                    #main-footer .social{padding-top:0;}
                
                /* panel carrito */
                #cart-panel{max-width:425px;}
            }

            @media(min-width:991px){
                /* cabecera */
                #main-header,
                #main-header .mobile-header{height:81px;}
                /* botón del menú mobile */
                .mobile-menu--button{display:none;}
                /* menú mobile */
                #main-header .mobile-header .menu-mobile{display:none;}
                /* menú principal */
                #main-header .mobile-header .header-content .primary{display:inherit;}

                /* contacto */
                .contact-page .info-and-contact--wrapper :is(.info, .contact){grid-template-columns:301px 1fr;}
            }

            @media(min-width:1024px){
                :root{
                    /* blog */
                    --categories-list--padding:29px 0 108px;

                    /* single post */
                    --padding-top--post-wrapper:68px;
                    --width-single-post-pagination:min(100% - 90px);

                    /* single-product */
                    --display--gallery-trigger:block;
                    --padding-top--gallery:40px;
                    --background--product-wrapper:#eee;
                    --width--tab-description:min(100%, 1016px);

                    /* panel carrito */
                    --padding-cart-panel:32px 37px;
                    --padding-close--cart-panel:32px;
                    --spacing-cart:59.88px;
                }
                /* cabecera */
                    /* carrito */
                    #main-header .mobile-header .header-content .attachment-list :is(.wishlist-wrapper, .sign-in-wrapper){display:inherit;}

                /* single product */
                .single-product #main .container.breadcrumb-wrapper{background-color:var(--wp--preset--color--line);}
                #main .container.product-wrapper .section .product{display:grid; grid-template-columns:58.3333% 1fr;}
                    /* galería */
                    .woocommerce-product-gallery{display:grid; gap:15px 0; grid-template-columns:60px 1fr;}
                        /* carrusel */
                        .woocommerce-product-gallery__wrapper{grid-column:2/3; grid-row:2/3;}
                        /* botón de zoom */
                        .woocommerce-product-gallery__trigger{margin-left:auto;}
                        /* navegación */
                        .flex-control-nav{width:60px; overflow:hidden; display:grid; gap:17px; grid-column:1/2; grid-row:1/3; align-content:baseline;}
                        .flex-control-nav li img{width:60px; height:60px; transition:all .3s ease;}
                        .flex-control-nav li img.flex-active{opacity:.3;}
                    /* resumen */
                    .product .summary{max-width:340px; padding:40px 0 0; margin-inline:auto;}
                    /* pestañas */
                    .tabs.wc-tabs{display:flex; justify-content:center; gap:31px;}
                    .tabs.wc-tabs li{height:33px;}

                
                /* footer */
                #main-footer .footer-content{grid-template-columns:auto auto 1fr;}
                    /* menú secundario */
                    #main-footer .secondary ul li{padding:0;}
                    /* menú social */
                    #main-footer .social{margin-left:auto;}
            }

            @media(min-width:1200px){
                :root{
                    /* resumen */
                    --font-size--product-title:27px;
                }
                /* contacto */
                .contact-page .info-and-contact--wrapper :is(.info, .contact){grid-template-columns:386px 1fr;}
            }
        </style>
    <?php
}
add_action('wp_head', 'kenko_theme_custom_breakpoints');