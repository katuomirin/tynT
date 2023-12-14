<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>顧客アカウント削除</title>
    <style>
        .container{
            margin-top: 100px;
            position: relative;
        }
    </style>
</head>
<body>
<div class="container"> 
<?php require 'header.php'; ?>
<?php require 'db-connect.php'; ?>
<?php
     $pdo = new PDO($connect, USER, PASS);
     $sql=$pdo->prepare('delete from user where id=?');
     if($sql->execute([$_GET['id']])){
        echo '削除に成功しました。';
     }else{
        echo '削除に失敗しました。';
     }
     echo '<p><a href="ad-customer.php"><img src="./image/undo.png" alt="Detail" width="30" height="30"></a></p>';
?>
</div>
<?php require 'footer.php'; ?>
</body>
</html>