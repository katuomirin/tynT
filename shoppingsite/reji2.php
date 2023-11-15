<?php require 'header.php'; ?>

<?php
        if($_SERVER["REQUEST_METHOD"] != "POST"){
            header("Location: reji.php");
            exit();
        }

        $name = $_POST['name'];
        $kana = $_POST['kana'];
        $yuubin = $_POST['yuubin'];
        $zyuusho1 = $_POST['zyuusho1'];
        $zyuusho2 = $_POST['zyuusho2'];
        $manshon = $_POST['manshon'];
        $call = $_POST['call'];
        $mail = $_POST['mail'];
        $okuri = $_POST['okuri'];
        $harai = $_POST['harai'];
        $touroku = $_POST['touroku'];
?>
<style>

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
.kaku{
            display: flex;
            justify-content: center;
            align-items: center;
            width: 250px;
            margin:0 auto;
            padding: .9em 2em;
            border: 1px solid #2589d0;
            border-radius: 25px;
            background-color: #fff;
            color: #2589d0;
            font-size: 1em;
        }
/* -----------------会員登録するかどうか-------------------- */
.touroku {
    display: flex;
    flex-wrap: wrap;
    gap: .3em 2em;
    border: none;
}

.touroku label {
    display: flex;
    align-items: center;
    gap: 0 .5em;
    position: relative;
    cursor: pointer;
}

.touroku label::before,
.touroku label:has(:checked)::after {
    border-radius: 50%;
    content: '';
}

.touroku label::before {
    width: 18px;
    height: 18px;
    background-color: #e6edf3;
}

.touroku label:has(:checked)::after {
    position: absolute;
    top: 50%;
    left: 9px;
    transform: translate(-50%, -50%);
    width: 10px;
    height: 10px;
    background-color: #2589d0;
    animation: anim-radio-001 .3s linear;
}

@keyframes anim-radio-001 {
    0% {
        box-shadow: 0 0 0 1px transparent;
    }
    50% {
        box-shadow: 0 0 0 10px #2589d033;
    }
    100% {
        box-shadow: 0 0 0 10px transparent;
    }
}

.touroku input {
    display: none;
}
</style>

<center>
    <body>
        <form action="reji_end1.php" method="post">
            
            <div class="input-area">
            <h3>名前(漢字)</h3>
            <?php echo htmlspecialchars($name,ENT_QUOTES,'UTF-8');?>
            <h3>名前(カナ)</h3>
            <?php echo htmlspecialchars($kana,ENT_QUOTES,'UTF-8');?>
            <input type="button" onclick="history.back()" value="変更" class="btn-border">
            </div>
            
            <div class="input-area">
                <h3>お届け先住所</h3>
                <?php echo htmlspecialchars($yuubin,ENT_QUOTES,'UTF-8');?><br>
                <?php echo htmlspecialchars($zyuusho1,ENT_QUOTES,'UTF-8');?><br>
                <?php echo htmlspecialchars($zyuusho2,ENT_QUOTES,'UTF-8');?>
                <?php echo htmlspecialchars($manshon,ENT_QUOTES,'UTF-8');?>
                <input type="button" onclick="history.back()" value="変更" class="btn-border">
            </div>

            <div class="input-area">
                <h3>電話番号(ハイフンなし)</h3>
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
                <h3>会員登録するかどうか</h3>
                <?php echo $touroku;?>
            </div>

            <div class="input-area">
                <p><input type="button" onclick="history.back()" value="戻る" class="btn-border"></p>
                <p><button class="kaku">商品購入を確定する</button></p>
            </div>
        </form>
    </body>
</center>