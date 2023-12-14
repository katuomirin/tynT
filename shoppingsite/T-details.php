<?php session_start(); ?>
<?php require 'header.php'; ?>
<?php require 'db-connect.php'; ?>

<link rel="stylesheet" href="./css/shohin-list.css">
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="./script/T-detail.js"></script>
<script>
window.addEventListener('DOMContentLoaded',function(){
        let imageBtn = document.getElementsByClassName('js-image');
        let imageMain = document.getElementById('js-image-target');
        for(let i = 0; i < imageBtn.length; i++){
            imageBtn[i].addEventListener('click',function(){
            let imageStack = this.firstElementChild.getAttribute('src');
            imageMain.setAttribute('src',imageStack)
        },false);
        }
});
</script>
<style>
    .gallery {
        width: 50%; /* 画面の半分の幅に制限 */
        float: left; /* 左寄せ */
    }
    .T-shirt-option {
        float: right; /* 右寄せ */
    }
    .T-shirt-create {
        width: 100%; /* 画面の半分の幅に制限 */
        float: right; /* 右寄せ */
        clear: both; /* クリアフィックスを追加 */
        margin-top: 10px; /* お気に入り追加ボタンの下に少しスペースを追加 */
    }
    
</style>
<body>
    <ol class="breadcrumb-001">
        <li><a href="./home.php">ホーム</a></li>
        <li><a href="#" onclick="history.back()">カテゴリー</a></li>
    </ol>

    <?php
    $pdo = new PDO($connect, USER, PASS);
    $sql = $pdo->prepare('select * from product where id=?');
    $product_id=$_GET['id'];
    $sql->execute([$_GET['id']]);
    echo '<div class="total">';
    echo '<script src="./script/T-detail.js"></script>'; // JavaScriptファイルを正しくロード

    foreach ($sql as $row) {
        if($product_id==101){
            //ライトTシャツ
            echo '<div class="gallery">';
            echo '    <div class="gallery-img">';
            echo '        <img src="./image/ninnin.png" style="width: 200px; alt="" id="js-image-target">';
            echo '    </div>';
            echo '    <ul class="gallery-list">';
            echo '        <li class="gallery-list-item">';
            echo '            <button class="js-image"><img src="./image/ninnin.png" style="width: 80px; alt=""></button>';
            echo '        </li>';
            echo '        <li class="gallery-list-item">';
            echo '            <button class="js-image"><img src="./image/lite-white.png" style="width: 80px; alt=""></button>';
            echo '        </li>';
            echo '        <li class="gallery-list-item">';
            echo '            <button class="js-image"><img src="./image/lite-black.png" style="width: 80px; alt=""></button>';
            echo '        </li>';
            echo '        <li class="gallery-list-item">';
            echo '            <button class="js-image"><img src="./image/lite-purple.png" style="width: 80px; alt=""></button>';
            echo '        </li>';
            echo '    </ul>';
            echo '    <ul class="gallery-list">';
            echo '        <li class="gallery-list-item">';
            echo '            <button class="js-image"><img src="./image/lite-blue.png" style="width: 80px; alt=""></button>';
            echo '        </li>';
            echo '        <li class="gallery-list-item">';
            echo '            <button class="js-image"><img src="./image/lite-sky.png" style="width: 80px; alt=""></button>';
            echo '        </li>';
            echo '        <li class="gallery-list-item">';
            echo '            <button class="js-image"><img src="./image/lite-green.png" style="width: 80px; alt=""></button>';
            echo '        </li>';
            echo '        <li class="gallery-list-item">';
            echo '            <button class="js-image"><img src="./image/lite-yellow.png" style="width: 80px; alt=""></button>';
            echo '        </li>';
            echo '    </ul>';
            echo '    <ul class="gallery-list">';
            echo '        <li class="gallery-list-item">';
            echo '            <button class="js-image"><img src="./image/lite-orenge.png" style="width: 80px; alt=""></button>';
            echo '        </li>';
            echo '        <li class="gallery-list-item">';
            echo '            <button class="js-image"><img src="./image/lite-red.png" style="width: 80px; alt=""></button>';
            echo '        </li>';
            echo '    </ul>';
            echo '</div>';
        }else if($product_id==102){
        //102　ベーシックTシャツ
        echo '<div class="gallery">';
        echo '    <div class="gallery-img">';
        echo '        <img src="./image/basic.png" style="width: 300px; alt="" id="js-image-target">';
        echo '    </div>';
        echo '    <ul class="gallery-list">';
        echo '        <li class="gallery-list-item">';
        echo '            <button class="js-image"><img src="./image/basic.png" style="width: 100px; alt=""></button>';
        echo '        </li>';
        echo '        <li class="gallery-list-item">';
        echo '            <button class="js-image"><img src="./image/red-T-shirt.png" style="width: 100px; alt=""></button>';
        echo '        </li>';
        echo '        <li class="gallery-list-item">';
        echo '            <button class="js-image"><img src="./image/green-T-shirt.png" style="width: 100px; alt=""></button>';
        echo '        </li>';
        echo '        <li class="gallery-list-item">';
        echo '            <button class="js-image"><img src="./image/orange-T-shirt.png" style="width: 100px; alt=""></button>';
        echo '        </li>';
        echo '    </ul>';
        echo '</div>';
        }else if($product_id==201){
            //ドライポロシャツ
            echo '<div class="gallery">';
            echo '    <div class="gallery-img">';
            echo '        <img src="./image/polo-blue.png" style="width: 300px; alt="" id="js-image-target">';
            echo '    </div>';
            echo '    <ul class="gallery-list">';
            echo '        <li class="gallery-list-item">';
            echo '            <button class="js-image"><img src="./image/polo-white.png" style="width: 100px; alt=""></button>';
            echo '        </li>';
            echo '    </ul>';
            echo '    <ul class="gallery-list">';
            echo '        <li class="gallery-list-item">';
            echo '            <button class="js-image"><img src="./image/polo-black.png" style="width: 100px; alt=""></button>';
            echo '        </li>';
            echo '        <li class="gallery-list-item">';
            echo '            <button class="js-image"><img src="./image/polo-blue.png" style="width: 100px; alt=""></button>';
            echo '        </li>';
            echo '        <li class="gallery-list-item">';
            echo '            <button class="js-image"><img src="./image/polo-sky.png" style="width: 100px; alt=""></button>';
            echo '        </li>';
            echo '        <li class="gallery-list-item">';
            echo '            <button class="js-image"><img src="./image/polo-green.png" style="width: 100px; alt=""></button>';
            echo '        </li>';
            echo '    </ul>';
            echo '    <ul class="gallery-list">';
            echo '        <li class="gallery-list-item">';
            echo '            <button class="js-image"><img src="./image/polo-yellow.png" style="width: 100px; alt=""></button>';
            echo '        </li>';
            echo '        <li class="gallery-list-item">';
            echo '            <button class="js-image"><img src="./image/polo-orange.png" style="width: 100px; alt=""></button>';
            echo '        </li>';
            echo '        <li class="gallery-list-item">';
            echo '            <button class="js-image"><img src="./image/polo-red.png" style="width: 100px; alt=""></button>';
            echo '        </li>';
            echo '        <li class="gallery-list-item">';
            echo '            <button class="js-image"><img src="./image/polo-pink.png" style="width: 100px; alt=""></button>';
            echo '        </li>';
            echo '    </ul>';
            echo '</div>';
        }
        else if($product_id==202){
            //ノーマルポロシャツ
            echo '<div class="gallery">';
            echo '    <div class="gallery-img">';
            echo '        <img src="./image/polo-blue.png" style="width: 300px; alt="" id="js-image-target">';
            echo '    </div>';
            echo '    <ul class="gallery-list">';
            echo '        <li class="gallery-list-item">';
            echo '            <button class="js-image"><img src="./image/polo-white.png" style="width: 100px; alt=""></button>';
            echo '        </li>';
            echo '    </ul>';
            echo '    <ul class="gallery-list">';
            echo '        <li class="gallery-list-item">';
            echo '            <button class="js-image"><img src="./image/polo-black.png" style="width: 100px; alt=""></button>';
            echo '        </li>';
            echo '        <li class="gallery-list-item">';
            echo '            <button class="js-image"><img src="./image/polo-blue.png" style="width: 100px; alt=""></button>';
            echo '        </li>';
            echo '        <li class="gallery-list-item">';
            echo '            <button class="js-image"><img src="./image/polo-sky.png" style="width: 100px; alt=""></button>';
            echo '        </li>';
            echo '        <li class="gallery-list-item">';
            echo '            <button class="js-image"><img src="./image/polo-green.png" style="width: 100px; alt=""></button>';
            echo '        </li>';
            echo '    </ul>';
            echo '    <ul class="gallery-list">';
            echo '        <li class="gallery-list-item">';
            echo '            <button class="js-image"><img src="./image/polo-yellow.png" style="width: 100px; alt=""></button>';
            echo '        </li>';
            echo '        <li class="gallery-list-item">';
            echo '            <button class="js-image"><img src="./image/polo-orange.png" style="width: 100px; alt=""></button>';
            echo '        </li>';
            echo '        <li class="gallery-list-item">';
            echo '            <button class="js-image"><img src="./image/polo-red.png" style="width: 100px; alt=""></button>';
            echo '        </li>';
            echo '        <li class="gallery-list-item">';
            echo '            <button class="js-image"><img src="./image/polo-pink.png" style="width: 100px; alt=""></button>';
            echo '        </li>';
            echo '    </ul>';
            echo '</div>';
        }
        else if($product_id==301){
            //スウェット
            echo '<div class="gallery">';
            echo '    <div class="gallery-img">';
            echo '        <img src="./image/swe.png" style="width: 300px; alt="" id="js-image-target">';
            echo '    </div>';
            echo '    <ul class="gallery-list">';
            echo '        <li class="gallery-list-item">';
            echo '            <button class="js-image"><img src="./image/swe.png" style="width: 100px; alt=""></button>';
            echo '        </li>';
            echo '        <li class="gallery-list-item">';
            echo '            <button class="js-image"><img src="./image/sweat-black.png" style="width: 100px; alt=""></button>';
            echo '        </li>';
            echo '        <li class="gallery-list-item">';
            echo '            <button class="js-image"><img src="./image/sweat-navy.png" style="width: 100px; alt=""></button>';
            echo '        </li>';
            echo '        <li class="gallery-list-item">';
            echo '            <button class="js-image"><img src="./image/sweat-blue.png" style="width: 100px; alt=""></button>';
            echo '        </li>';
            echo '    </ul>';
            echo '    <ul class="gallery-list">';
            echo '        <li class="gallery-list-item">';
            echo '            <button class="js-image"><img src="./image/sweat-green.png" style="width: 100px; alt=""></button>';
            echo '        </li>';
            echo '        <li class="gallery-list-item">';
            echo '            <button class="js-image"><img src="./image/sweat-yellow.png" style="width: 100px; alt=""></button>';
            echo '        </li>';
            echo '        <li class="gallery-list-item">';
            echo '            <button class="js-image"><img src="./image/sweat-red.png" style="width: 100px; alt=""></button>';
            echo '        </li>';
            echo '        <li class="gallery-list-item">';
            echo '            <button class="js-image"><img src="./image/sweat-brown.png" style="width: 100px; alt=""></button>';
            echo '        </li>';
            echo '    </ul>';
            echo '</div>';
        }
        else if($product_id==401){
            //401　パーカー
            echo '<div class="gallery">';
            echo '    <div class="gallery-img">';
            echo '        <img src="./image/parker-white.png" style="width: 300px; alt="" id="js-image-target">';
            echo '    </div>';
            echo '    <ul class="gallery-list">';
            echo '        <li class="gallery-list-item">';
            echo '            <button class="js-image"><img src="./image/parker-white" style="width: 100px; alt=""></button>';
            echo '        </li>';
            echo '        <li class="gallery-list-item">';
            echo '            <button class="js-image"><img src="./image/parker-black.png" style="width: 100px; alt=""></button>';
            echo '        </li>';
            echo '        <li class="gallery-list-item">';
            echo '            <button class="js-image"><img src="./image/parker-brown.png" style="width: 100px; alt=""></button>';
            echo '        </li>';
            echo '    </ul>';
            echo '    <ul class="gallery-list">';
            echo '        <li class="gallery-list-item">';
            echo '            <button class="js-image"><img src="./image/parker-red" style="width: 100px; alt=""></button>';
            echo '        </li>';
            echo '        <li class="gallery-list-item">';
            echo '            <button class="js-image"><img src="./image/parker-orange.png" style="width: 100px; alt=""></button>';
            echo '        </li>';
            echo '    </ul>';
            echo '</div>';
        }else if($product_id==402){
            //402　ジップパーカー
            echo '<div class="gallery">';
            echo '    <div class="gallery-img">';
            echo '        <img src="./image/zipparker-white.png" style="width: 300px; alt="" id="js-image-target">';
            echo '    </div>';
            echo '    <ul class="gallery-list">';
            echo '        <li class="gallery-list-item">';
            echo '            <button class="js-image"><img src="./image/zipparker-white" style="width: 100px; alt=""></button>';
            echo '        </li>';
            echo '        <li class="gallery-list-item">';
            echo '            <button class="js-image"><img src="./image/zipparker-orange.png" style="width: 100px; alt=""></button>';
            echo '        </li>';
            echo '        <li class="gallery-list-item">';
            echo '            <button class="js-image"><img src="./image/zipparker-yellow.png" style="width: 100px; alt=""></button>';
            echo '        </li>';
            echo '        <li class="gallery-list-item">';
            echo '            <button class="js-image"><img src="./image/zipparker-white.png" style="width: 100px; alt=""></button>';
            echo '        </li>';
            echo '    </ul>';
            echo '</div>';
        }else if($product_id==9){
            //ロングTシャツ
            echo '<div class="gallery">';
            echo '    <div class="gallery-img">';
            echo '        <img src="./image/long-T.png" style="width: 300px; alt="" id="js-image-target">';
            echo '    </div>';
            echo '    <ul class="gallery-list">';
            echo '        <li class="gallery-list-item">';
            echo '            <button class="js-image"><img src="./image/swe.png" style="width: 100px; alt=""></button>';
            echo '        </li>';
            echo '        <li class="gallery-list-item">';
            echo '            <button class="js-image"><img src="./image/sweat-black.png" style="width: 100px; alt=""></button>';
            echo '        </li>';
            echo '        <li class="gallery-list-item">';
            echo '            <button class="js-image"><img src="./image/sweat-navy.png" style="width: 100px; alt=""></button>';
            echo '        </li>';
            echo '        <li class="gallery-list-item">';
            echo '            <button class="js-image"><img src="./image/sweat-blue.png" style="width: 100px; alt=""></button>';
            echo '        </li>';
            echo '    </ul>';
            echo '    <ul class="gallery-list">';
            echo '        <li class="gallery-list-item">';
            echo '            <button class="js-image"><img src="./image/sweat-green.png" style="width: 100px; alt=""></button>';
            echo '        </li>';
            echo '        <li class="gallery-list-item">';
            echo '            <button class="js-image"><img src="./image/sweat-yellow.png" style="width: 100px; alt=""></button>';
            echo '        </li>';
            echo '        <li class="gallery-list-item">';
            echo '            <button class="js-image"><img src="./image/sweat-red.png" style="width: 100px; alt=""></button>';
            echo '        </li>';
            echo '        <li class="gallery-list-item">';
            echo '            <button class="js-image"><img src="./image/sweat-brown.png" style="width: 100px; alt=""></button>';
            echo '        </li>';
            echo '    </ul>';
            echo '</div>';
        }
        
        echo '<div class="shohin-shosai">';
        echo '<p class="font1">', $row['name'], '</p>';
        echo '<div class="heart">';
        if(isset($_SESSION['user'])){
            $user_id = $_SESSION['user']['id'];
            echo '<div class="choice-list" data-postid="', $product_id, '">';
            echo '<div class="checkbox heart ';
            if( check_favolite_duplicate($user_id,$row['id']) ){
                echo 'is-checked';
            }
            echo '"></div></div>';
        }
        echo '<p class="font2"><nobr>￥', number_format($row['price']), '</nobr></p></div>';
        echo '<p class="ex">', $row['ex'], '<br>';
        echo '素材:', $row['sozai'], '<br>';
        echo 'カラー:', $row['color'], '</p>';
        echo '<p class="font44">※カラーはデザイン提出時に記入してください。</p>';
        echo '<div class="T-shirt-option">';
        echo '<p class="font3">加工位置を選択してください</p>';
        echo '<p class="font4">※加工費は一律５００円です。また、１枚ずつ掛かりますのでご了承ください</p>';
        echo '<form method="post" action="cart-incert.php" class="check">';
        echo '<label>
                <input type="checkbox" name="options[]" value="left-chest" data-quantity="0" onclick="calculateProcessingFee()">左胸（10×10㎝）
            </label><br>';
        echo '<label>
                <input type="checkbox" name="options[]" value="right-chest" data-quantity="0" onclick="calculateProcessingFee()">右胸(10×10cm）
            </label><br>';
        echo '<label>
                <input type="checkbox" name="options[]" value="center-chest" data-quantity="0" onclick="calculateProcessingFee()">胸中央(35.5×40cm）
            </label><br>';
        echo '<label>
                <input type="checkbox" name="options[]" value="center-back" data-quantity="0" onclick="calculateProcessingFee()">背中中央（35.5×40cm）
            </label><br>';
        echo '</form>';
        echo '<p>加工費: <span id="processingFee">0</span>円</p>';
        echo '<p id="totalNote" style="color: red; font-weight: bold; display: none;">※合計には加工費も含まれています</p>';
        echo '<form action="cart-incert.php" method="post">';
        echo '<input type="hidden" name="totalSubtotal" id="hiddenTotalSubtotal" value="0">'; // 小計の合計を保存するフィールド
        echo '</form>';

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
        echo '<form action="cart-incert.php" method="post">';
        echo '<input type="hidden" name="id" value="', $row['id'], '">';
        echo '<input type="hidden" name="name" value="', $row['name'], '">';
        echo '<input type="hidden" name="price" value="', $row['price'], '">';
        echo '<input type="hidden" name="image" value="', $row['image'], '">';
        echo '<input type="hidden" name="processingFee" id="processingFeeInput" value="0">'; // 各商品の加工費を保存するフィールド
        echo '<input type="hidden" name="subtotal" id="subtotalInput" value="0">'; // 各商品の小計を保存するフィールド
        echo '<input type="hidden" name="quantity" id="quantityOutput" value="0">'; // 各商品の数量を保存するフィールド
        echo '<p class="cart-botton"><input type="submit" value="カートに追加" onclick="addToCart();"></p>'; // カートに追加ボタン
        echo '</form>';
    }

    // お気に入りのチェックボックスに対する jQuery コード
    echo   '<script>
                    $(function() {
                        var $favorite = $(\'.checkbox\'), //お気に入りボタンセレクタ
                        productId;
                        $favorite.on(\'click\',function(e){
                            //カスタム属性（postid）に格納された投稿ID取得
                            productId = $(this).parents(\'.choice-list\').data(\'postid\'); 
                            console.log("ID=" + productId);
                            if (!$(this).hasClass("is-checked")) {
                                console.log("クリック前の処理");
                            }
                            $(this).toggleClass("is-checked");
                            if ($(this).hasClass("is-checked")) {
                                console.log("クリック後の処理");
                            }
                            $.ajax({
                                type: "POST",
                                url: "favorite-insert.php",
                                data: {id: productId},
                                success: function(response) {
                                    // レスポンスを処理する（必要に応じて）
                                    console.log(response);
                                },
                                error: function(error) {
                                    console.error(error);
                                }
                            });
                        });
                    });
                </script>';
    echo '</div>';
    ?>
    <div class="T-shirt-create">
    <div class="shohin-gaiyo">
        <p><a href="create.php">作成手順</a>について</p>
        <p class="saize">SIZE</p>
        <img src="./image/size.png" alt="サイズ表" width="100%">
        <p class="print">PRINT</p>
        <?php
        if($product_id==201||$product_id==202){
            echo '<img src="./image/polo.png" alt="プリント位置" width="100%">';
        }else if($product_id==9||$product_id==301){
            echo '<img src="./image/swet.png" alt="プリント位置" width="100%">';
        }else if($product_id==401||$product_id==402){
            echo '<img src="./image/parkey.png" alt="プリント位置" width="100%">';
        }
        else{
        echo '<img src="./image/t.png" alt="プリント位置" width="100%">';
        }
        ?>
        <div class="shosai">
            <div class="hasso">発送までの目安</div><br>
            ご注文翌日より2週間程度でのお届けとなります。<br>
            <br>
            <div class="soryo">送料</div><br>
            一律５００円とさせていただきます。<br>
            <br>
            <div class="siharai">お支払方法</div><br>
            クレジットカード<br>
            コンビニ<br>
            銀行振込<br>
            着払い<br>
            <br>
            <div class="mitumori">見積書</div><br>
            お見積書の対応はできません。ご注文を進めていただくと、カート内画面に、ご注文金額の記載がありますので、ご注文画面でご確認ください。<br>
        </div>
    </div>
    </div>
</body>


<?php
//ユーザーIDと商品IDを元にお気に入り値の重複チェックを行っています
function check_favolite_duplicate($user_id,$product_id){
    global $pdo;
    $sql = "SELECT *
            FROM favorite
            WHERE user_id = :user_id AND product_id = :product_id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(array(':user_id' => $user_id ,
                         ':product_id' => $product_id));
    $favorite = $stmt->fetch();
    return $favorite;
}
?>

<div class="footer">
    <?php require 'footer.php'; ?>
</div>