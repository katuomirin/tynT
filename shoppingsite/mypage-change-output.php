<?php session_start(); ?>
<?php require 'db-connect.php'; ?>
<?php require 'header.php'; ?>
<link rel="stylesheet" href="./css/mypage-change-output.css">
<?php

 $kana = $kanji = $email = $password = $birthday = $gender = $post_code
 = $prefectures = $address1 = $address2 = $manshon = '';
 
$kana = $_POST['kana'];
$kanji = $_POST['kanji'];
$email = $_POST['email'];
$password = $_POST['password'];
$birthday = $_POST['birthday'];
$post_code = $_POST['post_code'];
$prefectures = $_POST['prefectures'];
$address1 = $_POST['address1'];
$address2 = $_POST['address2'];
$manshon = $_POST['manshon'];

$pdo=new PDO($connect, USER, PASS);
if(!empty($_POST['password'])){
    $hashedPassword = password_hash($_POST['password'], PASSWORD_DEFAULT);
}else{
    $hashedPassword='';
}
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
        if(!empty($hashedPassword)){
        $sql=$pdo->prepare('update user set kana=?, kanji=?, email=?,birthday=?, post_code=?, prefectures=?, address1=?, address2=?, manshon=?,'.
                           ' password=? where id=?');
        $sql->execute([
            $_POST['kana'], $_POST['kanji'],$_POST['email'],$_POST['birthday'],
            $_POST['post_code'],$_POST['prefectures'],$_POST['address1'],$_POST['address2'],$_POST['manshon'],
            $hashedPassword,$id]);
        }else{
            $sql=$pdo->prepare('update user set kana=?, kanji=?, email=?,birthday=?, post_code=?, prefectures=?, address1=?, address2=?, manshon=?'.
            ' where id=?');
            $sql->execute([
            $_POST['kana'], $_POST['kanji'],$_POST['email'],$_POST['birthday'],
            $_POST['post_code'],$_POST['prefectures'],$_POST['address1'],$_POST['address2'],$_POST['manshon'],$id]);
        }
        $_SESSION['user']=[
            'id'=>$id, 'kana'=>$_POST['kana'],
            'kanji'=>$_POST['kanji'], 'email'=>$_POST['email'],
            'password'=>$_POST['password'], 'birthday'=>$_POST['birthday'],
            'post_code'=>$_POST['post_code'],'prefectures'=>$_POST['prefectures'], 
            'address1'=>$_POST['address1'],
            'address2'=>$_POST['address2'],
            'manshon'=>$_POST['manshon'],
            'password'=>$hashedPassword];
        echo '<p>お客様情報を更新しました。</p>';
    }
}
?>
<?php require 'footer.php'; ?>
