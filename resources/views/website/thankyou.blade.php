@extends('layouts.web')

@section('content')

<div class="bg0 m-t-84 p-b-140">
    {{-- <div class="container"> --}}
    <div class="container-fluid w-00 h-100 p-t-300 p-r-250 p-l-250 p-b-150 bg0">
        <div class="thank-you-section">
            <br>
            <br>
            <br>
            <h1>Thank you for <br> Your Order!</h1>
            <p>A confirmation email was sent to your email.</p>

            <p>Your order will be reserved for 3 days, after which it will automatically be cancelled.</p>
            <div class="spacer"></div>
            <div>
                <a class="btn btn-lg btn-primary" href="{{ url('/') }}">Home Page</a>
            </div>
        </div>
    </div>
</div>




@endsection
