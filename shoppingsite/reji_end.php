<?php session_start(); ?>
<?php session_destroy(); ?>
<?php require 'header.php'; ?>
<?php if($_SERVER["REQUEST_METHOD"] != "POST"){
            header("Location: reji.php");
            exit();
        }
?>
<style>
    .output {
    text-align: center;
    }
</style>


<body>
    <?php
    unset($_SESSION['product']);   
    ?>
    <div class="output">
        <h2>商品の購入が完了しました<br></h2>
        <h2>購入ありがとうございました。<br></h2>
        <h2><a href="home.php">購入</a>を続ける</h2>
    </div> 
</body>