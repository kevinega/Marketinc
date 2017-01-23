<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>aneH</title>

    <!-- Styles -->
    <link href="{{ elixir('css/app.css') }}" rel="stylesheet">

    <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
</head>
<body>
    <header>
        <img src="{{ asset("/image/header.png")}}" style="width:100%;">
        <div class="yellow-spacing" style="background-color:#ffcc46;width:100%;height:25%;text-align:center;">
            <img src="{{ asset("/image/comp.png")}}" style="width:300px;height:auto;">
        </div>
    </header>
    <section="content">
        @yield('content')
    </section>

    <!-- Scripts -->
    <script src="/js/app.js"></script>
</body>
</html>
