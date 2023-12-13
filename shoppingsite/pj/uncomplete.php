<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>未実装</title>
    <style>
        @keyframes rainbowAnimation {
            0% {
                background-position: 0% 50%;
            }

            100% {
                background-position: 100% 50%;
            }
        }

        .hereComeTheRainbow {
            background: linear-gradient(to right, red, orange, yellow, green, blue, indigo, violet);
            background-size: 200% auto;
            /* This line is important */
            background-clip: text;
            -webkit-background-clip: text;
            color: transparent;
            animation: rainbowAnimation 3s linear infinite;
            font-size: 300px;
        }
    </style>
</head>

<body>
    <h1 class="hereComeTheRainbow">未実装</h1>
    
</body>

</html>