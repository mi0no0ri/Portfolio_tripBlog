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
    <link rel="stylesheet" href="/css/map.css">
    <link rel="stylesheet" href="/css/media.css">
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
        <div class="top_header">
            <div class="top_header_left">
                <a href="/"><img src="/image/スクリーンショット_2022-06-30_0.00.12-removebg-preview.png" class="top_image"></a>
                {!! Form::open(['route' => 'search','method' => 'POST']) !!}
                {{ csrf_field() }}
                <div>
                    {{Form::label('search',' ',['class' => 'top_search'])}}
                    {{Form::text('search',null,['class' => 'search_bar','placeholder' => 'User Search'])}}
                    <button class="search_btn"><i class="fa-solid fa-magnifying-glass"></i></button>
                </div>
                {!! Form::close() !!}
            </div>
            <div class="menu_trigger">
                <span></span>
                <span></span>
                <span></span>
            </div>
            <ul class="header_menu g_navi">
                <a href="/"><li class="menu">Top</li></a>
                <a href="/contact"><li class="menu"  >Contact</li></a>
                @if(Auth::User())
                    <a href="/mypage">
                        <li class="menu">My page</li>
                    </a>
                @else
                    <a href="/mypage"><li class="menu">Login</li></a>
                @endif
            </ul>
        </div>
    </header>
    <div class="content">
    @yield('content')
    </div>
    <footer>
        <small id="copyright">©️ 2022 Portfolio_blog</small>
    </footer>
    @yield('layout')
    @yield('slide')
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script src="https://kit.fontawesome.com/5f2b6fa0cd.js" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <script src="/js/layout.js"></script>
</body>
</html>