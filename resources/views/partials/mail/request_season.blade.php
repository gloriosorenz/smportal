@component('mail::message')
# Good Day!

{{$user->first_name}} {{$user->last_name}} of {{$user->company}} is requesting for a new season!

@component('mail::button', ['url' => ''])
View Message
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
