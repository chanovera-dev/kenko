jQuery(document).ready(function($) {
    $('.category-list_item').on('click', function() {
        $('.category-list_item').removeClass('active');
        $(this).addClass('active');

        $.ajax({
            type: 'product',
            url: '/wp-admin/admin-ajax.php',
            dataType: 'html',
            data: {
                action: 'filter_projects',
                category: $(this).data('slug'),
            },
            success: function(res) {
                $('.products.columns-4').html(res);
            }
        });
    });
});