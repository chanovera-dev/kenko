// Paso 1: Obtener el elemento a través del id
var enlace = document.getElementById('number-contact');

// Paso 2: Obtener el contenido y convertirlo a un número
var numeroOriginal = parseInt(enlace.textContent);

// Paso 3: Formatear el número según el formato deseado
var numeroFormateado = numeroOriginal.toString().replace(/\B(?=(\d{3})+(?!\d))/g, '.');

// Paso 4: Actualizar el contenido del elemento a con el nuevo formato
enlace.textContent = numeroFormateado;