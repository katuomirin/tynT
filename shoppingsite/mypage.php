<?php session_start(); ?>
<?php require 'header.php'; ?>
<?php require 'db-connect.php'; ?>
<link rel="stylesheet" href="./css/mypage.css">
<body>
    <?php
    echo '<form action="mypage-change.php" method="post">';
    $pdo = new PDO($connect, USER, PASS);
    if(isset($_SESSION['user'])){
        $user = $_SESSION['user'];
        echo '<h1>Hi,',$user['kanji'],'</h1>';
        echo '<p class="cart">カート</p>';
        echo '<div class="carts">';
        if(isset($_SESSION['cart_data']) && !empty($_SESSION['cart_data'])){
            foreach($_SESSION['cart_data'] as $cart){
                echo '<div>';
                echo '<img class="img" alt="image" src="image/',$cart['id'], '.png"><br>';
                echo '<a href="T-details.php?id=', $cart['id'], '">', htmlspecialchars($cart['name'] ?? 'No Name'), '</a>';
                echo '<p>', $cart['price'], '</p>';
            }
        }else{
            echo 'カートに商品が入っていません。';
        }
        echo "</div>";
        echo '<p class="favorite">お気に入り</p>';
        echo '<div class="favorites">';
        
        echo "</div>";

        echo '<a href="mypage-info.php" class="mypage-info-button">マイページ情報</a>';
        echo '<p><a href="logout.php" >ログアウト</a></p>';
    }else{
        echo '<p>ログイン情報が見つかりません。<br>もう一度ログインしてください</p>';
        echo '<a href="login.php">ログイン</a>';
    }
    echo '</form>';
?>
</body>
<?php require 'footer.php'; ?>