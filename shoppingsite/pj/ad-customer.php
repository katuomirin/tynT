<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>顧客一覧</title>
    <link rel="stylesheet" href="./css/ad-customer.css">
</head>
<body>
<?php require 'header.php'; ?>
<?php require 'db-connect.php'; ?>
<div class="search-bar">
<form action="ad-customer.php" method="post">
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
            $sql = $pdo->prepare('select * from user where kana like ?');
            $sql->execute(['%'.$_POST['keyword'].'%']);
        } else {
            $sql = $pdo->query('select * from user');
        }
        
        $counter = 0;
        if ($counter > 0 && $counter % 5 == 0) {
            echo '</div><div class="container">'; // This line is not needed anymore.
        }
        foreach ($sql as $row) {
            echo '<div class="cus-inf">'; 
            echo '<p>顧客番号：' . $row['id'] . '</p>';
            echo '<p>名前(カナ)：<a href="cus-detail.php?id=' . htmlspecialchars($row['id']) . '">', htmlspecialchars($row['kana']), '</a></p>';
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