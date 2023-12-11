jQuery(document).ready(function($) {
    $('.category-button').on('click', function() {
        var category = $(this).data('category');

        $.ajax({
            type: 'POST',
            url: ajax_params.ajax_url,
            data: {
                action: 'filter_posts',
                category: category,
            },
            success: function(response) {
                // Actualiza el contenido de la lista de entradas con la respuesta del servidor
                $('#post-list').html(response);
            }
        });
    });
});
