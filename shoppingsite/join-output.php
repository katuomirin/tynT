<?php session_start(); ?>
<?php require 'db-connect.php'; ?>
<?php require 'header.php'; ?>
<?php
$pdo=new PDO($connect, USER, PASS);
$hashedPassword = password_hash($_POST['password'], PASSWORD_DEFAULT);
if (isset($_SESSION['user'])){
    $id=$_SESSION['user']['id'];
    $sql=$pdo->prepare('select * from user where id!=? and email=?');
    $sql->execute([$id, $_POST['email']]);
}else{
    $sql=$pdo->prepare('select * from user where email=?');
    $sql->execute([$_POST['email']]);
}
if(empty($sql->fetchAll())){
    if(isset($_SESSION['user'])){
    }else{
        $sql=$pdo->prepare('insert into user values(null,?,?,?,?,?,?,?,?,?,?,?)');
        $pass=password_hash($_POST['password'],PASSWORD_DEFAULT);
        $sql->execute([
            $_POST['kana'], $_POST['kanji'],
            $_POST['email'], $pass,
            $_POST['birthday'],$_POST['gender'],
            $_POST['post_code'], $_POST['prefectures'],
            $_POST['address1'], $_POST['address2'],
            $_POST['manshon']]);
        echo 'お客様情報を登録しました。';
    }
}else{
    echo 'ログイン名がすでに使用されていますので、変更してください。';
}
?>
<?php require 'footer.php'; ?>