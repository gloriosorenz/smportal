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
                A new customer is requesting his account to be activated.
            </div>
        </div>
    </div>
</a>