<?php session_start();?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>商品追加</title>
    <link rel="stylesheet" href="css/add-pro.css">
</head>
<body>
    
<?php require 'header.php';?>

<?php require 'db-connect.php';?>
<div class="container">
<?php

$pdo=new PDO($connect,USER,PASS);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $ex = $_POST['ex'];
    $price = $_POST['price'];
    $size = $_POST['size'];
    $color = $_POST['color'];
    $category = $_POST['category'];
    $sozai = $_POST['sozai'];
    $zaiko = $_POST['zaiko'];
    $image = $_POST['image'];

    // Validation and sanitization of inputs should be done here

    // Prepare the SQL statement to insert the new product
$sql = $pdo->prepare('INSERT INTO product (id,name, ex, price, size, color, category, sozai, zaiko, image) VALUES (?,?, ?, ?, ?, ?, ?, ?, ?, ?)');


    // Execute the query with the form data
   

    
    $sql->execute([$id,$name, $ex, $price, $size, $color, $category, $sozai, $zaiko, $image]);
    if ($sql->rowCount() > 0) {
        echo '新しい製品情報を登録しました。'; // "New product information has been registered."
    } else {
        echo '製品情報の登録に失敗しました。'; // "Failed to register product information."
    }
}
echo '<form action="ad-product.php" method="post"><input type="submit" value="戻る"></form>';
?>
</div>
 <?php require 'footer.php'; ?>

</body>
</html>
