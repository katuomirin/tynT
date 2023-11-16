<?php session_start(); ?>
<?php require 'header.php'; ?>
<?php require 'db-connect.php';?>
<?php
if(isset($_SESSION['user'])){
    $sql=$pdo->prepare('insert into cart values(?,?)');
    $sql->execute([$_SESSION['user']['id'],$_GET['id']]);
echo '<p>カートに商品を追加しました。</p>';
echo '<hr>';
require 'cart.php';
}else{
    echo 'カートに商品を追加するには、ログインしてください。';
}
?>
<?php require 'footer.php'; ?>