<!-- Header -->
	<header class="header-v3">
		<!-- Header desktop -->
		<div class="container-menu-desktop">
			<div class="wrap-menu-desktop">
				<nav class="limiter-menu-desktop container">
				
					<!-- Logo desktop -->		
					{{-- <a href="#" class="logo">
						<img src="images/icons/logo-01.png" alt="IMG-LOGO">
					</a> --}}
					<div class="page-brand">
						<h3>
							{{-- <a href="/"> --}}
								<span class="brand">SMSRL
									<span class="brand-tip">Portal</span>
								</span>
								<span class="brand-mini"><i class="fa fa-leaf"></i></span>
							{{-- </a> --}}
						</h3>
					</div>

					<!-- Menu desktop -->
					<div class="menu-desktop">
						<ul class="main-menu">
							<li class="{{Request:: is('/') ? 'active-menu' : ''}}">
								<a href="/">Home</a>
							</li>

							<!-- Goes to shop page -->
							<li class="{{Request:: is('shop') ? 'active-menu' : ''}}">
								<a href="{{ url('shop') }}">Shop</a>
							</li>

							<!-- Goes to weather statistics page -->
							<li class="{{Request:: is('weather') ? 'active-menu' : ''}}">
								<a href="{{ url('weather') }}">Weather Statistics</a>
							</li>

							<li>
								<a href="about.html">About</a>
							</li>

							<li>
								<a href="contact.html">Contact</a>
							</li>
						</ul>
					</div>	




					
					<!-- Icon header -->
					<div class="wrap-icon-header flex-w flex-r-m">

						<div class="menu-desktop">
							<ul class="main-menu">
								<!-- Authentication Links -->
								@guest
								<li>
									<a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
								</li>
								{{-- @if (Route::has('register'))
									<li class="nav-item">
										<a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
									</li>
								@endif  --}}
								<!-- ADMIN -->
								@elseif(Auth::user()->roles_id == 1)
									<li class="{{Request:: is('dashboard') ? 'active' : ''}}">
										<a class="nav-link" href="{{ url('home') }}">Admin Panel</a>
									</li>
									<li class="nav-item dropdown">
										<a id="navbarDropdown" class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
											{{ Auth::user()->first_name }} <i class="fas fa-caret-down"></i>
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
								<!-- FARMER -->
								@elseif(Auth::user()->roles_id == 2)
								<li class="{{Request:: is('welcome') ? 'active' : ''}}">
									<a class="nav-link" href="{{ url('home') }}">Farmer Dashboard</a>
								</li>
								<li class="nav-item dropdown">
									<a id="navbarDropdown" class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
										{{ Auth::user()->first_name }} <i class="fas fa-caret-down"></i>
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
								<!-- CUSTOMER -->
								@elseif(Auth::user()->roles_id == 3 || Auth::user()->roles_id == 4)
								 <!-- Notifications -->
								<li class="nav-item dropdown" id="markasread" onclick="markNotificationAsRead()">
									<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
										<i class="fas fa-bell rel">
											@if( count(auth()->user()->unreadNotifications) > 0)
											<span class="notify-signal"></span>
											@endif
										</i>
									</a>
									<div class="dropdown-menu" aria-labelledby="navbarDropdown">
										@forelse (auth()->user()->Notifications()->take(10)->get() as $notification)
										@include('partials.notifications.'. snake_case(class_basename($notification->type)))
										@empty
											<a class="dropdown-item">
												<div class="media">
													<div class="media-body">
														<div class="font-13">No unread Notifications</div>
													</div>
												</div>
											</a>
										@endforelse
										<a class="dropdown-item" href="#">Action</a>
										<a class="dropdown-item" href="#">Another action</a>
										<div class="dropdown-divider"></div>
										<a class="dropdown-item" href="#">Something else here</a>
									</div>
								</li>
								<!-- Cart -->
								<li class="nav-item">
									<a class="nav-link" href="{{ url('cart') }}"><i class="fas fa-shopping-cart"></i> ({{ Cart::content()->count() }})</a>
								</li>
								<!-- Login -->
								<li class="nav-item dropdown">
									<a id="navbarDropdown" class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
										{{ Auth::user()->first_name }} <i class="fas fa-caret-down"></i>
									</a>
									<div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
										<a class="dropdown-item" href="{{ url('/orders/my_orders') }}">
											<i class="fas fa-clipboard-list"></i>
											Order History
										</a>
										<div class="dropdown-divider"></div>
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
				</nav>
			</div>	
		</div>

		<!-- Header Mobile -->
		<div class="wrap-header-mobile">
			<!-- Logo moblie -->		
			<div class="logo-mobile">
				<a href="index.html"><img src="images/icons/logo-01.png" alt="IMG-LOGO"></a>
			</div>

			<!-- Icon header -->
			<div class="wrap-icon-header flex-w flex-r-m m-r-15">
				<div class="icon-header-item cl2 hov-cl1 trans-04 p-r-11 js-show-modal-search">
					<i class="zmdi zmdi-search"></i>
				</div>

				<div class="icon-header-item cl2 hov-cl1 trans-04 p-r-11 p-l-10 icon-header-noti js-show-cart" data-notify="2">
					<i class="zmdi zmdi-shopping-cart"></i>
				</div>
			</div>

			<!-- Button show menu -->
			<div class="btn-show-menu-mobile hamburger hamburger--squeeze">
				<span class="hamburger-box">
					<span class="hamburger-inner"></span>
				</span>
			</div>
		</div>


		<!-- Menu Mobile -->
		<div class="menu-mobile">
			<ul class="main-menu-m">
				<li>
					<a href="index.html">Home</a>
					<ul class="sub-menu-m">
						<li><a href="index.html">Homepage 1</a></li>
						<li><a href="home-02.html">Homepage 2</a></li>
						<li><a href="home-03.html">Homepage 3</a></li>
					</ul>
					<span class="arrow-main-menu-m">
						<i class="fa fa-angle-right" aria-hidden="true"></i>
					</span>
				</li>

				<li>
					<a href="product.html">Shop</a>
				</li>

				<li>
					<a href="shoping-cart.html" class="label1 rs1" data-label1="hot">Features</a>
				</li>

				<li>
					<a href="blog.html">Blog</a>
				</li>

				<li>
					<a href="about.html">About</a>
				</li>

				<li>
					<a href="contact.html">Contact</a>
				</li>
			</ul>
		</div>

		

	</header>