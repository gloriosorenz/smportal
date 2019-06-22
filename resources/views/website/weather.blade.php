@extends('layouts.web')

@section('content')
<div class="bg0 m-t-84 p-b-140">
        <div class="container">

            <!-- Good wind condition alert -->
            @if($current->windspeed() <= 30)
            <div class="alert alert-success text-center" role="alert">
            Good Wind Condition       
            <p class="lead m-0">Wind Speed {{ $current->windspeed() }}</p>             
            </div>
            @endif

             <!-- Acceptable wind condition alert -->
             @if($current->windspeed() > 30 && $current->windspeed() <= 40)
             <div class="alert alert-info text-center" role="alert">
             Acceptable Wind Condition  
             <p class="lead m-0">Wind Speed {{ $current->windspeed() }}</p>         
             </div>
             @endif

             <!-- Be on Alert wind condition alert -->
             @if($current->windspeed() > 40 && $current->windspeed() <= 60)
             <div class="alert alert-warning text-center" role="alert">
             Be on Alert 
             <p class="lead m-0">Wind Speed {{ $current->windspeed() }}</p>         
             </div>
             @endif

             <!-- Dangerous wind condition alert -->
             @if($current->windspeed() > 60)
             <div class="alert alert-danger text-center" role="alert">
             Dangerous Wind Condition  
             <p class="lead m-0">Wind Speed {{ $current->windspeed() }}</p>         
             </div>
             @endif


            <div class="row m-b-50">
                <!-- WEATHER UPDATES -->
                <div class="offset-lg-2 col-lg-12 offset-lg-2">
                    {{-- <div class="card">
                        <div class="card-header">
                            <div class="card-title">Daily Weather Updates</div>
                        </div>
                        <div class="card-body"> --}}
                                <div class="row">
                                    @foreach ($daily as $item)
                                    <div class="col-12 col-md-3 p-b-20">
                                        <a class="card" data-toggle="modal" data-target="#exampleModal" >
                                            <div class="card-body text-center scroller" data-height="200px">
                                                <h5 class="card-title">{{ date('l', $item->time()) }}</h5>
                                                <h5 class="lead m-0 small">{{ date('F j', $item->time()) }}</h5>
                                                <p class="lead m-0 small">{{ $item->summary() }}</p>
                                                <p class="lead m-0">Hi {{ $item->temperatureHigh() }}</p>
                                                <p class="lead m-0">Lo {{ $item->temperatureLow() }}</p>
                                                <p class="lead m-0">Humidity {{ $item->humidity() }}</p>
                                            </div> 
                                        </a>
                                    </div>

                                    <!-- Weather Modal -->
                                    {{-- <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">{{ date('l', $item->time()) }}</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                    <p class="lead m-0">{{ $item->summary() }}</p>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            </div>
                                            </div>
                                        </div>
                                    </div> --}}
                                    @endforeach
                                </div>
                        {{-- </div>
                    </div> --}}
                </div>
            </div>

           
        

            <div class="row">
                <div class="col-lg-12 text-left">
                    <h1>Weather Statistics for the City of Santa Rosa, Laguna</h1>
                    <script type='text/javascript' src='https://darksky.net/widget/graph-bar/14.3144,121.1121/ca12/en.js?width=100%&height=400&title=Full Forecast&textColor=333333&bgColor=transparent&transparency=true&skyColor=undefined&fontFamily=Sans-Serif&customFont=&units=ca&timeColor=333333&tempColor=333333&currentDetailsOption=true'></script>
        
                    <h2>Wind Graph</h2>
                    <script type='text/javascript' src='https://darksky.net/widget/graph/14.3144,121.1121/ca12/en.js?width=100%&height=320&title=Santa Rosa, Laguna&textColor=333333&bgColor=transparent&transparency=true&fontFamily=Sans-Serif&customFont=&units=ca&graph=wind_graph&timeColor=333333&tempColor=333333&lineColor=333333&markerColor=333333'></script>
        
                    <h2>Precipitation Graph</h2>
                    <script type='text/javascript' src='https://darksky.net/widget/graph/14.3144,121.1121/ca12/en.js?width=100%&height=320&title=Santa Rosa, Laguna&textColor=333333&bgColor=transparent&transparency=true&fontFamily=Sans-Serif&customFont=&units=ca&graph=precip_graph&timeColor=333333&tempColor=333333&lineColor=333333&markerColor=333333'></script>
        
                    <h2>Humidity Graph</h2>
                    <script type='text/javascript' src='https://darksky.net/widget/graph/14.3144,121.1121/ca12/en.js?width=100%&height=320&title=Santa Rosa, Laguna&textColor=333333&bgColor=transparent&transparency=true&fontFamily=Sans-Serif&customFont=&units=ca&graph=humidity_graph&timeColor=333333&tempColor=333333&lineColor=333333&markerColor=333333'></script>
        
                    <h2>Temperature Graph</h2>
                    <script type='text/javascript' src='https://darksky.net/widget/graph/14.3144,121.1121/ca12/en.js?width=100%&height=320&title=Santa Rosa, Laguna&textColor=333333&bgColor=transparent&transparency=true&fontFamily=Sans-Serif&customFont=&units=ca&graph=temperature_graph&timeColor=333333&tempColor=333333&lineColor=333333&markerColor=333333'></script>
                </div>
            </div>
        </div>
</div>
    
@endsection