@component('mail::message')
# Good Day {{$order->orders->users->first_name}}!

{{$order->users->company}} confirmed your order! <br>
Please contact the seller within 3 days to pick up your order at the farm location stated below. <br>
<br>
You have {{$days}} day/s before the product looses its current quality. <br>
Product Harvest Date: {{\Carbon\Carbon::parse($order->original_product_lists->harvest_date)->format('F j, Y')}}

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
