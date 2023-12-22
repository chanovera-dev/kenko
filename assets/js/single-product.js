// Obtén el elemento con la clase .comment-form-rating
var commentRating = document.querySelector('.comment-form-rating .stars span');

// Obtén la lista de clases del elemento
var classes = commentRating.classList;

// Quita el estilo de color de todas las estrellas
document.querySelectorAll('.stars span').forEach(function(star) {
  star.style.color = '';
});

// Itera a través de las clases para encontrar la que tiene la propiedad active
for (var i = 0; i < classes.length; i++) {
  if (classes[i].includes('active')) {
    // Encuentra la clasificación específica y establece el color
    var ratingClass = classes[i].replace('active', '').trim();
    document.querySelectorAll('.' + ratingClass).forEach(function(star) {
      star.style.color = '#dc9814';
    });
  }
}
