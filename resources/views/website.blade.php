@extends('layouts.web')

@section('content')

<div class="container-fluid w-100 h-100 p-t-300 p-r-250 p-l-250 p-b-150 bg0">
    <div class="row">
        <div class="col-lg-6 p-t-80">
            <div data-appear="fadeInDown" data-delay="0">
                <span class="ltext-101 cl2 respon2">
                    SAMAHAN NG MAGSASAKA PORTAL
                </span>
            </div>
                
            <div>
                <h2 class="ltext-201 cl2 p-t-19 p-b-43 respon1">
                    NEW SEASON
                </h2>
            </div>
                
            <div class="layer-slick1 animated visible-true" data-appear="zoomIn" data-delay="1600">
                <a href="{{ url('shop') }}" class="cl0 size-101 bg7 bor1 hov-btn1 btn-lg p-lr-15">
                    Shop Now
                </a>
            </div>
        </div>

        <div class="col-lg-6">
            <script type='text/javascript' src='https://darksky.net/widget/default/14.3144,121.1121/ca12/en.js?width=100%&height=350&title=Santa Rosa, Laguna&textColor=333333&bgColor=transparent&transparency=true&skyColor=undefined&fontFamily=Verdana&customFont=&units=us&htColor=333333&ltColor=C7C7C7&displaySum=yes&displayHeader=yes'></script>
        </div>
        
    </div>
</div>    

<!-- Slider -->
{{-- <section class="section-slide">
    <div class="wrap-slick1">
        <div class="slick1">
            <div class="item-slick1 bg2" style="background-color: #99e699;">
                <div class="container h-full">
                    <div class="flex-col-l-m h-full p-t-100 p-b-30 respon5">
                        <div class="layer-slick1 animated visible-false" data-appear="fadeInDown" data-delay="0">
                            <span class="ltext-101 cl2 respon2">
                                SAMAHAN NG MAGSASAKA PORTAL
                            </span>
                        </div>
                            
                        <div class="layer-slick1 animated visible-false" data-appear="fadeInUp" data-delay="800">
                            <h2 class="ltext-201 cl2 p-t-19 p-b-43 respon1">
                                NEW SEASON
                            </h2>
                        </div>
                            
                        <div class="layer-slick1 animated visible-false" data-appear="zoomIn" data-delay="1600">
                            <a href="{{ url('shop') }}" class="flex-c-m stext-101 cl0 size-101 bg7 bor1 hov-btn1 p-lr-15 trans-04">
                                Shop Now
                            </a>
                        </div>

                        <script type='text/javascript' src='https://darksky.net/widget/default/14.3144,121.1121/us12/en.js?width=100%&height=350&title=Santa Rosa, Laguna&textColor=333333&bgColor=transparent&transparency=true&skyColor=undefined&fontFamily=Verdana&customFont=&units=us&htColor=333333&ltColor=C7C7C7&displaySum=yes&displayHeader=yes'></script>
                    </div>

                    <div class="col-lg-6">
                            <script type='text/javascript' src='https://darksky.net/widget/default/14.3144,121.1121/us12/en.js?width=100%&height=350&title=Santa Rosa, Laguna&textColor=333333&bgColor=transparent&transparency=true&skyColor=undefined&fontFamily=Verdana&customFont=&units=us&htColor=333333&ltColor=C7C7C7&displaySum=yes&displayHeader=yes'></script>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section> --}}

<!-- Banner -->
<div class="sec-banner bg2 w-100 h-100 p-t-100 p-r-250 p-l-250 p-b-150">
    <div class="container">
        {{-- <div class="row p-b-50">
                <script type='text/javascript' src='https://darksky.net/widget/default/14.3144,121.1121/us12/en.js?width=100%&height=350&title=Santa Rosa, Laguna&textColor=333333&bgColor=transparent&transparency=true&skyColor=undefined&fontFamily=Verdana&customFont=&units=us&htColor=333333&ltColor=C7C7C7&displaySum=yes&displayHeader=yes'></script>
        </div> --}}
        <h3 class="text-center text-grey ltext-103 cl5 p-b-50">
            Product Overview
        </h3>

        {{-- <h6 class="text-center text-grey ltext-70 cl5 p-b-100">
            All products sold in the website are for <u>pick-up only</u>. Pick-up shall be done in the respective farm locations.
        </h6> --}}

        <div class="row">

            <div class="col-md-6 col-xl-6 p-b-30 m-lr-auto">
                <!-- Block1 -->

                <div class="block1 wrap-pic-w">
                    <img src="/img/good_rice.jpeg" alt="IMG-BANNER">

                    <a href="{{ url('shop') }}" class="block1-txt ab-t-l s-full flex-col-l-sb p-lr-38 p-tb-34 trans-03 respon3">
                        <div class="block1-txt-child1 flex-col-l">
                            <span class="block1-name ltext-102 trans-04 p-b-8 text-white">
                                Good Rice Product
                            </span>

                            <span class="block1-info stext-102 trans-04 text-white">
                                <font size="4">The good rice product is the main product output by the farmers it is planted and harvested in a span of 90-120 days, ready to be milled and stored for potential buyers.</font>
                            </span>
                        </div>

                        <div class="block1-txt-child2 p-b-4 trans-05">
                            <div class="block1-link stext-101 cl0 trans-09 text-white">
                                Shop Now 
                            </div>
                        </div>
                    </a>

                </div>
            </div>

            <div class="col-md-6 col-xl-6 p-b-30 m-lr-auto">
                <!-- Block1 -->
                <div class="block1 wrap-pic-w">
                    <img src="/img/bad_rice.jpg" alt="IMG-BANNER">

                    <a href="{{ url('shop') }}" class="block1-txt ab-t-l s-full flex-col-l-sb p-lr-38 p-tb-34 trans-03 respon3">
                        <div class="block1-txt-child1 flex-col-l">
                            <span class="block1-name ltext-102 trans-04 p-b-8 text-white">
                                Withered Rice Product
                            </span>

                            <span class="block1-info stext-102 trans-04 text-white">
                                <font size="4">Withered Rice is the result of Rice Product being exposed to the open after harvesting for a week, the rice will be dry and already shriveled up usually used as food for farm animals.</font>
                            </span>
                        </div>

                        <div class="block1-txt-child2 p-b-4 trans-05">
                            <div class="block1-link stext-101 cl0 trans-09 text-white">
                                Shop Now
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-10">
                    <ul class="list-unstyled m-t-10">
                        <div class="m-b-5"><strong>Order Pick-Up</strong></div>
                        <div>Orders are only for <u>pick-up</u>. Pick-up shall be done from the respective farm locations of the products.</div>
        
                        <br>
                        <div class="m-b-5"><strong>Order Cancellation</strong></div>
                        <div>Orders will automatically be cancelled by the system if the farmer has not confirmed it by <u>3 DAYS</u>.</div>
                        <div>The customer may only manually cancel the order for up to <u>2 DAYS</u> after the order has been made. </u>
                        <div>When confirmed by the farmer the customer will recieve a notification and the products are considered sold and awaiting payment and pick-up.</div>
        
                        <br>
                        <div class="m-b-5"><strong>Mode of Payment</strong></div>
                        <div>The farm organizations will only accept cash, this is to be done during pick-up.</div>
        
                        <br>
                        <div class="m-b-5"><strong>Product Quality</strong></div>
                        <div>It is recommended that the products are to be picked up as soon as the customer can as the product quality may change due to time effects.</div>
                        <div>The Product Quality Assurance Time Span (PQATS) will be sent to the customer, this will show how long the product will retain its quality before spoilage.</div>
                    </ul>
            </div>
        </div>
            
    </div>
</div>

<div class="sec-banner bg7 w-100 h-70 p-t-100 p-r-250 p-l-250 p-b-150">
    <div class="container text-center text-white">
        <div class="row">
            <div class="col-md-4 mb-sm-30">
                <div class="counter-item">
                    <h1 style="font-size: 100px">{{$farmergroups}}</h1>
                    <h5>Farmer Groups</h5>
                </div>
            </div>
            <div class="col-md-4 mb-sm-30">
                <div class="counter-item">
                    <h1 style="font-size: 100px">{{$clients}}</h1>
                    <h5>Clients</h5>
                </div>
            </div>
            <div class="col-md-4 mb-sm-30">
                <div class="counter-item">
                    <h1 style="font-size: 100px">{{$lagunabarangays}}</h1>
                    <h5>Barangays</h5>
                </div>
            </div>
        </div>
    </div>
</div>




<!-- Back to top -->
<div class="btn-back-to-top" id="myBtn">
    <span class="symbol-btn-back-to-top">
        <i class="zmdi zmdi-chevron-up"></i>
    </span>
</div>


    
@endsection



