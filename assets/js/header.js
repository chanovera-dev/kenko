/* arreglo del botón del menú y del menú */
function myFunction(x) {
    let navMobile = document.querySelector('.menu-mobile');
    // let body = document.getElementById("body");
    // let header = document.getElementById("responsive-header");
    let main = document.getElementById('main');
    // let footer = document.getElementById("main-footer");
    x.classList.toggle('active');

    if (!navMobile.classList.contains('open')) {
        navMobile.classList.add('open');
        main.style.filter = "brightness(.75)";
    //     body.classList.add("menu-active");
    //     header.classList.add("menu-active");
    //     main.classList.add("menu-active");
    //     footer.classList.add("menu-active");
    } else {
        navMobile.classList.add('close');
        main.style.filter = null;
    //     body.classList.remove("menu-active");
    //     header.classList.add("menu-inactive");
    //     main.classList.add("menu-inactive");
    //     footer.classList.add("menu-inactive");
         setTimeout(function() {
            navMobile.classList.remove('open');
            navMobile.classList.remove('close');
    //         header.classList.remove("menu-inactive");
    //         header.classList.remove("menu-active");
    //         main.classList.remove("menu-inactive");
    //         main.classList.remove("menu-active");
    //         footer.classList.remove("menu-inactive");
    //         footer.classList.remove("menu-active");
         }, 300);
     }
}