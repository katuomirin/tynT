<?php session_start(); ?>
<?php require 'header.php'; ?>
<?php
require 'db-connect.php';
if(isset($_SESSION['user'])){
    $sql=$pdo->prepare(
        'delete from favorite where user_id=? and product_id=?'
    );
    $sql->execute([$_SESSION['user']['id'], $_POST['id']]);
    echo 'お気に入りから商品を削除しました。';
    echo '<hr>';
}
require 'favorite.php';
?>
<?php require 'footer.php'; ?>
