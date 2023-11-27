<?php session_start(); ?>
<?php session_destroy(); ?>
<?php require 'header.php'; ?>
<?php if($_SERVER["REQUEST_METHOD"] != "POST"){
            header("Location: reji.php");
            exit();
        }
?>
<body>
    <?php
    unset($_SESSION['product']);
            echo '<h2>商品の購入が完了しました</h2>';
            echo '<h2><a href="home.php">購入</a>を続ける</h2>';
    ?>
</body>