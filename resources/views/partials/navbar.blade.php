{{-- <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">
            {{ config('app.name', 'Laravel') }}
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav mr-auto">

            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
                <!-- Authentication Links -->
                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif
                @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav> --}}


<!-- START HEADER-->
<header class="header">
    <div class="page-brand">
        <a class="link" href="{{route('home')}}">
            <span class="brand">SMSRL
                <span class="brand-tip">Portal</span>
            </span>
            <span class="brand-mini"><i class="fa fa-leaf"></i></span>
        </a>
    </div>
    <div class="flexbox flex-1">
        <!-- START TOP-LEFT TOOLBAR-->
        <ul class="nav navbar-toolbar">
            <li>
                <a class="nav-link sidebar-toggler js-sidebar-toggler"><i class="ti-menu"></i></a>
            </li>
        </ul>
        <!-- END TOP-LEFT TOOLBAR-->
        
        <!-- START TOP-RIGHT TOOLBAR-->
        <ul class="nav navbar-toolbar">
            <!-- Link to main site -->
            <li class="nav-item">
                <a class="nav-link" href="{{ url('/') }}"><span class="mr-2 d-none d-lg-inline text-gray-600 small">Main Site</span></a>
            </li>

            <!-- Notifications -->
            <li class="dropdown dropdown-notification"  id="markasread" onclick="markNotificationAsRead()">
                <a class="nav-link dropdown-toggle" data-toggle="dropdown">
                    <i class="fas fa-bell rel">
                        @if( count(auth()->user()->unreadNotifications) > 0)
                        <span class="notify-signal"></span>
                        @endif
                    </i>
                </a>
                <ul class="dropdown-menu dropdown-menu-right dropdown-menu-media">
                    <li class="dropdown-menu-header">
                        <div>
                            <span><strong>{{ count(auth()->user()->unreadNotifications) }} New</strong> Notifications</span>
                            <a class="pull-right" href="{{ url('notifications') }}">view all</a>
                        </div>
                    </li>
                    <li class="list-group list-group-divider scroller" data-height="240px" data-color="#71808f">
                        <div>
                            @forelse (auth()->user()->Notifications()->take(10)->get() as $notification)
                            @include('partials.notifications.'. snake_case(class_basename($notification->type)))
                            @empty
                                <a class="list-group-item">
                                    <div class="media">
                                        {{-- <div class="media-img">
                                            <span class="badge badge-success badge-big"><i class="fa fa-check"></i></span>
                                        </div> --}}
                                        <div class="media-body">
                                            <div class="font-13">No unread Notifications</div>
                                        </div>
                                    </div>
                                </a>
                            @endforelse
                        </div>
                    </li>
                </ul>
            </li>

            <!-- Login/Logout -->
            <li class="dropdown dropdown-user">
                <a class="nav-link dropdown-toggle link" data-toggle="dropdown">
                    <img src="/img/admin-avatar.png" />
                    <span></span>{{ auth()->user()->first_name }} {{ auth()->user()->last_name }}<i class="fa fa-angle-down m-l-5"></i></a>
                <ul class="dropdown-menu dropdown-menu-right">
                    <a class="dropdown-item" href="{{ url('profile' )}}"><i class="fa fa-user"></i>Profile</a>
                    <a class="dropdown-item" href="{{ url('profile' )}}"><i class="fa fa-cog"></i>Settings</a>
                    <li class="dropdown-divider"></li>
                    <a class="dropdown-item" href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                                     document.getElementById('logout-form').submit();">
                         <i class="fas fa-sign-out-alt"></i> {{ __('Logout') }}

                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </ul>
            </li>
        </ul>
        <!-- END TOP-RIGHT TOOLBAR-->
    </div>
</header>
<!-- END HEADER-->
