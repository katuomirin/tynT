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
    var quantityS = parseInt(document.getElementById('quantityInputS').value) || 0;
    var quantityM = parseInt(document.getElementById('quantityInputM').value) || 0;
    var quantityL = parseInt(document.getElementById('quantityInputL').value) || 0;
    var quantityXL = parseInt(document.getElementById('quantityInputXL').value) || 0;
    var quantityXXL = parseInt(document.getElementById('quantityInputXXL').value) || 0;

    var totalQuantity = quantityS + quantityM + quantityL + quantityXL + quantityXXL;

    document.getElementById('totalQuantity').innerText = totalQuantity;
}

function calculateTotalSubtotal() {
    var subtotalS = parseInt(document.getElementById('subtotalS').textContent) || 0;
    var subtotalM = parseInt(document.getElementById('subtotalM').textContent) || 0;
    var subtotalL = parseInt(document.getElementById('subtotalL').textContent) || 0;
    var subtotalXL = parseInt(document.getElementById('subtotalXL').textContent) || 0;
    var subtotalXXL = parseInt(document.getElementById('subtotalXXL').textContent) || 0;

    var totalSubtotal = subtotalS + subtotalM + subtotalL + subtotalXL + subtotalXXL;
    alert("aa");
    // 加工位置のチェックボックスを取得
    var checkboxes = document.querySelectorAll('form.check input[type="checkbox"]');
    checkboxes.forEach(function (checkbox) {
        if (checkbox.checked) {
            totalSubtotal += 500 * parseInt(checkbox.getAttribute('data-quantity')) || 0;
        }
    });
    var work = document.getElementsByName("options");
    var tmp=0;
    alert("a");
    for(var i=0; i<work.length; i++){
        alert("b");
        if (work[i].checked) {
            tmp += 500 ;
            alert(work[i].value);
        }
    }
    document.getElementById('processingFee').innerText = tmp;

    document.getElementById('totalSubtotal').innerText = totalSubtotal;
}

// お気に入りのチェックボックスに対する jQuery コード
$(document).ready(function() {
    $(".checkbox").click(function() {
        $(this).toggleClass("is-checked");
    });
});
