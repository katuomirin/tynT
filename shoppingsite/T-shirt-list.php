<?php session_start(); ?>
<?php require 'header.php'; ?>
<?php require 'db-connect.php'; ?>
<link rel="stylesheet" href="./css/shohins.css">
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<body>
    <ol class="breadcrumb-001">
        <li><a href="./home.php">ホーム</a></li>
        <li><a href="./T-shirt-list.php">Ｔシャツ</a></li>
    </ol>
        <?php
        $T="Tシャツ";
        $pdo=new PDO($connect,USER,PASS);
        
        $sql = $pdo->prepare('select * from product where category = :category');
        $sql->bindParam(':category', $T, PDO::PARAM_STR);
        $sql->execute();

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
                // ページが読み込まれた際にお気に入りの商品IDを取得
                $.ajax({
                    type: "POST",
                    url: "favorite-incert.php",
                    success: function(response) {
                        var favoriteIds = JSON.parse(response);
            
                        // 各お気に入りボタンに対して処理を行う
                        $(".checkbox").each(function() {
                            var productId = $(this).parents(".choice-list").data("postid");
            
                            // お気に入りの商品IDが存在する場合はハートアイコンをチェック済みにする
                            if (favoriteIds.includes(productId)) {
                                $(this).addClass("is-checked");
                            }
                        });
                    },
                    error: function(error) {
                        console.error(error);
                    }
                });
            
                // お気に入りボタンがクリックされた際の処理
                $(".checkbox").on("click", function(e) {
                    var productId = $(this).parents(".choice-list").data("postid");
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
                    });
                </script>';
            echo '</div>';
        ?>
</div>

        <div class="footer">
        <?php require 'footer.php'; ?>
    </div> 
    </body>