document.addEventListener('DOMContentLoaded', function () {
    let galleryElements = document.getElementsByClassName('wp-block-gallery');

    // Verificar si la cantidad de elementos es par
    if (galleryElements.length % 2 === 0) {
        // Agregar la clase 'grid' a todos los elementos
        for (var i = 0; i < galleryElements.length; i++) {
            galleryElements[i].classList.add('grid');
        }
    }
});
