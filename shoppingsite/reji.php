<?php require 'headerhome.php'; ?>
<?php
        echo '<form action="reji2.php" method="post">';
        echo '<table>';
        echo '<tr><td>名前(漢字)</td><td>';
        echo '<input type="text" name="name">';
        echo '</td></tr>';
        echo '<tr><td>名前(カナ)</td><td>';
        echo '<input type="text"  name="kana">';
        echo '</td></tr>';
        echo '<tr><td>お届け先住所</td><td>';
        echo '<input type="text"  name="yuubin">郵便番号';
        echo '<input type="text"  name="zyuusho">';
        echo '</td></tr>';
        echo '<tr><td>電話番号</td><td>';
        echo '<input type="text" name="ban">';
        echo '</td></tr>';
        echo '</table>';
        echo '<input type="submit" value="確定">';
        echo '</from>';
    ?>
<?php require 'footer.php'; ?>
