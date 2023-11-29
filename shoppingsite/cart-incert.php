<?php session_start(); ?>
<?php require 'header.php'; ?>
<?php
$id=$_POST['id'];
if (!isset($_SESSION['product'])) {
    $_SESSION['product']=[];
}
$count=0;
if (isset($_SESSION['product'][$id])){
    $count=$_SESSION['product'][$id]['totalQuantity'];
}
$_SESSION['product'][$id]=[
    'name' => $_POST['name'],
    'price' => $_POST['price'],
    'totalQuantity' => $_POST['totalQuantity']
];
echo '<form method="post" action="mypage.php">';//マイページでつかうよ
    $_SESSION['cart_data'][$id] = [
        'id' => $id,
        'name' => $_POST['name'],
        'price' => $_POST['price'],
        'totalQuantity' => $_POST['totalQuantity']
    ];
echo '</form>';
echo '<p>カートに商品を追加しました。</p>';
echo '<hr>';
require 'cart.php';
?>
<?php require 'footer.php'; ?>