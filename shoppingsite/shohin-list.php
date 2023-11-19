<?php require 'header.php'; ?>
<?php require 'db-connect.php'; ?>
<link rel="stylesheet" href="./css/shohin-list.css">
<body class="shohin">
<div class="shohin-item">
    <?php
    $pdo=new PDO($connect,USER,PASS);
    $sql=$pdo->prepare('select * from product where id=?');
    $sql->execute([$_GET['id']]);
    foreach($sql as $row){
        echo '<p><img alt="image" src="image/',$row['id'],'.jpg"></p>';
        echo '<form action="「カート画面」" method="post">';
        echo '<h3>',$row['name'],'</h3>';
        echo '<p>￥',$row['price'],'</p>';
        echo '<p>',$row['ex'],'</p>';
        echo '<p>個数:<select name="count">';
        for($i=1;$i<=10;$i++){
            echo '<option value="',$i,'">',$i,'</option>';
        }
        echo '</select></p>';
        echo '<input type="hidden" name="id" value="',$row['id'],'">';
        echo '<input type="hidden" name="name" value="',$row['name'],'">';
        echo '<input type="hidden" name="price" value="',$row['price'],'">';
        echo '<p><input type="submit" value="カートに追加"></p>';
        echo '</form>';
        echo '<P><a href="favorite-incert.php?id=',$row['id'],
                '">お気に入り追加</a></p>';
    }
    ?>
</div>
<div class="shohin-gaiyo">
    <p><a href="">作成手順</a>について</p>
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
    </div>