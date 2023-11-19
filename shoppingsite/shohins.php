
<?php require 'header.php'; ?>
<?php require 'db-connect.php'; ?>
<body>
    <!--<nav>
        <ol class="navigation">
            <li><a href="./home.php">Home</a></li>
            <li><a href="./home.php">Home</a></li>
        </ol>
    </nav>-->
    <?php
    echo '<table>';
    $pdo=new PDO($connect,USER,PASS);
    if(isset($_POST['keyword'])){
        $sql=$pdo->prepare('select * from product where name like ?');
        $sql->execute(['%'.$_POST['keyword'].'%']);
    }else{
        $sql=$pdo->query('select * from product');
    }
    foreach($sql as $row){
        $id=$row['id'];
        echo '<tr>';
        echo '<td>',$row['image'],'</td>';
        echo '<a href="shohin-list.php?id=', $id, '">', $row['name'], '</a>';   
        echo '<td>',$row['price'],'</td>';   
        echo '</td>';
        echo '<td>',$row['price'],'</td>';
        echo '</tr>';
    }
    echo '</table>';
    ?>
</body>
    <div class="footer">
        <?php require 'footer.php'; ?>
    </div>