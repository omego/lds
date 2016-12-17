<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>@yield('title') | {{ Config::get('app.name') }}</title>

        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    </head>
    <body>
        <div class="container-fluid">
            @yield('content')
        </div>
        <script src="{{asset('js/app.js')}}"></script>
        <script>
            @yield('script')
        </script>
    </body>
</html>
