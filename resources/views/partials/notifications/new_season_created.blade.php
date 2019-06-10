<a class="list-group-item" href="{{ route('season_lists')}}">
    <div class="media">
        {{-- <div class="media-img">
            <span class="badge badge-success badge-big"><i class="fa fa-check"></i></span>
        </div> --}}
        <div class="media-body">
            {{-- {{dd($notification)}} --}}
            <div class="font-13">{{$notification->data['user']['first_name']}} created a new season</div><small class="text-muted">22 mins</small></div>
    </div>
</a>