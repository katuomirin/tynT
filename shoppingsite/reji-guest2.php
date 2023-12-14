<?php session_start(); ?>
<?php require 'header.php'; ?>
<style>
.zenbu {
    display: flex; 
    justify-content: center; 
    align-items: center; 
}

.modokaku{
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
/* -----------------確定-------------------- */
.kaku, .modo {
    text-align: center;
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
.modo:hover {
    border: none;
    background-color: #2589d0;
    color: #fff;
    font-weight: 600;
}

</style>
<?php
        if($_SERVER["REQUEST_METHOD"] != "POST"){
            header("Location: reji.php");
            exit();
        }
        $id=$_POST['id'];
        $kanji = $_POST['kanji'];
        $kana = $_POST['kana'];
        $yuubin = $_POST['yuubin'];
        $prefecture = $_POST['prefecture'];
        $zyuusho1 = $_POST['zyuusho1'];
        $zyuusho2 = $_POST['zyuusho2'];
        $manshon = $_POST['manshon'];
        $email = $_POST['email'];
        $okuri = $_POST['okuri'];
        $harai = $_POST['harai'];
?>



    <body>
    <?php $total = $_SESSION['total'];?>
    <label class="zenbu">
        <form action="reji-guest-end.php" method="post">

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
                <h2><?php echo htmlspecialchars($yuubin,ENT_QUOTES,'UTF-8');?><br>
                <?php echo htmlspecialchars($prefecture,ENT_QUOTES,'UTF-8');?><br>
                <?php echo htmlspecialchars($zyuusho1,ENT_QUOTES,'UTF-8');?><br>
                <?php echo htmlspecialchars($zyuusho2,ENT_QUOTES,'UTF-8');?><br>
                <?php echo htmlspecialchars($manshon,ENT_QUOTES,'UTF-8');?></h2>
            </div>
           

            
            <h2>メールアドレス</h2>
            <div class="input-area">
                <h2><?php echo htmlspecialchars($email,ENT_QUOTES,'UTF-8');?></h2>
            </div>
            

            <h2>オリジナルTシャツのデザインの送り方</h2>
            <div class="input-area">
                <h2><?php echo $okuri;?><h2>
            </div>
            

            <h2>支払い方法</h2>
            <div class="input-area">
                <h2><?php echo $harai;?></h2>
            </div>
            

            <h2>合計金額</h2>
            <div class="input-area">
                <h2><?php echo number_format($total),'円';?></h2>
            </div>

            <?php
            echo '<input type="hidden" name="kanji" value="', $kanji, '">';
            echo '<input type="hidden" name="kana" value="', $kana, '">';
            echo '<input type="hidden" name="yuubin" value="', $yuubin, '">';
            echo '<input type="hidden" name="prefecture" value="', $prefecture, '">';
            echo '<input type="hidden" name="zyuusho1" value="', $zyuusho1, '">';
            echo '<input type="hidden" name="zyuusho2" value="', $zyuusho2, '">';
            echo '<input type="hidden" name="manshon" value="', $manshon, '">';
            echo '<input type="hidden" name="email" value="', $email, '">';
            echo '<input type="hidden" name="okuri" value="', $okuri, '">';
            echo '<input type="hidden" name="harai" value="', $harai, '">';
           ?>

            <div class="modokaku">
            <table>
            <tr>
            <td><button type="button" onclick="history.back()" value="戻る" class="modo">カートへ戻る</button></td>
            <td><button class="kaku">商品の購入を確定</button></td>
            </tr>
            </table>
            </div>
            </form>
            </label>
           
        <?php require 'footer.php'; ?>
    </body>
