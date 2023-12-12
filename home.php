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

        $projects = new WP_Query([
        'post_type' => 'post',
        'posts_per_page' => -1,
        'order_by' => 'date',
        'order' => 'desc',
        ]);


        if($projects->have_posts()):
        echo '
        <div class="posts">';
            while($projects->have_posts()) : $projects->the_post();
            get_template_part( 'templates/content', 'archive' ); 
            endwhile;
        echo '
        </div>';
            wp_reset_postdata();
        endif;
        
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