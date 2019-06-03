@if(count($errors) > 0)
    @foreach($errors->all() as $error)
        <div class= "mt-4 alert alert-danger alert-dismissable fade show">
            {{$error}}
            <button class="close" data-dismiss="alert" aria-label="Close">×</button>{{-- <strong>Success!</strong> You successfully read this important alert message. --}}
        </div>
    @endforeach
@endif

@if(session('success'))
    <div class="mt-4 alert alert-success alert-dismissable fade show">
        {{session('success')}}
        <button class="close" data-dismiss="alert" aria-label="Close">×</button>
    </div>
@endif

@if(session('error'))
    <div class="mt-4 alert alert-danger alert-dismissable fade show">
        {{session('error')}}
        <button class="close" data-dismiss="alert" aria-label="Close">×</button>
    </div>
@endif
