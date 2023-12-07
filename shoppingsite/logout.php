<?php session_start(); ?>
<?php require 'header.php'; ?>
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

.heading-006 {
    color: #333;
}

.button-002 {
    background-color: #3498db;
    color: #fff;
    border: none;
    padding: 10px 20px;
    margin: 10px;
    cursor: pointer;
    border-radius: 5px;
    font-size: 16px;
    transition: background-color 0.3s ease;
}

.button-002:hover {
    background-color: #217dbb;
}

.button-cancel {
    background-color: #fff;
    color: #3498db;
    border: 2px solid #3498db;
    padding: 10px 20px;
    margin: 10px;
    cursor: pointer;
    border-radius: 5px;
    font-size: 16px;
    transition: background-color 0.3s ease;
}

.button-cancel:hover {
    background-color: #f0f8ff;
}

/* Additional styles for better alignment and spacing */
form {
    display: flex;
    flex-direction: column;
    align-items: center;
}

h3 {
    margin-bottom: 20px;
}
</style>
<body>
    <h2 class="heading-006">ログアウト画面</h2>
    <h3>本当にログアウトしますか？</h3>

    <!-- Redirect to logout-output.php on clicking the "ログアウト" button -->
    <form action="logout-output.php" method="post">
        <button type="submit" class="button-002">ログアウト</button>
    </form>
    <form action="mypage.php" method="post">
        <button class="button-cancel">キャンセル</button>
    </form>
</body>
</html>
