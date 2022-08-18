<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>KU Info Village | エラーページ</title>
    <style>
        body {
            margin: 0;
            background-color: rgb(221, 249, 255);
        }
        .msgArea {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translateX(-50%) translateY(-50%);
            vertical-align: middle;
            width: 55%;
            max-width: 700px;
            margin: 0 auto;
            border: 2px solid black;
            border-radius: 20px;
            text-align: center
        }
        .msgInner {
            width: 90%;
            margin: 0 auto;
            padding: 30px 0;
        }
        .errMsg {
            margin-top: 20px;
        }
        .redirect {
            margin-top: 10px;
        }
        .redirect a {
            color: white;
            cursor: pointer;
            text-decoration: none;
            font-size: 16px;
            font-weight: bold;
            padding: 5px 30px;
            background: linear-gradient(#ff00dd, #ffb1fb);
            border-radius: 10px;
        }
    </style>
</head>
<body>
    <main>
        <div class="msgArea">
            <div class="msgInner">
                @if (Session::has('error'))
                    <p class="errMsg">{{ session('error') }}</p>
                @endif
                <div class="redirect">
                    <a href="{{ route('kuinfo.front') }}">戻る</a>
                </div>
            </div>
        </div>
    </main>
</body>
</html>
