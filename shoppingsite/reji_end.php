<?php session_start(); ?>
<?php require 'header.php'; ?>

<?php
if ($_SERVER["REQUEST_METHOD"] != "POST") {
    header("Location: reji.php");
    exit();
}
?>

<style>
    .output {
        text-align: center;
    }
</style>

<html>

<head>
    <!-- ここに<head>セクションの内容を追加してください -->
</head>

<body>
    
    <?php require 'db-connect.php'; ?>
<?php
    $user_id = $_POST['id'];
    $now = date('Y-m-d');
    $okuri = $_POST['okuri'];
    $harai = $_POST['harai'];

    $sql = $pdo->prepare('INSERT INTO oder VALUES (null, ?, ?, ?, ?)');
    $sql->execute([$_SESSION['user']['id'], $now, $okuri, $harai]);
    
    $lastInsertedId = $pdo->lastInsertId();
    
// Insert data into oder_detail table using the last inserted ID
foreach ($_SESSION['product'] as $id => $product) {
    $product_id = $id;
    $color = '';
    $count=$product['quantity'];

    $sqlDetail = $pdo->prepare('INSERT INTO order_detail VALUES (?, ?, ?, ?)');
    $sqlDetail->execute([$lastInsertedId, $product_id,$color, $count]);
    
}

    ?>

    <div class="output">
        <h2>商品の購入が完了しました。<br></h2>
        <h2>購入ありがとうございました。<br></h2>
        <h2><a href="home.php">購入</a>を続ける</h2>
    </div>
    <?php
    unset($_SESSION['product']);
    unset($_SESSION['cart_data']);
    ?>
</body>

</html>
