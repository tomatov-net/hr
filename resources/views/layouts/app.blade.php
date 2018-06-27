<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>HR-TEST</title>
    <script src="{{ asset('js/app.js') }}" defer></script>
    @include('partials.css')
    @yield('css')
</head>
<body>
<div class="container" id="app">
    <div class="row">
        <div class="col-md-12">
            @yield('content')
        </div>
    </div>
</div>
</body>
@include('partials.js')
@yield('js')
</html>