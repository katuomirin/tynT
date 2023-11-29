<?php session_start(); ?>
<?php require 'header.php'; ?>
<?php
    if(isset($_SESSION['user'])){
        unset($_SESSION['user']);
        echo '<p>','ログアウトしました。','</p>';
    }else {
        echo '<p>','すでにログアウトしてます。','</p>';
    }
    ?>
<?php require 'footer.php'; ?>