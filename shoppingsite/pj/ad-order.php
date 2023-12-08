<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>注文一覧</title>
    <link rel="stylesheet" href="./css/ad-customer.css">
</head>
<body>
<?php require 'header.php'; ?>
<?php require 'db-connect.php'; ?>
<div class="search-bar">
<form action="ad-order.php" method="post">
    商品検索
    <input type="text" name="keyword">
    <input type="submit" name="検索">
</form>
</div>
<hr>
<div class="container">
    <?php
        $pdo = new PDO($connect, USER, PASS);
        if(isset($_POST['keyword'])){
            $sql = $pdo->prepare('select * from oder where kana like ?');
            $sql->execute(['%'.$_POST['keyword'].'%']);
        } else {
            $sql = $pdo->query('select * from oder');
        }
        
        $counter = 0;
        if ($counter > 0 && $counter % 5 == 0) {
            echo '</div><div class="container">'; // This line is not needed anymore.
        }
        foreach ($sql as $row) {
            echo '<div class="cus-inf">'; 
            echo '<p>注文番号：<a href="order-detail.php?id=' . htmlspecialchars($row['id']) . '">', htmlspecialchars($row['id']), '</a></p>';
            //echo '<p>名前(カナ)：'.$row['kana'].'</p>';
            echo '</div>';
            $counter++;
        }
        
        
    ?>
</div>

        
</div>

<br><p><a href="admin.php"><img src="./image/undo.png" alt="Detail" width="30" height="30"></a></p>
    

<?php require 'footer.php'; ?>

</body>
</html>