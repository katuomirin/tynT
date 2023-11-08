<?php require 'headerhome.php'; ?>
<style>
    .image-grid {
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
    }
    .image-grid-row {
        display: flex;
        margin: 10px;
        flex-direction: column;
        align-items: center;
    }
    .image-grid-row img {
        width: 200px;
        height: 200px;
        object-fit: cover;
        margin: 5px;
    }
    .image-grid-row p {
        text-align: center;
        font-size: 18px;
        margin-top: 5px;
    }
</style>
<h1>カテゴリーから探す</h1>
<div class="image-grid">
    <div class="image-grid-row">
        <div>
            <img src="./image/white.png" alt="Tシャツ">
            <p>Tシャツ</p>
        </div>
        <div>
            <img src="./image/poro.png" alt="ポロシャツ">
            <p>ポロシャツ</p>
        </div>
        <div>
            <img src="./image/swe.png" alt="スウェット">
            <p>スウェット</p>
        </div>
    </div>
    <div class="image-grid-row">
        <div>
            <img src="./image/paka.png" alt="パーカー">
            <p>パーカー</p>
        </div>
        <div>
            <img src="./image/top.png" alt="タンクトップ">
            <p>タンクトップ</p>
        </div>
    </div>
</div>
<?php require 'footer.php'; ?>
