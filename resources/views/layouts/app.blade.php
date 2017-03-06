<!DOCTYPE html> {{-- ifa bego --}}
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- App Title -->
    <title>{{ config('app.name') }}</title>

    <!-- Favicon -->
    <link rel="icon" type="image/png" href="{{ elixir('img/favicon.png') }}"/>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Lato|Raleway" rel="stylesheet">

    <!-- Styles -->
    @yield('page-style')

    <!-- Material Design Icon -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">

    <!-- Scripts -->
    {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script> --}}
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>

</head>
<body>
    @yield('navbar')

    @yield('content')
    
    @yield('footer')

    <!-- Scripts -->
    <!-- jQuery first, then Tether, then Bootstrap JS. -->
    {{-- FAA INI YG SBENERNYA SAMA KAYA DI CROP.BLADE v --}}
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js" integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8=" crossorigin="anonymous"></script> --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
    
    {{-- <script src="{{ elixir('js/app.js') }}"></script> --}}
    <script src="https://use.fontawesome.com/87bbe83acc.js"></script>
    @yield('page-script')
</body>
</html>
