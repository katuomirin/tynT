<?php session_start(); ?>
<?php require 'header.php'; ?>

<style>
    div{
        text-align:right;
    }

    .susumu {
    display: flex;
    justify-content: center;
    align-items: right;
    width: 200px;
    margin:0 auto;
    padding: .9em 2em;
    border: none;
    border-radius: 5px;
    box-shadow: 0 2px 3px rgb(0 0 0 / 25%), 0 2px 3px -2px rgb(0 0 0 / 15%);
    background-color: #eae206;
    color: #fff;
    font-weight: 600;
    font-size: 1em;
}

.susumu:hover {
    background-color: #dad200;
}

.modo {
    display: flex;
    justify-content: center;
    align-items: center;
    width: 250px;
    margin: 0 auto;
    padding: .9em 2em;
    border: 1px solid #2589d0;
    border-radius: 5px;
    background-color: #fff;
    color: #2589d0;
    font-size: 1em;
}

.modo:hover {
    border: none;
    background-color: #2589d0;
    color: #fff;
    font-weight: 600;
}

</style>

<?php
if (isset($_SESSION['user'])) {
    echo '<table>';
    echo '<tr><th>商品番号</th><th>商品名</th><th>価格</th><th>個数</th></tr>';
$sql->execute([$_SESSION['user']['id']]);
foreach($sql as $row){
    $id=$row['id'];
    echo '<tr>';
    echo '<td>',$id,'</td>';
    echo '<td><a href="shohin-list.php?id=',$id,'">',$row['name'],'</a></td>';
    echo '<td>',$row['price'],'</td>';
    echo '<td><a href="cart-delete.php?id=',$id,'">削除</a></td>';
    echo '</tr>';
}
    echo '<tr><td>合計</td><td></td><td></td><td></td><td>', $total, '</td><td></td></tr>';
    echo '</table>';
} else {
    echo 'カートに追加されていません。';
}
?>


    <form action="reji.php">
        <button class="susumu">レジに進む</button>
    </form>
<form action="home.php">
    <button class="modo">ホームへ戻る</button>
</form>
    <?php require 'footer.php'; ?>