// Obtén el elemento con la clase .comment-form-rating
var commentRating = document.querySelector('.comment-form-rating stars.selected span');

// Obtén la lista de clases del elemento
var classes = commentRating.classList;

// Itera a través de las clases para encontrar la que tiene la propiedad active
for (var i = 0; i < classes.length; i++) {
  switch (classes[i]) {
    case 'star-5 active':
      document.querySelector('.star-5').style.color = '#dc9814!important';
      document.querySelector('.star-4').style.color = '#dc9814!important';
      document.querySelector('.star-3').style.color = '#dc9814!important';
      document.querySelector('.star-2').style.color = '#dc9814!important';
      document.querySelector('.star-1').style.color = '#dc9814!important';
      break;

    case 'star-4 active':
      document.querySelector('.star-4').style.color = '#dc9814!important';
      document.querySelector('.star-3').style.color = '#dc9814!important';
      document.querySelector('.star-2').style.color = '#dc9814!important';
      document.querySelector('.star-1').style.color = '#dc9814!important';
      break;

    case 'star-3 active':
      document.querySelector('.star-3').style.color = '#dc9814!important';
      document.querySelector('.star-2').style.color = '#dc9814!important';
      document.querySelector('.star-1').style.color = '#dc9814!important';
      break;

    case 'star-2 active':
    document.querySelector('.star-2').style.color = '#dc9814!important';
    document.querySelector('.star-1').style.color = '#dc9814!important';
    break;

    case 'star-1 active':
      document.querySelector('.star-1').style.color = '#dc9814!important';
      break;

    default:
      break;
  }
}