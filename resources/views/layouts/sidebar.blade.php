<aside class="main-sidebar sidebar-dark-primary elevation-4">

    @auth()
    <!-- Brand Logo -->
    <a href="dashboard" class="brand-link">
        <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-1"
             style="opacity: .8">
        <span class="brand-text font-weight-light">Dashboard</span>
    </a>
    @endauth
    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
            </div>

            @auth()
                <div class="info">
                    <a {{-- add profile update linke--}} class="d-block">{{ auth()->user()->name }}</a>
                </div>
            @endauth

        </div>

        <!-- SidebarSearch Form -->
    {{--        <div class="form-inline">--}}
    {{--            <div class="input-group" data-widget="sidebar-search">--}}
    {{--                <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">--}}
    {{--                <div class="input-group-append">--}}
    {{--                    <button class="btn btn-sidebar">--}}
    {{--                        <i class="fas fa-search fa-fw"></i>--}}
    {{--                    </button>--}}
    {{--                </div>--}}
    {{--            </div>--}}
    {{--        </div>--}}

    <!-- Sidebar Menu -->

        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library -->

                @auth()
                    {{--
                    <li class="nav-item">
                        <a href="dashboard" class="nav-link">
                            {{--                        <i class="nav-icon fas fa-tachometer-alt"></i>--}
                            <p>
                                Dashboard
                            </p>
                        </a>

                    </li>
                    --}}
                    <li class="nav-item">
                        <a href="campaigns" class="nav-link">
                            {{--                        <i class="nav-icon fas fa-th"></i>--}}
                            <p>
                                Campaigns
                                {{--<span class="right badge badge-danger">New</span>--}}
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="users" class="nav-link">
                            {{--                        <i class="fas fa-user"></i>--}}
                            <p>
                                User Management
                            </p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="keywords" class="nav-link">
                            {{--                        <i class="fas fa-user"></i>--}}
                            <p>
                                Keywords Management
                            </p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault();
                            this.closest('form').submit(); " role="button">
                                    {{--                            <i class="fas fa-sign-out-alt"></i>--}}
                                    {{ __('Log Out') }}
                            </a>

                        </form>
                    </li>
                @endauth
            </ul>

        </nav>


        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>

