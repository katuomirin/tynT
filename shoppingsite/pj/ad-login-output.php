<?php
session_start();
require 'header.php';
require 'db-connect.php';

unset($_SESSION['admin_id']);
$pdo = new PDO($connect, USER, PASS);
$sql = $pdo->prepare('select * from admin_id where login=?');
$sql->execute([$_POST['login']]);
$user = $sql->fetch();

if ($user && password_verify($_POST['pass'], $user['pass'])) {
    $_SESSION['admin_id'] = [
        'id' => $user['id'],
        'name' => $user['name'],
        'login' => $user['login'],
        'pass' => $user['pass']
    ];
    echo 'いらっしゃいませ、', $_SESSION['admin_id']['login'], 'さん。';
} else {
    echo 'ログイン名またはパスワードが違います。';
}
?>
<?php require 'footer.php'; ?>