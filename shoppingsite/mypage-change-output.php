<?php session_start(); ?>
<?php require 'db-connect.php'; ?>
<?php require 'header.php'; ?>

<link rel="stylesheet" href="./css/mypage-change-output.css">

<style>
    body {
        font-family: 'Arial', sans-serif;
        background-color: #f4f4f4;
        color: #333;
    }

    .container {
        max-width: 800px;
        margin: 0 auto;
        padding: 20px;
        background-color: #fff;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    button {
        display: block; /* 変更：ブロック要素に変更 */
        width: 100%; /* 変更：横幅を100%に設定 */
        margin: 10px 0; /* 変更：マージンを設定 */
        padding: 10px 20px;
        font-size: 16px;
        cursor: pointer;
        border: none;
        border-radius: 5px;
    }

    button:hover {
        background-color: #555;
        color: #fff;
    }

    button.home-btn {
        background-color: #3498db;
        color: #fff;
    }

    button.mypage-btn {
        background-color: #2ecc71;
        color: #fff;
    }

    .image-container {
        display: flex;
        flex-direction: column; /* 変更：縦に並べるように設定 */
        align-items: center;
    }

    .image-container img {
        margin-bottom: 10px; /* 変更：画像とボタンの間に隙間を設定 */
    }
    p {
        font-size: 18px;
        color: #0066cc;
    }
</style>

<?php
$kana = $kanji = $email = $password = $birthday = $gender = $post_code
    = $prefectures = $address1 = $address2 = $manshon = '';

$kana = $_POST['kana'];
$kanji = $_POST['kanji'];
$email = $_POST['email'];
$password = $_POST['password'];
$birthday = $_POST['birthday'];
$post_code = $_POST['post_code'];
$prefectures = $_POST['prefectures'];
$address1 = $_POST['address1'];
$address2 = $_POST['address2'];
$manshon = $_POST['manshon'];

$pdo = new PDO($connect, USER, PASS);

if (!empty($_POST['password'])) {
    $hashedPassword = password_hash($_POST['password'], PASSWORD_DEFAULT);
} else {
    $hashedPassword = '';
}

if (isset($_SESSION['user'])) {
    $id = $_SESSION['user']['id'];
    $sql = $pdo->prepare('select * from user where id!=? and email=?');
    $sql->execute([$id, $_POST['email']]);
} else {
    $sql = $pdo->prepare('select * from user where email=?');
    $sql->execute([$_POST['email']]);
}

if (empty($sql->fetchAll())) {
    if (isset($_SESSION['user'])) {
        if (!empty($hashedPassword)) {
            $sql = $pdo->prepare('update user set kana=?, kanji=?, email=?,birthday=?, post_code=?, prefectures=?, address1=?, address2=?, manshon=?, password=? where id=?');
            $sql->execute([
                $_POST['kana'], $_POST['kanji'], $_POST['email'], $_POST['birthday'],
                $_POST['post_code'], $_POST['prefectures'], $_POST['address1'], $_POST['address2'], $_POST['manshon'],
                $hashedPassword, $id
            ]);
        } else {
            $sql = $pdo->prepare('update user set kana=?, kanji=?, email=?,birthday=?, post_code=?, prefectures=?, address1=?, address2=?, manshon=? where id=?');
            $sql->execute([
                $_POST['kana'], $_POST['kanji'], $_POST['email'], $_POST['birthday'],
                $_POST['post_code'], $_POST['prefectures'], $_POST['address1'], $_POST['address2'], $_POST['manshon'], $id
            ]);
        }

        $_SESSION['user'] = [
            'id' => $id, 'kana' => $_POST['kana'],
            'kanji' => $_POST['kanji'], 'email' => $_POST['email'],
            'password' => $_POST['password'], 'birthday' => $_POST['birthday'],
            'post_code' => $_POST['post_code'], 'prefectures' => $_POST['prefectures'],
            'address1' => $_POST['address1'],
            'address2' => $_POST['address2'],
            'manshon' => $_POST['manshon'],
            'password' => $hashedPassword
        ];

        echo '<div class="container">';
echo '<p>お客様情報を更新しました。</p>';

echo '<div class="image-container">';
        echo '<a href="home.php"><img src="image/home.png" alt=""></a>';
        echo '<button class="home-btn" onclick="location.href=\'home.php\'">ホームへ</button>';
        echo '<a href="mypage.php"><img src="image/my.png" alt=""></a>';
        echo '<button class="mypage-btn" onclick="location.href=\'mypage.php\'">マイページへ</button>';
        echo '</div>';
        echo '</div>';

    }
}
?>

<?php require 'footer.php'; ?>
