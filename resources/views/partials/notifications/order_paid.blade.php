<a class="list-group-item" href="{{ route('order_products')}}" >
    <div class="media">
        <div class="media-img">
            <span class="badge badge-success badge-big"><i class="fa fa-check"></i></span>
        </div>
        <div class="media-body">
            <div class="media-heading">
                {{$notification->data['user']['first_name']}} {{$notification->data['user']['last_name']}}<small class="text-muted float-right">{{ $notification->created_at->diffForHumans() }}</small>
            </div>
            <div class="font-13">Your are now paid. Thank you for shopping at SMSRL Portal!</div>
        </div>
    </div>
</a>
            