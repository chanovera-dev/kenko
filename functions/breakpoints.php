<?php

function kenko_theme_custom_breakpoints() {
    ?>
        <style>
            :root{
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

            @media(min-width:576px){
                :root{
                    
                }
            }

            @media(min-width:768px){
                :root{
                    /* single post */
                    --padding-top--post-wrapper:68px;
                    --aspect-ratio--featured-picture:16/9;
                    --padding--single-post-pagination:44px 0;
                    --single-post-pagination--title-post:inherit;
                    --single-post-pagination--svg-opacity:.3;
                    --single-post-pagination--svg-grid-row:1/3;
                    --single-post-pagination--svg-size:45px;
                }
                /* single post */
                    /* formulario */
                    .comment-form{display:grid; grid-template-columns:1fr 1fr; gap:0 30px;}
                    .comment-form :is(.comment-notes, .comment-form-comment, .comment-form-url, .comment-form-cookies-consent, .form-submit){grid-column:1/-1;}
            }

            @media(min-width:1024px){
                :root{
                    /* single post */
                    --width-single-post-pagination:min(100% - 90px);
                }
            }

            @media(min-width:1199px){
                :root{

                }
            }
        </style>
    <?php
}
add_action('wp_head', 'kenko_theme_custom_breakpoints');