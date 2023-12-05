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
        echo '<h1 class="username">Hi,',$user['kanji'],'</h1><hr>';
        echo '<div class="cart">
                <p><nobr>カート</nobr></p>
                <a href="cart-show.php" class="view">View more＞</a></div>';
        echo '<div class="carts">';
        if(isset($_SESSION['cart_data']) && !empty($_SESSION['cart_data'])){
            foreach($_SESSION['cart_data'] as $cart){
                $c_id = $cart['id'];
                echo '<div class="shohins">';
                echo '<a href="T-details.php?id=', $c_id, '"><img class="img" alt="image" src="image/',$cart['image'], '.png"></a>';
                $checkSql->execute([$user_id, $c_id]);
                if ($checkSql->rowCount() > 0) {
                    echo '<div class="cart-list" data-postid="', $c_id, '">
                            <div class="checkbox heart"></div>
                          </div>';
                } else {
                    echo '<div class="cart-list1" data-postid1="', $c_id, '">
                            <div class="checkbox1 heart"></div>
                          </div>';
                }
                echo '<a href="T-details.php?id=', $c_id, '">', $cart['name'], '</a>';
                echo '<p class="price">', $cart['price'], '</p></div>';
            }
            echo   '<script>
                    $(function() {
                        var $cart = $(\'.checkbox\'), //お気に入りボタンセレクタ
                        cartId;
                        $cart.on(\'click\',function(e){
                            //カスタム属性（postid）に格納された投稿ID取得
                            cartId = $(this).parents(\'.cart-list\').data(\'postid\'); 
                            console.log("クリック前の処理");
                            console.log("ID=" + cartId);
                            if (!$(this).hasClass("cart-checked")) {
                                console.log("クリック前の処理");
                                $.ajax({
                                    type: "POST",
                                    url: "favorite-insert.php",
                                    data: {id: cartId},
                                    success: function(response) {
                                        // レスポンスを処理する（必要に応じて）
                                        console.log(response);
                                    },
                                    error: function(error) {
                                        console.error(error);
                                    }
                                });
                            }
                            $(this).toggleClass("cart-checked");
                            if ($(this).hasClass("cart-checked")) {
                                console.log("クリック後の処理");
                                $.ajax({
                                    type: "POST",
                                    url: "favorite-delete.php",
                                    data: {id: cartId},
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
                        var $cart2 = $(\'.checkbox1\'), //お気に入りボタンセレクタ
                        cartId2;
                        $favorite.on(\'click\',function(e){
                            //カスタム属性（postid）に格納された投稿ID取得
                            cartId2 = $(this).parents(\'.cart-list1\').data(\'postid1\'); 
                            console.log("クリック前の処理");
                            console.log("ID=" + cartId2);
                            if (!$(this).hasClass("cart2-checked")) {
                                console.log("クリック前の処理");
                                $.ajax({
                                    type: "POST",
                                    url: "favorite-delete.php",
                                    data: {id: cartId2},
                                    success: function(response) {
                                        // レスポンスを処理する（必要に応じて）
                                        console.log(response);
                                    },
                                    error: function(error) {
                                        console.error(error);
                                    }
                                });
                            }
                            $(this).toggleClass("cart2-checked");
                            if ($(this).hasClass("cart2-checked")) {
                                console.log("クリック後の処理");
                                $.ajax({
                                    type: "POST",
                                    url: "favorite-insert.php",
                                    data: {id: cartId2},
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
        }else{
            echo 'カートに商品が入っていません。';
        }
        echo "</div>";
        echo '<div class="favorite">
                <nobr><p>お気に入り</p></nobr>
                <a href="favorite-show.php" class="view1">View more＞</a></div>';
        echo '<div class="favorites">';
        if(isset($_SESSION['favorite_data']) && !empty($_SESSION['favorite_data'])){
            foreach($_SESSION['favorite_data'] as $favorite){
                $f_id = $favorite['id'];
                echo '<div class="shohins">';
                echo '<a href="T-details.php?id=', $f_id, '"><img class="img" alt="image" src="image/',$favorite['image'], '.png"></a>';
                $checkSql->execute([$user_id, $f_id]);
                if ($checkSql->rowCount() > 0) {
                    echo '<div class="favo-list" data-postid3="', $f_id, '">
                            <div class="checkbox3 heart"></div>
                          </div>';
                } else {
                    echo '<div class="favo-list2" data-postid4="', $f_id, '">
                            <div class="checkbox4 heart"></div>
                          </div>';
                }
                echo '<a href="T-details.php?id=', $f_id, '">', $favorite['name'], '</a>';
                echo '<p class="price">', $favorite['price'], '</p></div>';
            }
            //お気に入りに商品が入っている場合
            echo   '<script>
                    $(function() {
                        var $favorite = $(\'.checkbox3\'), //お気に入りボタンセレクタ
                        favoId;
                        $favorite.on(\'click\',function(e){
                            //カスタム属性（postid）に格納された投稿ID取得
                            favoId = $(this).parents(\'.favo-list\').data(\'postid3\'); 
                            console.log("クリック前の処理");
                            console.log("ID=" + favoId);
                            if (!$(this).hasClass("favo-checked")) {
                                console.log("クリック前の処理");
                                $.ajax({
                                    type: "POST",
                                    url: "favorite-insert.php",
                                    data: {id: favoId},
                                    success: function(response) {
                                        // レスポンスを処理する（必要に応じて）
                                        console.log(response);
                                    },
                                    error: function(error) {
                                        console.error(error);
                                    }
                                });
                            }
                            $(this).toggleClass("favo-checked");
                            if ($(this).hasClass("favo-checked")) {
                                console.log("クリック後の処理");
                                $.ajax({
                                    type: "POST",
                                    url: "favorite-delete.php",
                                    data: {id: favoId},
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
            //入っていない場合
            echo   '<script>
                    $(function() {
                        var $favorite2 = $(\'.checkbox4\'), //お気に入りボタンセレクタ
                        favoId2;
                        $favorite2.on(\'click\',function(e){
                            //カスタム属性（postid）に格納された投稿ID取得
                            favoId2 = $(this).parents(\'.favo-list2\').data(\'postid4\'); 
                            console.log("クリック前の処理");
                            console.log("ID=" + favoId2);
                            if (!$(this).hasClass("favo-checked2")) {
                                console.log("クリック前の処理");
                                $.ajax({
                                    type: "POST",
                                    url: "favorite-delete.php",
                                    data: {id: favoId2},
                                    success: function(response) {
                                        // レスポンスを処理する（必要に応じて）
                                        console.log(response);
                                    },
                                    error: function(error) {
                                        console.error(error);
                                    }
                                });
                            }
                            $(this).toggleClass("favo-checked2");
                            if ($(this).hasClass("favo-checked2")) {
                                console.log("クリック後の処理");
                                $.ajax({
                                    type: "POST",
                                    url: "favorite-insert.php",
                                    data: {id: favoId2},
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
        }else{
            echo 'お気に入りに商品が入っていません。';
        }
        
        echo "</div>";

        echo '<a href="mypage-info.php" class="user-info">登録情報
                <span class="rink">＞</span></a>';
        echo '<a href="logout.php" class="logout">ログアウト
                <span class="rink2">＞</span></a>';
    }else{
        echo '<p>ログイン情報が見つかりません。<br>もう一度ログインしてください</p>';
        echo '<a href="login.php">ログイン</a>';
    }
    echo '</form>';
?>
</body>
<?php require 'footer.php'; ?>