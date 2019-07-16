<a class="list-group-item" href="{{ route('dashboard')}}">
    <div class="media">
        <div class="media-img">
            <span class="badge badge-warning badge-big"><i class="fa fa-hourglass-end"></i></span>
        </div>
        <div class="media-body">
            <div class="media-heading">
                Season ended<small class="text-muted float-right">{{ $notification->created_at->diffForHumans() }}</small>
            </div>
            <div class="font-13">You may now request for a new season.</div>
        </div>
    </div>
</a>