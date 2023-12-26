<?php
echo '
<aside>
    <div class="tags-and-share">
        <div class="tags">' . get_the_tag_list() . '</div>';
        include(TEMPLATEPATH . '/parts/widgets/share.php');
    echo '
    </div>
    <div class="categories">' . esc_html__('Publicado en ', 'kenko'); the_category(); echo '.</div>
</aside>';