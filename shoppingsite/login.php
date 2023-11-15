<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="./css/q.css">
    <title>ログイン画面</title>
</head>
<body>
<h2 class="heading-027">Log-in</h2>
<form action="login-output.php" method="post">
    <label>
    <span class="textbox-001-label">メールアドレス</span>
    <input type="text" class="textbox-001" name="login" placeholder="メールアドレス" />
    </label>
    <label>
    <span class="textbox-001-label">パスワード　　</span>
    <input type="password" class="textbox-001" name="password" placeholder="パスワード"/>
    </label>
    <p><button class="button-003">ログイン</button></p>
    </form>
    <p class="center-element"><a href="pass1.php">＊パスワードを忘れた方はこちら</a></p>
    <form action="join.php" method="post">
    <p><button type="submit" class="button-003">新規登録</button></p>
    </form>
</body>
</html>
