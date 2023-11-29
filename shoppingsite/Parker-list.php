<?php require 'header.php'; ?>
<?php require 'db-connect.php'; ?>
<link rel="stylesheet" href="./css/shohins.css">
<body>
    <ol class="breadcrumb-001">
        <li><a href="./home.php">ホーム</a></li>
        <li><a href="Parker-list.php">パーカー</a></li>
    </ol>
    <?php
    $T="パーカー";
    $pdo=new PDO($connect,USER,PASS);
    
    $sql = $pdo->prepare('select * from product where category = :category');
    $sql->bindParam(':category', $T, PDO::PARAM_STR);
    $sql->execute();
    
    echo '<div class="item">';
    foreach ($sql as $row) {
        $id = $row['id'];
        echo '<div class="shohins">';
        echo '<a href="T-details.php?id=', $id, '"><img class="img" alt="image" src="image/',$row['image'], '.png"></a>';
        echo '<div class="choice-list">
                <div class="checkbox heart"></div>
              </div>';
        echo '<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>';
        echo   '<script>
                    $(".checkbox").click(function() {
                        if (!$(this).hasClass("is-checked")) {
                            console.log("クリック前の処理");
                        }
                        $(this).toggleClass("is-checked");
                        if ($(this).hasClass("is-checked")) {
                            console.log("クリック後の処理");
                            var productId = ' . $id . '; // 商品IDを取得
                            $.ajax({
                                type: "POST",
                                url: "favorite-incert.php",
                                data: {id: productId},
                                success: function(response) {
                                    // レスポンスを処理する（必要に応じて）
                                    console.log(response);
                                },
                                error: function(error) {
                                    console.error(error);
                                }
                            });
                        }
                    });
                </script>';
        echo '<a href="T-details.php?id=', $id, '">', $row['name'], '</a>';
        echo '<p class="price">', $row['price'], '</p></div>';
    }
    echo '</div>';
?>
</body>
<div class="footer">
<?php require 'footer.php'; ?>
</div>