function calculateSubtotal(subtotalId, quantityInputId, price) {
    var quantity = parseInt(document.getElementById(quantityInputId).value) || 0;
    var subtotal = quantity * price;

    // 数量が数字であることを確認
    if (!isNaN(quantity) && !isNaN(price)) {
        document.getElementById(subtotalId).textContent = subtotal;
        calculateTotalQuantity();  // 総数量も再計算
        calculateTotalSubtotal();  // 小計の合計も再計算
    }
}

function calculateTotalQuantity() {
    var sizes = ['S', 'M', 'L', 'XL', 'XXL'];
    var totalQuantity = 0;

    sizes.forEach(function (size) {
        var quantity = parseInt(document.getElementById('quantityInput' + size).value) || 0;
        totalQuantity += quantity;
    });

    document.getElementById('totalQuantity').innerText = totalQuantity;
}

function calculateTotalSubtotal() {
    var totalSubtotal = 0;

    // 各サイズの小計を取得
    var sizes = ['S', 'M', 'L', 'XL', 'XXL'];
    sizes.forEach(function (size) {
        totalSubtotal += parseInt(document.getElementById('subtotal' + size).textContent) || 0;
    });

    // 加工位置のチェックボックスを取得
    var checkboxes = document.querySelectorAll('form.check input[type="checkbox"]');
    checkboxes.forEach(function (checkbox) {
        if (checkbox.checked) {
            totalSubtotal += 500 * parseInt(checkbox.getAttribute('data-quantity')) || 0;
        }
    });

    // optionsの取得
    var options = document.getElementsByName("options");
    options.forEach(function (option) {
        if (option.checked) {
            totalSubtotal += 500;
            alert(option.value);
        }
    });

    document.getElementById('processingFee').innerText = totalSubtotal;

    document.getElementById('totalSubtotal').innerText = totalSubtotal;
}

// お気に入りのチェックボックスに対する jQuery コード
$(document).ready(function () {
    $(".checkbox").click(function () {
        $(this).toggleClass("is-checked");
    });
});
