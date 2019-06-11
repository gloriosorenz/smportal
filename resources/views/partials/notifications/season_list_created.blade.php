<a class="list-group-item" href="{{ route('seasons')}}">
    <div class="media">
        <div class="media-img">
            <span class="badge badge-success badge-big"><i class="fa fa-check"></i></span>
        </div>
        <div class="media-body">
            <div class="media-heading">
                {{$notification->data['user']['first_name']}} {{$notification->data['user']['last_name']}}<small class="text-muted float-right">{{ $notification->data['timeCreated'] }}</small>
            </div>
            <div class="font-13">Joined the season.</div>
        </div>
    </div>
</a>