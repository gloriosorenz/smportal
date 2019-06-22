<a class="list-group-item" href="{{ route('dashboard')}}">
    <div class="media">
        <div class="media-img">
            <span class="badge badge-success badge-big"><i class="fa fa-user"></i></span>
        </div>
        <div class="media-body">
            <div class="media-heading">
                {{$notification->data['user']['first_name']}} {{$notification->data['user']['last_name']}}<small class="text-muted float-right">{{ $notification->created_at->diffForHumans() }}</small>
            </div>
            <div class="font-13">
                {{$notification->data['customer']['first_name']}} {{$notification->data['customer']['last_name']}}
                has joined the group.
            </div>
        </div>
    </div>
</a>