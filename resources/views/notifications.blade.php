@extends('layouts.app')

@section('content')

<!-- START PAGE CONTENT-->
    <div class="page-heading">
        <h1 class="page-title">Notifications</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="index.html"><i class="la la-home font-20"></i></a>
            </li>
            <li class="breadcrumb-item">Notifications</li>
        </ol>
    </div>
    <div class="page-content fade-in-up">

        <div class="row">
            <div class="offset-md-1 col-md-10 offset-md-1">
                    <div class="ibox">
                        <div class="ibox-head">
                            <div class="ibox-title">Notifications</div>
                            <div class="ibox-tools">
                                <a class="ibox-collapse"><i class="fa fa-minus"></i></a>
                                <a class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-ellipsis-v"></i></a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a class="dropdown-item">option 1</a>
                                    <a class="dropdown-item">option 2</a>
                                </div>
                            </div>
                        </div>
                        <div class="ibox-body">
                            <ul class="media-list media-list-divider m-0">
                                <li class="list-group list-group-divider scroller" data-height="600px" data-color="#71808f">
                                    <div>
                                        @forelse (auth()->user()->Notifications()->get() as $notification)
                                        @include('partials.notifications.'. snake_case(class_basename($notification->type)))
                                        @empty
                                            <a class="list-group-item">
                                                <div class="media">
                                                    {{-- <div class="media-img">
                                                        <span class="badge badge-success badge-big"><i class="fa fa-check"></i></span>
                                                    </div> --}}
                                                    <div class="media-body">
                                                        <div class="font-13">No Notifications</div>
                                                    </div>
                                                </div>
                                            </a>
                                        @endforelse
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
            </div>
        </div>
            
    </div>
<!-- END PAGE CONTENT-->

@endsection
