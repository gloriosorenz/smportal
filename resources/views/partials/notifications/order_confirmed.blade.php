<a class="list-group-item" href="{{ route('order_products')}}" >
    <div class="media">
        <div class="media-img">
            <span class="badge badge-info badge-big"><i class="fa fa-file"></i></span>
        </div>
        <div class="media-body">
            <div class="media-heading">
                {{$notification->data['user']['first_name']}} {{$notification->data['user']['last_name']}}<small class="text-muted float-right">{{ $notification->created_at->diffForHumans() }}</small>
            </div>
            <div class="font-13">Your order has been confirmed.</div>
        </div>
    </div>
</a>
    