jQuery(document).ready(function($) {
    $('.category-list_item').on('click', function() {
        $('.category-list_item').removeClass('active');
        $(this).addClass('active');

        $.ajax({
            type: 'POST',
            url: '/wp-admin/admin-ajax.php',
            dataType: 'html',
            data: {
                action: 'filter_projects',
                category: $(this).data('slug'),
            },
            success: function(res) {
                $('.posts').html(res);
            }
        });
    });
});



// Después de cargar las publicaciones con Ajax
jQuery(document).ajaxComplete(function () {
    // Puedes ajustar '15' según tus necesidades
    jQuery('p').each(function () {
        var excerpt = jQuery(this).text();
        var limitedExcerpt = excerpt.split(' ').splice(0, 15).join(' ');
        jQuery(this).text(limitedExcerpt);
    });
});