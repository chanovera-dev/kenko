// Paso 1: Obtener el elemento a través del id
var enlace = document.getElementById('number-contact');

// Paso 2: Obtener el contenido y convertirlo a un número
var numeroOriginal = parseInt(enlace.textContent);

// Paso 3: Formatear el número según el formato deseado
var numeroFormateado = numeroOriginal.toString().padStart(10, '0').replace(/(\d{3})(?=\d{1,})/g, '$1.');

// Paso 4: Actualizar el contenido del elemento a con el nuevo formato
enlace.textContent = numeroFormateado;