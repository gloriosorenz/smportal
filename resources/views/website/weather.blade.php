@extends('layouts.web')

@section('content')
<div class="bg0 m-t-84 p-b-140">
        <div class="container">

               

           
    
            <div class="row">
                <div class="col-lg-12 text-left">
                    <h1 class="text-center">Weather Statistics for the City of Santa Rosa, Laguna</h1>
                    <br>
                    <br>


                    <div class="alert alert-info text-center" role="alert">
                        Week Overview
                    <p class="lead m-0"> {{ $week->summary() }}</p>      
                    </div>

                    <br>
                    <br>

                    <h2 class="text-center">Current Weather Forecast</h2>
                    
                    {{-- <script type='text/javascript' src='https://darksky.net/widget/graph-bar/14.3144,121.1121/ca12/en.js?width=100%&height=400&title=Full Forecast&textColor=333333&bgColor=transparent&transparency=true&skyColor=undefined&fontFamily=Sans-Serif&customFont=&units=ca&timeColor=333333&tempColor=333333&currentDetailsOption=true'></script> --}}
                    <script type='text/javascript' src='https://darksky.net/widget/graph-bar/14.3144,121.1121/ca12/en.js?width=100%&height=400&title=Full Forecast&textColor=333333&bgColor=transparent&transparency=true&skyColor=undefined&fontFamily=Default&customFont=&units=ca&timeColor=333333&tempColor=333333&currentDetailsOption=false'></script>

                    <!-- ALERTS -->
                    <div class="row">
                        <div class="col-lg-4">
                            {{-- WINDSPEED ALERT --}}
                            @if($current->windspeed() <= 30)
                            <div class="alert alert-success text-center" role="alert">
                            Good Wind Condition     
                            - Perfect for planting and harvesting!  
                            <p class="lead m-0"> Current Wind Speed {{ $current->windspeed() }}</p>             
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
                        </div>
                        <div class="col-lg-4">
                            {{-- TEMPERATURE ALERT --}}
                            @if($current->temperature() <= 29)
                            <div class="alert alert-success text-center" role="alert">
                            Temperature is too low for Rice Growth
                            <p class="lead m-0"> Current Temperature {{ $current->temperature() }}°C</p>             
                            </div>
                            @endif

                            <!-- Acceptable temperature condition alert -->
                            @if($current->temperature() > 29 && $current->temperature() <= 32)
                            <div class="alert alert-primary text-center" role="alert">
                            Optimal Temperature for Rice Growth                        
                            <p class="lead m-0"> Current Temperature {{ $current->temperature() }}°C</p>         
                            </div>
                            @endif

                            <!-- Be on Alert temperature condition alert -->
                            @if($current->temperature() > 32 && $current->temperature() <= 37)
                            <div class="alert alert-warning text-center" role="alert">
                            Acceptable Temperature for Rice Growth
                            <p class="lead m-0"> Current Temperature {{ $current->temperature() }}°C</p>         
                            </div>
                            @endif

                            <!-- Dangerous temperature condition alert -->
                            @if($current->windspeed() > 37)
                            <div class="alert alert-danger text-center" role="alert">
                            Dangerous Temperature for Rice Growth  
                            <p class="lead m-0"> Current Temperature {{ $current->temperature() }}°C</p>         
                            </div>
                            @endif
                        </div>
                        <div class="col-lg-4">
                            {{-- PRECIPITATIONS ALERT --}}
                            @if($current->precipProbability()*100 <= 15)
                            <div class="alert alert-success text-center" role="alert">
                            Rain Probability is Low
                            <p class="lead m-0"> Chance of Rain: {{ $current->precipProbability()*100 }}%</p>             
                            </div>
                            @endif

                            <!-- Acceptable temperature condition alert -->
                            @if($current->precipProbability()*100 > 15 && $current->precipProbability()*100 <= 50)
                            <div class="alert alert-warning text-center" role="alert">
                            Rain Probability is Medium
                            <p class="lead m-0"> Chance of Rain: {{ $current->precipProbability()*100 }}%</p>         
                            </div>
                            @endif

                            <!-- Be on Alert temperature condition alert -->
                            @if($current->precipProbability()*100 > 50 && $current->precipProbability()*100 <= 80)
                            <div class="alert alert-warning text-center" role="alert">
                            Rain Probability is High
                            <p class="lead m-0"> Chance of Rain: {{ $current->precipProbability()*100 }}%</p>         
                            </div>
                            @endif

                            <!-- Dangerous temperature condition alert -->
                            @if($current->precipProbability()*100 > 80)
                            <div class="alert alert-danger text-center" role="alert">
                            Currently Raining
                            <p class="lead m-0"> Chance of Rain: {{ $current->precipProbability()*100 }}%</p>         
                            </div>
                            @endif
                        </div>
                    </div>
                  

                  
 
                   
                       
                    <br>
                    <br>
                    
                    {{-- <p>{{ date('l', $current->time()) }}</p>
                    <p>{{ date('F j', $current->time()) }}</p>
                    <p>Windspeed: {{ $current->windspeed() }}</p>
    
                    <p>Forecast in 3 days:</p>
                    <p>{{ date('l', $three_days->time()) }}</p>
                    <p>{{ date('F j', $three_days->time()) }}</p>
                    <p>Windspeed: {{ $three_days->windspeed() }}</p> --}}
    
                    <h2 class="text-center">Weather Forecast for the Week</h2>
                    <br>

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
                                                    <h5 class="lead m-0">{{ date('F j', $item->time()) }}</h5>
                                                    <p class="lead m-0 small">{{ $item->summary() }}</p>
                                                    <br>
                                                    <p class="lead m-0 small">Wind Speed: {{ $item->windSpeed() }} kph</p>
                                                    <p class="lead m-0 small">Hi Temp: {{ $item->temperatureHigh() }}°C</p>
                                                    <p class="lead m-0 small">Lo Temp: {{ $item->temperatureLow() }}°C</p>
                                                    <p class="lead m-0 small">Humidity: {{ $item->humidity() }}</p>
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
                    
                    {{-- WIND GRAPH --}}
                    <div class="container text-center">
                        <h2>Wind Graph</h2>
                        <br>
                            {{-- <div class="font-weight-bold">Wind Speed Guide:</div> --}}
                            <ul class="list-inline">
                                <li class="list-inline-item"><i class="fas fa-circle"></i> 0-30km/h - Good Wind Condition</li>
                                <li class="list-inline-item"><i class="fas fa-circle"></i> 30-40km/h - Acceptable</li> 
                                <li class="list-inline-item"><i class="fas fa-circle"></i> 40-60km/h - Be on Alert</li>
                                <li class="list-inline-item"><i class="fas fa-circle"></i> 60>km/h - Dangerous</li>
                            </ul>
                        <script type='text/javascript' src='https://darksky.net/widget/graph/14.3144,121.1121/ca12/en.js?width=100%&height=320&title=Santa Rosa, Laguna&textColor=333333&bgColor=transparent&transparency=true&fontFamily=Sans-Serif&customFont=&units=ca&graph=wind_graph&timeColor=333333&tempColor=333333&lineColor=333333&markerColor=333333'></script>
                    </div>
                       
                    <hr>

                    {{-- TEMPERATURE GRAPH --}}
                    <div class="container text-center">
                        <h2>Temperature Graph</h2>
                        <br>
                        {{-- <div class="font-weight-bold">Temperature Guide:</div> --}}
                        <ul class="list-inline">
                            <li class="list-inline-item"><i class="fas fa-circle"></i> 10-12°C - Minimum</li>
                            <li class="list-inline-item"><i class="fas fa-circle"></i> 30-32°C - Optimum</li> 
                            <li class="list-inline-item"><i class="fas fa-circle"></i> 13-29°C and 33-35°C - Acceptable</li>
                            <li class="list-inline-item"><i class="fas fa-circle"></i> 36-38°C - Maximum</li>
                        </ul>
                        <script type='text/javascript' src='https://darksky.net/widget/graph/14.3144,121.1121/ca12/en.js?width=100%&height=320&title=Santa Rosa, Laguna&textColor=333333&bgColor=transparent&transparency=true&fontFamily=Sans-Serif&customFont=&units=ca&graph=temperature_graph&timeColor=333333&tempColor=333333&lineColor=333333&markerColor=333333'></script>
                    </div>

                    <hr>

                    {{-- PRECIPITATION GRAPH --}}
                    <div class="container text-center">
                        <h2>Precipitation Graph</h2>
                        <script type='text/javascript' src='https://darksky.net/widget/graph/14.3144,121.1121/ca12/en.js?width=100%&height=320&title=Santa Rosa, Laguna&textColor=333333&bgColor=transparent&transparency=true&fontFamily=Sans-Serif&customFont=&units=ca&graph=precip_graph&timeColor=333333&tempColor=333333&lineColor=333333&markerColor=333333'></script>
                    </div>
        
                    <hr>

                    {{-- HUMIDITY GRAPH --}}
                    <div class="container text-center">
                        <h2>Humidity Graph</h2>
                        <script type='text/javascript' src='https://darksky.net/widget/graph/14.3144,121.1121/ca12/en.js?width=100%&height=320&title=Santa Rosa, Laguna&textColor=333333&bgColor=transparent&transparency=true&fontFamily=Sans-Serif&customFont=&units=ca&graph=humidity_graph&timeColor=333333&tempColor=333333&lineColor=333333&markerColor=333333'></script>
                    </div>
                   
                </div>
            </div>
        </div>
</div>
    
@endsection