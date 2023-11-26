<?php require 'header.php'; ?>
<?php require 'db-connect.php'; ?>

<link rel="stylesheet" href="./css/shohin-list.css">
<script src="./script/T-detail.js"></script>

<body>
    <ol class="breadcrumb-001">
        <li><a href="./home.php">ホーム</a></li>
        <li><a href="#" onclick="history.back()">カテゴリー</a></li>
    </ol>

    <?php
    $pdo = new PDO($connect, USER, PASS);
    $sql = $pdo->prepare('select * from product where id=?');
    $sql->execute([$_GET['id']]);

    echo '<div class="total">';
    echo '<script>';
    echo 'var rowPrice = ', $row['price'], ';'; // $row['price']をJavaScriptの変数に設定
    echo '</script>';

    foreach ($sql as $row) {
        echo '<p class="shohin-item"><img alt="image" style="width: 300px; margin:0; display:block;" src="image/', $row['image'], '.png"></p>'; // 商品写真
        echo '<p class="shohin-shosai">';
        echo '<p class="font1">', $row['name'], '</p>';
        echo '<p class="font2">￥', $row['price'], '</p>';
        echo '<p>', $row['ex'], '<br>';
        echo '素材:', $row['sozai'], '<br>';
        echo 'カラー:', $row['color'], '</p>';

        echo '<p class="font3">加工位置を選択してください</p>';
        echo '<p class="font4">※加工費は一律５００円です。</p>';
        echo '<form method="post" action="cart-incert.php" class="check">';
        echo '<label>
                <input type="checkbox" name="options[]" value="left-chest" data-quantity="0">左胸（10×10㎝）
            </label><br>';
        echo '<label>
                <input type="checkbox" name="options[]" value="right-chest" data-quantity="0">右胸(10×10cm）
            </label><br>';
        echo '<label>
                <input type="checkbox" name="options[]" value="center-chest" data-quantity="0">胸中央(35.5×40cm）
            </label><br>';
        echo '<label>
                <input type="checkbox" name="options[]" value="center-back" data-quantity="0">背中中央（35.5×40cm）
            </label><br>';
        echo '</form>';

        echo '<form action="cart-incert.php" method="post">';
        echo '<input type="hidden" name="totalSubtotal" id="hiddenTotalSubtotal" value="0">'; // 小計の合計を保存する隠しフィールド

        echo '<table>
                <tbody>
                    <tr>
                        <th>サイズ</th>
                        <th>数量</th>
                        <th>小計</th>
                    </tr>';

        $sizes = array('S', 'M', 'L', 'XL', 'XXL');
        foreach ($sizes as $size) {
            echo '<tr>';
            echo '<th>', $size, '</th>';
            echo '<td><input type="number" name="quantity', $size, '" id="quantityInput', $size, '" value="0" min="0" max="100" step="1" oninput="calculateSubtotal(\'subtotal', $size, '\', \'quantityInput', $size, '\', ', $row['price'], '); calculateTotalQuantity();"></td>';
            echo '<td id="subtotal', $size, '">0</td>';
            echo '</tr>';
        }

        echo '<tr>
                <th>合計</th>
                <td id="totalQuantity"></td>
                <td id="totalSubtotal"></td>
            </tr>
        </tbody>
    </table>';

        // カートに追加
        echo '<input type="hidden" name="id" value="', $row['id'], '">';
        echo '<input type="hidden" name="name" value="', $row['name'], '">';
        echo '<input type="hidden" name="price" value="', $row['price'], '">';
        echo '<input type="hidden" name="subtotal" id="subtotalInput" value="0">'; // 各商品の小計を保存する隠しフィールド
        echo '<p><input type="submit" value="カートに追加" onclick="setHiddenFields();"></p>'; // カートに追加ボタン

        // お気に入りに追加
        echo '<p><input type="submit" value="お気に入りに追加" formaction="favorite-incert.php"></p>'; // お気に入りに追加ボタン

        echo '</form>';
        echo '</p>';
    }

    // $rowの値をJavaScriptに渡す
    echo '<script>';
    echo 'var rowPrice = ', $row['price'], ';';
    echo 'function setHiddenFields() {
                var totalSubtotal = 0;
                var sizes = ["S", "M", "L", "XL", "XXL"];
                for (var i = 0; i < sizes.length; i++) {
                    totalSubtotal += parseFloat(document.getElementById("subtotal" + sizes[i]).textContent);
                }
                document.getElementById("hiddenTotalSubtotal").value = totalSubtotal.toFixed(2);
                document.getElementById("subtotalInput").value = totalSubtotal.toFixed(2);
            }';
    echo '</script>';

    echo '</div>';
    ?>

    <div class="shohin-gaiyo">
        <p><a href="create.php">作成手順</a>について</p>
        <p class="saize">SIZE</p>
        <img src="./image/size.png" alt="サイズ表" width="100%">
        <p class="print">PRINT</p>
        <img src="./image/print.png" alt="プリント位置" width="100%">
        <p class="shosai">
            <p class="hasso">発送までの目安</p>
            ご注文翌日より2週間程度でのお届けとなります。<br>
            <br>
            <p class="soryo">送料</p>
            一律５００円とさせていただきます。<br>
            <br>
            <p class="siharai">お支払方法</p>
            クレジットカード<br>
            コンビニ<br>
            銀行振込<br>
            着払い<br>
            <br>
            <p>見積書</p>
            お見積書の対応はできません。ご注文を進めていただくと、カート内画面に、ご注文金額の記載がありますので、ご注文画面でご確認ください。<br>
        </p>
    </div>
</body>

<div class="footer">
    <?php require 'footer.php'; ?>
</div>
