<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>管理画面</title>
    
</head>
<body>
<?php require 'header.php'; ?>
<style>
    .image-grid {
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
    }
    .image-grid-row {
        display: flex;
        margin-top: 90px;
        flex-direction: column;
        align-items: center;
    }
    .image-grid-row img {
        width: 150px;
        height: 150px;
        object-fit: cover;
        margin: 5px;
    }
    .image-grid-row p {
        text-align: center;
        font-size: 18px;
        margin-top: 5px;
    }
</style>
<div class="image-grid">
    <div class="image-grid-row">
        <div>
        <a href="ad-product.php" target="_self">
            <img src="./image/tshirt.png" alt="商品">
        </a>    
            <p>商品</p>
        </div>
        <div>
        <a href="ad-customer.php" target="_self">
            <img src="./image/group.png" alt="顧客">
        </a>
            <p>顧客</p>
        </div>
    </div>
    <div class="image-grid-row">
        <div>
        <a href="ad-order.php" target="_self">
            <img src="./image/clipboard.png" alt="注文">
        </a>    
            <p>注文</p>
        </div>
        <div>
        <a href="uncomplete.php" target="_self">
            <img src="./image/5-stars.png" alt="レビュー">
        </a>
            <p>レビュー</p>
            
        </div>
    </div>
</div>
<?php require 'footer.php'; ?>
</body>
</html>
