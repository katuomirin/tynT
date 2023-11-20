<?php require 'header.php'; ?>
<?php require 'db-connect.php'; ?>
<link rel="stylesheet" href="./css/shohin-list.css">
<body>
    <?php
    $pdo = new PDO($connect, USER, PASS);
        $sql = $pdo->prepare('select * from product where id=?');
    $sql->execute([$_GET['id']]);

<<<<<<< Updated upstream
    foreach ($sql as $row){
        echo '<p class="shohin-item"><img alt="image" style="width: 300px; margin:0; 
              display:block;" src="image/', $row['image'], '.png"></p>';//商品写真
        echo '<p class="shohin-shosai">';
        echo '<h3>', $row['name'],'</h3>';
        echo '<p>￥', $row['price'], '</p>';
        echo '<p>', $row['ex'], '</p>';
        echo '<p>素材:', $row['sozai'], '<br>';
        echo 'カラー:', $row['color'], '</p>';

        echo '<p>加工位置を選択してください<br>';
        echo '※加工費は一律５００円です。</p>';
        echo '<form method="post" action="">
                <label><input type="checkbox" name="options[]" value="左胸（10×10㎝）"> 左胸（10×10㎝）</label><br>
                <label><input type="checkbox" name="options[]" value="右胸(10×10cm）"> 右胸(10×10cm）</label><br>
                <label><input type="checkbox" name="options[]" value="胸中央(35.5×40cm）"> 胸中央(35.5×40cm）</label><br>
                <label><input type="checkbox" name="options[]" value="背中中央（35.5×40cm）"> 背中中央（35.5×40cm）</label><br>
            </form>';
        echo '<form action="cart-incert.php" method="post">';  
        echo '<p>サイズ:<select name="size">';
        for ($size = 1; $size <= 5; $size++) {
                echo '<option value="', $size, '">', $size, '</option>';
            }
        echo '</select></p>';
        echo '<p>個数:<select name="count">';
        for ($count = 1; $count <= $row['zaiko']; $count++) {
            echo '<option value="', $count, '">', $count, '</option>';
            }
        echo '</select></p>';
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
        <p>SIZE</p>
        <img src="./image/size.png" alt="サイズ表" width="100%">
        <p>PRINP</p>
        <img src="./image/print.png" alt="プリント位置" width="100%">
        <p>
            <p>発送までの目安</p>
            ご注文翌日より2週間程度でのお届けとなります。<br>
            <br>
            <p>送料</p>
            一律５００円とさせていただきます。<br>
            <br>
            <p>お支払方法</p>
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
=======
<div class="sidecontent">
  <!-- ここにコンテンツを追加 -->
  <p><a href="">作成手順</a>について</p>
  <p>SIZE</p>
  <img src="./image/size.png" alt="サイズ表"width="600px" height="180px">
  <p>PRINP</p>
  <img src="./image/print.png" alt="プリント位置"width="600px" height="240px">
  <p>
    【発送までの目安】<br>
    ご注文翌日より2週間程度でのお届けとなります。<br>
    <br>
    【送料】<br>
    一律５００円とさせていただきます。<br>
    <br>
    【お支払い方法】<br>
    クレジットカード<br>
    コンビニ<br>
    銀行振込<br>
    着払い<br>
    <br>
    【見積書】<br>
    お見積書の対応はできません。ご注文を進めていただくと、カート内画面に、ご注文金額の記載がありますので、ご注文画面でご確認ください。<br>
  </p>
>>>>>>> Stashed changes
</div>
