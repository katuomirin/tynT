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
</style>

<?php require 'header.php'; ?>
<div class="container">
<?php
unset($_SESSION['user']);
$pdo=new PDO($connect, USER, PASS);
$sql=$pdo->prepare('select * from user where email=?');
$sql->execute([$_POST['email']]);
foreach ($sql as $row) {
    if(!empty($_POST['password'])&&password_verify($_POST['password'],$row['password'])){
        echo '<form method="post" action="mypage.php">';//マイページでつかうよ
        $_SESSION['user']=[
            'id'=>$row['id'], 'kana'=>$row['kana'],
            'kanji'=>$row['kanji'], 'email'=>$row['email'],
            'password'=>$row['password'], 'birthday'=>$row['birthday'],
            'gender'=>$row['gender'], 'post_code'=>$row['post_code'],
            'prefectures'=>$row['prefectures'], 'address1'=>$row['address1'],
            'address2'=>$row['address2'],
            'manshon'=>$row['manshon']];
        echo '</form>';
    }}
if (isset($_SESSION['user'])) {
    echo '<div class="login-success">';
    echo '<p>ログインに成功しました。</p>';
    echo '<p>ようこそ、', $_SESSION['user']['kana'], '様。</p>';
    
    echo '</div>';
}else{
    echo '<div class="login-error">';
    echo '<p>ログイン名またはパスワードが違います。</p>';
    echo '</div>';
}
?>
</div>
<?php require 'footer.php'; ?>
</html>
<?php
 $pdo = null;   //DB切断
 ?>
