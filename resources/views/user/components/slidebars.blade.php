<div class="vertical-menu">

    <div data-simplebar class="h-100">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title">Main</li>


                <li>
                    <a href="{{route('welcome.index')}}" class="waves-effect">
                        <i class="mdi mdi-cube-outline"></i>
                        <span> Trang chủ </span>
                    </a>
                </li>

                <li>
                    <a href="#" class="waves-effect">
                        <i class="mdi mdi-cube-outline"></i>
                        <span> Các khóa học </span>
                    </a>
                </li>

                @auth

                <li>
                    <a href="#" class="waves-effect">
                        <i class="mdi mdi-cube-outline"></i>
                        <span> Trading </span>
                    </a>
                </li>

                <li>
                    <a href="{{route('user.sources')}}" class="waves-effect">
                        <i class="mdi mdi-cube-outline"></i>
                        <span> Khóa học của tôi </span>
                    </a>
                </li>

                    <li>
                        <a href="{{route('user.tradings')}}" class="waves-effect">
                            <i class="mdi mdi-cube-outline"></i>
                            <span> Trading của tôi </span>
                        </a>
                    </li>

                <li>
                    <a href="{{route('user.sources')}}" class="waves-effect">
                        <i class="mdi mdi-cube-outline"></i>
                        <span> Thông báo </span>
                    </a>
                </li>

                <li>
                    <a href="{{route('user.sources')}}" class="waves-effect">
                        <i class="mdi mdi-cube-outline"></i>
                        <span> Hóa đơn </span>
                    </a>
                </li>
                @endauth
            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
