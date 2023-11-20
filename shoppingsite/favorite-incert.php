<?php session_start(); ?>
<?php require 'header.php'; ?>
<?php
require 'db-connect.php';

if (isset($_SESSION['user'])) {
    $user_id = $_SESSION['user']['id'];
    $product_id = $_GET['id'];

    // Check if the record already exists
    $checkSql = $pdo->prepare('SELECT * FROM favorite WHERE user_id = ? AND product_id = ?');
    $checkSql->execute([$user_id, $product_id]);

    if ($checkSql->rowCount() > 0) {
        // Product is already a favorite
        echo 'この商品はすでにお気に入りに登録されています。';
    } else {
        // Insert the new favorite
        $insertSql = $pdo->prepare('INSERT INTO favorite (user_id, product_id) VALUES (?, ?)');
        $insertSql->execute([$user_id, $product_id]);
        echo 'お気に入りに商品を追加しました。';
    }
} else {
    echo 'お気に入りに商品を追加するには、ログインしてください。';
}

require 'footer.php';
?>
