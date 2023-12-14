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
        $sql=$pdo->prepare('select * from order_detail where order_id=?');
        $sql->execute([$_GET['id']]);
        foreach($sql as $row){
        echo '<div class="container">';
        
        echo '</div>'; // Closing the .image div
        echo '<div class="content">';
        echo '<table>';
        echo '<tr><td>注文番号：</td><td>'.$row['order_id'].'</td><tr>';
        echo '<tr><td>商品番号：</td><td><a href="ad-detail.php?id=' . htmlspecialchars($row['product_id']) . '">', htmlspecialchars($row['product_id']), '</a></td><tr>';
        echo '<tr><td>商品色：</td><td>' . $row['color'] . '</td></tr>';
        echo '<tr><td>注文数：</td><td>' . $row['count'] . '</td></tr>';
        echo '</table>';

        echo '<input type="hidden" name="order_id" value="'.$row['order_id'].'">';
        echo '<input type="hidden" name="product_id" value="'.$row['product_id'].'">';
        echo '<input type="hidden" name="color" value="'.$row['color'].'">';
        echo '<input type="hidden" name="count" value="'.$row['count'].'">';
        echo '</div>'; // Closing the .content div
        echo '</div>';
        echo '</div>'; // Closing the .product-container div
        echo '<p><a href="order-detail.php?id='.$row['order_id'].'"><img src="./image/undo.png" alt="Detail" width="30" height="30"></a></p>';
    }
        ?>
    </div> 
<?php require 'footer.php'; ?>  
</div>   
</body>
</html>