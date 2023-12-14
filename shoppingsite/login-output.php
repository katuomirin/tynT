<?php session_start(); ?>
<?php require 'db-connect.php'; ?>
<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f4f4f4;
        margin: 0;
        padding: 0;
    }

    .container {
        max-width: 600px;
        margin: 50px auto;
        padding: 20px;
        background-color: #fff;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .login-success {
        color: #4CAF50;
        border: 1px solid #4CAF50;
        padding: 10px;
        margin-bottom: 20px;
    }

    .login-error {
        color: #D32F2F;
        border: 1px solid #D32F2F;
        padding: 10px;
        margin-bottom: 20px;
    }

    button {
        display: block; /* 変更：ブロック要素に変更 */
        width: 150px; /* 変更：横幅を100%に設定 */
        margin: 10px 0; /* 変更：マージンを設定 */
        padding: 10px 20px;
        font-size: 16px;
        cursor: pointer;
        border: none;
        border-radius: 5px;
    }

    button:hover {
        background-color: #555;
        color: #fff;
    }

    button.home-btn {
        background-color: #3498db;
        color: #fff;
    }

    button.mypage-btn {
        background-color: #2ecc71;
        color: #fff;
    }

    .image-container {
        display: flex;
        flex-wrap: nowrap;
    justify-content: space-around;
        align-items: center;
    }

    .image-container img {
        margin-bottom: 10px; /* 変更：画像とボタンの間に隙間を設定 */
    }
</style>

<?php require 'header.php'; ?>
<div class="container">
    <?php
    unset($_SESSION['user']);
    $pdo = new PDO($connect, USER, PASS);
    $sql = $pdo->prepare('select * from user where email=?');
    $sql->execute([$_POST['email']]);
    
    foreach ($sql as $row) {
        if (!empty($_POST['password']) && password_verify($_POST['password'], $row['password'])) {
            echo '<form method="post" action="mypage.php">';//マイページで使う
            $_SESSION['user'] = [
                'id' => $row['id'], 'kana' => $row['kana'],
                'kanji' => $row['kanji'], 'email' => $row['email'],
                'password' => $row['password'], 'birthday' => $row['birthday'],
                'gender' => $row['gender'], 'post_code' => $row['post_code'],
                'prefectures' => $row['prefectures'], 'address1' => $row['address1'],
                'address2' => $row['address2'],
                'manshon' => $row['manshon']
            ];
            echo '</form>';
        }
    }

    if (isset($_SESSION['user'])) {
        echo '<div class="login-success">';
        echo '<p>ログインに成功しました。</p>';
        echo '<p>ようこそ、', $_SESSION['user']['kana'], '様。</p>';
        echo '<div class="image-container">';
        echo '<div class="home">';
        echo '<a href="home.php"><img src="image/home.png" alt="" style="width: 150px;"></a>';
        echo '<button class="home-btn" onclick="location.href=\'home.php\'">ホームへ</button></div>';
        echo '<div class="mypage">';
        echo '<a href="mypage.php"><img src="image/my.png" alt="" style="width: 150px;"></a>';
        echo '<button class="mypage-btn" onclick="location.href=\'mypage.php\'">マイページへ</button></div>';
        echo '</div>';
        echo '</div>';
    } else {
        echo '<div class="login-error">';
        echo '<p>ログイン名またはパスワードが違います。</p>';
        echo '<div class="image-container">';
        echo '<a href="login.php"><img src="image/onegai.png" style="height: 300px; width:300px;" alt=""></a>';
        echo '<button class="home-btn" onclick="location.href=\'login.php\'">再度ログイン</button>';
        echo '</div>';
    }
    ?>
</div>
<?php require 'footer.php'; ?>
</html>
<?php
$pdo = null; // DB切断
?>
