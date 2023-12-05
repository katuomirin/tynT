<?php session_start(); ?>
<?php session_destroy(); ?>
<?php require 'header.php'; ?>
<?php if($_SERVER["REQUEST_METHOD"] != "POST"){
            header("Location: reji.php");
            exit();
        }
?>
<style>
    .zenbu {
        display: flex; 
        justify-content: center; 
        align-items: center; 
    }
</style>


<body>
    <label class="zenbu">
    <?php
    unset($_SESSION['product']);   
    ?>
    <h2>商品の購入が完了しました</h2>
    <p><h2>購入ありがとうございました。</h2></p>
    <h2><a href="home.php">購入</a>を続ける</h2> 
    </label> 
</body>