<?php
get_header();

    echo '
    <main id="main">
        <div class="container">
            <section class="section">';

            

                if ( have_posts() ){           
                    echo '
                    <div class="posts">';
                        

                        while( have_posts() ){            
                            the_post();  
                            get_template_part( 'templates/content', 'archive' );    
                        }

                        echo '
                        
                    </div>';     
                } else {
                    echo '<p>' . esc_html__('No se encontraron artículos', 'kenko') . '</p>';
                }

                the_post_pagination();
                
            echo '
            </section>
        </div>
    </main>';
    
get_footer();