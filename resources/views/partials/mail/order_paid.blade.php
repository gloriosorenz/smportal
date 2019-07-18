@component('mail::message')
# Good Day {{$order->orders->users->first_name}}!

# You have successfully paid. <br>


<hr>
Contact Details: <br>
Seller: {{$order->users->company}} <br>
Location: {{ $order->users->street }}, {{ $order->users->barangays->name }}, {{ $order->users->cities->name }}, {{ $order->users->provinces->name }} <br>
Contact Number: {{$order->users->phone}} <br>
Email: {{$order->users->email}}


{{-- @component('mail::button', ['url' => ''])
View message
@endcomponent --}}

Thanks,<br>
Samahan ng Magsasaka sa Sta. Rosa Laguna
@endcomponent
