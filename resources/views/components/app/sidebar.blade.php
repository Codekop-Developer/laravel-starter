<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="{{ url('dashboard') }}">{!! name_app() !!}</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="{{ url('dashboard') }}">{!! name_app('CD') !!}</a>
        </div>
        <ul class="sidebar-menu">
            <li class="{{ $sidebar == 'dashboard' ? 'active' : '' }}">
                <a class="nav-link" href="{{ url('dashboard') }}">
                <i class="fas fa-fire"></i> <span>Dashboard</span></a>
            </li>
            <li class="menu-header">System</li>
            <li class="dropdown {{ $sidebar == 'user_management' ? 'active' : '' }}
                {{ $sidebar == 'role_management' ? 'active' : '' }}">
                <a href="#" class="nav-link has-dropdown">
                    <i class="fas fa-user"></i>
                    <span>Access</span>
                </a>
                <ul class="dropdown-menu">
                    <li class="{{ $sidebar == 'user_management' ? 'active' : '' }}">
                        <a class="nav-link" href="{{ url('users/management') }}">
                            <i class="fas fa-users"></i> <span>User Management</span>
                        </a>
                    </li>
                    <li>
                        <a class="nav-link" href="index-0.html">
                            <i class="fas fa-bars"></i> <span>Menu Management</span>
                        </a>
                    </li>
                    <li class="{{ $sidebar == 'role_management' ? 'active' : '' }}">
                        <a class="nav-link" href="{{ url('users/role') }}">
                            <i class="fas fa-ban"></i> <span>Role Management</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="{{ $sidebar == 'log_login' ? 'active' : '' }}">
                <a class="nav-link" href="{{ url('log-login') }}">
                    <i class="fas fa-history"></i> <span>Log Login</span>
                </a>
            </li>
        </ul>
    </aside>
</div>