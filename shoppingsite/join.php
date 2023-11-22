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
 = $prefectures = $address1 = $address2 = $manshon = '';
echo '<h2 class="heading-031">新規会員登録</h2>';
echo '<h3>会員情報</h3>';
echo '<form action="join-output.php" method="post">';
echo '<label>';
echo '<span class="textbox-001-label">お名前</span>';
echo '<input type="text" name="kanji" class="textbox-001" placeholder="田中　太郎"/>';
echo '</label>';
echo '<label>';
echo '<span class="textbox-001-label">お名前(フリガナ)</span>';
echo '<input type="text" name="kana" class="textbox-001" placeholder="タナカ　タロウ"/>';
echo '</label>';
echo '<label>';
echo '<span class="textbox-001-label">メールアドレス</span>';
echo '<input type="text" name="email" class="textbox-001" placeholder="xxx.tyunT.com"/>';
echo '</label>';
echo '<label>';
echo '<span class="textbox-001-label">パスワード</span>';
echo '<input type="password" name="password" class="textbox-001" placeholder="パスワードを入力してください"/>';
echo '</label>';
echo '<div class="form-area_cord">';
echo '<label>';
echo '<span class="textbox-001-label">郵便番号</span>';
echo '<input type="text" name="post_code" class="textbox-001" placeholder="郵便番号を入力してください"/>';
echo '</label>';
echo '<label>';
echo '<span class="textbox-001-label">都道府県</span>';
echo '<input type="text" name="prefectures" class="textbox-001" placeholder="都道府県を入力してください"/>';
echo '</label>';
echo '<span class="textbox-001-label">住所１</span>';
echo '<input type="text" name="address1" class="textbox-001" placeholder="市町村"/>';
echo '</label>';
echo '<span class="textbox-001-label">住所２</span>';
echo '<input type="text" name="address2" class="textbox-001" placeholder="〇丁目〇番"/>';
echo '</label>';
echo '<span class="textbox-001-label">マンション名</span>';
echo '<input type="text" name="manshon" class="textbox-001" placeholder="マンション名〇〇〇号"/>';
echo '</label>';
echo '<label>';
echo '<span class="textbox-001-label">生年月日</span>';
echo '<input type="text" name="birthday" class="textbox-001" placeholder="YYYY/MM/DD"/>';
echo '</label>';
echo '<p>性別</p>';
echo '<fieldset class="radio-001">';
echo '<label>';
echo '<input type="radio" name="gender" value="男" checked/>';
echo '男性';
echo '</label><br>';
echo '<label>';
echo '<input type="radio" name="gender" value="女"/>';
echo '女性';
echo '</label><br>';
echo '<label>';
echo '<input type="radio" name="gender" value="その他"/>';
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