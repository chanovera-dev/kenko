document.addEventListener('DOMContentLoaded', function () {
    // Selecciona todos los elementos que contienen la clase 'wp-block-gallery'
    let galleryContainers = document.querySelectorAll('.wp-block-gallery');

    // Itera sobre los contenedores de galerías
    galleryContainers.forEach(function (container) {
        // Selecciona los elementos hijos directos con la clase 'wp-block-image' dentro de cada contenedor
        let galleryItems = container.querySelectorAll('.wp-block-image');

        // Verifica si la cantidad de elementos hijos es par
        if (galleryItems.length % 2 === 0) {
            // Agrega la clase 'grid' al contenedor actual
            container.classList.add('grid');
        }
    });
});