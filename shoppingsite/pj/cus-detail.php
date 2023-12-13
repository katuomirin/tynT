<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>顧客情報</title>
    <link rel="stylesheet" href="css/detail.css">
</head>
<body>
<?php require 'header.php'; ?>
<?php require 'db-connect.php'; ?>
<div class="container">
<?php
        $pdo = new PDO($connect, USER, PASS);
        $sql=$pdo->prepare('select * from user where id=?');
        $sql->execute([$_REQUEST['id']]);
        foreach($sql as $row){
        echo '<div class="container">';

        echo '<div class="edit-delete-buttons">';
        echo '<a href="cus-delete.php?id='.$row['id'].'" onclick="return confirm(\'この商品を削除しますか？\')"><img src="./image/trash-bin.png" alt="Delete" width="25" height="25"></a>';
        echo '</div>';
        
        echo '</div>'; // Closing the .image div
        echo '<div class="content">';
        echo '<table>';
        echo '<tr><td>顧客番号：</td><td>' . $row['id'] . '</td></tr>';
        echo '<tr><td>名前（漢字）：</td><td>' . $row['kanji'] . '</td></tr>';
        echo '<tr><td>名前（フリガナ）：</td><td>' . $row['kana'] . '</td></tr>';
        echo '<tr><td>メール：</td><td>' . $row['email'] . '</td></tr>';
        echo '<tr><td>パスワード：</td><td>' . $row['password'] . '</td></tr>';
        echo '<tr><td>誕生日：</td><td>' . $row['birthday'] . '</td></tr>';
        echo '<tr><td>性別：</td><td>' . $row['gender'] . '</td></tr>';
        echo '<tr><td>郵便番号：</td><td>' . $row['post_code'] . '</td></tr>';
        echo '<tr><td>都道府県：</td><td>' . $row['prefectures'] . '</td></tr>';
        echo '<tr><td>住所1：</td><td>' . $row['address1'] . '</td></tr>';
        echo '<tr><td>住所2：</td><td>' . $row['address2'] . '</td></tr>';
        echo '<tr><td>マンション：</td><td>' . $row['manshon'] . '</td></tr>';
        echo '</table>';

        echo '<input type="hidden" name="id" value="'.$row['id'].'">';
        echo '<input type="hidden" name="kanji" value="'.$row['kanji'].'">';
        echo '<input type="hidden" name="kana" value="'.$row['kana'].'">';
        echo '<input type="hidden" name="email" value="'.$row['email'].'">';
        echo '<input type="hidden" name="password" value="'.$row['password'].'">';
        echo '<input type="hidden" name="birthday" value="'.$row['birthday'].'">';
        echo '<input type="hidden" name="gender" value="'.$row['gender'].'">';
        echo '<input type="hidden" name="post_code" value="'.$row['post_code'].'">';
        echo '<input type="hidden" name="prefectures" value="'.$row['prefectures'].'">';
        echo '<input type="hidden" name="address1" value="'.$row['address1'].'">';
        echo '<input type="hidden" name="address2" value="'.$row['address2'].'">';
        echo '<input type="hidden" name="manshon" value="'.$row['manshon'].'">';
        echo '</div>'; // Closing the .content div
        echo '</div>';
        echo '</div>'; // Closing the .product-container div
        echo '<p><a href="ad-customer.php"><img src="./image/undo.png" alt="Detail" width="30" height="30"></a></p>';
    }

        ?>
    </div> 
<?php require 'footer.php'; ?>  
</div>   
</body>
</html>