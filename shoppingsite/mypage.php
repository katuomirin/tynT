<?php session_start(); ?>
<?php require 'header.php'; ?>
<?php require 'db-connect.php'; ?>
<link rel="stylesheet" href="./css/mypage.css">
<body>
    <?php
    $pdo = new PDO($connect, USER, PASS);
    $sql = $pdo->prepare('select * from product where id=?');
    $sql->execute([$_GET['id']]);
    if(isset($_SESSION['user'])){
        $user = $_SESSION['user'];
        echo '<h1>Hi,',$user['kanji'],'</h1>';
        echo '<p>カート</p>';
            if(!empty($cart_id)){
                echo '<img class="img" alt="image" src="image/',$cart_id, '.png"><br>';
                    echo '<a href="T-details.php?id=', $cart_id, '">', $cart_name, '</a>';
                    echo '<div class="example2">
                            <input type="checkbox" checked id="1" name="example2"><label for="1"></label>
                        </div><br>';
                    echo '<td>', $cart_price, '</td><br>';
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