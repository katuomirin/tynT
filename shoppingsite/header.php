<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<title>CSS入門-ヘッダーとフッターの固定表示</title>
<link rel="stylesheet" href="css/header.css">
<link rel="stylesheet" href="css/search.css">
<link rel="stylesheet" href="css/hum.css">
<link rel="stylesheet" href="css/news.css">
<link rel="stylesheet" href="css/create.css">
<style>
/* 既存のスタイルは省略 */
/* 以下は現在のスタイルに追加 */
body {
  font-weight: 400;
  margin: 20px; /* bodyの外側の余白を指定する */
  padding: 60px 10px 50px 10px; /* bodyの内側余白を指定する(上:右:下:左) */
}
.Header {
  /* 既存のスタイル */
  border-bottom: 1px solid #000000; /* 下部に1pxの線を描画 */
}

.Header {
  position: fixed; /* ヘッダーを固定する */
  top: 0; /* 上部から配置の基準位置を決める */
  left: 0; /* 左から配置の基準位置を決める */
  width: 100%; /* ヘッダーの横幅を指定する */
  height: 65px; /* ヘッダーの高さを指定する（上下に10pxずつ増加） */
  background-color: #ffffff; /* ヘッダーの背景色を指定する */
  color: #000000; /* フォントの色を指定する */
  display: flex;
  align-items: center; /* 要素を垂直方向に中央揃え */
  padding: 10px 0; /* 上下の余白を10pxずつ増やす */
}

.Header img {
  margin: 0 10px; /* ログイン画像の両側の余白を設定 */
  width: 50px; /* 画像の幅を指定 */
  height: 50px; /* 画像の高さを指定 */
}

.SearchBox {
  margin-left: 20px; /* 検索ボックスとログイン画像の間隔を広げる */
  display: flex;
  align-items: center; /* 検索ボックス内の要素を垂直方向に中央揃え */
  background-color: #000000; /* 検索ボックスの背景色を指定 */
  border-radius: 5px; /* 検索ボックスを角丸にする */
  padding: 8px 15px; /* 検索ボックスの内側余白を指定 */
}

.SearchBox input[type="text"] {
  border: none;
  width: 220px; /* 検索ボックスの幅を指定 */
  padding: 5px;
  border-radius: 5px;
  outline: none; /* フォーカス時の枠線を非表示にする */
}

.SearchBox button {
  background-color: #00008b; /* ボタンの背景色を指定 */
  border: none;
  border-radius: 5px;
  color: #ffffff; /* ボタンのテキスト色を指定 */
  padding: 5px 10px; /* ボタンの内側余白を指定 */
  margin-left: 10px; /* ボタンの左側の余白を設定 */
  cursor: pointer; /* カーソルをポインターに変更 */
}

.Contents {
  width: 100%; /* コンテンツの横幅を指定する */
  overflow: auto; /* コンテンツの表示を自動に設定（スクロール） */
}

/* 以下は追加されたスタイル */
main {
  padding: 50px;
}

main h1 {
  font-weight: 400;
  text-align: center;
}

nav {
  display: block;
  position: fixed;
  background-color: #ffffff;
  width: 220px;
  top: 0;
  left: 0; /* 左上に配置する */
  bottom: 0;
  transition: all 0.5s;
  z-index: 3;
  opacity: 0;
}

.open nav {
  left: 0;
  opacity: 1;
}

nav .inner {
  padding: 25px;
}

nav .inner ul {
  list-style: none;
  margin: 0;
  padding: 0;
}

nav .inner ul li {
  margin: 0;
  border-bottom: 1px solid #333;
}

nav .inner ul li a {
  display: block;
  color: #333;
  font-size: 14px;
  padding: 1rem;
  text-decoration: none;
  transition-duration: 0.2s;
}

nav .inner ul li a:hover {
  background: #e4e4e4;
}

.toggle-btn {
  display: block;
  position: fixed;
  top: 30px;
  left: 30px;
  width: 30px;
  height: 30px;
  z-index: 3;
  cursor: pointer;
}

.toggle-btn span {
  position: absolute;
  display: block;
  left: 0;
  width: 30px;
  height: 2px;
  background-color: #333;
  transition: all 0.5s;
  border-radius: 4px;
}

.toggle-btn span:nth-child(1) {
  top: 4px;
}

.toggle-btn span:nth-child(2) {
  top: 14px;
}

.toggle-btn span:nth-child(3) {
  bottom: 4px;
}

.open .toggle-btn span {
  background-color: #fff;
}

.open .toggle-btn span:nth-child(1) {
  transform: translateY(10px) rotate(-315deg);
}

.open .toggle-btn span:nth-child(2) {
  opacity: 0;
}

.open .toggle-btn span:nth-child(3) {
  transform: translateY(-10px) rotate(315deg);
}

#mask {
  display: none;
  transition: all 0.5s;
}

.open #mask {
  display: block;
  background: #000;
  width: 100%;
  height: 100%;
  top: 0;
  left: 0;
  position: fixed;
  opacity: 0.8;
  z-index: 2;
  cursor: pointer;
}

</style>
</head>
<body>
<div class="Header">
<a href="home.php" target="_self">
  <img src="./image/nin.jpg" alt="ホーム" width="75"  border="0">
</a>
    <!-- 検索ボックスを追加 -->
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <form method="get" action="products.php" class="search_container">
    <input type="text" size="25" placeholder="キーワード検索">
    <input type="submit" value="&#xf002">
</form>

    <!-- ログイン画像に枠線を追加 -->
<a href="login.php" target="_self">
  <img src="./image/login.png" alt="ログイン" style="height: 70px; width:75px;" border="0">
</a>

<!-- お気に入り画像に枠線を追加 -->
<a href="favorite-show.php" target="_self">
  <img src="./image/favo.png" alt="お気に入り" style="height: 70px;width:75px;"border="0" >
</a>

<!-- カート画像に枠線を追加 -->
<a href="cart.php" target="_self">
  <img src="./image/cart.png" alt="カート" style="height: 70px;width:75px;" border="0" >
</a>

</div>

<main>
  <!-- ここにコンテンツを追加 -->
</main>

<div id="navArea">
  <nav>
    <div class="inner">
      <ul>
        <li><a></a></li>
        <li><a href="#">ホーム</a></li>
        <li><a href="#">Tシャツ/カットソー</a></li>
        <li><a href="#">ポロシャツ</a></li>
        <li><a href="#">スウェット/トレーナー</a></li>
        <li><a href="#">パーカー</a></li>
        <li><a href="#"></a></li>
      </ul>
    </div>
  </nav>
  
  <div class="toggle-btn">
    <span></span>
    <span></span>
    <span></span>
  </div>
  <div id="mask"></div>
</div>
<script src="script.js"></script>
