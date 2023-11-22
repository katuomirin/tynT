
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
    $T="パーカー";
    $pdo=new PDO($connect,USER,PASS);
    
        $sql=$pdo->prepare('select * from product where name like ?');
        $sql->execute(['%'.$T.'%']);
    
    foreach ($sql as $row) {
        $id = $row['id'];
        echo '<table>';
        echo '<tr>';
        echo '<td align="center">', '<img alt="image" style="width: 40px; height: 40px;" src="image/',$row['image'], '.png">', '</td>';
        echo '<td>';
        echo '<a href="T-details.php?id=', $id, '">', $row['name'], '</a>';
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