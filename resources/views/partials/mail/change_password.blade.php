@component('mail::message')
# Hello {{$data['first_name']}}!

<p>Thank you for Joining Samahan ng Magsasaka sa Sta. Rosa Laguna</p>
<p>This is your auto-generated password: </p>
<h1>{{$data['password']}}</h1>
<br>
<p>We recommend you to change your password by going to your profile.</p>
{{-- <p>Click here:</p> --}}

@component('mail::button', ['url' => '/profiles'])
Open
@endcomponent

Thanks,<br>
{{-- {{ config('app.name') }} --}}
Samahan ng Magsasaka sa Sta. Rosa Laguna
@endcomponent
