<?php require 'header.php'; ?>
<?php require 'db-connect.php';?>
<link rel="stylesheet" href="./css/favorite.css">
<?php
    echo '<h1>お気に入り商品一覧</h1>';
    if(isset($_SESSION['user'])){
    $sql = $pdo->prepare('SELECT * FROM favorite INNER JOIN product ON favorite.product_id = product.id WHERE user_id = ?');
    $sql->execute([$_SESSION['user']['id']]);
    echo '<div class="item">';
        foreach ($sql as $row) {
            $id = $row['id'];
            echo '<div class="shohins">';
            echo '<a href="T-details.php?id=', $id, '"><img class="img" alt="image" src="image/',$row['image'], '.png"></a><br>';
            echo '<a href="T-details.php?id=', $id, '">', $row['name'], '</a>';
            echo '<p class="price">', $row['price'], '</p></div>';
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