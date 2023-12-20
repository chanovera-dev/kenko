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



// cierra el menú en caso de presionar sobre main o sobre el footer
let main = document.getElementById('main');
let footer = document.getElementById('main-footer');

function closeMenu() {
    let navMobile = document.querySelector('.menu-mobile');
    let bars = document.querySelector('.bars');

    // Verificar si el menú está abierto
    if (navMobile.classList.contains('open')) {
        // Llamar a la función para cerrar el menú
        myFunction(document.querySelector('.mobile-menu--button'));
        bars.classList.remove('active');
    }
}

main.addEventListener('click', function(event) {
    // Verificar si se hizo clic fuera del menú
    if (!document.querySelector('.menu-mobile').contains(event.target)) {
        closeMenu();
    }
});

footer.addEventListener('click', function(event) {
    // Verificar si se hizo clic fuera del menú
    if (!document.querySelector('.menu-mobile').contains(event.target)) {
        closeMenu();
    }
});




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
      button.setAttribute('onclick', 'toggleSubMenu(this); changeSVG(this);');
      
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
    
  });

// función toggle para el botón del submenú mobile
function toggleSubMenu(button) {
    let subMenu = button.closest('li').querySelector('.sub-menu');
    subMenu.classList.toggle('open');
}

// función para cambiar el contenido del SVG
function changeSVG(button) {
    let svg = button.querySelector('svg');
    let path = svg.querySelector('path');
    
    // Verificar el estado actual del botón y cambiar el SVG en consecuencia
    if (svg.classList.contains('bi-plus-lg')) {
        svg.setAttribute('class', 'bi bi-dash-lg');
        path.setAttribute('d', 'M2 8a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11A.5.5 0 0 1 2 8');
    } else {
        svg.setAttribute('class', 'bi bi-plus-lg');
        path.setAttribute('d', 'M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5A.5.5 0 0 1 8 2');
    }
}



// detecta el scroll en el sitio
const body = document.body;
const header = document.querySelector('.main-header');
const mobileHeader = document.querySelector('.main-header .mobile-header');
const scrollUp = "scroll-up";
const scrollDown = "scroll-down";
let lastScroll = 0;

window.addEventListener("scroll", () => {
  const currentScroll = window.pageYOffset;
  if (currentScroll <= 0) {
    body.classList.remove(scrollUp);
    return;
  }
  
  if (currentScroll > lastScroll && !body.classList.contains(scrollDown)) {
    // down
    body.classList.remove(scrollUp);
    body.classList.add(scrollDown);
    closeMenu();
  } else if (currentScroll < lastScroll && body.classList.contains(scrollDown)) {
    // up
    body.classList.remove(scrollDown);
    body.classList.add(scrollUp);
    closeMenu();
  }
  lastScroll = currentScroll;
});



// botón para abrir y cerrar el carrito
const panelCarritoWrapper = document.getElementById('cart-panel--wrapper');
const panelOverlay = document.getElementById('panel-overlay');
const abrirCarrito = document.getElementById('open-cart-panel');
const cerrarCarrito = document.getElementById('close-cart-panel');

abrirCarrito.addEventListener("click", function() {
    panelCarritoWrapper.style.right = "0";
    panelOverlay.style.transitionDelay = ".5s";
    panelOverlay.style.backgroundColor = "rgba(255,255,255,.5)";
});

cerrarCarrito.addEventListener("click", function() {
    panelCarritoWrapper.style.right = null;
    panelOverlay.style.backgroundColor = null;
});
