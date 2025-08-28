<aside class="main-sidebar elevation-4 main-sidebar elevation-4 sidebar-primary-primary">
    <!-- Sidebar -->
    @php
        use Illuminate\Support\Facades\Route;
    @endphp

    <div class="sidebar pt-0 mt-0">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel">
            <a href="{{ route('user.dashboard') }}" class="name text-dark">
                <img src="{{ asset('assets/core/logo.png') }}" alt="" width="200px">
            </a>
        </div>
        <!-- Sidebar Menu -->

        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column " data-widget="treeview" role="menu"
                data-accordion="false">
                <li class="nav-item {{ Route::currentRouteName() == 'user.dashboard' ? 'menu-open' : '' }}">
                    <a href="{{ route('user.dashboard') }}"
                        class="nav-link {{ Route::currentRouteName() == 'user.dashboard' ? 'active' : '' }} @if (request()->path() == 'user/dashboard') active @endif">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            {{ __('Dashboard') }}
                        </p>
                    </a>
                </li>

                <li class="nav-item {{ Route::currentRouteName() == 'user.profile.edit' ? 'menu-open' : '' }}">
                    <a href="{{ route('user.profile.edit') }}"
                        class="nav-link {{ Route::currentRouteName() == 'user.profile.edit' ? 'active' : '' }}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            {{ __('Profile') }}
                        </p>
                    </a>
                </li>

            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
