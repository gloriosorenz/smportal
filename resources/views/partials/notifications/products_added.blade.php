<a class="list-group-item" href="{{ route('season_lists')}}">
    <div class="media">
        <div class="media-img">
            <span class="badge badge-success badge-big"><i class="fa fa-plus"></i></span>
        </div>
        <div class="media-body">
            <div class="media-heading">
                {{$notification->data['user']['first_name']}} {{$notification->data['user']['last_name']}}<small class="text-muted float-right">{{ $notification->created_at->diffForHumans() }}</small>
            </div>
            <div class="font-13">Added their products for the season.</div>
        </div>
    </div>
</a>