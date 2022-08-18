<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="discription" content="">
    <meta property="og:url" content="https://kuinfo123.com" />
    <meta property="og:type" content="website" />
    <meta property="og:title" content="KU Info Village" />
    <meta property="og:description" content="神奈川大学学生専用の授業情報掲示板です。履修の際に参考にしてください。" />
    <meta property="og:site_name" content="KU Info Village" />
    <meta property="og:image" content="" />
    <title>KU Info Village | 神奈川大学授業情報掲示板</title>
    <link rel="icon" href="">
    <link rel="apple-touch-icon" href="">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ url('css/common.css') }}">
    <link rel="stylesheet" href="{{ url('css/common-res.css') }}">
    <link rel="stylesheet" href="{{ url('css/login.css') }}">
    <link rel="stylesheet" href="{{ url('css/login-res.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css?family=Economica:700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Vollkorn" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP&family=Zen+Old+Mincho:wght@700&display=swap" rel="stylesheet">
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script> -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<main>
<!-- ローディング -->
<div id="loading">
<div class="spinner"></div>
</div>
<div class="title">
    <h2>KU Info <br>Village</h2>
</div>
<div class="btns">
    <div class="btns-inner">
        <p class='login'>ログイン</p>
        <p class='n-user'>新規ユーザー</p>
    </div>
</div>
<div class="new-user-box">
    <form action="{{ route('kuinfo.register') }}" method='POST'>
        @csrf
        <div class="batsu">×</div>
        <div class="user-group">
            <label for="email">メールアドレス<br></label>
            <input type="email" name="email" placeholder="メールアドレスを入力" value="{{ old('email') }}" required>
        </div>
        <div class="user-group">
            <label for="username">新規ユーザー名<br></label>
            <input type="text" id='username' name="name" value="{{ old('name') }}" required>
        </div>
        <div class="user-group">
            <label for="password">新規パスワード<br></label>
            <input type="password" id='password' name='password' value="{{ old('password') }}" required>
        </div>
        <div class="user-group">
            <label for="password_conf">新規パスワード(確認用)<br></label>
            <input type="password" id='password_conf' name='password__confirmation' required>
        </div>
        <div class="comp-btn">
            <input type="submit" value='完了'>
        </div>
    </form>
</div>
<div class="login-box">
    <form action="{{ route('kuinfo.login') }}" method="POST">
        @csrf
        @if ($errors->any())
            @foreach ($errors->all() as $error)
                <script>
                    window.alert({{ $error }})
                </script>
            @endforeach
        @endif
        <div class="batsu-b">×</div>
        <div class="login-group">
            <label for="">メールアドレス</label>
            <input type="email" name='email' placeholder='メールアドレスを入力' value="{{ old('email') }}" required>
        </div>
        <div class="login-group">
            <label for="">パスワード</label>
            <input type="password" name='password' required>
        </div>
        <div class="comp-btn-b">
            <input type="submit" value='完了'>
        </div>
    </form>
</div>
</main>
<script src="{{ asset('/js/login.js') }}"></script>
</body>
</html>
