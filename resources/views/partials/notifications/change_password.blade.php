<a class="list-group-item" href="{{ route('dashboard')}}">
    <div class="media">
        <div class="media-img">
            <span class="badge badge-secondary badge-big"><i class="fa fa-key"></i></span>
        </div>
        <div class="media-body">
            <div class="media-heading">
                {{$notification->data['user']['first_name']}} {{$notification->data['user']['last_name']}}<small class="text-muted float-right">{{ $notification->created_at->diffForHumans() }}</small>
            </div>
            <div class="font-13">
                Thank you for joining! We recommend you to change your password as soon as possible.
            </div>
        </div>
    </div>
</a>