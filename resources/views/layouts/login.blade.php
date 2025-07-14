<!DOCTYPE html>
<html lang="en">

<head>
    <title>Login | Material Able</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('assets/backend/css/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/backend/pages/waves/css/waves.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/backend/icon/themify-icons/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/backend/icon/icofont/css/icofont.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/backend/icon/font-awesome/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/backend/css/style.css') }}">
</head>

<body themebg-pattern="theme1">

    <!-- Pre-loader -->
    <div class="theme-loader">
        <div class="loader-track">
            <div class="preloader-wrapper active">
                <!-- loader here -->
            </div>
        </div>
    </div>

    @yield('content')

    <!-- JS -->
    <script src="{{ asset('assets/backend/js/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/backend/js/jquery-ui/jquery-ui.min.js') }}"></script>
    <script src="{{ asset('assets/backend/js/popper.js/popper.min.js') }}"></script>
    <script src="{{ asset('assets/backend/js/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/backend/pages/waves/js/waves.min.js') }}"></script>
    <script src="{{ asset('assets/backend/js/jquery-slimscroll/jquery.slimscroll.js') }}"></script>
    <script src="{{ asset('assets/backend/js/common-pages.js') }}"></script>
</body>

</html>
