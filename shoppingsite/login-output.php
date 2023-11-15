<?php session_start(); ?>
<?php require 'db-connect.php'; ?>
<!DOCTYPE html>
<html>
    <head>
    <meta charset="UTF-8">
    <title></title>
    </head>
<body>
<?php
unset($_SESSION['user']);
$pdo=new PDO($connect, USER, PASS);

// $_POST['login'] がセットされているか確認
if (isset($_POST['login'])) {
    $sql=$pdo->prepare('select * from user where email=?');
    $sql->execute([$_POST['login']]);
    foreach ($sql as $row) {
        if (password_verify($_POST['password'], $row['password']) == true) {
            $_SESSION['user']=[
                'id'=>$row['id'], 'kana'=>$row['kana'],
                'kanji'=>$row['kanji'], 'email'=>$row['email'],
                'password'=>$row['password'], 'birthday'=>$row['birthday'],
                'gender'=>$row['gender'], 'post_code'=>$row['post_code'],
                'prefectures'=>$row['prefectures'], 'address1'=>$row['address2'],
                'manshon'=>$row['manshon'], 'card_num'=>$row['card_num'],
                'card_date'=>$row['card_date'],'card_name'=>$row['card_name'],
                'user_status'=>$row['user_status'],'user_registration'=>$row['lost_login']];
        }
    }
}

if (isset($_SESSION['user'])) {
    echo 'ようこそ、', $_SESSION['user']['kana'], '様。';
    echo '<form action="home.php" method="post">';
    echo '<p><button type="submit" class="button-003">ホーム画面へ</button></p>';
    echo '</form>';
} else {
    echo 'メールアドレス、またはパスワードが違います。';
    echo '<form action="login.php" method="post">';
    echo '<p><button type="submit" class="button-003">ログイン画面へ戻る</button></p>';
    echo '</form>';
}
?>
</body>
</html>
<?php
$pdo = null;   //DB切断
?>
<?php require 'footer.php'; ?>

