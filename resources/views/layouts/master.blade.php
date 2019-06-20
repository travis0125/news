<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>公告系統 - @yield('title')</title>
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('favicon.ico') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/navbar-fixed-top.css') }}">
    <!-- Bootstrap 3 -->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.min.css') }}">
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
    @include('partials.navbar')
    <div class="container">
        <div class="row">
            <di class="col-md-2">
                <!-- menu -->
                <div id="MainMenu">
                    <div class="list-group panel">
                        <a href="#" class="list-group-item list-group-item-success" data-parent="#MainMenu">Item 1</a>
                        <a href="#" class="list-group-item list-group-item-success" data-parent="#MainMenu">Item 2</a>
                        <a href="#demo3" class="list-group-item list-group-item-success" data-toggle="collapse" data-parent="#MainMenu">Item 3 <i class="fa fa-caret-down"></i></a>
                        <div class="collapse" id="demo3">
                            <a href="#SubMenu1" class="list-group-item" data-toggle="collapse" data-parent="#SubMenu1">Subitem 1<i class="fa fa-caret-down"></i></a>
                            <a href="#SubMenu2" class="list-group-item">Subitem 2</a>
                            <a href="#SubMenu3" class="list-group-item">Subitem 3</a>
                        </div>
                        <a href="#demo4" class="list-group-item list-group-item-success" data-toggle="collapse" data-parent="#MainMenu">Item 4  <i class="fa fa-caret-down"></i></a>
                        <div class="collapse" id="demo4">
                            <a href="" class="list-group-item">Subitem 1</a>
                            <a href="" class="list-group-item">Subitem 2</a>
                            <a href="" class="list-group-item">Subitem 3</a>
                        </div>
                    </div>
                </div>
            </di>
            <div class="col-md-10" style="text-align: center;margin-bottom: 10px;">
                <h1>@yield('header')</h1>
                @yield('content')
            </div>
        </div>
        @include('partials.footer')
    </div>
    <!-- 依需要參考已編譯外掛版本（如下），或各自獨立的外掛版本 -->
    <script src="{{ asset('js/jquery-2.2.4.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
</body>
</html>