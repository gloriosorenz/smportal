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
    {{-- <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css"> --}}

    <!-- Styles -->
    {{-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> --}}



    <!-- -------------------------------------------------------------------------------------------------------------------------------- -->
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">

    <!-- Global Mainly Styles -->
    <link href="{{ asset('vendors/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">
    <!-- Plugin Styles -->
    <link href="{{ asset('images/icons/favicon.png') }}" rel="icon" type="image/png">
    <link href="{{ asset('fonts/font-awesome-4.7.0/css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('fonts/iconic/css/material-design-iconic-font.min.css') }}" rel="stylesheet">
    <link href="{{ asset('fonts/linearicons-v1.0.0/icon-font.min.css') }}" rel="stylesheet">
    <link href="{{ asset('vendors/animate/animate.css') }}" rel="stylesheet">
    <link href="{{ asset('vendors/css-hamburgers/hamburgers.min.css') }}" rel="stylesheet">
    {{-- <link href="{{ asset('vendors/animsition/css/animsition.min.css') }}" rel="stylesheet"> --}}
    <link href="{{ asset('vendors/select2/dist/css/select2.min.css') }}" rel="stylesheet">
    <link href="{{ asset('vendors/daterangepicker/daterangepicker.css') }}" rel="stylesheet">
    <link href="{{ asset('vendors/slick/slick.css') }}" rel="stylesheet">
    <link href="{{ asset('vendors/MagnificPopup/magnific-popup.css') }}" rel="stylesheet">
    <link href="{{ asset('vendors/perfect-scrollbar/perfect-scrollbar.css') }}" rel="stylesheet">


    <!--  Theme Styles -->
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
    <link href="{{ asset('css/util.css') }}" rel="stylesheet">
    <!-- -------------------------------------------------------------------------------------------------------------------------------- -->


</head>
<body class="animsition">
    @include('partials.web_navbar')
    @include('partials.messages')
    @yield('content')
    @include('partials.web_footer')
    @yield('extra-js')


    <!-- -------------------------------------------------------------------------------------------------------------------------------- -->
    <!-- CORE PLUGINS-->
    <script type="text/javascript" src="{{ asset('vendors/jquery/dist/jquery.min.js') }}"></script>

    <!-- PAGE LEVEL PLUGINS-->
    <script type="text/javascript" src="{{ asset('vendors/animsition/js/animsition.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('vendors/bootstrap/dist/js/popper.js') }}"></script>
    <script type="text/javascript" src="{{ asset('vendors/bootstrap/dist/js/bootstrap.min.js') }}"></script>
    <!--===============================================================================================-->
    <script type="text/javascript" src="{{ asset('vendors/select2/dist/js/select2.min.js') }}"></script>
    <script type="text/javascript">
        $(".js-select2").each(function(){
            $(this).select2({
                minimumResultsForSearch: 20,
                dropdownParent: $(this).next('.dropDownSelect2')
            });
        })

        $(document).ready(function() {
            $('.select2_basic').select2({
                placeholder: 'Category',
                tags: true,
            });
        });
    </script>
    <!--===============================================================================================-->
    <script type="text/javascript" src="{{ asset('vendors/daterangepicker/moment.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('vendors/daterangepicker/daterangepicker.js') }}"></script>
    <!--===============================================================================================-->
    <script type="text/javascript" src="{{ asset('vendors/slick/slick.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/slick-custom.js') }}"></script>
    <!--===============================================================================================-->
    <script type="text/javascript" src="{{ asset('vendors/parallax100/parallax100.js') }}"></script>
    <script>
        $('.parallax100').parallax100();
    </script>
    <!--===============================================================================================-->
    <script type="text/javascript" src="{{ asset('vendors/MagnificPopup/jquery.magnific-popup.min.js') }}"></script>
    <script>
        $('.gallery-lb').each(function() { // the containers for all your galleries
            $(this).magnificPopup({
                delegate: 'a', // the selector for gallery item
                type: 'image',
                gallery: {
                    enabled:true
                },
                mainClass: 'mfp-fade'
            });
        });
    </script>
    <!--===============================================================================================-->
    <script type="text/javascript" src="{{ asset('vendors/isotope/isotope.pkgd.min.js') }}"></script>
    <!--===============================================================================================-->
        <script src="vendors/sweetalert/sweetalert.min.js"></script>
        <script>
            $('.js-addwish-b2').on('click', function(e){
                e.preventDefault();
            });
    
            $('.js-addwish-b2').each(function(){
                var nameProduct = $(this).parent().parent().find('.js-name-b2').html();
                $(this).on('click', function(){
                    swal(nameProduct, "is added to wishlist !", "success");
    
                    $(this).addClass('js-addedwish-b2');
                    $(this).off('click');
                });
            });
    
            $('.js-addwish-detail').each(function(){
                var nameProduct = $(this).parent().parent().parent().find('.js-name-detail').html();
    
                $(this).on('click', function(){
                    swal(nameProduct, "is added to wishlist !", "success");
    
                    $(this).addClass('js-addedwish-detail');
                    $(this).off('click');
                });
            });
    
            /*---------------------------------------------*/
    
            $('.js-addcart-detail').each(function(){
                var nameProduct = $(this).parent().parent().parent().parent().find('.js-name-detail').html();
                $(this).on('click', function(){
                    swal(nameProduct, "is added to cart !", "success");
                });
            });
        
        </script>
    <!--===============================================================================================-->
    <script src="vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script>
        $('.js-pscroll').each(function(){
            $(this).css('position','relative');
            $(this).css('overflow','hidden');
            var ps = new PerfectScrollbar(this, {
                wheelSpeed: 1,
                scrollingThreshold: 1000,
                wheelPropagation: false,
            });

            $(window).on('resize', function(){
                ps.update();
            })
        });
    </script>
    <!--===============================================================================================-->
    <script src="js/main.js"></script>

    <!-- CORE SCRIPTS-->
    {{-- <script src="{{ asset('js/app.min.js') }}" defer></script> --}}
    <!-- -------------------------------------------------------------------------------------------------------------------------------- -->


</body>
</html>
