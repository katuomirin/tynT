
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
    <div class="shohin">
        <?php
        $pdo=new PDO($connect,USER,PASS);
        if(isset($_POST['keyword'])){
            $sql=$pdo->prepare('select * from product where name like ?');
            $sql->execute(['%'.$_POST['keyword'].'%']);
        }else{
            echo '一致する商品がありません';
            $sql=$pdo->query('select * from product');
        }
        foreach ($sql as $row) {
            $id = $row['id'];
            echo '<img alt="image" style="width: 40px; height: 40px;" src="image/',$row['image'], '.png"><br>';
            echo '<a href="T-details.php?id=', $id, '">', $row['name'], '</a><br>';
            echo '<td>', $row['price'], '</td><br>';
        }
        ?>
    </div>
</body>
    <div class="footer">
        <?php require 'footer.php'; ?>
    </div>