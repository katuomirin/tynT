<?php require 'headerhome.php'; ?>
<?php
        echo '<form action="reji2.php" method="post">';
        echo '<input type="text"  name="nnnnn" >';
        echo '<h3>名前(漢字)<h3>';
        echo '<input type="text"  name="aaa" >';
        echo '<h3>名前(ナマエ)<h3>';
        echo '<input type="text"  name="kana" placeholder="ナマエ">';

        echo '<h3>お届け先住所<h3>';
        echo '<input type="text"  name="bangou" placeholder="郵便番号"> <input type="submit" value="住所検索">';
        echo '<input type="password"  name="password" >';
        echo '<input type="submit" value="確定">';
        echo '<input type="password"  name="password" >';

    ?>
<?php require 'footer.php'; ?>
