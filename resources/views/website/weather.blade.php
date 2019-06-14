@extends('layouts.web')

@section('content')
<div class="bg0 m-t-84 p-b-140">
        <div class="container">

            {{-- <h1>Weather Statistics for the City of Santa Rosa, Laguna</h1>
            <div class="row">
                <div class="col-lg-6">
                        <script type='text/javascript' src='https://darksky.net/widget/graph-bar/14.3144,121.1121/ca12/en.js?width=100%&height=400&title=Full Forecast&textColor=333333&bgColor=transparent&transparency=true&skyColor=undefined&fontFamily=Sans-Serif&customFont=&units=ca&timeColor=333333&tempColor=333333&currentDetailsOption=true'></script>
                </div>
                <div class="col-lg-6">
                        <h2>Wind Graph</h2>
                        <script type='text/javascript' src='https://darksky.net/widget/graph/14.3144,121.1121/ca12/en.js?width=100%&height=320&title=Santa Rosa, Laguna&textColor=333333&bgColor=transparent&transparency=true&fontFamily=Sans-Serif&customFont=&units=ca&graph=wind_graph&timeColor=333333&tempColor=333333&lineColor=333333&markerColor=333333'></script>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6">
                        <h2>Precipitation Graph</h2>
                        <script type='text/javascript' src='https://darksky.net/widget/graph/14.3144,121.1121/ca12/en.js?width=100%&height=320&title=Santa Rosa, Laguna&textColor=333333&bgColor=transparent&transparency=true&fontFamily=Sans-Serif&customFont=&units=ca&graph=precip_graph&timeColor=333333&tempColor=333333&lineColor=333333&markerColor=333333'></script>
                </div>
                <div class="col-lg-6">
                        <h2>Humidity Graph</h2>
                        <script type='text/javascript' src='https://darksky.net/widget/graph/14.3144,121.1121/ca12/en.js?width=100%&height=320&title=Santa Rosa, Laguna&textColor=333333&bgColor=transparent&transparency=true&fontFamily=Sans-Serif&customFont=&units=ca&graph=humidity_graph&timeColor=333333&tempColor=333333&lineColor=333333&markerColor=333333'></script>
                </div>
            </div> --}}
        

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