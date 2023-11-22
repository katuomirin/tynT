function calculateSubtotal(subtotalId, quantityInputId, priceId) {
    var quantity = document.getElementById(quantityInputId).value;
    var price = $row['price']; // 価格をセットする必要があります
  
    // 数量と価格が数字であることを確認
    if (!isNaN(quantity) && !isNaN(price)) {
        var subtotal = quantity * price;
        document.getElementById(subtotalId).textContent = subtotal;
    }
  }