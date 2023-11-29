<?php session_start(); ?>
<?php require 'header.php'; ?>
<?php require 'db-connect.php'; ?>
<link rel="stylesheet" href="./css/mypage-info.css">
<body>
<?php
    $kana = $kanji = $email = $password = $birthday = $gender = $post_code
    = $prefectures = $address1 = $address2 = $manshon = '';
    $pdo = new PDO($connect, USER, PASS);

    if(isset($_SESSION['user'])){
        $user = $_SESSION['user'];

        // Assign values to variables
        $kana = $user['kana'];
        $kanji = $user['kanji'];
        $email = $user['email'];
        $password = $user['password'];
        $birthday = $user['birthday'];
        $gender = $user['gender'];
        $post_code = $user['post_code'];
        $prefectures = $user['prefectures'];
        $address1 = $user['address1'];
        $address2 = $user['address2'];
        $manshon = $user['manshon'];

        echo '<p>カナ:', $kana, '</p>';
        echo '<p>漢字:', $kanji, '</p>'; 
        echo '<p>メール:', $email, '</p>';
        echo '<p>パスワード:', $password, '</p>';
        echo '<p>生年月日:', $birthday, '</p>';
        echo '<p>性別:', $gender, '</p>';
        echo '<p>郵便番号:', $post_code, '</p>';
        echo '<p>都道府県:', $prefectures, '</p>';
        echo '<p>住所1:', $address1, '</p>';
        echo '<p>住所2:', $address2, '</p>';
        echo '<p>マンション:', $manshon, '</p>';
    } else {
        echo '<p>ユーザー情報が見つかりません。</p>';
    }
    echo '<form action="mypage-change.php" method="post">';
    echo '<button>変更</button>';
    echo '</form>';
?>
</body>
<?php require 'footer.php'; ?>
