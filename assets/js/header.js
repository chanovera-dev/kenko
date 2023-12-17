/* arreglo del botón del menú y del menú */
function myFunction(x) {
    let navMobile = document.querySelector('.menu-mobile');
    let main = document.getElementById('main');
    x.classList.toggle('active');

    if (!navMobile.classList.contains('open')) {
        navMobile.classList.add('open');
        main.style.filter = "brightness(.75)";
    } else {
        navMobile.classList.add('close');
        main.style.filter = null;
         setTimeout(function() {
            navMobile.classList.remove('open');
            navMobile.classList.remove('close');
         }, 300);
     }
}



// Agrega el botón para abrir el submenú en el menú mobile
document.addEventListener("DOMContentLoaded", function() {
    // Obtener todos los elementos li con la clase 'menu-item-has-children'
    let menuItems = document.querySelectorAll('.menu-item-has-children');
  
    // Iterar sobre cada elemento y agregar el botón con el SVG
    menuItems.forEach(function(item) {
      // Crear un nuevo botón
      let button = document.createElement('button');
      // Agregar la clase 'mobile-links__item-toggle' al botón
      button.classList.add('mobile-links__item-toggle');
      button.setAttribute('onclick', 'toggleSubMenu(this)');
      
      // Crear el elemento SVG
      let svg = document.createElementNS("http://www.w3.org/2000/svg", "svg");
      svg.setAttribute('xmlns', 'http://www.w3.org/2000/svg');
      svg.setAttribute('width', '16');
      svg.setAttribute('height', '16');
      svg.setAttribute('fill', 'currentColor');
      svg.setAttribute('class', 'bi bi-plus-lg');
      svg.setAttribute('viewBox', '0 0 16 16');
  
      // Crear el elemento path dentro del SVG
      var path = document.createElementNS("http://www.w3.org/2000/svg", "path");
      path.setAttribute('fill-rule', 'evenodd');
      path.setAttribute('d', 'M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5A.5.5 0 0 1 8 2');
  
      // Agregar el path al elemento SVG
      svg.appendChild(path);
      // Agregar el SVG al botón
      button.appendChild(svg);
  
      // Agregar el botón al elemento li sin borrar su contenido existente
      item.appendChild(button);
    });

    // función toggle para el botón del submenú mobile
    function toggleSubMenu(button) {
        let subMenu = button.closest('li').querySelector('.sub-menu');
        subMenu.classList.toggle('open');
    }
  });