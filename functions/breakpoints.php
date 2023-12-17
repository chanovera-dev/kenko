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
                --single-post-pagination--svg-size:12px;
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
                    --single-post-pagination--svg-size:45px;
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
                        #main .container .section .post .wp-block-gallery{display:flex; grid-template-columns:1fr 1fr;}
                        #main .container .section .post .wp-block-gallery.grid{display:grid; grid-template-columns:1fr 1fr;}
                        .wp-block-gallery.has-nested-images.columns-default figure.wp-block-image:not(#individual-image),
                        .wp-block-gallery.has-nested-images.columns-default figure.wp-block-image:not(#individual-image):first-child:nth-last-child(2), 
                        .wp-block-gallery.has-nested-images.columns-default figure.wp-block-image:not(#individual-image):first-child:nth-last-child(2)~figure.wp-block-image:not(#individual-image){width:calc(33.33% - var(--wp--style--unstable-gallery-gap, 16px)*.66667)!important;}
                        .wp-block-gallery.grid.has-nested-images.columns-default figure.wp-block-image:not(#individual-image),
                        .wp-block-gallery.grid.has-nested-images.columns-default figure.wp-block-image:not(#individual-image):first-child:nth-last-child(2), 
                        .wp-block-gallery.grid.has-nested-images.columns-default figure.wp-block-image:not(#individual-image):first-child:nth-last-child(2)~figure.wp-block-image:not(#individual-image){width:100%!important;}
                    /* paginación */
                    #main .container .single-post-pagination :is(.left, .right) :is(.previous-post-link, .next-post-link){height:42.58px;}
                    /* formulario */
                    .comment-form{display:grid; grid-template-columns:1fr 1fr; gap:0 30px;}
                    .comment-form :is(.comment-notes, .comment-form-comment, .comment-form-url, .comment-form-cookies-consent, .form-submit){grid-column:1/-1;}
                
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
            }

            @media(min-width:991px){
                /* cabecera */
                #main-header,
                #main-header .mobile-header{height:81px;}
                /* botón del menú mobile */
                .mobile-menu--button{display:none;}
                /* menú principal */
                #main-header .mobile-header .header-content .primary{display:inherit;}
            }

            @media(min-width:1024px){
                :root{
                    /* blog */
                    --categories-list--padding:29px 0 108px;

                    /* single post */
                    --padding-top--post-wrapper:68px;
                    --width-single-post-pagination:min(100% - 90px);
                }
                /* cabecera */
                    /* carrito */
                    #main-header .mobile-header .header-content .attachment-list :is(.wishlist-wrapper, .sign-in-wrapper){display:inherit;}
                
                /* footer */
                #main-footer .footer-content{grid-template-columns:auto auto 1fr;}
                    /* menú secundario */
                    #main-footer .secondary ul li{padding:0;}
                    /* menú social */
                    #main-footer .social{margin-left:auto;}
            }
        </style>
    <?php
}
add_action('wp_head', 'kenko_theme_custom_breakpoints');