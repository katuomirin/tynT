<?php session_start(); ?>
<?php require 'header.php'; ?>

<?php
$id=$_POST['id'];
if (!isset($_SESSION['product'])) {
    $_SESSION['product']=[];
}
$quantity=0;
if (isset($_SESSION['product'][$id])){
    $count=$_SESSION['product'][$id]['quantity'];
}

$_SESSION['product'][$id]=[
    'name' => $_POST['name'], // 商品名
    'image' => $_POST['image'],
    'processingFee' => $_POST['processingFee'],// 加工費
    'quantity' => $quantity+$_POST['quantity'],// 数量
    'subtotal' => $_POST['subtotal']// 小計
];
echo '<form method="post" action="mypage.php">';//マイページでつかうよ
    $_SESSION['cart_data'][$id] = [
        'id' => $id,
        'image' => $_POST['image'],
        'name' => $_POST['name'],
        'price' => $_POST['price']
    ];
echo '</form>';
echo '<p>カートに商品を追加しました。</p>';
echo '<hr>';
require 'cart.php';
?>
<?php require 'footer.php'; ?>