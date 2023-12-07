<?php session_start(); ?>
<?php require 'headerhome.php'; ?>
<h1>カテゴリーから探す</h1>
<div class="image-grid">
    <div>
        <a href="T-shirt-list.php"> <img src="./image/white.png" alt="Tシャツ" style="height: 300px; width: 300px;" ></a>
        <h2>Tシャツ</h2>
    </div>
    <div>
    <a href="Polo-shirt-list.php"><img src="./image/polo.png" alt="ポロシャツ" style="height: 300px; width: 300px;"></a>
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
<img src="image/tyun.png" width="500" height="500" alt="">
<img src="image/kikuya.png" width="300" height="500" alt="">
<img src="image/tyun.png" width="500" height="500" alt="">
<img src="image/ninja.png" width="300" height="500" alt="">
</div>


<?php require 'footer.php'; ?>