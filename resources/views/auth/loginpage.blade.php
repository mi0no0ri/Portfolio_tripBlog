<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
    <!--IEブラウザ対策-->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="">
    <title>Trip Blog</title>
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css">
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="/css/app.css">
    <link href="https://fonts.googleapis.com/css2?family=Anton&family=Comforter&family=Great+Vibes&family=Lobster&display=swap" rel="stylesheet">    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <!--スマホ,タブレット対応-->
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <!--サイトのアイコン指定-->
    <link rel="icon" href="画像URL" sizes="16x16" type="image/png">
    <link rel="icon" href="画像URL" sizes="32x32" type="image/png">
    <link rel="icon" href="画像URL" sizes="48x48" type="image/png">
    <link rel="icon" href="画像URL" sizes="62x62" type="image/png">
    <!--iphoneのアプリアイコン指定-->
    <link rel="apple-touch-icon-precomposed" href="images/favicon.png">
    <!--OGPタグ/twitterカード-->
</head>
<body>
    <header>
        <a href="#"><img src="" alt=""></a>
        <ul class="header_menu">
            <a href="/"><li class="menu">Top</li></a>
            <a href="/home"><li class="menu">My page</li></a>
            <a href="{{ route('post_list') }}"><li class="menu">Post edit</li></a>
            <a href="{{ route('profile_edit') }}"><li class="menu">Profile edit</li></a>
            <a href="{{ route('logout') }}"><li class="menu">Logout</li></a>
        </ul>
    </header>
    <div class="content">
    @yield('content')
    </div>
    <footer>
        <small id="copyright">©️ 2022 Portfolio_blog</small>
    </footer>
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script src="https://kit.fontawesome.com/5f2b6fa0cd.js" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <script src="/js/layout.js"></script>
</body>
</html>