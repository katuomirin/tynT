<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>注文情報</title>
    <link rel="stylesheet" href="css/detail.css">
</head>
<body>
<?php require 'header.php'; ?>
<?php require 'db-connect.php'; ?>
<div class="container">
<?php
        $pdo = new PDO($connect, USER, PASS);
        $sql=$pdo->prepare('select * from oder where id=?');
        $sql->execute([$_GET['id']]);
        foreach($sql as $row){
        echo '<div class="container">';
        
        echo '</div>'; // Closing the .image div
        echo '<div class="content">';
        echo '<table>';
        echo '<tr><td>注文番号：</td><td><a href="order-detail2.php?id=' . htmlspecialchars($row['id']) . '">', htmlspecialchars($row['id']), '</a></td><tr>';
        echo '<tr><td>顧客番号：</td><td><a href="cus-detail.php?id=' . htmlspecialchars($row['user_id']) . '">', htmlspecialchars($row['user_id']), '</a></td><tr>';
        //echo '<tr><td>名前（フリガナ）：</td><td>' . $row['kana'] . '</td></tr>';
        echo '<tr><td>注文日：</td><td>' . $row['day'] . '</td></tr>';
        echo '<tr><td>オリジナルTシャツの送り方：</td><td>' . $row['send-T-shirt'] . '</td></tr>';
        echo '<tr><td>支払方法：</td><td>' . $row['pay_way'] . '</td></tr>';
        echo '</table>';

        echo '<input type="hidden" name="id" value="'.$row['id'].'">';
        echo '<input type="hidden" name="user_id" value="'.$row['user_id'].'">';
        //echo '<input type="hidden" name="kana" value="'.$row['kana'].'">';
        echo '<input type="hidden" name="day" value="'.$row['day'].'">';
        echo '<input type="hidden" name="send-T-shirt" value="'.$row['send-T-shirt'].'">';
        echo '<input type="hidden" name="pay_way" value="'.$row['pay_way'].'">';
        echo '</div>'; // Closing the .content div
        echo '</div>';
        echo '</div>'; // Closing the .product-container div
        echo '<p><a href="ad-order.php"><img src="./image/undo.png" alt="Detail" width="30" height="30"></a></p>';
    }

        ?>
    </div> 
<?php require 'footer.php'; ?>  
</div>   
</body>
</html>