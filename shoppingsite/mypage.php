<?php session_start(); ?>
<?php require 'header.php'; ?>
<?php require 'db-connect.php'; ?>
<link rel="stylesheet" href="./css/mypage.css">
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<body>
    <?php
    echo '<form action="mypage-change.php" method="post">';
    $pdo = new PDO($connect, USER, PASS);
    $user_id = $_SESSION['user']['id'];
        
    if(isset($_SESSION['user'])){
        $user = $_SESSION['user'];
        echo '<h1 class="username">Hi,',$user['kanji'],'</h1><hr>';
        echo '<div class="cart">
                <p><nobr>カート</nobr></p>
                <a href="cart-show.php" class="view">View more＞</a></div>';
        echo '<div class="carts">';
        if(isset($_SESSION['cart_data']) && !empty($_SESSION['cart_data'])){
            if(isset($_SESSION['cart_data']) && !empty($_SESSION['cart_data'])){
                foreach($_SESSION['cart_data'] as $cart){
                    $c_id = $cart['id'];
                    echo '<div class="shohins">';
                    echo '<a href="T-details.php?id=', $c_id, '"><img class="img" alt="image" src="image/',$cart['image'], '.png"></a>';
                    echo '<div class="choice-list" data-postid="', $c_id, '">';
                    echo '<div class="checkbox heart ';
                    if( check_favolite_duplicate($user_id,$c_id) ){
                        echo 'is-checked';
                    }
                    echo '"></div>';
                    echo '<a href="T-details.php?id=', $c_id, '">', $cart['name'], '</a>';
                    echo '<p class="price">', $cart['price'], '</p></div></div>';
                    }
                }
        }else{
            echo 'カートに商品が入っていません。';
        }
        echo "</div>";
        echo '<div class="favorite">
                <nobr><p>お気に入り</p></nobr>
                <a href="favorite.php" class="view1">View more＞</a></div>';
        echo '<div class="favorites">';
        $fav_sql = $pdo->prepare('SELECT * FROM favorite INNER JOIN product ON favorite.product_id = product.id WHERE user_id = ?');
        $fav_sql->execute([$_SESSION['user']['id']]);
        if($fav_sql->rowCount() > 0){
            foreach ($fav_sql as $row) {
                $id = $row['id'];
                echo '<div class="shohins">';
                echo '<a href="T-details.php?id=', $id, '"><img class="img" alt="image" src="image/',$row['image'], '.png"></a>';
                echo '<div class="choice-list" data-postid="', $id, '">';
                        echo '<div class="checkbox heart ';
                        if( check_favolite_duplicate($user_id,$row['id']) ){
                            echo 'is-checked';
                        }
                        echo '"></div>';
                echo '<a href="T-details.php?id=', $id, '">', $row['name'], '</a>';
                echo '<p class="price">', $row['price'], '</p></div></div>';
            }
        }else{
            echo 'お気に入りに商品が入っていません。';
        }
        echo '</div>';
        echo '<div class="history">
                <nobr><p>購入履歴</p></nobr>
                <a href="rireki-show.php" class="view2">View more＞</a></div>';
        echo '<div class="historys">';
        $his_sql=$pdo->prepare('select * from oder where user_id=? ');
        $his_sql->execute([$_SESSION['user']['id']]);
        if($his_sql->rowCount() > 0){
            foreach($his_sql as $row){
                $his_plo=$pdo->prepare('SELECT * FROM order_detail INNER JOIN product ON order_detail.product_id = product.id WHERE order_id = ?');
                $his_plo->execute([$row['id']]);
                if($his_plo->rowCount() > 0){
                    foreach ($his_plo as $low) {
                        $h_id = $low['id'];
                        echo '<div class="shohins">';
                        echo '<a href="T-details.php?id=', $h_id, '"><img class="img" alt="image" src="image/',$low['image'], '.png"></a>';
                        echo '<div class="choice-list" data-postid="', $h_id, '">';
                                echo '<div class="checkbox heart ';
                                if( check_favolite_duplicate($user_id,$low['id']) ){
                                    echo 'is-checked';
                                }
                                echo '"></div>';
                        echo '<a href="T-details.php?id=', $h_id, '">', $low['name'], '</a>';
                        echo '<p class="price">', $low['price'], '</p></div></div>';
                    }
                }
            }
        }else{
            echo '購入履歴に商品がありません。';
        }
        echo '</div>';
        echo   '<script>
                    $(function() {
                        var $favorite = $(\'.checkbox\'), //お気に入りボタンセレクタ
                        productId;
                        $favorite.on(\'click\',function(e){
                            //カスタム属性（postid）に格納された投稿ID取得
                            productId = $(this).parents(\'.choice-list\').data(\'postid\'); 
                            console.log("ID=" + productId);
                            if (!$(this).hasClass("is-checked")) {
                                console.log("クリック前の処理");
                            }
                            $(this).toggleClass("is-checked");
                            if ($(this).hasClass("is-checked")) {
                                console.log("クリック後の処理");
                            }
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
                        });
                    });
                </script>';
            echo '</div>';
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

<?php
//ユーザーIDと商品IDを元にお気に入り値の重複チェックを行っています
function check_favolite_duplicate($user_id,$product_id){
    global $pdo;
    $sql = "SELECT *
            FROM favorite
            WHERE user_id = :user_id AND product_id = :product_id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(array(':user_id' => $user_id ,
                         ':product_id' => $product_id));
    $favorite = $stmt->fetch();
    return $favorite;
}
?>