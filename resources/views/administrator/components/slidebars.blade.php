<div class="vertical-menu">

    <div data-simplebar class="h-100">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title">Main</li>


                <li>
                    <a href="javascript: void(0);" class="waves-effect">
                        <span class="badge rounded-pill bg-primary float-end">20+</span>
                        <i class="mdi mdi-view-dashboard"></i>
                        <span> Dashboard </span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="index.html">Dashboard One</a></li>
                        <li><a href="dashboard-2.html">Dashboard Two</a></li>
                    </ul>
                </li>

                <li>
                    <a href="{{route('categories.index')}}" class="waves-effect">
                        <i class="mdi mdi-cube-outline"></i>
                        <span> Quản lý danh mục khóa học </span>
                    </a>
                </li>

                <li>
                    <a href="{{route('products.index')}}" class="waves-effect">
                        <i class="mdi mdi-cube-outline"></i>
                        <span> Quản lý khóa học </span>
                    </a>
                </li>

                <li>
                    <a href="{{route('slider.index')}}" class="waves-effect">
                        <i class="mdi mdi-cube-outline"></i>
                        <span> Quản lý Slider </span>
                    </a>
                </li>

                <li>
                    <a href="#" class="waves-effect">
                        <i class="mdi mdi-cube-outline"></i>
                        <span> Quản lý Menu </span>
                    </a>
                </li>

                <li>
                    <a href="#" class="waves-effect">
                        <i class="mdi mdi-cube-outline"></i>
                        <span> Quản lý rương quà </span>
                    </a>
                </li>

                <li class="menu-title">Quản lý khách hàng</li>

                <li>
                    <a href="{{route('users.index')}}" class="waves-effect">
                        <i class="mdi mdi-cube-outline"></i>
                        <span> Danh sách khách hàng </span>
                    </a>
                </li>

                <li class="menu-title">Phân quyền</li>
{{--                <li>--}}
{{--                    <a href="{{route('users.index')}}" class="waves-effect">--}}
{{--                        <i class="mdi mdi-calendar-check"></i>--}}
{{--                        <span>Danh sách người dùng</span>--}}
{{--                    </a>--}}
{{--                </li>--}}

                <li>
                    <a href="{{route('roles.index')}}" class="waves-effect">
                        <i class="mdi mdi-calendar-check"></i>
                        <span>Danh sách vai trò</span>
                    </a>
                </li>

                <li>
                    <a href="{{route('permissions.create')}}" class="waves-effect">
                        <i class="mdi mdi-calendar-check"></i>
                        <span>Tạo dữ liệu phân quyền</span>
                    </a>
                </li>

            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
