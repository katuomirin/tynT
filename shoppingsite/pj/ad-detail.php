<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/detail.css">
</head>
<body>
    

<?php require 'header.php'; ?>
<?php require 'db-connect.php'; ?>
<div class="container">
<?php
        $pdo = new PDO($connect, USER, PASS);
        $sql=$pdo->prepare('select * from product where id=?');
        $sql->execute([$_REQUEST['id']]);
        foreach($sql as $row){
        echo '<div class="product-container">';
        
        // Add edit and delete buttons
        echo '<div class="edit-delete-buttons">';
        echo '<a href="pro-edit.php?id=' . $row['id'].'"><img src="./image/edit.png" alt="Edit" width="25" height="25"></a>';
        echo '<a href="pro-delete.php?id='.$row['id'].'" onclick="return confirm(\'この商品を削除しますか？\')"><img src="./image/trash-bin.png" alt="Delete" width="25" height="25"></a>';
        echo '</div>';
        
        echo '<div class="image-and-content">';
        echo '<div class="image">';
        echo '<img src="image/' , $row['image'] , '" alt="Product Image" width="200" height="150">';
        echo '</div>'; // Closing the .image div
        echo '<div class="content">';
        echo '<table>';
        echo '<tr><td>商品番号：</td><td>' . $row['id'] . '</td></tr>';
        echo '<tr><td>商品名：</td><td>' . $row['name'] . '</td></tr>';
        echo '<tr><td>商品名：</td><td>' . $row['ex'] . '</td></tr>';
        echo '<tr><td>価格：</td><td>' . $row['price'] . '</td></tr>';
        echo '<tr><td>サイズ：</td><td>' . $row['size'] . '</td></tr>';
        echo '<tr><td>色：</td><td>' . $row['color'] . '</td></tr>';
        echo '<tr><td>カテゴリー：</td><td>' . $row['category'] . '</td></tr>';
        echo '<tr><td>素材：</td><td>' . $row['sozai'] . '</td></tr>';
        echo '<tr><td>在庫：</td><td>' . $row['zaiko'] . '</td></tr>';
        echo '</table>';
        
        echo '<input type="hidden" name="id" value="'.$row['id'].'">';
        echo '<input type="hidden" name="name" value="'.$row['name'].'">';
        echo '<input type="hidden" name="ex" value="'.$row['ex'].'">';
        echo '<input type="hidden" name="price" value="'.$row['price'].'">';
        echo '<input type="hidden" name="size" value="'.$row['size'].'">';
        echo '<input type="hidden" name="color" value="'.$row['color'].'">';
        echo '<input type="hidden" name="category" value="'.$row['category'].'">';
        echo '<input type="hidden" name="sozai" value="'.$row['sozai'].'">';
        echo '<input type="hidden" name="zaiko" value="'.$row['zaiko'].'">';
        echo '</div>'; // Closing the .content div
        echo '</div>';
        echo '</div>'; // Closing the .product-container div
        echo '<p><a href="ad-product.php"><img src="./image/undo.png" alt="Detail" width="30" height="30"></a></p>';
    }

        ?>
    </div> 
<?php require 'footer.php'; ?>  
</div>   
</body>
</html>   

