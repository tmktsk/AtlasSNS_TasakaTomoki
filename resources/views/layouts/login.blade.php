<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <!--IEブラウザ対策-->
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="ページの内容を表す文章" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title></title>
    <link rel="stylesheet" href="{{ asset('css/reset.css') }} ">
    <link rel="stylesheet" href="{{ asset('css/style.css') }} ">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!--スマホ,タブレット対応-->
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <!--サイトのアイコン指定-->
    <link rel="icon" href="画像URL" sizes="16x16" type="image/png" />
    <link rel="icon" href="画像URL" sizes="32x32" type="image/png" />
    <link rel="icon" href="画像URL" sizes="48x48" type="image/png" />
    <link rel="icon" href="画像URL" sizes="62x62" type="image/png" />
    <!--iphoneのアプリアイコン指定-->
    <link rel="apple-touch-icon-precomposed" href="画像のURL" />
    <!--OGPタグ/twitterカード-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
</head>
<body>
    <header>
        <div id = "head">
            <h1><a href="/top"><img class="logo" src="{{ asset('images/atlas.png') }}" alt="Logo Image"></a></h1>
                <p class="white-bold-text">{{ Auth::user()->username }}さん</p>
            <div id="menu-container">
                <div class="toggle-menu">V</div>
                <ul class="menu-list">
                    <li><a href="/top">HOME</a></li>
                    <li><a href="/profile">プロフィール編集</a></li>
                    <li><a href="/logout">ログアウト</a></li>
                </ul>
            </div>
            @if(optional(Auth::user())->check)
                <img  src="{{ asset('storage/'. Auth::user()->images) }}" alt="User Icon" class="sideIcon">
            @else
                <img  src="{{ asset('images/'. Auth::user()->images) }}" alt="User Icon" class="sideIcon">
            @endif
        </div>
    </header>
    <div id="row">
        <div id="container">
            @yield('content')
        </div >
        <div id="side-bar">
            <div id="confirm">
                <p>{{ Auth::user()->username }}さんの</p>
                <div>
                    <span>フォロー数</span>
                    <span>{{ $followingCount }}名</span>
                </div>
                <button type="button" class="btn btn-primary follow-button"><a href="/follow-list">フォローリスト</a></button>
                <div>
                    <span>フォロワー数</span>
                    <span>{{ $followerCount }}名</span>
                </div>
                <button type ="button" class="btn btn-primary follower-button"><a href="/follower-list">フォロワーリスト</a></button>
            </div>
            <button type="button" class="btn btn-primary search-button"><a href="/search">ユーザー検索</a></span>
        </div>
    </div>
    <footer>
    </footer>
    <script src="{{ asset('js/menu.js') }}"></script>
    <script src="JavaScriptファイルのURL"></script>
</body>
</html>
