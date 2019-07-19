<a class="list-group-item" href="{{ url('/website/my_orders')}}" >
    <div class="media">
        <div class="media-img">
            <span class="badge badge-danger badge-big"><i class="fas fa-bolt"></i></span>
        </div>
        <div class="media-body">
            <div class="media-heading">
                {{$notification->data['user']['first_name']}} {{$notification->data['user']['last_name']}}<small class="text-muted float-right">{{ $notification->created_at->diffForHumans() }}</small>
            </div>
            <div class="font-13">A product has withered.</div>
        </div>
    </div>
</a>
            