<?php session_start(); ?>
<?php require 'header-logout.php'; ?>
<style>
    body {
        font-family: 'Arial', sans-serif;
        background-color: #f4f4f4;
        margin: 0;
        padding: 0;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        height: 100vh;
    }

    .container {
        max-width: 600px;
        text-align: center;
        padding: 20px;
        background-color: #fff;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .message {
        font-size: 18px;
        margin-bottom: 20px;
    }

    .link {
        color: #3498db;
        text-decoration: none;
        font-weight: bold;
    }

    .link:hover {
        text-decoration: underline;
    }
</style>
<?php
if (isset($_SESSION['user'])) {
    unset($_SESSION['user']);
    echo '<div class="container">';
    echo '<p class="message">ログアウトしました。</p>';
    echo '<a href="home.php" class="link">ホームへ戻る</a>';
    echo '</div>';
} else {
    echo '<div class="container">';
    echo '<p class="message">すでにログアウトしています。</p>';
    echo '<a href="home.php" class="link">ホームへ戻る</a>';
    echo '</div>';
}
?>
<?php require 'footer.php'; ?>
