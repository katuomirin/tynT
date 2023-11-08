<?php session_start(); ?>
<?php require 'header.php'; ?>
<?php require 'menu.php'; ?>
<?php
require 'db-connect.php';
if(isset($_SESSION['customer'])){
    $sql=$pdo->prepare(
        'delete from favorite where customer_id=? and product_id=?'
    );
    $sql->execute([$_SESSION['customer']['id'],$_GET['id']]);
    echo 'お気に入りから商品を削除しました。';
    echo '<hr>';
}
require 'favorite.php';
?>
<?php require 'footer.php'; ?>