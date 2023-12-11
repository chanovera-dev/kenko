<?php
get_header();

    echo '
    <main id="main">
        <div class="container">

            <ul class="section">';
            $categories = get_categories();
                foreach($categories as $category) {
                    echo '<li><a href="#" class="category-button" data-category="' . $category->slug . '">' . $category->name . '</a></li>';
                }
            echo '
            </ul>

            <section id="post-list" class="section">';
            
            echo '
            </section>';

            get_posts_by_category();

            echo '
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

                the_posts_pagination();
                
            echo '
            </section>
        </div>
    </main>';
    
get_footer();