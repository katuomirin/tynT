<?php session_start(); ?>
<?php require 'header.php'; ?>

<?php
$id=$_POST['id'];
if (!isset($_SESSION['product'])) {
    $_SESSION['product']=[];
}
if (isset($_SESSION['product'][$id])){
    $quantityOutput=$_SESSION['product'][$id]['quantity'];
}
$_SESSION['product'][$id]=[
    'name' => $_POST['name'],
    'price' => $_POST['price'],
    'quantity' => $_POST['quantity'],
    'totalSubtotal' => $_POST['totalSubtotal']
];
echo '<form method="post" action="mypage.php">';//マイページでつかうよ
    $_SESSION['cart_data'][$id] = [
        'id' => $id,
        'name' => $_POST['name'],
        'price' => $_POST['price'],
        'quantity' => $_POST['quantity']
    ];
echo '</form>';
echo '<p>カートに商品を追加しました。</p>';
echo '<hr>';
require 'cart.php';
?>
<?php require 'footer.php'; ?>