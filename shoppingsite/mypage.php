<?php require 'header.php'; ?>
<?php require 'db-connect.php'; ?>
<link rel="stylesheet" href="./css/mypage.css">
<body>
<?php
    $pdo = new PDO($connect, USER, PASS);
        $sql = $pdo->prepare('select * from user where id=?');
    $sql->execute([$_GET['id']]);
    $product = new PDO($connect, USER, PASS);
        $shohin = $product->prepare('select * from product where id=?');
    $shohin->execute([$_GET['id']]);
    foreach ($sql as $row){
        echo '<h1>Hi,',$row['kanji'],'</h1>';
        foreach($shohin as $roow){
            echo '<p>カート</p>';
            
            echo '<P>お気に入り</p>';
            echo '<P>注文履歴</p>';
        }
    }
?>
</body>
<?php require 'footer.php'; ?>