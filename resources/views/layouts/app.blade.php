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
        @include('partials.navbar')
        @include('partials.sidenavbar')
        <div class="content-wrapper">
            @include('partials.messages')
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
    {{-- <script type="text/javascript" src="{{ asset('vendors/DataTables/datatables.min.js') }}"></script> --}}
    <script type="text/javascript" src="{{ asset('vendors/select2/dist/js/select2.full.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('vendors/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') }}"></script>


    <!-- DataTables JS -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/jszip-2.5.0/dt-1.10.18/af-2.3.2/b-1.5.4/b-colvis-1.5.4/b-flash-1.5.4/b-html5-1.5.4/b-print-1.5.4/cr-1.5.0/fc-3.2.5/fh-3.1.4/kt-2.5.0/r-2.2.2/rg-1.1.0/rr-1.2.4/sc-1.5.0/sl-1.2.6/datatables.min.css"/>

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/jszip-2.5.0/dt-1.10.18/af-2.3.2/b-1.5.4/b-colvis-1.5.4/b-flash-1.5.4/b-html5-1.5.4/b-print-1.5.4/cr-1.5.0/fc-3.2.5/fh-3.1.4/kt-2.5.0/r-2.2.2/rg-1.1.0/rr-1.2.4/sc-1.5.0/sl-1.2.6/datatables.min.js"></script>

    <!-- PAGE LEVEL SCRIPTS-->
    {{-- <script type="text/javascript" src="{{ asset('js/scripts/dashboard_1_demo.js') }}"></script> --}}
    <!-- CORE SCRIPTS-->
    <script src="{{ asset('js/app.min.js') }}" defer></script>
    {{-- <script src="{{ asset('js/main.js') }}" defer></script>  --}}


    <!-- PAGE LEVEL SCRIPTS-->
    <script type="text/javascript">
        $(function() {
            $('#example-table').DataTable({
                pageLength: 6,
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
            // Users Tables
            $('#customers_table').DataTable({
                pageLength: 10,
                order: [[ 0, 'asc' ]],
            });
            $('#farmers_table').DataTable({
                pageLength: 10,
                order: [[ 0, 'asc' ]],
            });
            $('#administrators_table').DataTable({
                pageLength: 10,
                order: [[ 0, 'asc' ]],
            });
            // Order Tables
            $('#pending_orders').DataTable({
                pageLength: 6,
                order: [[ 0, 'desc' ]],
            });
            $('#completed_orders').DataTable({
                pageLength: 6,
                order: [[ 0, 'desc' ]],
            });
            $('#cancelled_orders').DataTable({
                pageLength: 6,
                order: [[ 0, 'desc' ]],
            });
            // Order Products Tables
            $('#pending_order_products').DataTable({
                pageLength: 10,
                order: [[ 0, 'desc' ]],
                // dom: 'Bfrtip',
                // buttons: [
                //     {
                //         extend: 'pdfHtml5',
                //         orientation: 'landscape',
                //         pageSize: 'LEGAL'
                //     }
                // ],
            });
            $('#confirmed_order_products').DataTable({
                pageLength: 10,
                order: [[ 0, 'desc' ]],
            });
            $('#cancelled_order_products').DataTable({
                pageLength: 10,
                order: [[ 0, 'desc' ]],
            });
            $('#paid_order_products').DataTable({
                pageLength: 10,
                order: [[ 0, 'desc' ]],
            });
            $('#current_season_order_products').DataTable({
                pageLength: 10,
                order: [[ 0, 'desc' ]],
            });
            $('#all_order_products').DataTable({
                pageLength: 10,
                order: [[ 0, 'desc' ]],
            });
            // Products Tables
            $('#user_products').DataTable({
                pageLength: 3,
                order: [[ 0, 'asc' ]],
            });
            $('#all_user_products').DataTable({
                pageLength: 100,
                order: [[ 0, 'desc' ]],
                scrollY: 200,
            });
            // Shop Table
            $('#shop_table').DataTable({
                pageLength: 6,
                order: [[ 0, 'asc' ]],
            });
            // Transactions Table
            $('#transactions_table').DataTable({
                pageLength: 10,
                order: [[ 0, 'desc' ]],
            });
            // Reports Table
            $('#plant_reports_table').DataTable({
                pageLength: 10,
                order: [[ 0, 'desc' ]],
            });
            $('#sales_reports_table').DataTable({
                pageLength: 10,
                order: [[ 0, 'desc' ]],
            });
            // Season Lists
            $('#all_season_lists_table').DataTable({
                pageLength: 10,
                order: [[ 1, 'desc' ]],
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
                format: 'yyyy/mm/dd',
                calendarWeeks: true,
                autoclose: true
            });

            $('#date_6').datepicker({});


            // Notifications
            // $('#markasread').click(function(){
            //     alert('clicked')
            // })

            $('#myModal').on('shown.bs.modal', function () {
            $('#myInput').trigger('focus')
            })

        })

        // Notifications
        function markNotificationAsRead(){
            // alert('clicked')
            $.get('/markAsRead')
        }
    </script>


    <script>
        // Add the following code if you want the name of the file appear on select
        $(".custom-file-input").on("change", function() {
            var fileName = $(this).val().split("\\").pop();
            $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
        });
    </script>


    <!-- -------------------------------------------------------------------------------------------------------------------------------- -->


</body>
</html>
