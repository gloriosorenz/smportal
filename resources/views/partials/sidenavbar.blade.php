 <!-- START SIDEBAR-->
 <nav class="page-sidebar" id="sidebar">
    <div id="sidebar-collapse">
        <div class="admin-block d-flex">
            <div>
                <img src="/img/admin-avatar.png" width="45px" />
            </div>
            <div class="admin-info">
                <div class="font-strong">{{ auth()->user()->first_name }} {{ auth()->user()->last_name }}</div><small>{{ auth()->user()->roles->title }}</small></div>
        </div>
        <ul class="side-menu metismenu">

            <!-- Admin Functionalities -->
            @if(Auth::user()->roles_id == 1)
            <!-- Dashboard -->
            <li>
                <a class="active" href="{{ route('home') }}"><i class="sidebar-item-icon fa fa-th-large"></i>
                    <span class="nav-label">Dashboard</span>
                </a>
            </li>
            <!-- Profile -->
             <li>
                <a class="active" href="{{ route('profile') }}"><i class="sidebar-item-icon fas fa-user-circle"></i>
                    <span class="nav-label">Profile</span>
                </a>
            </li>
            <li class="heading">FEATURES</li>
            <!-- Season -->
            <li>
                <a href="{{ route('seasons.index') }}"><i class="sidebar-item-icon fa fa-cloud-sun-rain"></i>
                    <span class="nav-label">Seasons</span>
                </a>
            </li>
            <!-- Season List-->
            <li>
                <a href="{{ route('season_lists.index') }}"><i class="sidebar-item-icon fas fa-list"></i>
                    <span class="nav-label">Seasons List</span>
                </a>
            </li>
            <!-- Orders -->
            <li>
                <a href="{{ route('orders.index') }}"><i class="sidebar-item-icon fas fa-file"></i>
                    <span class="nav-label">Orders</span>
                </a>
            </li>
            <!-- User Management-->
            <li>
                <a href="javascript:;"><i class="sidebar-item-icon fas fa-users"></i>
                    <span class="nav-label">User Management</span><i class="fas fa-angle-left arrow"></i></a>
                <ul class="nav-2-level collapse">
                    <li>
                        <a href="{{ route('administrators.index') }}">Administrators</a>
                    </li>
                    <li>
                        <a href="{{ route('farmers.index') }}">Farmers</a>
                    </li>
                    <li>
                        <a href="{{ route('customers.index') }}">Customers</a>
                    </li>
                    <li>
                        <a href="{{ route('roles.index') }}">Roles</a>
                    </li>
                </ul>
            </li>
            
             <!-- Reports  -->
             <li class="heading">Reports</li>
             <li class="{{Request:: is('') ? 'active' : ''}}">
                 <a href="{{ route('order_products.index') }}"><i class="sidebar-item-icon fas fa-chart-line"></i>
                     <span class="nav-label">Plant Report</span>
                 </a>
             </li>
             <li class="{{Request:: is('') ? 'active' : ''}}">
                 <a href="{{ route('order_products.index') }}"><i class="sidebar-item-icon fas fa-chart-line"></i>
                     <span class="nav-label">Sales Report</span>
                 </a>
             </li>
             <li class="{{Request:: is('') ? 'active' : ''}}">
                 <a href="{{ route('order_products.index') }}"><i class="sidebar-item-icon fas fa-chart-line"></i>
                     <span class="nav-label">Damage Report</span>
                 </a>
             </li>
             <li class="{{Request:: is('') ? 'active' : ''}}">
                 <a href="{{ route('order_products.index') }}"><i class="sidebar-item-icon fas fa-chart-line"></i>
                     <span class="nav-label">Harvest Report</span>
                 </a>
             </li>






            <!-- Rice Farmer Functionalities -->
            @elseif(Auth::user()->roles_id == 2)
            <!-- Dashboard -->
            <li class="{{Request:: is('home') ? 'active' : ''}}">
                <a href="{{ route('home') }}"><i class="sidebar-item-icon fa fa-th-large"></i>
                    <span class="nav-label">Dashboard</span>
                </a>
            </li>
            <!-- Profile -->
             <li class="{{Request:: is('profile') ? 'active' : ''}}">
                <a href="{{ route('profile') }}"><i class="sidebar-item-icon fas fa-user-circle"></i>
                    <span class="nav-label">Profile</span>
                </a>
            </li>
            <li class="heading">FEATURES</li>
            <!-- Season -->
            <li class="{{Request:: is('seasons') ? 'active' : ''}}">
                <a href="{{ route('seasons.index') }}"><i class="sidebar-item-icon fa fa-cloud-sun-rain"></i>
                    <span class="nav-label">Seasons</span>
                </a>
            </li>
            <!-- Season List-->
            <li class="{{Request:: is('season_lists') ? 'active' : ''}}">
                <a href="{{ route('season_lists.index') }}"><i class="sidebar-item-icon fas fa-list"></i>
                    <span class="nav-label">Seasons List</span>
                </a>
            </li>
            <!-- Products -->
            <li class="{{Request:: is('product_lists') ? 'active' : ''}}">
                <a href="{{ route('product_lists.index') }}"><i class="sidebar-item-icon fas fa-box"></i>
                    <span class="nav-label">Products</span>
                </a>
            </li>
            <!-- Orders -->
            <li class="{{Request:: is('orders') ? 'active' : ''}}">
                <a href="{{ route('orders.index') }}"><i class="sidebar-item-icon fas fa-folder-open"></i>
                    <span class="nav-label">Orders</span>
                </a>
            </li>
            <!-- Order Products -->
            <li class="{{Request:: is('order_products') ? 'active' : ''}}">
                <a href="{{ route('order_products.index') }}"><i class="sidebar-item-icon fas fa-copy"></i>
                    <span class="nav-label">Order Products</span>
                </a>
            </li>

            <!-- Reports  -->
            <li class="heading">Reports</li>
            <li class="{{Request:: is('') ? 'active' : ''}}">
                <a href="{{ route('order_products.index') }}"><i class="sidebar-item-icon fas fa-chart-line"></i>
                    <span class="nav-label">Plant Report</span>
                </a>
            </li>
            <li class="{{Request:: is('') ? 'active' : ''}}">
                <a href="{{ route('order_products.index') }}"><i class="sidebar-item-icon fas fa-chart-line"></i>
                    <span class="nav-label">Sales Report</span>
                </a>
            </li>
            <li class="{{Request:: is('') ? 'active' : ''}}">
                <a href="{{ route('order_products.index') }}"><i class="sidebar-item-icon fas fa-chart-line"></i>
                    <span class="nav-label">Damage Report</span>
                </a>
            </li>
            <li class="{{Request:: is('') ? 'active' : ''}}">
                <a href="{{ route('order_products.index') }}"><i class="sidebar-item-icon fas fa-chart-line"></i>
                    <span class="nav-label">Harvest Report</span>
                </a>
            </li>
            

            @endif








            <li class="heading">PAGES</li>
            <li>
                <a href="calendar.html"><i class="sidebar-item-icon fa fa-calendar"></i>
                    <span class="nav-label">Calendar</span>
                </a>
            </li>
            <li>
                <a href="javascript:;"><i class="sidebar-item-icon fa fa-file"></i>
                    <span class="nav-label">Pages</span><i class="fa fa-angle-left arrow"></i></a>
                <ul class="nav-2-level collapse">
                    <li>
                        <a href="invoice.html">Invoice</a>
                    </li>
                    <li>
                        <a href="profile.html">Profile</a>
                    </li>
                    <li>
                        <a href="login.html">Login</a>
                    </li>
                    <li>
                        <a href="register.html">Register</a>
                    </li>
                    <li>
                        <a href="lockscreen.html">Lockscreen</a>
                    </li>
                    <li>
                        <a href="forgot_password.html">Forgot password</a>
                    </li>
                    <li>
                        <a href="error_404.html">404 error</a>
                    </li>
                    <li>
                        <a href="error_500.html">500 error</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="javascript:;"><i class="sidebar-item-icon fa fa-sitemap"></i>
                    <span class="nav-label">Menu Levels</span><i class="fa fa-angle-left arrow"></i></a>
                <ul class="nav-2-level collapse">
                    <li>
                        <a href="javascript:;">Level 2</a>
                    </li>
                    <li>
                        <a href="javascript:;">
                            <span class="nav-label">Level 2</span><i class="fa fa-angle-left arrow"></i></a>
                        <ul class="nav-3-level collapse">
                            <li>
                                <a href="javascript:;">Level 3</a>
                            </li>
                            <li>
                                <a href="javascript:;">Level 3</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</nav>
<!-- END SIDEBAR-->
