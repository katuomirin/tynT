<?php require 'headerhome.php'; ?>
<?php
        echo '<form action="reji2.php" method="post">';
        echo '<p><h3>名前(漢字)<h3></P>';
        echo '<p><input type="text"  name="aaa" ></p>';
        echo '<p><h3>名前(ナマエ)<h3></P>';
        echo '<p><input type="text"  name="kana" placeholder="ナマエ"></p>';

        echo '<p><h3>お届け先住所<h3></p>';
        echo '<p><input type="text"  name="bangou" placeholder="郵便番号"> <input type="submit" value="住所検索"></p>';
        echo '<p><input type="password"  name="password" ></p>';
        echo '<p><input type="submit" value="確定"></p>';
        echo '<p><input type="password"  name="password" ></p>';

    ?>
<?php require 'footer.php'; ?>
