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
    var menuItems = document.querySelectorAll('.menu-item-has-children');
  
    // Iterar sobre cada elemento y agregar el botón con el SVG
    menuItems.forEach(function(item) {
      // Crear un nuevo botón
      var button = document.createElement('button');
      // Agregar la clase 'mobile-links__item-toggle' al botón
      button.classList.add('mobile-links__item-toggle');
      button.setAttribute('onclick', 'toggleSubMenu(this)');
      
      // Crear el elemento SVG
      var svg = document.createElementNS("http://www.w3.org/2000/svg", "svg");
      svg.setAttribute('xmlns', 'http://www.w3.org/2000/svg');
      svg.setAttribute('width', '16');
      svg.setAttribute('height', '16');
      svg.setAttribute('fill', 'currentColor');
      svg.setAttribute('class', 'bi bi-chevron-down');
      svg.setAttribute('viewBox', '0 0 16 16');
  
      // Crear el elemento path dentro del SVG
      var path = document.createElementNS("http://www.w3.org/2000/svg", "path");
      path.setAttribute('fill-rule', 'evenodd');
      path.setAttribute('d', 'M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z');
  
      // Agregar el path al elemento SVG
      svg.appendChild(path);
      // Agregar el SVG al botón
      button.appendChild(svg);
  
      // Agregar el botón al elemento li sin borrar su contenido existente
      item.appendChild(button);
    });
  });