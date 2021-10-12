<!doctype html>
    <html lang="en">
    <head>
        {{--  csrf token  --}}
        <meta name="csrf_token" content="{{csrf_token()}}">
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Todo App</title>
        {{--  Styles  --}}
        <link rel="stylesheet" href="{{asset('css/app.css')}}">
        {{--    Scripts--}}
        <script src="{{url(asset('js/app.js'))}}"></script>
    </head>
    <body>
        @yield('content')
    </body>
</html>
