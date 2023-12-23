// cambia el icono del zoom
let zoomIcon = document.querySelector('.woocommerce-product-gallery__trigger');

  if (zoomIcon) {
    // Crea un elemento 'i' con las clases 'nm-font nm-font-plus'
    var iconElement = document.createElement('i');
    iconElement.className = 'nm-font nm-font-plus';

    // Elimina el contenido actual del div
    zoomIcon.innerHTML = '';

    // Agrega el nuevo elemento 'i' al div
    zoomIcon.appendChild(iconElement);
  }