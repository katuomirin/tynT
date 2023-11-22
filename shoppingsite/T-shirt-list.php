
<?php require 'header.php'; ?>
<?php require 'db-connect.php'; ?>
<link rel="stylesheet" href="./css/shohins.css">
<body>
    <ol class="breadcrumb-001">
        <li><a href="#">ホーム</a></li>
        <li><a href="#">カテゴリー</a></li>
        <li><a href="#">タイトル</a></li>
    </ol>
    <?php
    $T="Tシャツ";
    $pdo=new PDO($connect,USER,PASS);
    
    $sql = $pdo->prepare('select * from product where category = :category');
    $sql->bindParam(':category', $T, PDO::PARAM_STR);
    $sql->execute();
    
        foreach ($sql as $row) {
            $id = $row['id'];
            echo '<img alt="image" style="width: 40px; height: 40px;" src="image/',$row['image'], '.png"><br>';
            echo '<a href="T-details.php?id=', $id, '">', $row['name'], '</a><br>';
            echo '<td>', $row['price'], '</td><br>';
        }
    ?>
</body>
    <div class="footer">
        <?php require 'footer.php'; ?>
    </div>