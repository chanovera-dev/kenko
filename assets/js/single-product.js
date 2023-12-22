// Obtén el elemento con la clase .comment-form-rating
var commentRating = document.querySelector('.comment-form-rating');

// Obtén la lista de clases del elemento
var classes = commentRating.classList;

// Itera a través de las clases para encontrar la que tiene la propiedad active
for (var i = 0; i < classes.length; i++) {
  switch (classes[i]) {
    case 'star-5':
      document.querySelector('.star-5').style.color = '#dc9814';
      document.querySelector('.star-4').style.color = '#dc9814';
      document.querySelector('.star-3').style.color = '#dc9814';
      document.querySelector('.star-2').style.color = '#dc9814';
      document.querySelector('.star-1').style.color = '#dc9814';
      break;

    case 'star-4':
      document.querySelector('.star-4').style.color = '#dc9814';
      document.querySelector('.star-3').style.color = '#dc9814';
      document.querySelector('.star-2').style.color = '#dc9814';
      document.querySelector('.star-1').style.color = '#dc9814';
      break;

    case 'star-3':
      document.querySelector('.star-3').style.color = '#dc9814';
      document.querySelector('.star-2').style.color = '#dc9814';
      document.querySelector('.star-1').style.color = '#dc9814';
      break;

    case 'star-2':
    document.querySelector('.star-2').style.color = '#dc9814';
    document.querySelector('.star-1').style.color = '#dc9814';
    break;

    case 'star-1':
      document.querySelector('.star-1').style.color = '#dc9814';
      break;

    default:
      break;
  }
}