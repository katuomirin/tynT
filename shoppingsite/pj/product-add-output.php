<?php session_start();?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/add-pro.css">
</head>
<body>
    
<?php require 'header.php';?>

<?php require 'db-connect.php';?>
<div class="container">
<?php

$pdo=new PDO($connect,USER,PASS);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $ex = $_POST['ex'];
    $price = $_POST['price'];
    $size = $_POST['size'];
    $color = $_POST['color'];
    $category = $_POST['category'];
    $sozai = $_POST['sozai'];
    $zaiko = $_POST['zaiko'];

    // Validation and sanitization of inputs should be done here

    // Prepare the SQL statement to insert the new product
$sql = $pdo->prepare('INSERT INTO product (name, ex, price, size, color, category, sozai, zaiko, image) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)');


    // Execute the query with the form data
   
    if(is_uploaded_file($_FILES['file']['tmp_name'])){
        if(!file_exists('image')){
            mkdir('image');
        }
        $image='image/'.basename($_FILES['file']['name']);
        if(move_uploaded_file($_FILES['file']['tmp_name'],$image)){
            echo '<p><img src="',$image,'" alt="image"></p>';
        }else{
            echo 'アップロードに失敗しました。';
        }
    }else{
        echo 'ファイルを選択してください。';
    }
    
    $sql->execute([$name, $ex, $price, $size, $color, $category, $sozai, $zaiko, $image]);
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
