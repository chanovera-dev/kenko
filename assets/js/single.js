document.addEventListener('DOMContentLoaded', function () {
    // Selecciona todos los elementos con la clase 'post' que contienen la clase 'wp-block-gallery'
    let galleryContainers = document.querySelectorAll('.post .wp-block-gallery');

    // Itera sobre los contenedores de galerías
    galleryContainers.forEach(function (container) {
        // Selecciona los elementos hijos directos con la clase 'blocks-gallery-item' dentro de cada contenedor
        let galleryItems = container.querySelectorAll('.post .wp-block-gallery .wp-block-image');

        // Verifica si la cantidad de elementos hijos es par
        if (galleryItems.length % 2 === 0) {
            // Agrega la clase 'grid' a todos los elementos hijos
            galleryContainers.classList.add('grid');
        }
    });
});
