<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>laravel dc comics</title>
        @vite('resources/js/app.js')
    </head>
    <body>
        <div class="container">
            <header>
                @include('header')
            </header>
            <main>
                @yield('contents')
            </main>
        </div>
    </body>
</html>