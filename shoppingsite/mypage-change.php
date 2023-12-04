<?php session_start(); ?>
<?php require 'header.php'; ?>
<?php require 'db-connect.php'; ?>
<link rel="stylesheet" href="./css/mypage-change.css">
<<<<<<< HEAD
<<<<<<< HEAD
=======
=======
>>>>>>> 4b125996f5ba6541d8d999347e4bbd283c9ff003
<style>
    .heading-041 {
    display: flex;
    align-items: center;
    padding: .5em .7em;
    background-color: #ebebeb;
    color: #333333;
}
 
.heading-041::before {
    display: inline-block;
    width: 5px;
    height: 1.5em;
    margin-right: .5em;
    background-color: #ebebeb;
    content: '';
}
 
.textbox-001-label,
.textbox-001 {
    color: #333;
}
 
.textbox-001-label {
    display: block;
    margin-bottom: 5px;
    font-size: .9em;
}
 
.textbox-001 {
    width: 100%;
    padding: 8px 10px;
    border: 1px solid #969da3;
    border-radius: 3px;
    font-size: 1em;
    line-height: 1.5;
}
 
.textbox-001::placeholder {
    color: #999;
}
 
.radio-001 {
    display: flex;
    flex-wrap: wrap;
    gap: .3em 2em;
    border: none;
}
 
.radio-001 label {
    display: flex;
    align-items: center;
    gap: 0 .5em;
    position: relative;
    cursor: pointer;
}
 
.radio-001 label::before,
.radio-001 label:has(:checked)::after {
    border-radius: 50%;
    content: '';
}
 
.radio-001 label::before {
    width: 18px;
    height: 18px;
    background-color: #e6edf3;
}
 
.radio-001 label:has(:checked)::after {
    position: absolute;
    top: 50%;
    left: 9px;
    transform: translate(-50%, -50%);
    width: 10px;
    height: 10px;
    background-color: #4895cb;
}
 
.radio-001 input {
    display: none;
}
 
.button-002 {
    display: flex;
    justify-content: center;
    align-items: center;
    width: 250px;
    margin:0 auto;
    padding: .9em 2em;
    border: none;
    border-radius: 25px;
    background-color: #2589d0;
    color: #fff;
    font-weight: 600;
    font-size: 1em;
}
 
.button-002::after {
    transform: rotate(45deg);
    width: 5px;
    height: 5px;
    margin-left: 10px;
    border-top: 2px solid #fff;
    border-right: 2px solid #fff;
    content: '';
}
 
.button-002:hover {
    background-color: #1579c0;
}
</style>
<<<<<<< HEAD
>>>>>>> fcfe319cc8d7b028dcabb01cf8e298b3d6d26caf
=======
>>>>>>> 4b125996f5ba6541d8d999347e4bbd283c9ff003
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
        $password = $_SESSION['user']['password'];
        $birthday = $_SESSION['user']['birthday'];
        $gender = $_SESSION['user']['gender'];
        $post_code = $_SESSION['user']['post_code'];
        $prefectures = $_SESSION['user']['prefectures'];
        $address1 = $_SESSION['user']['address1'];
        $address2 = $_SESSION['user']['address2'];
        $manshon = $_SESSION['user']['manshon'];
 
<<<<<<< HEAD
<<<<<<< HEAD
    echo '<form action="mypage-change-output.php" method="post">';
    echo '<table>';
    echo '<label>';
    echo '<span class="textbox-001-label">お名前(フリガナ)</span>'
    echo '<input type="text"  name="kana" class="textbox-001" placeholder=""/ value="', $kana , '">'
    echo '</label>';
    echo '<label>';
    echo '<span class="textbox-001-label">お名前(漢字)</span>'
    echo '<input type="text"  name="kanji" class="textbox-001" placeholder=""/ value="', $kanji , '">'
    echo '</label>';
    echo '<label>';
    echo '<span class="textbox-001-label">メールアドレス</span>'
    echo '<input type="text"  name="email" class="textbox-001" placeholder=""/ value="', $email , '">'
    echo '</label>';
    echo '<label>';
    echo '<span class="textbox-001-label">パスワード</span>'
    echo '<input type="text"  name="password" class="textbox-001" placeholder=""/ value="', $password , '">'
    echo '</label>';
    echo '<label>';
    echo '<span class="textbox-001-label">生年月日</span>'
    echo '<input type="text"  name="birthday" class="textbox-001" placeholder=""/ value="', $birthday , '">'
    echo '</label>';
    echo '<label>';
    echo '<span class="textbox-001-label">郵便番号</span>'
    echo '<input type="text"  name="post_code" class="textbox-001" placeholder=""/ value="', $post_code , '">'
    echo '</label>';
    echo '<label>';
    echo '<span class="textbox-001-label">住所(市町村区)</span>'
    echo '<input type="text"  name="address1" class="textbox-001" placeholder=""/ value="', $address1 , '">'
    echo '</label>';
    echo '<label>';
    echo '<span class="textbox-001-label">住所(~丁目)</span>'
    echo '<input type="text"  name="address2" class="textbox-001" placeholder=""/ value="', $address2 , '">'
    echo '</label>';
    echo '<label>';
    echo '<span class="textbox-001-label">住所(マンション)</span>'
    echo '<input type="text"  name="manshon" class="textbox-001" placeholder=""/ value="', $manshon , '">'
    echo '</label>';
    echo '</table>';
    echo '<fieldset class="radio-001">'
    echo '<label>';
    echo '<input type="radio" name="gender" value="男"/>';
    echo '男性';
    echo '</label>';
    echo '<label>';
    echo '<input type="radio" name="gender" value="女"/>';
    echo '女性';
    echo '</label>';
    echo '<label>';
    echo '<input type="radio" name="gender" value="その他"/>';
    echo 'その他';
    echo '</label>';
    echo '</fieldset>'
    echo '</form>';
=======
=======
>>>>>>> 4b125996f5ba6541d8d999347e4bbd283c9ff003
        echo '<form action="mypage-change-output.php" method="post">';
        echo '<table>';
        echo '<label>';
        echo '<span class="textbox-001-label">お名前(フリガナ)</span>';
        echo '<input type="text"  name="kana" class="textbox-001" placeholder="" value="', $kana , '">';
        echo '</label>';
        echo '<label>';
        echo '<span class="textbox-001-label">お名前(漢字)</span>';
        echo '<input type="text"  name="kanji" class="textbox-001" placeholder="" value="', $kanji , '">';
        echo '</label>';
        echo '<label>';
        echo '<span class="textbox-001-label">メールアドレス</span>';
        echo '<input type="text"  name="email" class="textbox-001" placeholder="" value="', $email , '">';
        echo '</label>';
        echo '<label>';
        echo '<span class="textbox-001-label">パスワード</span>';
        echo '<input type="text"  name="password" class="textbox-001" placeholder="" value="', $password , '">';
        echo '</label>';
        echo '<label>';
        echo '<span class="textbox-001-label">生年月日</span>';
        echo '<input type="text"  name="birthday" class="textbox-001" placeholder="" value="', $birthday , '">';
        echo '</label>';
        echo '<label>';
        echo '<span class="textbox-001-label">郵便番号</span>';
        echo '<input type="text"  name="post_code" class="textbox-001" placeholder="" value="', $post_code , '">';
        echo '</label>';
        echo '<label>';
        echo '<span class="textbox-001-label">住所(市町村区)</span>';
        echo '<input type="text"  name="address1" class="textbox-001" placeholder="" value="', $address1 , '">';
        echo '</label>';
        echo '<label>';
        echo '<span class="textbox-001-label">住所(~丁目)</span>';
        echo '<input type="text"  name="address2" class="textbox-001" placeholder="" value="', $address2 , '">';
        echo '</label>';
        echo '<label>';
        echo '<span class="textbox-001-label">住所(マンション)</span>';
        echo '<input type="text"  name="manshon" class="textbox-001" placeholder="" value="', $manshon , '">';
        echo '</label>';
        echo '</table>';
        echo '<fieldset class="radio-001">';
        echo '<label>';
        echo '<input type="radio" name="gender" value="男"/>';
        echo '男性';
        echo '</label>';
        echo '<label>';
        echo '<input type="radio" name="gender" value="女"/>';
        echo '女性';
        echo '</label>';
        echo '<label>';
        echo '<input type="radio" name="gender" value="その他"/>';
        echo 'その他';
        echo '</label>';
        echo '</fieldset>';
        echo '</form>';
<<<<<<< HEAD
>>>>>>> fcfe319cc8d7b028dcabb01cf8e298b3d6d26caf
=======
>>>>>>> 4b125996f5ba6541d8d999347e4bbd283c9ff003
    }
    echo '<form action="mypage-change-output.php" method="post">';
    echo '<button class="button-002">確定</button>';
    echo '</form>';
?>
 
<?php require 'footer.php'; ?>
<<<<<<< HEAD
<<<<<<< HEAD

    echo '<tr><td>お名前(フリガナ)</td>';
    echo '<td><input type="text" name="name" value="', $kana , '">';
    echo '</td></tr>';
=======
>>>>>>> fcfe319cc8d7b028dcabb01cf8e298b3d6d26caf
=======
>>>>>>> 4b125996f5ba6541d8d999347e4bbd283c9ff003
