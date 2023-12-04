<?php session_start(); ?>
<?php require 'header.php'; ?>

<?php
$id=$_POST['id'];
if (isset($_SESSION['product'][$id])){
    $quantity =$_SESSION['product'][$id]['quantity'];
}


$_SESSION['product'][$id]=[
    'name' => $_POST['name'],
    'processingFee' => $_POST['processingFee'],
    'quantity' => $_POST['quantity'],
    'subtotal' => $_POST['subtotal'],

];
echo '<form method="post" action="mypage.php">';//マイページでつかうよ
    $_SESSION['cart_data'][$id] = [
        'id' => $id,
        'name' => $_POST['name'],
        'price' => $_POST['price']
    ];
echo '</form>';
echo '<p>カートに商品を追加しました。</p>';
echo '<hr>';
require 'cart.php';
?>
<?php require 'footer.php'; ?>