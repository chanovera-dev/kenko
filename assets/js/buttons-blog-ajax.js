jQuery(document).ready(function($) {
    $('.category-button').on('click', function() {
      var category = $(this).data('category');
  
      $.ajax({
        type: 'POST',
        url: ajax_object.ajaxurl,
        data: {
          action: 'filter_posts',
          category: category
        },
        success: function(response) {
          $('#content').html(response);
        }
      });
    });
  });
  