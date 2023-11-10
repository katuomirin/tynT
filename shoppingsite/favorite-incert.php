<?php session_start(); ?>
<?php require 'header.php'; ?>
<?php require 'menu.php'; ?>
<?php
require 'db-connect.php';
if(isset($_SESSION['customer'])){
    $sql=$pdo->prepare('insert into favorite values(?,?)');
    $sql->execute([$_SESSION['customer']['id'],$_GET['id']]);
echo '<p>お気に入りに商品を追加しました。</p>';
echo '<hr>';
require 'favorite.php';
}else{
    echo 'お気に入りに商品を追加するには、ログインしてください。';
}
?>
<?php require 'footer.php'; ?>