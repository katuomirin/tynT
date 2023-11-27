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
        justify-content: center; 
        align-items: center; 
    }
</style>


<body>
    <div class="zenbu">
    <?php
    unset($_SESSION['product']);
            echo '<h2>商品の購入が完了しました</h2>';
            echo '<p><h2><a href="home.php">購入</a>を続ける</h2></p>';
            echo '<p><a href="create.php">オリジナルTシャツデザインの送付方法</a></p>';
    ?>   
    </div>   
</body>