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
        $kana = $_SESSION['user']['kana'];
        $kanji = $_SESSION['user']['kanji'];
        $email = $_SESSION['user']['email'];
        $password = $_SESSION['user']['password'];
        $birthday = $_SESSION['user']['birthday'];
        $gender = $_SESSION['user']['gender'];
        $post_code = $_SESSION['user']['post_code'];
        $prefectures = $_SESSION['user']['prefectures'];
        $address1 = $_SESSION['user']['address1'];
        $address2 = $_SESSION['user']['address2'];
        $manshon = $_SESSION['user']['manshon'];

    echo '<form action="mypage-change-output.php" method="post">';
    echo '<table>';
    echo '<tr><td>お名前(フリガナ)</td>';
    echo '<td><input type="text" name="name" value="', $kana , '">';
    echo '</td></tr>';
    echo '<tr><td>お名前(漢字)</td>';
    echo '<td><input type="text" name="address" value="', $kanji , '">';
    echo '</td></tr>';
    echo '<tr><td>メールアドレス</td>';
    echo '<td><input type="text" name="login" value="', $email , '">';
    echo '</td></tr>';
    echo '<tr><td>パスワード</td>';
    echo '<td><input type="password" name="password" value="', $password , '">';
    echo '</td></tr>';
    echo '<tr><td>生年月日</td>';
    echo '<td><input type="password" name="password" value="', $birthday , '">';
    echo '</td></tr>';
    echo '<tr><td>性別</td>';
    echo '<td><input type="password" name="password" value="', $gender , '">';
    echo '</td></tr>';
    echo '<tr><td>郵便番号</td>';
    echo '<td><input type="password" name="password" value="', $post_code , '">';
    echo '</td></tr>';
    echo '<tr><td>住所(市町村区)</td>';
    echo '<td><input type="password" name="password" value="', $address1 , '">';
    echo '</td></tr>';
    echo '<tr><td>住所(〜丁目)</td>';
    echo '<td><input type="password" name="password" value="', $address2 , '">';
    echo '</td></tr>';
    echo '<tr><td>住所(マンション名)</td>';
    echo '<td><input type="password" name="password" value="', $manshon , '">';
    echo '</td></tr>';
    echo '</table>';
    echo '<input type="submit" value="確定">';
    echo '</form>';
?>

<?php require 'footer.php'; ?>