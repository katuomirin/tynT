<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Header</title>
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/header.css">
    <style>
        .Header {
            /* 既存のスタイル */
            position: fixed; /* ヘッダーを固定する */
            top: 0; /* 上部から配置の基準位置を決める */
            left: 0; /* 左から配置の基準位置を決める */
            width: 100%; /* ヘッダーの横幅を指定する */
            background-color: #EEF9FF; /* ヘッダーの背景色を指定する */
            color: #000000; /* フォントの色を指定する */
            display: flex;
            align-items: center; /* 要素を垂直方向に中央揃え */
            padding: 15px 0; /* 上下の余白を10pxずつ増やす */
            border-bottom: 1px solid #000000; /* 下部に1pxの線を描画 */
            z-index: 1;
        }

        .Header a {
            text-decoration: none;
            color: #000; /* Adjust color as needed */
            margin: 0 10px; /* Adjust spacing as needed */
            text-align: center; /* Center the text below the icon */
        }

        .Header a img {
            display: block; /* Make the image a block to allow text underneath */
            margin: 0 auto; /* Center the image */
            width: 50px; /* 画像の幅を指定 */
            height: 50px; /* 画像の高さを指定 */
        }

        .Header a p {
            margin: 3px; /* No additional space around the paragraph */
            padding-bottom: 3px; /* Space from text to the bottom of the header */
        }
    </style>
</head>
<body>
<div class="Header">
    <a href="admin.php" target="_self">
      <img src="./image/home.png" alt="ホーム">
      <p>ホーム</p>
    </a>

    <a href="logout.php" target="_self">
      <img src="./image/logout.png" alt="ログアウト" style="height:50px; width:50px;">
      <p>ログアウト</p>
    </a>
</div>

<script src="script.js"></script>
</body>
</html>
