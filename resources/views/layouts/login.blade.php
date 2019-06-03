<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">



    <!-- -------------------------------------------------------------------------------------------------------------------------------- -->
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">

    <!-- Global Mainly Styles -->
    <link href="{{ asset('vendors/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('vendors/themify-icons/css/themify-icons.css') }}" rel="stylesheet">

    <!--  Theme Styles -->
    <link href="{{ asset('css/main.min.css') }}" rel="stylesheet">
    <!-- PAGE LEVEL STYLES-->
    <link href="{{ asset('css/pages/auth-light.css') }}" rel="stylesheet">


    <!-- -------------------------------------------------------------------------------------------------------------------------------- -->


</head>
<body class="bg-silver-300">
    <div class="container">
        <div class="content">
            @include('inc.messages')
            @yield('content')
        </div>
    </div>


    <!-- -------------------------------------------------------------------------------------------------------------------------------- -->
    <!-- CORE PLUGINS-->
    <script type="text/javascript" src="{{ asset('vendors/jquery/dist/jquery.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('vendors/popper.js/dist/umd/popper.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('vendors/bootstrap/dist/js/bootstrap.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('vendors/metisMenu/dist/metisMenu.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('vendors/jquery-slimscroll/jquery.slimscroll.min.js') }}"></script>

    <!-- PAGE LEVEL PLUGINS-->
    <script type="text/javascript" src="{{ asset('vendors/jquery-validation/dist/jquery.validate.min.js') }}"></script>

    <!-- CORE SCRIPTS-->
    <script src="{{ asset('js/app.min.js') }}" defer></script>


     <!-- PAGE LEVEL SCRIPTS-->
    <script type="text/javascript">
        $(function() {
            $('#login-form').validate({
                errorClass: "help-block",
                rules: {
                    email: {
                        required: true,
                        email: true
                    },
                    password: {
                        required: true
                    }
                },
                highlight: function(e) {
                    $(e).closest(".form-group").addClass("has-error")
                },
                unhighlight: function(e) {
                    $(e).closest(".form-group").removeClass("has-error")
                },
            });
        });
    </script>
    <!-- -------------------------------------------------------------------------------------------------------------------------------- -->


</body>
</html>
