<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <script src="{{ asset('js/app.js') }}" defer></script>
        <link rel='stylesheet' href="{{asset('css/app.css')}}">
        <title>{{config('app.name', 'Kyoku')}}</title>
    </head>
    <body>
        @include('inc.navbar')
        <div class='container'>
          @include('inc.messages')
          @yield('content')
        </div>
    </body>
</html>
