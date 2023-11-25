<?php session_start(); ?>
<?php require 'header.php'; ?>
<?php require 'db-connect.php'; ?>
<link rel="stylesheet" href="./css/mypage.css">
<body>
    <?php
    $pdo = new PDO($connect, USER, PASS);
    if(isset($_SESSION['user'])){
        $user = $_SESSION['user'];
        echo '<h1>Hi,',$user['kanji'],'</h1>';
        echo '<p>カート</p>';
        if(isset($_SESSION['cart_data']) && !empty($_SESSION['cart_data'])){
            foreach($_SESSION['cart_data'] as $cart){
                echo '<div>';
                echo '<img class="img" alt="image" src="image/',$cart['id'], '.png"><br>';
                echo '<a href="T-details.php?id=', $cart['id'], '">', htmlspecialchars($cart['name']), '</a>';
                echo '<p>', $cart['price'], '</p>';
            }
        }else{
            echo 'カートに商品が入っていません。';
        }
        echo '<p>お気に入り</p>';
    }else{
        echo '<p>ログイン情報が見つかりません。<br>もう一度ログインしてください</p>';
        echo '<a href="login.php">ログイン</a>';
    }
?>
</body>
<?php require 'footer.php'; ?>