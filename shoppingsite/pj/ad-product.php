<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin product</title>
    <link rel="stylesheet" href="./css/ad-product.css">
</head>
<body>

<?php require 'header.php'; ?>
<?php require 'db-connect.php'; ?>
<div class="search-bar">
<form action="ad-product.php" method="post">
    商品検索
    <input type="text" name="keyword">
    <input type="submit" name="検索">
</form>
</div>
<hr>
<div class="products-container">
    <?php
        $pdo = new PDO($connect, USER, PASS);
        if(isset($_POST['keyword'])){
            $sql = $pdo->prepare('select * from product where name like ?');
            $sql->execute(['%'.$_POST['keyword'].'%']);
        } else {
            $sql = $pdo->query('select * from product');
        }
        
        $counter = 0;
        foreach ($sql as $row) {
            if ($counter > 0 && $counter % 5 == 0) {
                echo '</div><div class="products-container">'; // This line is not needed anymore.
            }
            echo '<div class="product-item">';
            echo '<div class="product-image">';
            echo '<a href="ad-detail.php?id=' . $row['id'] . '"><img src="' . $row['image'] . '" alt="image"></a>';
            echo '</div>'; // Close product-image
            echo '<div class="product-info">';
            echo '<p>商品番号：' . $row['id'] . '</p>';
            echo '<p>商品名：' . $row['name'] . '</p>';
            echo '</div>'; // Close product-info
            echo '</div>'; // Close product-item
            $counter++;
            }
            
    ?>
       <div class="product-item">
        <a href="product-add.php" class="add-product-link">
            <img src="image/plus-symbol-button.png" alt="Add Product">
        </a>
    </div>
        
</div>

<br><p><a href="admin.php"><img src="./image/undo.png" alt="Detail" width="30" height="30"></a></p>
    

<?php require 'footer.php'; ?>
</body>
</html>