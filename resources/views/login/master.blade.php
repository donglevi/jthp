<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>@yield('title') | JTHP.NET</title>
    {{-- Favicon --}}
    <link rel="icon" href="{{ URL('/') }}/public/favicon.png" type="image/x-icon">
    {{-- library --}}
    <link href="{{ URL('/') }}/public/css/library.min.css" rel="stylesheet" type="text/css">
    {{-- Custom Css --}}
    <link href="{{ URL('/') }}/public/css/auth.css" rel="stylesheet" type="text/css">
	{{-- Global site tag (gtag.js) - Google Analytics --}}
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-165867589-1"></script>
    <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());
    gtag('config', 'UA-165867589-1');
    </script>
    </head>
    <body class="body-login">
        <div class="alert-box">@include('login/note')</div>
        <div class="logo mb-2 text-center">
            <a href="{{ url('') }}" class="px-4 d-block"><img src="{{ url('public/images/jthp2.png') }}" alt="JTHP.NET" style="width: 300px;margin-bottom: 10px; max-width: 100%"></a>
        </div>
        <div class="auth-page">
            <div class="auth-box rounded shadow">
                <div class="card">
                    <div class="card-body">
                        @yield('content')
                    </div>
                </div>
            </div>
        </div>
        <script src="{{ URL('/') }}/public/plugins/jquery/jquery.min.js"></script>
        <script src="{{ URL('/') }}/public/js/auth.js"></script>
    </body>
</html>
