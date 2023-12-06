<?php session_start(); ?>
<?php require 'header.php'; ?>
<?php require 'db-connect.php'; ?>

<?php
if (isset($_POST['id'])) {
    $product_id = $_POST['id'];

    if (isset($_SESSION['user'])) {
        $user_id = $_SESSION['user']['id'];

        // Check if the record already exists
        $checkSql = $pdo->prepare('SELECT * FROM favorite WHERE user_id = ? AND product_id = ?');
        $checkSql->execute([$user_id, $product_id]);

        if ($checkSql->rowCount() > 0) {
            $sql=$pdo->prepare(
                'delete from favorite where user_id=? and product_id=?'
            );
            $sql->execute([$_SESSION['user']['id'], $_POST['id']]);
            echo 'お気に入りから商品を削除しました。';
            echo '<hr>';
        } else {
            // Insert the new favorite
            $insertSql = $pdo->prepare('INSERT INTO favorite (user_id, product_id) VALUES (?, ?)');
            $insertSql->execute([$user_id, $product_id]);
            echo 'お気に入りに商品を追加しました。';
        }
    } else {
        echo 'お気に入りに商品を追加するには、ログインしてください。';
    }
} else {
    echo '商品IDが指定されていません。';
}


?>
