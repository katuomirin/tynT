<?php session_start(); ?>
<?php require 'header.php'; ?>
<?php require 'db-connect.php';?>
<link rel="stylesheet" href="./css/favorite.css">
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<body>
<?php
    echo '<h1>お気に入り商品一覧</h1>';
    if(isset($_SESSION['user'])){
    $sql = $pdo->prepare('SELECT * FROM favorite INNER JOIN product ON favorite.product_id = product.id WHERE user_id = ?');
    $sql->execute([$_SESSION['user']['id']]);
    echo '<div class="item">';
            foreach ($sql as $row) {
                $id = $row['id'];
                echo '<div class="shohins">';
                echo '<a href="T-details.php?id=', $id, '"><img class="img" alt="image" src="image/',$row['image'], '.png"></a>';
                echo '<div class="choice-list" data-postid="', $id, '">
                        <div class="checkbox heart"></div>
                    </div>';
                echo '<a href="T-details.php?id=', $id, '">', $row['name'], '</a>';
                echo '<p class="price">', $row['price'], '</p></div>';
                
            }
            echo   '<script>
                    $(function() {
                        var $favorite = $(\'.checkbox\'), //お気に入りボタンセレクタ
                        productId;
                        $favorite.on(\'click\',function(e){
                            //カスタム属性（postid）に格納された投稿ID取得
                            productId = $(this).parents(\'.choice-list\').data(\'postid\'); 
                            console.log("クリック前の処理");
                            console.log("ID=" + productId);
                            if (!$(this).hasClass("is-checked")) {
                                console.log("クリック前の処理");
                            }
                            $(this).toggleClass("is-checked");
                            if ($(this).hasClass("is-checked")) {
                                console.log("クリック後の処理");
                                $.ajax({
                                    type: "POST",
                                    url: "favorite-delete.php",
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
                    });
                </script>';
        echo '</div>';
    }
    ?>
    </body>
<?php require 'footer.php'; ?>