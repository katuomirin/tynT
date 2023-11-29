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

        margin: auto;
        width: 100%; 
}
</style>


<body>
    <div class="zenbu">
    <?php
    unset($_SESSION['product']);
            echo '<h2>商品の購入が完了しました</h2>';
    ?>   
    </div>   
</body>