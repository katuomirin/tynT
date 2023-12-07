<?php session_start(); ?>
<?php require 'header.php'; ?>
<?php require 'db-connect.php'; ?>
<link rel="stylesheet" href="./css/mypage-change.css">
<body>
<?php
    echo '<h2 class="heading-041">基本情報</h2>';
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

    echo '<form action="mypage-change-output.php" method="post">';
    echo '<table>';
    echo '<label>';
    echo '<span class="textbox-001-label">お名前(フリガナ)</span>';
    echo '<input type="text"  name="kana" class="textbox-001" placeholder=""/ value="', $kana , '">';
    echo '</label>';
    echo '<label>';
    echo '<span class="textbox-001-label">お名前(漢字)</span>';
    echo '<input type="text"  name="kanji" class="textbox-001" placeholder=""/ value="', $kanji , '">';
    echo '</label>';
    echo '<label>';
    echo '<span class="textbox-001-label">メールアドレス</span>';
    echo '<input type="text"  name="email" class="textbox-001" placeholder=""/ value="', $email , '">';
    echo '</label>';
    echo '<label>';
    echo '<span class="textbox-001-label">パスワード</span>';
    echo '<input type="text"  name="password" class="textbox-001" placeholder=""/ value="', $password , '">';
    echo '</label>';
    echo '<label>';
    echo '<span class="textbox-001-label">生年月日</span>';
    echo '<input type="text"  name="birthday" class="textbox-001" placeholder=""/ value="', $birthday , '">';
    echo '</label>';
    echo '<label>';
    echo '<span class="textbox-001-label">郵便番号</span>';
    echo '<input type="text"  name="post_code" class="textbox-001" placeholder=""/ value="', $post_code , '">';
    echo '</label>';
    echo '<label>';
    echo '<span class="textbox-001-label">都道府県</span>';
    echo '<input type="text"  name="prefectures" class="textbox-001" placeholder=""/ value="', $prefectures , '">';
    echo '</label>';
    echo '<label>';
    echo '<span class="textbox-001-label">住所(市町村区)</span>';
    echo '<input type="text"  name="address1" class="textbox-001" placeholder=""/ value="', $address1 , '">';
    echo '</label>';
    echo '<label>';
    echo '<span class="textbox-001-label">住所(~丁目)</span>';
    echo '<input type="text"  name="address2" class="textbox-001" placeholder=""/ value="', $address2 , '">';
    echo '</label>';
    echo '<label>';
    echo '<span class="textbox-001-label">住所(マンション)</span>';
    echo '<input type="text"  name="manshon" class="textbox-001" placeholder=""/ value="', $manshon , '">';
    echo '</label>';
    echo '</table>';
    echo '<br>';
    echo '<button class="button-002">確定</button>';
    echo '</form>';
}
?>
 
<?php require 'footer.php'; ?>

