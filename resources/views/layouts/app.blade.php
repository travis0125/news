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
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
    @include('partials.navbar')
    <div class="container">
        <div class="row">
            <div class="col-md-12" style="text-align: center;margin-bottom: 10px;">
                <h1>@yield('header')</h1>
            </div>
        </div>
        @yield('content')
    @include('partials.footer')
    </div>
    <!-- 依需要參考已編譯外掛版本（如下），或各自獨立的外掛版本 -->
    <script src="{{ asset('js/jquery-2.2.4.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/bootbox.min.js') }}"></script>
    <script src="{{ asset('js/bootbox.locales.min.js') }}"></script>
    <script src="https://cdn.ckeditor.com/4.11.3/standard/ckeditor.js"></script>
    <script>CKEDITOR.replace("content");</script>
    <script>
        $('#modal-dialog').on('show', function() {
            var link = $(this).data('link'),
            confirmBtn = $(this).find('.confirm');
        })
        $('#btnYes').click(function() {
            $('form').submit();
        });
    </script>
</body>
</html>