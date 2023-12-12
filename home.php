<?php 
get_header();

echo '
<main id="main">
    <div class="container">
        <section class="section">';

        $categories = get_categories();
        echo '
        <ul class="categories-list">
            <li><a class="category-list_item active" href="#!" data-slug="">' . esc_html__('Todo', 'kenko') . '</a></li>';

            foreach($categories as $category) :
            echo '
            <li>
                <a class="category-list_item" href="#!" data-slug="' . $category->slug . '">' . $category->name . '</a>
            </li>';
            endforeach;
        echo '
        </ul>';
            


                // if ( have_posts() ){           
                //     echo '
                //     <div class="posts">';
                        

                //         while( have_posts() ){            
                //             the_post();  
                //             get_template_part( 'templates/content', 'archive' );    
                //         }

                //         echo '
                        
                //     </div>';     
                // } else {
                //     echo '<p>' . esc_html__('No se encontraron artículos', 'kenko') . '</p>';
                // }

                // the_posts_pagination();


        echo '
        </section>
    </div>
</main>';
    
get_footer();