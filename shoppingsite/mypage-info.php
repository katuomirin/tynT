<?php session_start(); ?>
<?php require 'header.php'; ?>
<?php require 'db-connect.php'; ?>
<link rel="stylesheet" href="./css/mypage-info.css">
<body>
<?php
    echo '<h2 class="heading-002">会員情報</h2>';
    echo '<h3 class="heading-041">基本情報</h3>';
    $kana = $kanji = $email = $password = $birthday = $gender = $post_code
    = $prefectures = $address1 = $address2 = $manshon = '';
    $pdo = new PDO($connect, USER, PASS);
    if(isset($_SESSION['user'])){
        $kana = $_SESSION['user']['kana'];
        $kanji = $_SESSION['user']['kanji'];
        $email = $_SESSION['user']['email'];
        $birthday = $_SESSION['user']['birthday'];
        $post_code = $_SESSION['user']['post_code'];
        $prefectures = $_SESSION['user']['prefectures'];
        $address1 = $_SESSION['user']['address1'];
        $address2 = $_SESSION['user']['address2'];
        $manshon = $_SESSION['user']['manshon'];

        echo '<p>カナ:', $kana, '</p>';
        echo '<p>漢字:', $kanji, '</p>'; 
        echo '<p>メール:', $email, '</p>';
        echo '<p>生年月日:', $birthday, '</p>';
        echo '<p>郵便番号:', $post_code, '</p>';
        echo '<p>都道府県:', $prefectures, '</p>';
        echo '<p>', $address1, '</p>';
        echo '<p>', $address2, '</p>';
        echo '<p>', $manshon, '</p>';
        
        // Add a form to handle changes
        echo '<form action="mypage-change.php" method="post">';
        echo '<button class="button-002">変更</button>';
        echo '</form>';
    } else {
        echo '<p>ログイン情報が見つかりません。<br>もう一度ログインしてください</p>';
        echo '<a href="login.php">ログイン</a>';
    }

?>
</body>
<?php require 'footer.php'; ?>
