
@component('mail::message')
# Season Update

{{$season_list->users->first_name}} {{$season_list->users->first_name}} of {{$season_list->users->company}} has updated Season {{$season_list->seasons->id}}.

{{-- @component('mail::button', ['url' => ''])
View Message
@endcomponent --}}

Thanks,<br>
Samahan ng Magsasaka sa Sta. Rosa Laguna
@endcomponent
