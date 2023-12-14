<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>商品追加</title>
    <link rel="stylesheet" href="css/add-pro.css">
</head>
<body>
    
<?php require 'header.php'; ?>
<div class="container">
<?php
$id = $name = $ex = $price = $size = $color = $category = $sozai = $zaiko = $image = '';

echo '<form action="product-add-output.php" method="post" enctype="multipart/form-data">';
echo '<table>';
echo '<tr><td>商品番号</td>';
echo '<td><input type="text" name="id" value="', $id , '">';
echo '</td></tr>';
echo '<tr><td>商品名</td>';
echo '<td><input type="text" name="name" value="', $name , '">';
echo '</td></tr>';
echo '<tr><td>商品説明</td>';
echo '<td><input type="text" name="ex" value="', $ex , '">';
echo '</td></tr>';
echo '<tr><td>価格</td>';
echo '<td><input type="text" name="price" value="', $price , '">';
echo '</td></tr>';
echo '<tr><td>サイズ</td>';
echo '<td><input type="text" name="size" value="', $size , '">';
echo '</td></tr>';
echo '<tr><td>色</td>';
echo '<td><input type="text" name="color" value="', $color , '">';
echo '</td></tr>';
echo '<tr><td>カテゴリー</td>';
echo '<td><input type="text" name="category" value="', $category , '">';
echo '</td></tr>';
echo '<tr><td>素材</td>';
echo '<td><input type="text" name="sozai" value="', $sozai , '">';
echo '</td></tr>';
echo '<tr><td>在庫</td>';
echo '<td><input type="text" name="zaiko" value="', $zaiko , '">';
echo '</td></tr>';
echo '<tr><td>商品画像</td>';
echo '<td><input type="text" name="image" value="', $image , '">';
echo '</td></tr>';
echo '</table>';
echo '<input type="submit" value="確定">';
echo '</form>';

?>
</div> 
<?php require "footer.php"; ?>

</body>
</html>