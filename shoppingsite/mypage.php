<?php session_start(); ?>
<?php require 'header.php'; ?>
<?php require 'db-connect.php'; ?>
<link rel="stylesheet" href="./css/mypage.css">
<body>
    <?php
    echo '<form action="mypage-change.php" method="post">';
    $pdo = new PDO($connect, USER, PASS);
    $user_id = $_SESSION['user']['id'];
    $checkSql = $pdo->prepare('SELECT * FROM favorite WHERE user_id = ? AND product_id = ?');
        
    if(isset($_SESSION['user'])){
        $user = $_SESSION['user'];
        echo '<h1>Hi,',$user['kanji'],'</h1>';
        echo '<p class="cart">カート</p>';
        echo '<div class="carts">';
        if(isset($_SESSION['cart_data']) && !empty($_SESSION['cart_data'])){
            foreach($_SESSION['cart_data'] as $cart){
                $id = $cart['id'];
                echo '<div class="shohins">';
                echo '<a href="T-details.php?id=', $id, '"><img class="img" alt="image" src="image/',$cart['image'], '.png"></a>';
                $checkSql->execute([$user_id, $id]);
                if ($checkSql->rowCount() > 0) {
                    echo '<div class="choice-list1" data-postid1="', $id, '">
                            <div class="checkbox1 heart"></div>
                          </div>';
                } else {
                    echo '<div class="choice-list" data-postid="', $id, '">
                            <div class="checkbox heart"></div>
                          </div>';
                }
                echo '<a href="T-details.php?id=', $id, '">', $cart['name'], '</a>';
                echo '<p class="price">', $cart['price'], '</p></div>';
            }
        }else{
            echo 'カートに商品が入っていません。';
        }
        echo "</div>";
        echo '<p class="favorite">お気に入り</p>';
        echo '<div class="favorites">';
        if(isset($_SESSION['favorite_data']) && !empty($_SESSION['favorite_data'])){
            foreach($_SESSION['favorite_data'] as $favorite){
                $id = $favorite['id'];
                echo '<div class="shohins">';
                echo '<a href="T-details.php?id=', $id, '"><img class="img" alt="image" src="image/',$favorite['image'], '.png"></a>';
                $checkSql->execute([$user_id, $id]);
                if ($checkSql->rowCount() > 0) {
                    echo '<div class="choice-list1" data-postid1="', $id, '">
                            <div class="checkbox1 heart"></div>
                          </div>';
                } else {
                    echo '<div class="choice-list" data-postid="', $id, '">
                            <div class="checkbox heart"></div>
                          </div>';
                }
                echo '<a href="T-details.php?id=', $id, '">', $favorite['name'], '</a>';
                echo '<p class="price">', $favorite['price'], '</p></div>';
            }
        }else{
            echo 'お気に入りに商品が入っていません。';
        }
        echo   '<script>
                    $(function() {
                        var $favorite = $(\'.checkbox1\'), //お気に入りボタンセレクタ
                        productId;
                        $favorite.on(\'click\',function(e){
                            //カスタム属性（postid）に格納された投稿ID取得
                            productId = $(this).parents(\'.choice-list1\').data(\'postid1\'); 
                            console.log("クリック前の処理");
                            console.log("ID=" + productId);
                            if (!$(this).hasClass("is-checked1")) {
                                console.log("クリック前の処理");
                                $.ajax({
                                    type: "POST",
                                    url: "favorite-insert.php",
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
                            $(this).toggleClass("is-checked1");
                            if ($(this).hasClass("is-checked1")) {
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
                            $(this).toggleClass("is-checked");
                            if ($(this).hasClass("is-checked")) {
                                console.log("クリック後の処理");
                                $.ajax({
                                    type: "POST",
                                    url: "favorite-insert.php",
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
        echo "</div>";

        echo '<a href="mypage-info.php" class="mypage-info-button">マイページ情報</a>';
        echo '<p><a href="logout.php" >ログアウト</a></p>';
    }else{
        echo '<p>ログイン情報が見つかりません。<br>もう一度ログインしてください</p>';
        echo '<a href="login.php">ログイン</a>';
    }
    echo '</form>';
?>
</body>
<?php require 'footer.php'; ?>