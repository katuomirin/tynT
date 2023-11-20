<?php require 'header.php'; ?>
<?php if($_SERVER["REQUEST_METHOD"] != "POST"){
            header("Location: reji.php");
            exit();
        }
?>
    <center>
        <body>
            <h2>商品の購入が完了しました</h2>
            <h2><a href="home.php">購入</a>を続ける</h2>

        </body>
    </center>