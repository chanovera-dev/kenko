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