<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="76x76" href="{{asset('assets')}}/admin/assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="{{asset('assets')}}/admin/assets/img/favicon.png">
    <title>
        Seyahat Acentesi - ADMIN PANEL
    </title>
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,600,700,800" rel="stylesheet" />
    <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
    <!-- Nucleo Icons -->
    <link href="{{asset('assets')}}/admin/assets/css/nucleo-icons.css" rel="stylesheet" />
    <!-- CSS Files -->
    <link href="{{asset('assets')}}/admin/assets/css/black-dashboard.css?v=1.0.0" rel="stylesheet" />
    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link href="{{asset('assets')}}/admin/assets/demo/demo.css" rel="stylesheet" />
    @yield('css')
    @yield('javascript')
</head>

<body class="">
    <div class="wrapper">

        @include('admin._sidebar')

    <div class="main-panel">
        @include('admin._header')
        @yield('content')
        @include('admin._footer')


    </div>
        @yield('footer')
    </div>
</body>
</html>


