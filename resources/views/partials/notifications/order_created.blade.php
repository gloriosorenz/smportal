<a class="list-group-item" href="{{ route('order_products')}}">
    <div class="media">
        {{-- <div class="media-img">
            <span class="badge badge-success badge-big"><i class="fa fa-check"></i></span>
        </div> --}}
        <div class="media-body">
            {{-- {{dd($notification)}} --}}
            <div class="font-13">{{$notification->data['user']['first_name']}} made an order</div><small class="text-muted">{{ $notification->data['timeCreated'] }}</small></div>
    </div>
</a>