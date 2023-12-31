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



function openPanelCart() {
    let panelOverlay = document.getElementById('panel-overlay');
    let cartPanelWrapper = document.getElementById('cart-panel--wrapper');
    
    panelOverlay.classList.add('open');
    cartPanelWrapper.classList.add('open');
}

function closePanels() {
    let panelOverlay = document.getElementById('panel-overlay');
    let cartPanelWrapper = document.getElementById('cart-panel--wrapper');
    // let wishlistPanelWrapper = document.getElementById('wishlist-panel--wrapper');

    if (panelOverlay.classList.contains('open') || cartPanelWrapper.classList.contains('open')) {
        panelOverlay.classList.remove('open');
        cartPanelWrapper.classList.remove('open');
    }
}

let cerrarPaneles = document.getElementById('panel-overlay');
cerrarPaneles.addEventListener("click", function() {
    closePanels();
});




// borrar el contenido del mensaje de 'no hay productos en el carrito' y reponerlo con contenido personalizado'
// Obtén el elemento div con las clases 'wc-block-components-notice-banner is-info'
var noticeBanner = document.querySelector('.wc-block-components-notice-banner.is-info');

if (noticeBanner) {
  // Elimina el contenido actual del div
  noticeBanner.innerHTML = '';

  // Crea un nuevo elemento 'i' con las clases 'nm-font nm-font-close2'
  var iconElement = document.createElement('i');
  iconElement.className = 'nm-font nm-font-close2';

  // Agrega el nuevo elemento 'i' al div
  noticeBanner.appendChild(iconElement);

  // También puedes agregar otros elementos al div si es necesario
  var otherDivElement = document.createElement('div');
  otherDivElement.textContent = 'No hay productos en el carrito.';
  noticeBanner.appendChild(otherDivElement);
}
