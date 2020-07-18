<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="{{url('/css/app.css?v='.rand(), [], env('APP_SSL'))}}">
        <link rel="stylesheet" type="text/css" href="{{url('/css/custom.css?v='.rand(), [], env('APP_SSL'))}}">
    </head>
    <body>
        <div id="app" class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

            <div class="content">
                <navbar-menu></navbar-menu>
                <div class="m-t-md m-b-md">
                    <hello-world v-bind:title="title" v-bind:content="content"></hello-world>
                </div>
                <example-component></example-component>
            </div>
        </div>
        <script type="text/javascript" src="{{url('/js/app.js?v='.rand(), [], env('APP_SSL'))}}"></script>
    </body>
</html>
