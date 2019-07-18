<a class="list-group-item" href="{{ route('customers.index')}}">
    <div class="media">
        <div class="media-img">
            <span class="badge badge-secondary badge-big"><i class="fa fa-key"></i></span>
        </div>
        <div class="media-body">
            <div class="media-heading">
                Customer Request <small class="text-muted float-right">{{ $notification->created_at->diffForHumans() }}</small>
            </div>
            <div class="font-13">
                Someone wants to join the group!
            </div>
        </div>
    </div>
</a>