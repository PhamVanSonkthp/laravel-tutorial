<div class="vertical-menu">

    <div data-simplebar class="h-100">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title">Chính</li>

                <li>
                    <a href="{{route('administrator.dashboard.index')}}" class="waves-effect">
                        <i class="mdi mdi-view-dashboard"></i>
                        <span> Tổng quan </span>
                    </a>
                </li>

                <li class="menu-title">Quản lý khóa học</li>

                <li @yield('category')>
                    <a href="{{route('categories.index')}}" class="waves-effect">
                        <i class="mdi mdi-cube-outline"></i>
                        <span> Danh mục khóa học </span>
                    </a>
                </li>

                <li @yield('product')>
                    <a href="{{route('administrator.products.index')}}" class="waves-effect">
                        <i class="mdi mdi-cube-outline"></i>
                        <span> Khóa học </span>
                    </a>
                </li>

                <li @yield('topic')>
                    <a href="{{route('administrator.topics.index')}}" class="waves-effect">
                        <i class="mdi mdi-cube-outline"></i>
                        <span> Chủ đề </span>
                    </a>
                </li>

                <li @yield('source')>
                    <a href="{{route('administrator.sources.index')}}" class="waves-effect">
                        <i class="mdi mdi-cube-outline"></i>
                        <span> Danh sách bài học </span>
                    </a>
                </li>

                <li class="menu-title">Quản lý Trading</li>

                <li @yield('trading')>
                    <a href="{{route('administrator.tradings.index')}}" class="waves-effect">
                        <i class="mdi mdi-cube-outline"></i>
                        <span> Danh sách trading </span>
                    </a>
                </li>

                <li @yield('register_trading')>
                    <a href="{{route('administrator.tradings.register.index')}}" class="waves-effect">
                        <i class="mdi mdi-cube-outline"></i>
                        <span> Danh sách đăng ký trading </span>
                    </a>
                </li>

                <li @yield('post_trading')>
                    <a href="{{route('administrator.tradings.post.index')}}" class="waves-effect">
                        <i class="mdi mdi-cube-outline"></i>
                        <span> Bài viết trading </span>
                    </a>
                </li>

                <li class="menu-title">Quản lý trang</li>

                <li @yield('slider')>
                    <a href="{{route('slider.index')}}" class="waves-effect">
                        <i class="mdi mdi-cube-outline"></i>
                        <span> Slider </span>
                    </a>
                </li>

                <li @yield('menu')>
                    <a href="{{route('administrator.menus.index')}}" class="waves-effect">
                        <i class="mdi mdi-cube-outline"></i>
                        <span> Menu </span>
                    </a>
                </li>

                <li @yield('post')>
                    <a href="{{route('administrator.post.index')}}" class="waves-effect">
                        <i class="mdi mdi-cube-outline"></i>
                        <span> Bài viết </span>
                    </a>
                </li>

                <li class="menu-title">Quản lý học viên</li>

                <li @yield('user')>
                    <a href="{{route('users.index')}}" class="waves-effect">
                        <i class="mdi mdi-cube-outline"></i>
                        <span> Danh sách học viên </span>
                    </a>
                </li>

                <li @yield('level')>
                    <a href="{{route('administrator.levels.index')}}" class="waves-effect">
                        <i class="mdi mdi-cube-outline"></i>
                        <span> Cấp độ </span>
                    </a>
                </li>

                <li @yield('gift')>
                    <a href="{{route('administrator.gifts.index')}}" class="waves-effect">
                        <i class="mdi mdi-cube-outline"></i>
                        <span> Rương quà </span>
                    </a>
                </li>

                <li class="menu-title">Giao dịch</li>

                <li @yield('invoice')>
                    <a href="{{route('invoices.index')}}" class="waves-effect">
                        <i class="mdi mdi-cube-outline"></i>
                        <span> Danh sách hóa đơn </span>
                    </a>
                </li>

                <li @yield('notification')>
                    <a href="{{route('administrator.notification.index')}}" class="waves-effect">
                        <i class="mdi mdi-cube-outline"></i>
                        <span> Danh sách thông báo </span>
                    </a>
                </li>

                <li>
                    <a href="{{route('administrator.payment_stripe.index')}}" class="waves-effect">
                        <i class="mdi mdi-cube-outline"></i>
                        <span> Payment stripe </span>
                    </a>
                </li>

                <li class="menu-title">Phân quyền</li>

                <li @yield('employee')>
                    <a href="{{route('administrator.employees.index')}}" class="waves-effect">
                        <i class="mdi mdi-cube-outline"></i>
                        <span>Danh sách nhân viên</span>
                    </a>
                </li>

                <li @yield('role')>
                    <a href="{{route('administrator.roles.index')}}" class="waves-effect">
                        <i class="mdi mdi-cube-outline"></i>
                        <span>Danh sách vai trò</span>
                    </a>
                </li>

                <li @yield('permission')>
                    <a href="{{route('administrator.permissions.create')}}" class="waves-effect">
                        <i class="mdi mdi-cube-outline"></i>
                        <span>Tạo dữ liệu phân quyền</span>
                    </a>
                </li>

            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
