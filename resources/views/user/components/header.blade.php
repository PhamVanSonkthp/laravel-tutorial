<header id="page-topbar">
    <div class="navbar-header">
        <div class="d-flex">
            <!-- LOGO -->
            <div class="navbar-brand-box">
                <a href="index.html" class="logo logo-dark">
                                <span class="logo-sm">
                                    <img src="{{asset('administrator/assets/images/logo.png')}}" alt="" height="22">
                                </span>
                    <span class="logo-lg">
                                    <img src="{{asset('administrator/assets/images/logo-dark.png')}}" alt="" height="17">
                                </span>
                </a>

                <a href="index.html" class="logo logo-light">
                                <span class="logo-sm">
                                    <img src="{{asset('administrator/assets/images/logo-light.png')}}" alt="" height="22">
                                </span>
                    <span class="logo-lg">
                                    <img src="{{asset('administrator/assets/images/logo-light.png')}}" alt="" height="36">
                                </span>
                </a>
            </div>

            <button type="button" class="btn btn-sm px-3 font-size-24 header-item waves-effect"
                    id="vertical-menu-btn">
                <i class="mdi mdi-menu"></i>
            </button>

            <div class="d-none d-sm-block ms-2">
                @yield('name')
            </div>
        </div>

        <!-- Search input -->
        <div class="search-wrap" id="search-wrap">
            <div class="search-bar">
                <input class="search-input form-control" placeholder="Search">
                <a href="#" class="close-search toggle-search" data-target="#search-wrap">
                    <i class="mdi mdi-close-circle"></i>
                </a>
            </div>
        </div>

        <div class="d-flex">

            <div class="dropdown d-none d-lg-inline-block me-2">
                <button type="button" class="btn header-item toggle-search noti-icon waves-effect"
                        data-target="#search-wrap">
                    <i class="mdi mdi-magnify"></i>
                </button>
            </div>

            <div class="dropdown d-none d-lg-inline-block me-2">
                <button type="button" class="btn header-item noti-icon waves-effect" data-bs-toggle="fullscreen">
                    <i class="mdi mdi-fullscreen"></i>
                </button>
            </div>


            <div class="dropdown d-inline-block">
                <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown"
                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <img class="rounded-circle header-profile-user"
                         src="{{asset('administrator/assets/images/users/avatar-1.jpg')}}" alt="Header Avatar">
                </button>
                <div class="dropdown-menu dropdown-menu-end">
                    <!-- item-->
                    <a class="dropdown-item" href="{{route('user.register')}}">Register</a>
                    <a class="dropdown-item text-danger" href="#">Logout</a>
                </div>
            </div>


        </div>
    </div>
</header>
