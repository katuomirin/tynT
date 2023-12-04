<?php require 'header.php'; ?>

<?php
        if($_SERVER["REQUEST_METHOD"] != "POST"){
            header("Location: reji.php");
            exit();
        }

        $kanji = $_POST['kanji'];
        $kana = $_POST['kana'];
        $yuubin = $_POST['yuubin'];
        $zyuusho1 = $_POST['zyuusho1'];
        $zyuusho2 = $_POST['zyuusho2'];
        $manshon = $_POST['manshon'];
        $call = $_POST['call'];
        $mail = $_POST['mail'];
        $okuri = $_POST['okuri'];
        $harai = $_POST['harai'];
?>
<style>
.zenbu {
    display: flex; 
    justify-content: center; 
    align-items: center; 
}

/* -------------------------------------------------------------------- */
.input-area{
    padding: auto;
    margin: auto;
    color: #2c2c2f;
    background: #dcdcdc; /*背景色*/
}
.input-area p { 
    margin: 0;
    padding: 0;
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
/* =======*/
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
        <form action="reji_end.php" method="post">
            <div class="input-area">
            <h3>名前(漢字)</h3>
            <?php echo htmlspecialchars($kanji,ENT_QUOTES,'UTF-8');?>
            <input type="button" onclick="history.back()" value="変更" class="btn-border">
            </div>
            <div class="input-area">
            <h3>名前(フリガナ)</h3>
            <?php echo htmlspecialchars($kana,ENT_QUOTES,'UTF-8');?>
            <input type="button" onclick="history.back()" value="変更" class="btn-border">
            </div>
            
            <div class="input-area">
                <h3>お届け先住所</h3>
                <?php echo htmlspecialchars($yuubin,ENT_QUOTES,'UTF-8');?><br>
                <?php echo htmlspecialchars($zyuusho1,ENT_QUOTES,'UTF-8');?><br>
                <?php echo htmlspecialchars($zyuusho2,ENT_QUOTES,'UTF-8');?><br>
                <?php echo htmlspecialchars($manshon,ENT_QUOTES,'UTF-8');?>
                <input type="button" onclick="history.back()" value="変更" class="btn-border">
            </div>

            <div class="input-area">
                <h3>電話番号</h3>
                <?php echo htmlspecialchars($call,ENT_QUOTES,'UTF-8');?>
                <input type="button" onclick="history.back()" value="変更" class="btn-border">
            </div>

            <div class="input-area">
                <h3>メールアドレス</h3>
                <?php echo htmlspecialchars($mail,ENT_QUOTES,'UTF-8');?>
                <input type="button" onclick="history.back()" value="変更" class="btn-border">
            </div>

            <div class="input-area">
                <h3>オリジナルTシャツのデザインの送り方</h3>
                <?php echo $okuri;?>
                <input type="button" onclick="history.back()" value="変更" class="btn-border">
            </div>

            <div class="input-area">
                <h3>支払い方法</h3>
                <?php echo $harai;?>
                <input type="button" onclick="history.back()" value="変更" class="btn-border">
            </div>

            <div class="input-area">
                <h3>合計金額</h3>
            </div>
            <p><button class="kaku">商品購入を確定する</button></p>
            </label>
                <p><input type="button" onclick="history.back()" value="戻る" class="modo"></p>
                <?php require 'footer.php'; ?>
        
            </form>
    </body>