<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Working</title>
    <style>
        * {
            padding: 0;
            margin: 0;
            font-family: sans-serif;
        }

        body {
            background: #262626;
        }

        i {
            color: red;
        }

        .container {
            text-align: center;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 100%;
        }

        .container span {
            text-transform: uppercase;
            display: block;
        }

        .text1 {
            color: #ffffff;
            font-size: 60px;
            font-weight: 700;
            letter-spacing: 10px;
            margin-bottom: 20px;
            background: #262626;
            position: relative;
            animation: text 4s ease-in-out;
        }

        .text2 {
            font-size: 30px;
            font-weight: 300;
            color: #f0932b;
        }

        .text3 {
            padding-top: 10px;
            font-size: 16px;
            text-transform: none !important;
            font-weight: 300;
            color: #6ab04c;
        }

        @keyframes text {
            0% {
                color: #262626;
                margin-bottom: -60px;
            }

            30% {
                letter-spacing: 40px;
                margin-bottom: -60px;
            }

            85% {
                letter-spacing: 8px;
                margin-bottom: -60px;
            }
        }
    </style>
</head>

<body>
    <div class="container">
        <span class="text1">link&band</span>
        <span class="text2"> we are working on it </span>
    </div>
</body>

</html>