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
    if (empty($_POST[''])) {
        echo '商品説明を入力してください。';
    } else
    if (!preg_match('/[0-9]+/', $_POST['price'])) {
        echo '商品価格を整数で入力してください。';
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
    echo '<tr>';
    echo '<td>', $row['id'], '</td>';
    echo '<td>', $row['name'], '</td>';
    echo '<td>', $row['ex'], '</td>';
    echo '<td>', $row['price'], '</td>';
    echo '<td>', $row['image'], '</td>';
    echo '<td>', $row['koshinbi'], '</td>';
    echo '</tr>';
    echo "\n";
}
?>
</body>
</html>