
<?php require 'header.php'; ?>
<?php require 'db-connect.php'; ?>
<link rel="stylesheet" href="./css/shohins.css">
<body>
    <!--<nav>
        <ol class="navigation">
            <li><a href="./home.php">Home</a></li>
            <li><a href="./home.php">Home</a></li>
        </ol>
    </nav>-->
    <?php
    $pdo=new PDO($connect,USER,PASS);
    if(isset($_POST['keyword'])){
        $sql=$pdo->prepare('select * from product where name like ?');
        $sql->execute(['%'.$_POST['keyword'].'%']);
    }else{
        $sql=$pdo->query('select * from product');
    }
    foreach ($sql as $row) {
        $id = $row['id'];
        echo '<table>';
        echo '<tr>';
        echo '<td><img alt="image" style="hight: 200px; src="image/',$row['image'],'.png"></p></td>';
        echo '<td>';
        echo '<a href="shohin-list.php?id=', $id, '">', $row['name'], '</a>';
        echo '</td>';
        echo '<td>', $row['price'], '</td>';
        echo '<td>', $row['ex'], '</td>';
        echo '</tr>';
        echo '</table>';
    }
    ?>
</body>
    <div class="footer">
        <?php require 'footer.php'; ?>
    </div>