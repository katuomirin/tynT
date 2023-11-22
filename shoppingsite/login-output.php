<?php session_start(); ?>
<?php require 'db-connect.php'; ?>
<!DOCTYPE html>
<?php require 'header-user.php'; ?>
<?php
unset($_SESSION['user']);
$pdo=new PDO($connect, USER, PASS);
$sql=$pdo->prepare('select * from user where email=?');
$sql->execute([$_POST['email']]);
foreach ($sql as $row) {
    if(!empty($_POST['password'])&&password_verify($_POST['password'],$row['password'])){
    $_SESSION['user']=[
        'id'=>$row['id'], 'kana'=>$row['kana'],
        'kanji'=>$row['kanji'], 'email'=>$row['email'],
        'password'=>$row['password'], 'birthday'=>$row['birthday'],
        'gender'=>$row['gender'], 'post_code'=>$row['post_code'],
        'prefectures'=>$row['prefectures'], 'address1'=>$row['address2'],
        'manshon'=>$row['manshon']];
}}
if (isset($_SESSION['user'])) {

    echo 'ようこそ、', $_SESSION['user']['kana'], '様。';

}else{
    echo 'ログイン名またはパスワードが違います。';
}
?>
</body>
</html>
<?php
 $pdo = null;   //DB切断
 ?>
