<?php require 'header.php'; ?>
<?php
if (isset($_SESSION['user'])) {
    echo '<table>';
    echo '<tr><th>商品番号</th><th>商品名</th><th>価格</th><th></th></tr>';
    $pdo=new PDO('mysql:host=mysql215.phy.lolipop.lan;dbname=LAA1517463-shop;charset=utf8','LAA1517463','Pass0922');
$sql=$pdo->prepare('select * from favorite,product where user_id=? and product_id=id');
$sql->execute([$_SESSION['user']['id']]);
foreach($sql as $row){
    $id=$row['id'];
    echo '<tr>';
    echo '<td>',$id,'</td>';
    echo '<td><a href="detail.php?id=',$id,'">',$row['name'],'</a></td>';
    echo '<td>',$row['price'],'</td>';
    echo '<td><a href="favorite-delete.php?id=',$id,'">削除</a></td>';
    echo '</tr>';
}
    echo '</table>';
} else {
    echo 'お気に入りを表示するにはログインしてください。';
}
?>



<?php require 'footer.php'; ?>