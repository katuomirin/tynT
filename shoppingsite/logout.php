<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="./css/logout.css">
    <title>ログアウト画面</title>
</head>
<body>
    <h2 class="heading-006">ログアウト</h2>
    <h3>本当にログアウトしますか？</h3>

    <!-- Redirect to logout-output.php on clicking the "ログアウト" button -->
    <form action="logout-output.php" method="post">
        <button type="submit" class="button-002">ログアウト</button>
    </form>

    <button class="button-002">キャンセル</button>
</body>
</html>
