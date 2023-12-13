<?php session_start(); ?>
<?php require 'header.php'; ?>
<style>
.zenbu {
    display: flex; 
    justify-content: center; 
    align-items: center; 
}

/* ---------------------テキストの表示---------------------------------- */
.input-area{
    text-align: center;
    padding: 50px 0;
    color: #2c2c2f;
    background: #dcdcdc; /*背景色*/
}

.input-area p { 
    border: 1px solid black;
    display: inline-block;
    padding-left: 10px;/* 内側の左 */
    padding-right: 10px;/* 内側の右 */
    padding-top: 10px;/* 内側の上 */
    padding-bottom: 10px;/* 内側の下 */
    letter-spacing: 0.5em;
    text-indent: 0.5em;/*letter-spacingと同じサイズのemを書く */
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
<?php
        if($_SERVER["REQUEST_METHOD"] != "POST"){
            header("Location: reji2.php");
            exit();
        }
        if(isset($_SESSION['user'])){
            $id=$_SESSION['user']['id'];
            $kana=$_SESSION['user']['kana'];
            $kanji=$_SESSION['user']['kanji'];
            $email=$_SESSION['user']['email'];
            $post_code=$_SESSION['user']['post_code'];
            $prefectures=$_SESSION['user']['prefectures'];
            $address1=$_SESSION['user']['address1'];
            $address2=$_SESSION['user']['address2'];
            $manshon=$_SESSION['user']['manshon'];
        }
        
?>



    <body>
    <?php $total = $_SESSION['total'];?>
    <label class="zenbu">
        <form action="reji_end.php" method="post">

            <h2>名前(漢字)</h2>
            <div class="input-area">
            <h2><?php echo htmlspecialchars($kanji,ENT_QUOTES,'UTF-8');?><h2>
            </div>

            
            <h2>名前(フリガナ)</h2>
            <div class="input-area">
            <h2><?php echo htmlspecialchars($kana,ENT_QUOTES,'UTF-8');?></2>
            </div>
            
            
            
            <h2>お届け先住所</h2>
            <div class="input-area">
                <h2><?php echo htmlspecialchars($post_code,ENT_QUOTES,'UTF-8');?><br>
                <?php echo htmlspecialchars($prefectures,ENT_QUOTES,'UTF-8');?><br>
                <?php echo htmlspecialchars($address1,ENT_QUOTES,'UTF-8');?><br>
                <?php echo htmlspecialchars($address2,ENT_QUOTES,'UTF-8');?><br>
                <?php echo htmlspecialchars($manshon,ENT_QUOTES,'UTF-8');?></h2>
            </div>

            

            
            <h2>メールアドレス</h2>
            <div class="input-area">
                <h2><?php echo htmlspecialchars($email,ENT_QUOTES,'UTF-8');?></h2>
            </div>
            
            <?php
            echo '<h2>オリジナルTシャツのデザインの送り方</h2>';
            echo '    <label class="okuri">';
            echo '    <select name="okuri" required>';
            echo '        <option value="郵送">郵送</option>';
            echo '        <option value="メール">メール</option>';
            echo '        <option value="LINE">LINE</option>';
            echo '    </select>';
            echo '    </label>';
            

            echo '<h2>支払い方法</h2>';
            echo '    <label class="harai">';
            echo '    <select name="harai" required>';
            echo '    <option value="振り込み">振り込み</option>';
            echo '    <option value="クレジット">クレジット</option>';
            echo '    </select>';
            echo '    </label>';
            ?>

            <h2>合計金額</h2>
            <div class="input-area">
                <h2><?php echo number_format($total),'円';?></h2>
            </div>

            <?php
            echo '<input type="hidden" name="id" value="', $id, '">';
            echo '<input type="hidden" name="okuri" value="', $okuri, '">';
            echo '<input type="hidden" name="harai" value="', $harai, '">';
           ?>

            <table>
            <tr>
            <td><input type="button" onclick="history.back()" value="カートへ戻る" class="modo"></td>
            <td><button class="kaku">商品の購入を確定</button></td>
            </tr>
            </table>
            </form>
        </label>
        <?php require 'footer.php'; ?>
    </body>
