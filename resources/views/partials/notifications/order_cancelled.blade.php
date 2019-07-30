<a class="list-group-item" href="{{ route('order_products')}}" >
    <div class="media">
        <div class="media-img">
            <span class="badge badge-danger badge-big"><i class="fa fa-file"></i></span>
        </div>
        <div class="media-body">
            @if (auth()->user()->roles->id == 3 || auth()->user()->roles->id == 4)
                <div class="media-heading">
                    {{$notification->data['user']['first_name']}} {{$notification->data['user']['last_name']}}<small class="text-muted float-right">{{ $notification->created_at->diffForHumans() }}</small>
                </div>
                <div class="font-13">Your order has been cancelled.</div>
            @elseif (auth()->user()->roles->id == 2)
                <div class="media-heading">
                    {{$notification->data['user']['first_name']}} {{$notification->data['user']['last_name']}}<small class="text-muted float-right">{{ $notification->created_at->diffForHumans() }}</small>
                </div>
                <div class="font-13">Cancelled his/her order.</div>
            @endif
        </div>
    </div>
</a>
        