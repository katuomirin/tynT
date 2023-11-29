<?php require 'header.php'; ?>
<?php require 'db-connect.php';?>
<?php
    echo '<h1>お気に入り商品一覧</h1>';
    if(isset($_SESSION['user'])){
    $sql = $pdo->prepare('SELECT * FROM favorite INNER JOIN product ON favorite.product_id = product.id WHERE user_id = ?');
    $sql->execute([$_SESSION['user']['id']]);
    foreach ($sql as $row) {
        $id = $row['id'];
        echo '<div class="product">';
        echo '<img src="image/',$row['id'],'png" alt="商品1の画像">';
        echo '<div class="product-info">';  
        echo '<h2><a href="T.php?id=', $id, '">', htmlspecialchars($row['name']), '</a></h2>';    
        echo '<td>', htmlspecialchars($row['price']), '</td>';
        echo '<td>', htmlspecialchars($row['ex']), '</td>';
        echo '<input type="hidden" name="id" value="',$row['id'],'">';
        echo '<input type="hidden" name="name" value="',$row['name'],'">';
        echo '<input type="hidden" name="price" value="',$row['price'],'">';
        echo '<p><input type="submit" value="カートに追加"></p>';
        echo '</form>';
        echo '<a href="favorite-delete.php?id=', $id, '">削除</a>';
        echo '</div>';
        echo '</div>';
    }
    }else{
        echo 'お気に入りを表示するにはログインしてください。';
    }
/*body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        .product {
            border: 1px solid #ccc;
            padding: 10px;
            margin-bottom: 10px;
            display: flex;
            align-items: center; /* 垂直方向に中央揃え */
        /*}
        .product img {
            max-width: 70px;
            height: auto;
            margin-right: 10px; /* 画像とテキストの間隔を設定 */
        /*}
        .product-info {
            flex-grow: 1; /* テキスト部分を伸ばして残りのスペースを埋める */
        /*}
        button {
            margin-top: 10px;
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        */