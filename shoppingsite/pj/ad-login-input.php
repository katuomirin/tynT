<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>管理者ログイン</title>
</head>
<body>

<?php require 'header.php'; ?>
<h1>ログイン</h1>
<form action="ad-login-output.php" method="post">
ID<input type="text" name="login"><br>
パスワード<input type="password" name="pass"><br>
<input type="submit" value="ログイン">
</form>
    
<?php require 'footer.php'; ?>

</body>
</html>