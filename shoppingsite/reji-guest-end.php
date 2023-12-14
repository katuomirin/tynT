<?php session_start(); ?>
<?php require 'header.php'; ?>

<?php
if ($_SERVER["REQUEST_METHOD"] != "POST") {
    header("Location: reji.php");
    exit(); // リダイレクト後にコードの実行を中止する
}
?>

<style>
    .output {
        text-align: center;
    }
</style>

<html>

<head>
    <!-- ここに<head>セクションの内容を追加してください -->
</head>

<body>

<?php require 'db-connect.php'; ?>

    <?php
    $kanji = $_POST['kanji'];
    $kana = $_POST['kana'];
    $yuubin = $_POST['yuubin'];
    $address = $_POST['prefecture'];
    $zyuusho1 = $_POST['zyuusho1'];
    $zyuusho2 = $_POST['zyuusho2'];
    $manshon = $_POST['manshon'];
    $email = $_POST['email'];
    $now = date('Y-m-d');
    $okuri = $_POST['okuri'];
    $harai = $_POST['harai'];
    $total = 100;
    $sql = $pdo->prepare('INSERT INTO guest_order VALUES (null, ?, ?, ?, ?, ?, ?, ?, ?)');
    $sql->execute([$kanji,$kana,$address,$email, $okuri, $harai,$total, $now]);
    
    $lastInsertedId = $pdo->lastInsertId();

    // 最後に挿入されたIDを使用してoder_detailテーブルにデータを挿入
    foreach ($_SESSION['product'] as $id => $product) {
        $product_id = $id;
        $color = '';
        $count=$product['quantity'];

        $sqlDetail = $pdo->prepare('INSERT INTO guest_order_detail VALUES (?, ?, ?, ?)');
        $sqlDetail->execute([$lastInsertedId, $product_id,$color, $count]);
    }
    ?>

    <div class="output">
        <h2>商品の購入が完了しました。<br></h2>
        <h2>購入ありがとうございました。<br></h2>
        <h2><a href="home.php">購入</a>を続ける</h2>
    </div>
    <?php
    unset($_SESSION['product']);
    unset($_SESSION['cart_data']);
    ?>
</body>

</html>
