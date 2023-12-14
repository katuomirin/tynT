<style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        a{
            color: #447ac5;
        }

        .container {
            max-width: 800px;
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: center;
        }

        th {
            background-color: #f2f2f2;
        }

        img {
            max-width: 100%;
            height: auto;
        }

        .input-button {
            display: flex;
            justify-content: space-between;
        }

        .modo, .susumu {
            display: flex;
            justify-content: center;
            align-items: center;
            width: 250px;
            margin: 10px;
            padding: .9em 2em;
            border: 1px solid #2589d0;
            border-radius: 5px;
            background-color: #fff;
            color: #2589d0;
            font-size: 1em;
            text-decoration: none;
            transition: all 0.3s ease-in-out;
        }

        .susumu:hover, .modo:hover {
            border: none;
            background-color: #2589d0;
            color: #fff;
            font-weight: 600;
        }

        .susumu:disabled {
            background-color: #ccc;
            cursor: not-allowed;
        }

        .error-message {
            color: red;
            margin-top: 10px;
        }
    </style>
    <title>カート</title>
</head>
<body>

<div class="container">
    <?php
    if (!empty($_SESSION['product'])) {
        echo '<table>';
        echo '<tr><th>商品画像</th><th>商品名</th><th>数量</th><th>加工費</th><th>小計</th><th>削除</th></tr>';
        $total = 0;

        foreach ($_SESSION['product'] as $id => $product) {
            echo '<tr>';
            echo '<td>', '<a href="T-details.php?id=', $id, '"><img class="img" style="width: 100px;" alt="image" src="image/', $product['image'], '.png"></a>', '</td>';
            echo '<td>', '<a href="T-details.php?id=', $id, '">',$product['name'],'</a>', '</td>';
            echo '<td>', $product['quantity'], '</td>';
            echo '<td>', number_format($product['processingFee']), '円</td>';
            echo '<td>', number_format($product['subtotal']), '円</td>';
            echo '<td><a href="cart-delete.php?id=', $id, '">削除</a></td>';
            echo '</tr>';

            $total += $product['subtotal'];
        }
        echo '<tr><td>合計</td><td></td><td></td><td></td><td>', number_format($total), '円</td><td></td></tr>';
        echo '</table>';

        if ($product['quantity'] === 0) {
            echo '<h3 class="error-message">※数量が「0」の商品があります。削除してください。</h3>';
        }
    } else {
        echo '<p>カートに追加されていません。</p>';
    }
    ?>

    <div class="input-button">
        <form action="home.php">
            <button class="modo">ホームへ戻る</button>
        </form>
    <?php
        if(isset($_SESSION['user'])){
            echo '<form action="reji.php" method="post">';
            if (!empty($_SESSION['product']) && $product['subtotal']) {
                echo '<button class="susumu">レジに進む</button>';
                $_SESSION['total'] = $total;
            } else {
                echo '<button class="susumu" disabled>レジに進む</button>';
            }
        }else{
            echo '<form action="reji-guest.php" method="post">';
            if (!empty($_SESSION['product']) && $product['subtotal']) {
                echo '<button class="susumu">レジに進む</button>';
                $_SESSION['total'] = $total;
            } else {
                echo '<button class="susumu" disabled>レジに進む</button>';
            }
        }
        ?>
        </form>
    </div>
</div>