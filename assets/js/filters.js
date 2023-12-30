$('.filter-link').on('click', function(e) {
    e.preventDefault();
    $(this).toggleClass('activeFilter');
    editFilterInputs($('#filters-' + $(this).data('type')), $(this).data('id'));
    filterProducts();
  });



  function editFilterInputs(inputField, value) {
    const currentFilters = inputField.val().split(',');
    const newFilter = value.toString();
    if (currentFilters.includes(newFilter)) {
      const i = currentFilters.indexOf(newFilter);
      currentFilters.splice(i, 1);
      inputField.val(currentFilters);
    } else {
      inputField.val(inputField.val() + ',' + newFilter);
    }
  }



  function filterProducts() {
    const catIds = $('#filters-category').val().split(',');
    const creatorIds = $('#filters-creators').val().split(',');
    
    $.ajax({
      type: 'POST',
      url: '/wp-admin/admin-ajax.php',
      dataType: 'json',
      data: {
        action: 'filter_products',
        catIds,
        creatorIds,
      },
      success: function(res) {
        $('#result-count').html(res.total);
        $('#main-product-list').html(res.html);
      },
      error: function(err) {
        console.error(err);
      }
    })
  }