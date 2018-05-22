<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Inxait</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
         <link rel="stylesheet" href="{{asset('css/app.css')}}">

        <!-- Styles -->
        <style>

        </style>
    </head>
    <body>
       @include('partials.navbar')

       @yield('content')

       <script src="{{asset('js/app.js')}}"></script>
       <script src="{{asset('js/toastr.js')}}"></script>
       @yield('scripts')
    </body>
</html>
