<?php session_start(); ?>
<?php require 'header.php'; ?>
<style>
    .zenbu {
    display: flex; 
    justify-content: center; 
    align-items: center; 
}

.text {
    width: auto;
    padding: 8px 10px;
    border: 1px solid #d2d2d2;
    border-radius: 3px;
    background: #d8d4d4;
    color: #333;
    font-size: 1em;
    line-height: 1.5;
}

.text::placeholder {
    color: #999;
}
/*----------------オリジナルTシャツの送り方---------------*/
.okuri{
    position: relative;
}

.okuri::before,
.okuri::after {
    position: absolute;
    content: '';
    pointer-events: none;
}

.okuri::before {
    right: 0;
    display: inline-block;
    width: 2.8em;
    height: 2.8em;
    border-radius: 0 3px 3px 0;
    background-color: #2589d0;
    content: '';
}

.okuri::after {
    position: absolute;
    top: 50%;
    right: 1.4em;
    transform: translate(50%, -50%) rotate(45deg);
    width: 6px;
    height: 6px;
    border-bottom: 3px solid #fff;
    border-right: 3px solid #fff;
    content: '';
}

.okuri select {
    appearance: none;
    -webkit-appearance: none;
    -moz-appearance: none;
    min-width: 230px;
    height: 2.8em;
    padding: .4em 3.6em .4em .8em;
    border: 2px solid #2589d0;
    border-radius: 3px;
    color: #333333;
    font-size: 1em;
    cursor: pointer;
}

.okuri select:focus {
    outline: 1px solid #2589d0;
}

/* -----------------支払い方法-------------------- */
.harai{
    position: relative;
}

.harai::before,
.harai::after {
    position: absolute;
    content: '';
    pointer-events: none;
}

.harai::before {
    right: 0;
    display: inline-block;
    width: 2.8em;
    height: 2.8em;
    border-radius: 0 3px 3px 0;
    background-color: #2589d0;
    content: '';
}

.harai::after {
    position: absolute;
    top: 50%;
    right: 1.4em;
    transform: translate(50%, -50%) rotate(45deg);
    width: 6px;
    height: 6px;
    border-bottom: 3px solid #fff;
    border-right: 3px solid #fff;
    content: '';
}

.harai select {
    appearance: none;
    -webkit-appearance: none;
    -moz-appearance: none;
    min-width: 230px;
    height: 2.8em;
    padding: .4em 3.6em .4em .8em;
    border: 2px solid #2589d0;
    border-radius: 3px;
    color: #333333;
    font-size: 1em;
    cursor: pointer;
}

.harai select:focus {
    outline: 1px solid #2589d0;
}

/* -----------------確定-------------------- */
.kaku {
    display: flex;
    justify-content: center;   
    align-items: center;
    width: 250px;
    margin: 0 auto;
    padding: .9em 2em;
    border: 1px solid #2589d0;
    border-radius: 5px;
    background-color: #fff;
    color: #2589d0;
    font-size: 1em;
}

.kaku:hover {
    border: none;
    background-color: #2589d0;
    color: #fff;
    font-weight: 600;
}

/* -------戻るボタン--------*/
.modo {
    display: flex;
    justify-content: center;   
    align-items: center;
    width: 250px;
    margin: 0 auto;
    padding: .9em 2em;
    border: 1px solid #2589d0;
    border-radius: 5px;
    background-color: #fff;
    color: #2589d0;
    font-size: 1em;
}

.modo:hover {
    border: none;
    background-color: #2589d0;
    color: #fff;
    font-weight: 600;
}

</style>
<body>
    <label class="zenbu">
    <?php
$id=$kana=$kanji=$email=$post_code=$prefectures=$address1=$address2=$manshon='';
if(isset($_SESSION['user'])){
    $id=$_SESSION['user']['id'];
    $kana=$_SESSION['user']['kana'];
    $kanji=$_SESSION['user']['kanji'];
    $email=$_SESSION['user']['email'];
    $post_code=$_SESSION['user']['post_code'];
    $address=$_SESSION['user']['prefectures'];
    $address1=$_SESSION['user']['address1'];
    $address2=$_SESSION['user']['address2'];
    $manshon=$_SESSION['user']['manshon'];
}
$total = $_SESSION['total'];
echo '</td></tr>';
    echo '<form action="reji2.php" method="post">';
    echo '<input type="hidden" name="id" value="', $row['id'], '">';
    echo '<div class="input-area">';
    echo '<h3>名前(漢字)<h3>';
    echo '<input type="text" class="text" name="kanji" value="', $kanji, '" placeholder="例）山田　花子" required/>';
    echo '     <h3>名前(カナ)<h3>';
    echo '     <input type="text" class="text" name="kana" value="', $kana, '" placeholder="例）ヤマダ　ハナコ" required/>';
    echo '    </div>';
    echo '    <div class="input-area">';
    echo '     <h3>お届け先住所<h3>';
    echo '     <input type="text" class="text" name="yuubin" placeholder="郵便番号" value="', $post_code, '" required/><br>';
    echo '     <input type="text" class="text" name="address" placeholder="都道府県" value="', $address, '" required/><br>';
    echo '     <input type="text" class="text" name="zyuusho1" placeholder="住所1" value="', $address1, '" required/><br>';
    echo '     <input type="text" class="text" name="zyuusho2" placeholder="住所2" value="', $address2, '" required/><br>';
    echo '     <input type="text" class="text" name="manshon" value="', $manshon, '" placeholder="例）マンション　101"/>';
    echo '    </div>';

    echo '    <div class="input-area">';
    echo '     <h3>メールアドレス<h3>';
    echo '     <input type="text" class="text" name="mail" value="', $email, '" placeholder="例）111111@gmail.com" required/>';
    echo '    </div>';

    echo '    <div class="input-area">';
    echo '     <h3>オリジナルTシャツのデザインの送り方<h3>';
    echo '     <label class="okuri">';
    echo '        <select name="okuri" required>';
    echo '        <option value="郵送">郵送</option>';
    echo '        <option value="メール">メール</option>';
    echo '        <option value="LINE">LINE</option>';
    echo '        </select>';
    echo '      </label>';
    echo '    </div>';
    echo '    <div class="input-area">';
    echo '    <h3>支払い方法<h3>';
    echo '    <label class="harai">';
    echo '        <select name="harai" required>';
    echo '        <option value="振り込み">振り込み</option>';
    echo '        <option value="クレジット">クレジット</option>';
    echo '        </select>';
    echo '    </label>';
    echo '    </div>';


    echo '    <div class="input-area">';
    echo '        <h3>合計金額</h3>';
    echo  '<h2>',number_format($total),'円</h2>';
    echo '    </div>';

    echo '    <table>';
    echo '    <tr>';
    echo '    <td>',  '<input type="button" onclick="history.back()" value="カートへ戻る" class="modo">', '</td>';
    echo '    <td>',  '<button class="kaku">確認</button>', '</td>';
    echo '    </tr>';
    echo '    </table>';
    echo '    </from>';
?>
</label>
<?php require 'footer.php'; ?>
</body>

