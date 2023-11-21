<?php require 'header.php'; ?>
<?php
require 'db-connect.php';

if (isset($_SESSION['user'])) {
    echo '<table>';
    echo '<tr><th>商品番号</th><th>商品名</th><th>価格</th><th>画像</th><th></th></tr>';

    $sql = $pdo->prepare('SELECT * FROM favorite INNER JOIN product ON favorite.product_id = product.id WHERE user_id = ?');
    $sql->execute([$_SESSION['user']['id']]);

    foreach ($sql as $row) {
        $id = $row['id'];
        echo '<tr>';
        echo '<td>', $id, '</td>';
        echo '<td><a href="detail.php?id=', $id, '">', htmlspecialchars($row['name']), '</a></td>';
        echo '<td>', htmlspecialchars($row['price']), '</td>';
        echo '<td><img src="path_to_your_images_directory/', htmlspecialchars($row['image']), '" alt="Product Image" style="width: 100px; height: 100px;"></td>';
        echo '<td><a href="favorite-delete.php?id=', $id, '">削除</a></td>';
        echo '</tr>';
    }

    echo '</table>';
} else {
    echo 'お気に入りを表示するにはログインしてください。';
}

require 'footer.php';
?>
