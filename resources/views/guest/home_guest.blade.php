<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Home - Guest</title>

        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <link rel="stylesheet" href="{{asset('css/front.css')}}">
    </head>
    <body>
        
        @include('partials.header')

        {{-- vue --}}
        <div id="root"></div>

        @include('partials.footer')

        <script src="{{asset('js/front.js')}}"></script>
    </body>
</html>
