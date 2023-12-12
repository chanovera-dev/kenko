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

jQuery(document).ready(function($) {
    var maxLength = 15; // Establece el número máximo de palabras permitidas

    // Itera sobre todas las etiquetas <p> en el documento
    $("p").each(function() {
        var text = $(this).text(); // Obtiene el texto de la etiqueta <p>
        var words = text.split(" "); // Divide el texto en palabras
        var truncatedWords = words.slice(0, maxLength); // Toma solo las primeras 'maxLength' palabras
        var truncatedText = truncatedWords.join(" "); // Une las palabras truncadas en un nuevo texto
        $(this).text(truncatedText); // Establece el nuevo texto en la etiqueta <p>
    });
});