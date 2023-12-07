
<style>
    div{
        text-align:right;
    }

    .input-button{
        display: flex;
        justify-content: center;
        align-items: center;
        margin: 0 auto;
    }

    .susumu {
    display: flex;
    justify-content: center;
    align-items: center;
    width: 250px;
    margin: 0 auto;
    padding: .9em 2em;
    border: 1px solid #2589d0;
    border-radius: 5px;
    background-color: #fff;
    color: #2589d0;
    font-size: 1em;
}

.susumu:hover {
    border: none;
    background-color: #2589d0;
    color: #fff;
    font-weight: 600;
}
.modo {
    display: flex;
    justify-content: center;
    align-items: center;
    width: 250px;
    margin: 0 auto;
    padding: .9em 2em;
    border: 1px solid #2589d0;
    border-radius: 5px;
    background-color: #fff;
    color: #2589d0;
    font-size: 1em;
}

.modo:hover {
    border: none;
    background-color: #2589d0;
    color: #fff;
    font-weight: 600;
}



</style>

<?php
if (!empty($_SESSION['product'])) {
    echo '<table>';
    echo '<tr><th>商品画像</th><th>商品名</th><th>数量</th><th>加工費</th><th>小計</th></tr>';
    $total = 0;

    foreach ($_SESSION['product'] as $id => $product) {
        echo '<tr>';


        echo '<td>', '<a href="T-details.php?id=', $id, '"><img class="img" style="width: 100px" alt="image" src="image/', $product['image'], '.png"></a>', '</td>';

        echo '<td>', $product['name'], '</td>';
        echo '<td>', $product['quantity'], '</td>';
        echo '<td>', number_format($product['processingFee']), '円</td>';
        echo '<td>', number_format($product['subtotal']), '円</td>';

        $total += $product['subtotal'];
        echo '<td><a href="cart-delete.php?id=', $id, '">削除</a></td>';
        echo '</tr>';
    }

    echo '<tr><td>合計</td><td></td><td></td><td>', number_format($total), '円</td><td></td></tr>';
    echo '</table>';
} else {
    echo 'カートに追加されていません。';
}
?>

<div class="input-button">
    <form action="home.php">
        <button class="modo">ホームへ戻る</button>
    </form>

    <form action="reji.php" method="post">
        <?php
        if (!empty($_SESSION['product'])) {
            echo '<button class="susumu">レジに進む</button>';
            $_SESSION['total'] = $total;
        }
        ?>
    </form>
</div>
