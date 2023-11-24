<?php require 'header.php'; ?>
<?php require 'db-connect.php'; ?>
<link rel="stylesheet" href="./css/shohins.css">
<body>
    <ol class="breadcrumb-001">
        <li><a href="./home.php">ホーム</a></li>
        <li><a href="./T-shirt-list.php">Ｔシャツ</a></li>
    </ol>
    <div class="shohins">
        <?php
        $T="Tシャツ";
        $pdo=new PDO($connect,USER,PASS);
        
        $sql = $pdo->prepare('select * from product where category = :category');
        $sql->bindParam(':category', $T, PDO::PARAM_STR);
        $sql->execute();
        
            foreach ($sql as $row) {
                $id = $row['id'];
                echo '<img class="img" alt="image" src="image/',$row['image'], '.png"><br>';
                echo '<a href="T-details.php?id=', $id, '">', $row['name'], '</a>';
                echo '<div class="example2">
                        <input type="checkbox" checked id="1" name="example2"><label for="1"></label>
                      </div><br>';
                echo '<td>', $row['price'], '</td><br>';
            }
        ?>
</body>
    <div class="footer">
        <?php require 'footer.php'; ?>
    </div>