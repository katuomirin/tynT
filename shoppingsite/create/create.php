<?php require '../headerhome.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <title>Tシャツ作成手順</title>
    <link rel="stylesheet" type="text/css" href="./css/create.css">
</head>
<body>
    <header>
        <h1>オリジナルTシャツ作成手順</h1>
        <nav>
            <ul>
                <li><a href="create_design.php">デザインを作成</a></li>
                <li><a href="view_cart.php">カートを見る</a></li>
            </ul>
        </nav>
    </header>
    <main>
        <div class="flow-chart">
            <ul>
                <li><a href="step1.php">ステップ 1: デザインを選択</a></li>
                <li><a href="step2.php">ステップ 2: サイズを選択</a></li>
                <li><a href="step3.php">ステップ 3: カスタマイズオプションを選択</a></li>
                <li><a href="step4.php">ステップ 4: デザインをプレビュー</a></li>
                <li><a href="step5.php">ステップ 5: カートに追加</a></li>
                <li><a href="step6.php">ステップ 6: カートを確認</a></li>
                <li><a href="step7.php">ステップ 7: 注文を確定</a></li>
            </ul>
        </div>
    </main>
    <footer>
        &copy; <?php echo date("Y"); ?> オリジナルTシャツ作成サイト
    </footer>
</body>
</html>
<?php require '../footer.php'; ?>
