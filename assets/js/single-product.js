// Selecciona todas las estrellas
var stars = document.querySelectorAll('.comment-form-rating .stars span');

// Asigna un evento de clic a cada estrella
stars.forEach(function(star, index) {
  star.addEventListener('click', function() {
    // Restablece el color de todas las estrellas
    stars.forEach(function(s, i) {
      s.style.color = i <= index ? '#dc9814' : ''; // Establece el color solo para las estrellas hasta la calificación actual
    });
  });
});
