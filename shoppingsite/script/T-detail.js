$(document).ready(function () {
    $(".checkbox").click(function () {
        $(this).toggleClass("is-checked");
        calculateProcessingFee(); // チェックボックスがクリックされたら即座に加工費を再計算
        calculateTotalSubtotal(); // 小計の合計も再計算
    });

});

function calculateSubtotal(subtotalId, quantityInputId, price) {
    var quantity = parseInt(document.getElementById(quantityInputId).value) || 0;
    
    var subtotal = quantity * price;

    // 数量が数字であることを確認
    if (!isNaN(quantity) && !isNaN(price)) {
        document.getElementById(subtotalId).textContent = subtotal;
        calculateTotalQuantity(); // 総数量も再計算
        calculateTotalSubtotal(); // 小計の合計も再計算
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
    document.getElementById('quantityOutput').value = totalQuantity;

}

function calculateTotalSubtotal() {
    var sizes = ['S', 'M', 'L', 'XL', 'XXL'];
    var totalSubtotal = 0;

    sizes.forEach(function (size) {
        totalSubtotal += parseInt(document.getElementById('subtotal' + size).textContent) || 0;
    });

    document.getElementById('totalSubtotal').innerText = totalSubtotal + calculateProcessingFee();
    document.getElementById('subtotalInput').value = totalSubtotal + calculateProcessingFee();
}

function calculateProcessingFee() {
    var processingFee = 0;

    // 加工位置のチェックボックスを取得
    var checkboxes = document.querySelectorAll('form.check input[type="checkbox"]');
    checkboxes.forEach(function (checkbox) {
        if (checkbox.checked) {
            processingFee += 500 * (parseInt(checkbox.getAttribute('data-quantity')) || 0);
        }
    });

    // optionsの取得
    var options = document.getElementsByName("options[]");
    options.forEach(function (option) {
        if (option.checked) {
            processingFee += 500;
        }
    });

    document.getElementById('processingFee').innerText = processingFee;
    document.getElementById('processingFeeInput').value = processingFee;


    return processingFee;
}