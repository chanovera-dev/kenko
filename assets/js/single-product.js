// cambia el icono del zoom
jQuery(document).ready(function($) {
    // Cambia el icono del zoom
    var zoomIcon = $('.woocommerce-product-gallery__trigger');
  
    if (zoomIcon.length) {
      // Crea un elemento 'i' con las clases 'nm-font nm-font-plus'
      var iconElement = $('<i>').addClass('nm-font nm-font-plus');
  
      // Vacía el contenido actual del div
      zoomIcon.empty();
  
      // Agrega el nuevo elemento 'i' al div
      zoomIcon.append(iconElement);
    }
  });