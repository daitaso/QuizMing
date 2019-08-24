<!DOCTYPE html>
<html>
    <head>
        <!--head-->
        <meta charset="utf-8">
        <title>QuizMing｜独断と偏見でクイズを作ろう！</title>

        <!--ファビコン-->
        <?php
        //echo html_tag('link', array(
        //    'rel' => 'icon',
        //    'href' => Asset::get_file('favicon.ico', 'img'),
        //));
        //?>

        <!--CSS読み込み-->
        <?//= Asset::css('style.css') ?>

        <!-- bootstrap -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

        <link href="{{ asset('css/sticky-footer.css') }}" rel="stylesheet">

        <!--fontawesome-->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">

        <!--日本語フォント-->
        <link href="https://fonts.googleapis.com/css?family=Noto+Serif+SC:400,700&amp;subset=japanese" rel="stylesheet">

    </head>
<body>

<header>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="{{url("/")}}">QuizMing</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- メニューを右寄せ -->
            @if( Auth::check() )
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img src="{{Auth::user()->avatar}}" class="rounded-circle mx-1" width="30" height="30" alt="Cinque Terre">
                            <span class="text-primary">{{Auth::user()->name}}</span>
                        </a>

                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{url('/logout')}}">Logout</a>
                        </div>
                    </li>
                </ul>
            @else
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link " href="{{url("/login/twitter")}}">Login</a>
                    </li>
                </ul>
            @endif
            <!-- フォームを削除 -->
        </div>
    </nav>
</header>

@yield('content')

<footer class="footer">
    <div class="container">
        <p class="text-muted text-center">QuizMing 2019 .All Rights Reserved.</p>
    </div>
</footer>

{{--script--}}
<script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<script src="https://cdn.rawgit.com/google/code-prettify/master/loader/run_prettify.js?lang=default&skin=sons-of-obsidian"></script>
</body>
</html>