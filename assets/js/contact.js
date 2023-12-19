document.addEventListener('DOMContentLoaded', function() {
    // Obtén el elemento con el ID "number-contact"
    var numeroContacto = document.getElementById('number-contact');

    // Obtén el contenido actual del elemento
    var numeroCompleto = numeroContacto.textContent;

    // Aplica el formato deseado
    var numeroFormateado = formatoNumero(numeroCompleto);

    // Actualiza el contenido del elemento con el número formateado
    numeroContacto.textContent = numeroFormateado;
  });

  function formatoNumero(numero) {
    // Inserta un punto después del tercer número
    numero = numero.slice(0, 3) + '.' + numero.slice(3);

    // Inserta otro punto después del sexto número
    numero = numero.slice(0, 7) + '.' + numero.slice(7);

    return numero;
  }