document.addEventListener('DOMContentLoaded', function() {
    // Obtén el elemento con la clase "star-1"
    var star1Element = document.querySelector('.comment-form-rating .stars span .star-1');
    var star2Element = document.querySelector('.comment-form-rating .stars span .star-2');
    var star3Element = document.querySelector('.comment-form-rating .stars span .star-3');
    var star4Element = document.querySelector('.comment-form-rating .stars span .star-4');
    var star5Element = document.querySelector('.comment-form-rating .stars span .star-5');

    // Verifica si tiene la clase "selected"
    if (star5Element.classList.contains('selected')) {
        // La clase "selected" está presente
        star5Element.style.color = "#dc9814";
        star4Element.style.color = "#dc9814";
        star3Element.style.color = "#dc9814";
        star2Element.style.color = "#dc9814";
        star1Element.style.color = "#dc9814";
    } else if (star4Element.classList.contains('selected')) {
        star4Element.style.color = "#dc9814";
        star3Element.style.color = "#dc9814";
        star2Element.style.color = "#dc9814";
        star1Element.style.color = "#dc9814";
    } else if (star3Element.classList.contains('selected')) {
        star3Element.style.color = "#dc9814";
        star2Element.style.color = "#dc9814";
        star1Element.style.color = "#dc9814";
    } else if (star2Element.classList.contains('selected')) {
        star2Element.style.color = "#dc9814";
        star1Element.style.color = "#dc9814";
    } else if (star1Element.classList.contains('selected')) {
        star1Element.style.color = "#dc9814";
    } else {}
});