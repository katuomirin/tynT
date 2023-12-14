<?php session_start(); ?>
<?php require 'headerhome.php'; ?>
<link rel="stylesheet" href="css/home.css">
<h1>カテゴリーから探す</h1>
<div class="image-grid">
    <div>
        <a href="T-shirt-list.php"> <img src="./image/white.png" alt="Tシャツ" style="height: 300px; width: 300px;" ></a>
        <h2>Tシャツ</h2>
    </div>
    <div>
    <a href="Polo-shirt-list.php"><img src="./image/polo-white.png" alt="ポロシャツ" style="height: 300px; width: 300px;"></a>
        <h2>ポロシャツ</h2>
    </div>
    <div>
    <a href="Sweat-list.php"><img src="./image/swe.png" alt="スウェット" style="height: 300px;width: 300px;"></a>
        <h2>スウェット</h2>
    </div>
    <div>
    <a href="Parker-list.php"><img src="./image/parker-white.png" alt="パーカー" style="height: 300px; width: 300px;"></a>
        <h2>パーカー</h2>
    </div>
    
</div>
<h1>お客様のデザイン例</h1>

<div class="slider">
<img src="image/tyun2.png" width="500" height="500" alt="">
<img src="image/kikuya2.png" width="300" height="500" alt="">
<img src="image/tyun2.png" width="500" height="500" alt="">
<img src="image/ninja2.png" width="300" height="500" alt="">
</div>

<footer id="footer">
		<div class="inner">
			<div id="info" class="grid">
				<div class="logo">
					<a href="home.php" rel="home">ちゅんＴオリジナル<span>Ｔシャツ</span><span>OriginalT-shirt</span></a>
				</div>
				<div class="info">
					<p class="tel"><span>電話:</span> 0120-000-000</p>
					<p class="open">受付時間: 平日 AM 10:30 〜 PM 5:30</p>
				</div>
			</div>
			<div class="menu">
				<ul class="footnav">
					<a href="home.php">ちゅんTオリジナルTシャツ作成</a>
					<a href="kiyaku.php">利用規約</a>
					<a href="create.php">デザイン作成方法</a>
					<a href="contact.php">お問い合わせ</a>
			</div>
		</div>
	</footer>
<?php require 'footer.php'; ?>