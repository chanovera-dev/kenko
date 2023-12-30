<?php /* template name: Testing */
get_header();

echo '
<main id="main">
    <div class="container">
        <section class="section breadcrumb-filter-search">
            <nav class="categories-list--wrapper">';
                $taxonomy = 'product_cat';
                $categories = get_terms(array(
                    'taxonomy'   => $taxonomy,
                    'hide_empty' => false,
                    'exclude'    => array(get_option('default_product_cat')), // Excluir la categoría 'sin categorizar'
                ));
                echo '
                <ul class="categories-list">
                    <li><a class="category-list_item active" href="#!" data-slug="">' . esc_html__('Todo', 'kenko') . '</a></li>';
                    foreach($categories as $category) :
                    echo '
                    <li><a class="category-list_item" href="#!" data-slug="' . $category->slug . '">' . $category->name . '</a></li>';
                    endforeach;
                echo '
                </ul>
            </nav>
        </section>
    </div>
    <div class="container">
        <section class="section sections-products">';

        $products = new WC_Product_Query(array(
            'limit' => -1,
            'orderby' => 'date',
            'order' => 'DESC',
        ));
        
        $products = $products->get_products();

        if ($products) :
            echo '<ul class="products columns-4">';
            foreach ($products as $product) :
                echo '<li>';
                echo '<h2>' . esc_html($product->get_title()) . '</h2>';
                echo '<span class="price">' . $product->get_price_html() . '</span>';
                echo '<a href="' . esc_url($product->get_permalink()) . '">Ver producto</a>';
                echo '</li>';
            endforeach;
            echo '</ul>';
        endif;
        
        echo '
        </section>
    </div>
</main>';

get_footer();