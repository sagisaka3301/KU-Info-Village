<div class="header-logo">
    <a href="home.php"><img src="{{ asset('/img/logo.png') }}" alt=""></a>
</div>
<div class="header-list">
    <ul>
        <li class='li-home'><a class="aaa" href="{{ route('kuinfo.home') }}">HOME</a></li>
        <li class='li-info'><a class='bbb' href="{{ route('kuinfo.classes') }}">CLASSES</a></li>
        <li class='li-pro'><a class='ccc' href="{{ route('kuinfo.mypage') }}">MYPAGE</a></li>
        <li class='li-con'><a class='ddd' href="{{ route('kuinfo.contact') }}">CONTACT</a></li>
    </ul>
</div>
<div id="navArea">
    <nav class="hidden-nav">
        <div class="inner">
            <ul>
                <li class='li-home'><a class="aaa" href='home.php'>HOME</a></li>
                <li class='li-info'><a class='bbb' href='class-info.php'>CLASSES</a></li>
                <li class='li-pro'><a class='ccc' href='mypage.php'>MYPAGE</a></li>
                <li class='li-con'><a class='ddd' href='contact.php'>CONTACT</a></li>
            </ul>
        </div>
    </nav>
    <div class="toggle_btn">
        <span></span>
        <span></span>
        <span></span>
    </div>
    <div id="mask"></div>
</div>

