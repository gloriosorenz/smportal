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
    <!-- Plugin Styles -->
    <link href="{{ asset('vendors/jvectormap/jquery-jvectormap-2.0.3.css') }}" rel="stylesheet">
    <link href="{{ asset('vendors/DataTables/datatables.min.css') }}" rel="stylesheet">
    <link href="{{ asset('vendors/select2/dist/css/select2.min.css') }}" rel="stylesheet">
    <link href="{{ asset('vendors/bootstrap-datepicker/dist/css/bootstrap-datepicker3.min.css') }}" rel="stylesheet">


    <!--  Theme Styles -->
    <link href="{{ asset('css/main.min.css') }}" rel="stylesheet">
    <!-- -------------------------------------------------------------------------------------------------------------------------------- -->


</head>
<body class="fixed-navbar">
    <div class="page-wrapper">
        @include('inc.navbar')
        @include('inc.sidenavbar')
        <div class="content-wrapper">
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
    <script type="text/javascript" src="{{ asset('vendors/chart.js/dist/Chart.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('vendors/jvectormap/jquery-jvectormap-2.0.3.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('vendors/jvectormap/jquery-jvectormap-world-mill-en.js') }}"></script>
    <script type="text/javascript" src="{{ asset('vendors/jvectormap/jquery-jvectormap-us-aea-en.js') }}"></script>
    <script type="text/javascript" src="{{ asset('vendors/DataTables/datatables.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('vendors/select2/dist/js/select2.full.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('vendors/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') }}"></script>



    <!-- PAGE LEVEL SCRIPTS-->
    <script type="text/javascript" src="{{ asset('js/scripts/dashboard_1_demo.js') }}"></script>
    <!-- CORE SCRIPTS-->
    <script src="{{ asset('js/app.min.js') }}" defer></script>


    <!-- PAGE LEVEL SCRIPTS-->
    <script type="text/javascript">
        $(function() {
            $('#example-table').DataTable({
                pageLength: 10,
                order: [[ 0, 'desc' ]],
                //"ajax": './assets/demo/data/table_data.json',
                /*"columns": [
                    { "data": "name" },
                    { "data": "office" },
                    { "data": "extn" },
                    { "data": "start_date" },
                    { "data": "salary" }
                ]*/
            });

            // Select 2
            $(".select2_demo_1").select2();
            $(".select2_demo_2").select2({
                placeholder: "Select a state",
                allowClear: true
            });


            // Bootstrap datepicker
            $('#date_1 .input-group.date').datepicker({
                todayBtn: "linked",
                keyboardNavigation: false,
                forceParse: false,
                calendarWeeks: true,
                autoclose: true
            });

            $('#date_6').datepicker({});

        })
    </script>
    <!-- -------------------------------------------------------------------------------------------------------------------------------- -->


</body>
</html>
