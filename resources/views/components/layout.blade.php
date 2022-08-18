<!DOCTYPE html>
<html lang="ja">
<head>
    @include('layout.head')
</head>
<body>
<header id="header">
    @include('layout.header')
</header>
<main>
    <div>
    {{ $slot }}
    </div>
</main>
<footer>
    @include('layout.footer')
</footer>
</body>
</html>
