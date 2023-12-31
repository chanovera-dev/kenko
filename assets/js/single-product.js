// agrega botones para el input de números en el producto
document.addEventListener('DOMContentLoaded', function() {
    const inputQty = document.querySelector(".summary .cart .quantity .input-text");
    inputQty.setAttribute("id", "input-qty");

    const buttonLess = document.createElement("button");
    const buttonPlus = document.createElement("button");
    buttonLess.type = "button";
    buttonPlus.type = "button";
    buttonLess.id = "button-less";
    buttonPlus.id = "button-plus";
    buttonLess.innerText = "-";
    buttonPlus.innerText = "+";

    function down(){ this.parentNode.querySelector('[type=number]').stepDown(); }
    buttonLess.onclick = down

    function up(){ this.parentNode.querySelector('[type=number]').stepUp(); }
    buttonPlus.onclick = up

    inputQty.insertAdjacentElement("afterend", buttonPlus);
    inputQty.insertAdjacentElement("beforebegin", buttonLess);
});