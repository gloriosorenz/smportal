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
            @if(auth()->user()->roles_id == 1)
            <!-- Dashboard -->
            <li class="{{Request:: is('dashboard') ? 'active' : ''}}">
                <a href="{{ route('dashboard') }}"><i class="sidebar-item-icon fa fa-th-large"></i>
                    <span class="nav-label">Dashboard</span>
                </a>
            </li>
                <!-- Profile -->
                <li class="{{Request:: is('profile') ? 'active' : ''}}">
                    <a href="{{ route('profile') }}"><i class="sidebar-item-icon fas fa-user-circle"></i>
                        <span class="nav-label">Profile</span>
                    </a>
                </li>
                <li class="heading">FUNCTIONS</li>
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
                <!-- Orders -->
                {{-- <li>
                    <a href="{{ route('orders.index') }}"><i class="sidebar-item-icon fas fa-file"></i>
                        <span class="nav-label">Orders</span>
                    </a>
                </li> --}}
                <!-- Order Products -->
                <li class="{{Request:: is('order_products') ? 'active' : ''}}">
                    <a href="{{ route('order_products.index') }}"><i class="sidebar-item-icon fas fa-clipboard-list"></i>
                        <span class="nav-label">Order Products</span>
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
                        {{-- <li>
                            <a href="{{ route('roles.index') }}">Roles</a>
                        </li> --}}
                    </ul>
                </li>
                
                <!-- Reports  -->
                <li class="heading">Reports</li>
                <li class="{{Request:: is('plant_reports') ? 'active' : ''}}">
                    <a href="{{ route('plant_reports.index') }}"><i class="sidebar-item-icon fas fa-chart-line"></i>
                        <span class="nav-label">Plant Report</span>
                    </a>
                </li>
                <li class="{{Request:: is('sales_reports') ? 'active' : ''}}">
                    <a href="{{ route('sales_reports.index') }}"><i class="sidebar-item-icon fas fa-chart-line"></i>
                        <span class="nav-label">Sales Report</span>
                    </a>
                </li>
                <li class="{{Request:: is('damage_reports') ? 'active' : ''}}">
                    <a href="{{ route('damage_reports.index') }}"><i class="sidebar-item-icon fas fa-chart-line"></i>
                        <span class="nav-label">Damage Report</span>
                    </a>
                </li>

            <!-- ------------------------------------------------------------------------------------------------------------------------ -->

             
            <!-- Rice Farmer Functionalities -->
            @elseif(auth()->user()->roles_id == 2)
            <!-- Dashboard -->
            <li class="{{Request:: is('dashboard') ? 'active' : ''}}">
                <a href="{{ route('dashboard') }}"><i class="sidebar-item-icon fa fa-th-large"></i>
                    <span class="nav-label">Dashboard</span>
                </a>
            </li>                    
                <!-- Profile -->
                <li class="{{Request:: is('profile') ? 'active' : ''}}">
                    <a href="{{ route('profile') }}"><i class="sidebar-item-icon fas fa-user-circle"></i>
                        <span class="nav-label">Profile</span>
                    </a>
                </li>
                <li class="heading">FUNCTIONS</li>
                <!-- Season -->
                {{-- <li class="{{Request:: is('seasons') ? 'active' : ''}}">
                    <a href="{{ route('seasons.index') }}"><i class="sidebar-item-icon fa fa-cloud-sun-rain"></i>
                        <span class="nav-label">Seasons</span>
                    </a>
                </li> --}}
                <!-- Season List-->
                <li class="{{Request:: is('season_lists') ? 'active' : ''}}">
                    <a href="{{ route('season_lists.index') }}"><i class="sidebar-item-icon fas fa-list"></i>
                        <span class="nav-label">Season List</span>
                    </a>
                </li>
                <!-- Products -->
                <li class="{{Request:: is('product_lists') ? 'active' : ''}}">
                    <a href="{{ route('product_lists.index') }}"><i class="sidebar-item-icon fas fa-box"></i>
                        <span class="nav-label">Product List</span>
                    </a>
                </li>
                <!-- Orders -->
                {{-- <li class="{{Request:: is('orders') ? 'active' : ''}}">
                    <a href="{{ route('orders.index') }}"><i class="sidebar-item-icon fas fa-folder-open"></i>
                        <span class="nav-label">Orders</span>
                    </a>
                </li> --}}
                <!-- Order Products -->
                <li class="{{Request:: is('order_products') ? 'active' : ''}}">
                    <a href="{{ route('order_products.index') }}"><i class="sidebar-item-icon fas fa-clipboard-list"></i>
                        <span class="nav-label">Order Products</span>
                    </a>
                </li>

                
                <!-- Reports  -->
                <li class="heading">Reports</li>
                <li class="{{Request:: is('plant_reports') ? 'active' : ''}}">
                    <a href="{{ route('plant_reports.index') }}"><i class="sidebar-item-icon fas fa-chart-line"></i>
                        <span class="nav-label">Plant Report</span>
                    </a>
                </li>
                <li class="{{Request:: is('sales_reports') ? 'active' : ''}}">
                    <a href="{{ route('sales_reports.index') }}"><i class="sidebar-item-icon fas fa-chart-line"></i>
                        <span class="nav-label">Sales Report</span>
                    </a>
                </li>
                <li class="{{Request:: is('damage_reports') ? 'active' : ''}}">
                    <a href="{{ route('damage_reports.index') }}"><i class="sidebar-item-icon fas fa-chart-line"></i>
                        <span class="nav-label">Damage Report</span>
                    </a>
                </li>

            

            @endif

        </ul>
    </div>
</nav>
<!-- END SIDEBAR-->
