<?php require 'header.php'; ?>
<?php require 'db-connect.php'; ?>
<link rel="stylesheet" href="./css/shohin-list.css">
<script src="./script/T-detail.js"></script>
<body>
    <?php
    $pdo = new PDO($connect, USER, PASS);
        $sql = $pdo->prepare('select * from product where id=?');
    $sql->execute([$_GET['id']]);
    $S=0; $M=0; $L=0; $XL=0; $XXL=0;

    foreach ($sql as $row){
        echo '<p class="shohin-item"><img alt="image" style="width: 300px; margin:0; 
              display:block;" src="image/', $row['image'], '.png"></p>';//商品写真
        echo '<p class="shohin-shosai">';
        echo '<p class="font1">', $row['name'],'</p>';
        echo '<p class="font2">￥', $row['price'], '</p>';
        echo '<p>', $row['ex'], '<br>';
        echo '素材:', $row['sozai'], '<br>';
        echo 'カラー:', $row['color'], '</p>';

        echo '<p class="font3">加工位置を選択してください</p>';
        echo '<p class="font4">※加工費は一律５００円です。</p>';
        echo '<form method="post" action="cart-incert.php" class="position">
                <label>','<input type="checkbox" name="options[]" value="左胸（10×10㎝）">左胸（10×10㎝）</label><br>
                <label><input type="checkbox" name="options[]" value="右胸(10×10cm）"> 右胸(10×10cm）</label><br>
                <label><input type="checkbox" name="options[]" value="胸中央(35.5×40cm）"> 胸中央(35.5×40cm）</label><br>
                <label><input type="checkbox" name="options[]" value="背中中央（35.5×40cm）"> 背中中央（35.5×40cm）</label><br>
            </form>';
        echo '<form action="cart-incert.php" method="post">';  
        echo   '<table>
                    <tbody>
                        <tr>
                            <th>サイズ</th>
                            <th>数量</th>
                            <th>小計</th>
                        </tr>
                        <tr>
                            <th>Ｓ</th>
                            <td><input type="number" name="quantityS" id="quantityInputS" value="0" min="0" max="100" step="1" oninput="calculateSubtotal(\'subtotalS\', \'quantityInputS\', \'priceS\')"></td>
                            <td id="subtotalS">0</td>
                        </tr>
                        <tr>
                            <th>Ｍ</th>
                            <td><input type="number" name="quantityM" id="quantityInputM" value="0" min="0" max="100" step="1" oninput="calculateSubtotal(\'subtotalM\', \'quantityInputM\', \'priceM\')"></td>
                            <td id="subtotalM">0</td>
                        </tr>
                        <tr>
                            <th>Ｌ</th>
                            <td><input type="number" name="quantityL" id="quantityInputL" value="0" min="0" max="100" step="1" oninput="calculateSubtotal(\'subtotalL\', \'quantityInputL\', \'priceL\')"></td>
                            <td id="subtotalL">0</td>
                        </tr>
                        <tr>
                            <th>ＸＬ</th>
                            <td><input type="number" name="quantityXL" id="quantityInputXL" value="0" min="0" max="100" step="1" oninput="calculateSubtotal(\'subtotalXL\', \'quantityInputXL\', \'priceXL\')"></td>
                            <td id="subtotalXL">0</td>
                        </tr>
                        <tr>
                            <th>ＸＸＬ</th>
                            <td><input type="number" name="quantityXXL" id="quantityInputXXL" value="0" min="0" max="100" step="1" oninput="calculateSubtotal(\'subtotalXXL\', \'quantityInputXXL\', \'priceXXL\')"></td>
                            <td id="subtotalXXL">0</td>
                        </tr>
                    </tbody>
                </table>';
        //カートに追加
        echo '<input type="hidden" name="id" value="', $row['id'], '">';        
        echo '<input type="hidden" name="name" value="', $row['name'], '">';    
        echo '<input type="hidden" name="price" value="', $row['price'], '">';
        echo '<p><input type="submit" value="カートに追加"></p>';               //ボタン
        echo '</form>';
        echo '</p>';
    }
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
