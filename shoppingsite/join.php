<?php session_start(); ?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="./css/join.css">
    <title>会員登録ページ</title>
</head>
<body>
<?php
$kana = $kanji = $email = $password = $birthday = $gender = $post_code
 = $prefectures = $addres1 = $addres2 = $manshon = $card_num = $card_date = $card_name = $user_registration = $lost_login = '';
if(isset($_SESSION['user'])){
    $kana = $_SESSION['user']['kana'];
    $kanji = $_SESSION['user']['kanji'];
    $email = $_SESSION['user']['email'];
    $password = $_SESSION['user']['password'];
    $birthday = $_SESSION['user']['birthday'];
    $gender = $_SESSION['user']['gender'];
    $post_code = $_SESSION['user']['post_code'];
    $prefectures = $_SESSION['user']['prefectures'];
    $addres1 = $_SESSION['user']['addres1'];
    $addres2 = $_SESSION['user']['addres2'];
    $manshon = $_SESSION['user']['manshon'];
    $card_num = $_SESSION['user']['card_num'];
    $card_date = $_SESSION['user']['card_date'];
    $card_name = $_SESSION['user']['card_name'];
    $user_registration = $_SESSION['user']['user_registration'];
    $lost_login = $_SESSION['user']['lost_login'];
}
echo '<h2 class="heading-031">新規会員登録</h2>';
echo '<h3>会員情報</h3>';
echo '<form action="join-output.php" method="post">';
echo '<label>';
echo '<span class="textbox-001-label">お名前</span>';
echo '<input type="text" class="textbox-001" placeholder="田中　太郎"/>';
echo '</label>';
echo '<label>';
echo '<span class="textbox-001-label">お名前(フリガナ)</span>';
echo '<input type="text" class="textbox-001" placeholder="タナカ　タロウ"/>';
echo '</label>';
echo '<label>';
echo '<span class="textbox-001-label">メールアドレス</span>';
echo '<input type="text" class="textbox-001" placeholder="xxx.tyunT.com"/>';
echo '</label>';
echo '<label>';
echo '<span class="textbox-001-label">パスワード</span>';
echo '<input type="password" class="textbox-001" placeholder="パスワードを入力してください"/>';
echo '</label>';
echo '<div class="form-area_cord">';
echo '<label>';
echo '<span class="textbox-001-label">郵便番号</span>';
echo '<input type="text"  name="cord" class="textbox-001" placeholder="郵便番号を入力してください"/>';
echo '</label>';
echo '<label>';
echo '<span class="textbox-001-label">生年月日</span>';
echo '<input type="text" class="textbox-001" placeholder="YYYY/MM/DD"/>';
echo '</label>';
echo '<p>性別</p>';
echo '<fieldset class="radio-001">';
echo '<label>';
echo '<input type="radio" name="radio-001" checked/>';
echo '男性';
echo '</label><br>';
echo '<label>';
echo '<input type="radio" name="radio-001"/>';
echo '女性';
echo '</label><br>';
echo '<label>';
echo '<input type="radio" name="radio-001"/>';
echo 'その他';
echo '</label>';
echo '</fieldset>';
echo '<button class="button-003">登録</button>';
echo '</form>';
echo '<script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>';
echo '<script src="./script/join.js"></script>';
echo '<p></p>';
?>
</body>
</html>