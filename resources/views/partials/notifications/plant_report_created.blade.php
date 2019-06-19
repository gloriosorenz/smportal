<a class="list-group-item" href="{{ route('plant_reports.index')}}" >
    <div class="media">
        <div class="media-img">
            <span class="badge badge-success badge-big"><i class="fab fa-pagelines"></i></span>
        </div>
        <div class="media-body">
            <div class="media-heading">
                {{$notification->data['user']['first_name']}} {{$notification->data['user']['last_name']}}<small class="text-muted float-right">{{ $notification->created_at->diffForHumans() }}</small>
            </div>
            <div class="font-13">Added a plant report for the month.</div>
        </div>
    </div>
</a>
    