document.addEventListener('DOMContentLoaded', function() {
    let numeroContacto = document.getElementById('number-contact');
    let numeroCompleto = numeroContacto.textContent;
    let numeroFormateado = formatoNumero(numeroCompleto);
    numeroContacto.textContent = numeroFormateado;
  });

  function formatoNumero(numero) {
    numero = numero.slice(0, 3) + '.' + numero.slice(3);
    numero = numero.slice(0, 7) + '.' + numero.slice(7);
    return numero;
  }