<?php require 'header.php'; ?>
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
    <form action="reji2.php" method="post">
        <div class="input-area">
         <h3>名前(漢字)<h3>
         <input type="text" class="text" name="name" placeholder="名前"/>
         <h3>名前(カナ)<h3>
         <input type="text" class="text" name="kana" placeholder="ナマエ"/>
        </div>
        <div class="input-area">
         <h3>お届け先住所<h3>
         <input type="text" class="text" name="yuubin" placeholder="郵便番号"/>
         <input type="button" value="住所検索"><br>
         <input type="text" class="text" name="zyuusho1" placeholder="住所1"/><br>
         <input type="text" class="text" name="zyuusho2" placeholder="住所2"/><br>
         <input type="text" class="text" name="manshon" placeholder="マンション名"/>
        </div>

        <div class="input-area">
         <h3>電話番号(ハイフンなし)<h3>
         <input type="text" class="text"  name="call" placeholder="11122223333"/>
        </div>
        <div class="input-area">
         <h3>メールアドレス<h3>
         <input type="text" class="text" name="mail"/>
        </div>

        <div class="input-area">
         <h3>オリジナルTシャツのデザインの送り方<h3>
         <label class="okuri">
            <select name="okuri">
            <option value="郵送">郵送</option>
            <option value="メール">メール</option>
            <option value="LINE">LINE</option>
            </select>
          </label>
        </div>
        <div class="input-area">
        <h3>支払い方法<h3>
        <label class="harai">
            <select name="harai">
            <option value="振り込み">振り込み</option>
            <option value="クレジット">クレジット</option>
            </select>
        </label>
        </div>

        <div class="input-area">
            <h3>会員登録するかどうか</h3>
                <label><input type="radio" name="touroku" value="会員登録する"/> 会員登録する</label>
                <label><input type="radio" name="touroku" value="会員登録しない" />会員登録しない</label>
        </div>
        <p><button class="kaku">確認</button></p>
        </from>
    </body>
</center>
<?php require 'footer.php'; ?>
