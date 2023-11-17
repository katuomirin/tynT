<?php session_start(); ?>
<?php require 'header.php'; ?>

<?php
require 'db-connect.php';

if (isset($_SESSION['user'])) {
    $sql = $pdo->prepare('INSERT INTO favorite (user_id, product_id) VALUES (?, ?)');
    $sql->execute([$_SESSION['user']['id'], $_GET['id']]);

    if ($sql->execute()) {
        header('Location: favorite.php');
        exit();
    } else {
        echo 'Error adding to favorites';
    }
} else {
    echo 'お気に入りに商品を追加するには、ログインしてください。';
}

?>
<?php require 'footer.php'; ?>
