<div class="vertical-menu">

    <div data-simplebar class="h-100">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title">Main</li>


                <li>
                    <a href="{{route('welcome.index')}}" class="waves-effect">
                        <i class="mdi mdi-home-outline"></i>
                        <span> Trang chủ </span>
                    </a>
                </li>

                <li>
                    <a href="{{route('welcome.products')}}" class="waves-effect">
                        <i class="mdi mdi-cube-outline"></i>
                        <span> Các khóa học </span>
                    </a>
                </li>

                <li>
                    <a href="{{route('welcome.tradings')}}" class="waves-effect">
                        <i class="mdi mdi-chart-line"></i>
                        <span> Trading </span>
                    </a>
                </li>

                <li>
                    <a href="{{route('welcome.posts')}}" class="waves-effect">
                        <i class="mdi mdi-newspaper-variant-multiple-outline"></i>
                        <span> Tin tức </span>
                    </a>
                </li>

                @auth

                <li>
                    <a href="{{route('user.sources')}}" class="waves-effect">
                        <i class="mdi mdi-cube-outline"></i>
                        <span> Khóa học của tôi </span>
                    </a>
                </li>

                    <li>
                        <a href="{{route('user.tradings')}}" class="waves-effect">
                            <i class="mdi mdi-chart-histogram"></i>
                            <span> Trading của tôi </span>
                        </a>
                    </li>

                <li>
                    <a href="{{route('user.notifications')}}" class="waves-effect">
                        <i class="mdi mdi-bell-alert-outline"></i>
                        <span> Thông báo </span>
                    </a>
                </li>

                <li>
                    <a href="{{route('user.invoices')}}" class="waves-effect">
                        <i class="mdi mdi-transfer"></i>
                        <span> Hóa đơn </span>
                    </a>
                </li>

                <li>
                    <a href="{{route('user.gifts')}}" class="waves-effect">
                        <i class="mdi mdi-gift-outline"></i>
                        <span> Quà tặng </span>
                    </a>
                </li>
                @endauth
            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
