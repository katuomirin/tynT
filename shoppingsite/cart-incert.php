<?php session_start(); ?>
<?php require 'header.php'; ?>
<?php
if(isset($_SESSION['user'])){
echo '<p>カートに商品を追加しました。</p>';
echo '<hr>';
require 'cart.php';
}else{
    echo 'カートに商品を追加するには、ログインしてください。';
}
?>
<?php require 'footer.php'; ?>