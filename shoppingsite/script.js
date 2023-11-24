let nav = document.querySelector("#navArea");
let btn = document.querySelector(".toggle-btn");
let mask = document.querySelector("#mask");

btn.onclick = () => {
  nav.classList.toggle("open");
};

mask.onclick = () => {
  nav.classList.toggle("open");
};

function calculateSubtotal(subtotalId, quantityInputId, priceId) {
  var quantity = parseInt(document.getElementById(quantityInputId).value) || 0;
  var price = parseFloat(document.getElementById(priceId).innerText.replace('￥', '')) || 0;

  if (!isNaN(quantity) && !isNaN(price)) {
      var subtotal = quantity * price;
      document.getElementById(subtotalId).textContent = subtotal;
  }
  calculateTotalQuantity();  // 合計数量も再計算
}

function calculateTotalQuantity() {
  var quantityS = parseInt(document.getElementById('quantityInputS').value) || 0;
  var quantityM = parseInt(document.getElementById('quantityInputM').value) || 0;
  var quantityL = parseInt(document.getElementById('quantityInputL').value) || 0;
  var quantityXL = parseInt(document.getElementById('quantityInputXL').value) || 0;
  var quantityXXL = parseInt(document.getElementById('quantityInputXXL').value) || 0;

  var totalQuantity = quantityS + quantityM + quantityL + quantityXL + quantityXXL;

  document.getElementById('totalQuantity').innerText = totalQuantity;
}