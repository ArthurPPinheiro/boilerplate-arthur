<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <title>Admin</title>

        <link rel="icon" href="{{ asset('img/brand/favicon.png') }}" type="image/png">
        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">

        <!-- Icons -->
        <link rel="stylesheet" href="{{ asset('vendor/nucleo/css/nucleo.css') }}" type="text/css">

       {{-- Laravel Mix - CSS File --}}
       <link rel="stylesheet" href="{{ mix('adm/css/admin.css') }}">

       <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous"></script>

    </head>
    <body>
        @include('admin::components.header')

        @yield('content')

        @include('admin::components.footer')

        {{-- Laravel Mix - JS File --}}
        <script src="{{ mix('adm/js/admin.js') }}"></script>
    </body>
</html>
