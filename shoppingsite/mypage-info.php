<?php require 'header.php'; ?>
<?php require 'db-connect.php'; ?>
<link rel="stylesheet" href="./css/mypage.css">
<body>
<?php
    $pdo = new PDO($connect, USER, PASS);
        $sql = $pdo->prepare('select * from user where id=?');
    $sql->execute([$_GET['id']]);
    foreach ($sql as $row){
        echo '<h1>Hi,',$row['kanji'],'</h1>';
        
    }
?>
</body>
<?php require 'footer.php'; ?>