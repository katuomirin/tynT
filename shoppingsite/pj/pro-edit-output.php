<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/detail.css">
</head>
<body>
    <?php
$pdo=new PDO($connect, USER, PASS);
    $sql=$pdo->prepare('update product set name=?, ex=?, price=?, size=?, color=?, sozai=?, image=? where id=?');
    if (empty($_POST['name'])) {
        echo '商品名を入力してください。';
    } else
    if (empty($_POST['ex'])) {
        echo '商品説明を入力してください。';
    } else
    if (!preg_match('/[0-9]+/', $_POST['price'])) {
        echo '商品価格を整数で入力してください。';
    } else
    if (empty($_POST['size'])) {
        echo '商品サイズを入力してください。';
    } else
    if (empty($_POST['color'])) {
        echo '商品色を入力してください。';
    } else
    if (empty($_POST['sozai'])) {
        echo '商品素材を入力してください。';
    } else
    if (!preg_match('/[0-9]+/', $_POST['zaiko'])) {
        echo '商品在庫を整数で入力してください。';
    } else
    if($sql->execute([htmlspecialchars($_POST['name']),$_POST['ex'], $_POST['price'],$_POST['size'],$_POST['color'],$_POST['sozai'],$_POST['image'], $_POST['id']])){
        echo '<font color="red">更新に成功しました。</font>';
    }else{
        echo '<font color="red">更新に失敗しました。</font>';
    }
    
?>
        <hr>
<?php
foreach ($pdo->query('select * from product') as $row) {
        echo '<p>商品番号：' . $row['id'] . '</p>';
        echo '<p>商品名：' . $row['name'] . '</p>';
        echo '<p>商品名：' . $row['ex'] . '</p>';
        echo '<p>価格：' . $row['price'] . '</p>';
        echo '<p>サイズ：' . $row['size'] . '</p>';
        echo '<p>色：' . $row['color'] . '</p>';
        echo '<p>素材：' . $row['sozai'] . '</p>';
        echo '<p>在庫：' . $row['zaiko'] . '</p>';
        echo '<img src="' . $row['image'] . '" alt="Product Image" width="200" height="150">';
    echo "\n";
}
?>
</body>
</html>