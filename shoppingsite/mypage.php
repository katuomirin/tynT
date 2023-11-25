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
        
    }else{
        echo '<p>ログイン情報が見つかりません。<br>もう一度ログインしてください</p>';
        echo '<a href="login.php">ログイン</a>';
    }
?>
</body>
<?php require 'footer.php'; ?>