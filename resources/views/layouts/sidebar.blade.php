<div class="left-side-menu">
    <div class="h-100" data-simplebar>
        <div class="user-box text-center">
            <img src="{{ asset('assets/images/users/user-1.jpg') }}" alt="user-img" title="Mat Helme" class="rounded-circle img-thumbnail avatar-md">
                <div class="dropdown">
                    <a href="index.html#" class="user-name dropdown-toggle h5 mt-2 mb-1 d-block" data-bs-toggle="dropdown"  aria-expanded="false">{{ auth()->user()->name }}</a>
                    <div class="dropdown-menu user-pro-dropdown">
                        <!-- item-->
                        <a href="javascript:void(0);" class="dropdown-item notify-item">
                            <i class="fe-user me-1"></i>
                            <span>My Account</span>
                        </a>

                        <!-- item-->
                        <a href="javascript:void(0);" class="dropdown-item notify-item">
                            <i class="fe-settings me-1"></i>
                            <span>Settings</span>
                        </a>

                        <!-- item-->
                        <a href="javascript:void(0);" class="dropdown-item notify-item">
                            <i class="fe-lock me-1"></i>
                            <span>Lock Screen</span>
                        </a>

                        <!-- item-->
                        <a href="javascript:void(0);" class="dropdown-item notify-item">
                            <i class="fe-log-out me-1"></i>
                            <span>Logout</span>
                        </a>
                    </div>
                </div>

            {{-- <p class="text-muted left-user-info">Admin Head</p> --}}

            <ul class="list-inline">
                <li class="list-inline-item">
                    <a href="{{ route('logout') }}">
                        <i class="mdi mdi-power"></i>
                    </a>
                </li>
            </ul>
        </div>

        <div id="sidebar-menu">
            <ul id="side-menu">
                <li class="menu-title">Navigation</li>
                <li class="{{ Route::is('dashboard*') ? 'menuitem-active' : '' }}">
                    <a href="{{ route('dashboard') }}">
                        <i class="mdi mdi-view-dashboard-outline"></i>
                        <span> Dashboard </span>
                    </a>
                </li>
                <li class="{{ Route::is('class*') ? 'menuitem-active' : '' }}">
                    <a href="{{ route('class') }}">
                        <i class="mdi mdi-bulletin-board"></i>
                        <span> Class </span>
                    </a>
                </li>
                <li class="{{ Route::is('quiz*') ? 'menuitem-active' : '' }}">
                    <a href="{{ route('quiz') }}">
                        <i class="mdi mdi-help-box-multiple-outline"></i>
                        <span> Quiz </span>
                    </a>
                </li>

                <li class="menu-title mt-2">Apps</li>
                <li>
                    <a href="index.html#email" data-bs-toggle="collapse">
                        <i class="mdi mdi-email-outline"></i>
                        <span> Email </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="email">
                        <ul class="nav-second-level">
                            <li>
                                <a href="email-inbox.html">Inbox</a>
                            </li>
                            <li>
                                <a href="email-templates.html">Email Templates</a>
                            </li>
                        </ul>
                    </div>
                </li>
            </ul>
        </div>

        <div class="clearfix"></div>
    </div>
</div>
