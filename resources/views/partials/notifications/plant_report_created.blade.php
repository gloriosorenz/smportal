<a class="list-group-item" href="{{ route('plant_reports.index')}}" >
    <div class="media">
        <div class="media-img">
            <span class="badge badge-success badge-big"><i class="fab fa-pagelines"></i></span>
        </div>
        <div class="media-body">
            <div class="media-heading">
                Plant Report<small class="text-muted float-right">{{ $notification->created_at->diffForHumans() }}</small>
            </div>
            @if (auth()->user()->roles->id == 2)
            <div class="font-13">You can now add your plant report for the month.</div>
            @else
            <div class="font-13">A plant report has been added.</div>
            @endif
        </div>
    </div>
</a>
    