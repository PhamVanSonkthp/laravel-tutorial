<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <title>Dashboard | Admiria - Admin & Dashboard Template</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description">
    <meta content="Themesbrand" name="author">
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{asset('administrator/assets/images/users/logo.png')}}">

    @yield('title')

    <!-- Bootstrap Css -->
    <link href="{{asset('administrator/assets/css/bootstrap.min.css')}}"  rel="stylesheet" type="text/css">
    <!-- Icons Css -->
    <link href="{{asset('administrator/assets/css/icons.min.css')}}" rel="stylesheet" type="text/css">
    <!-- App Css-->
    <link href="{{asset('administrator/assets/css/app.min.css')}}" rel="stylesheet" type="text/css">

    @yield('css')


</head>

<body id="body" data-sidebar="dark" class="">


<!-- Loader -->
<div id="preloader">
    <div id="status">
        <div class="spinner"></div>
    </div>
</div>

<!-- Begin page -->
<div id="layout-wrapper">

@include('user.components.header')

<!-- ========== Left Sidebar Start ========== -->
@include('user.components.slidebars')
<!-- Left Sidebar End -->

    <!-- ============================================================== -->
    <!-- Start right Content here -->
    <!-- ============================================================== -->

    <div class="main-content">
        <div class="page-content">
            <div class="container-fluid">
{{--                <div class="row">--}}
                    @yield('content')
{{--                </div>--}}
            </div>
        </div>
    </div>


@include('user.components.footer')
<!-- end main content-->

</div>
<!-- END layout-wrapper -->

<!-- Right Sidebar -->
<div class="right-bar">
    <div data-simplebar class="h-100">
        <div class="rightbar-title px-3 py-4">
            <a href="javascript:void(0);" class="right-bar-toggle float-end">
                <i class="mdi mdi-close noti-icon"></i>
            </a>
            <h5 class="m-0">Settings</h5>
        </div>

        <!-- Settings -->
        <hr class="mt-0">
        <h6 class="text-center mb-0">Choose Layouts</h6>

        <div class="p-4">
            <div class="mb-2">
                <img src="{{asset('administrator/assets/images/layouts/layout-1.jpg')}}" class="img-fluid img-thumbnail"
                     alt="Layouts-1">
            </div>
            <div class="form-check form-switch mb-3">
                <input class="form-check-input theme-choice" type="checkbox" id="light-mode-switch">
                <label class="form-check-label" for="light-mode-switch">Light Mode</label>
            </div>

            <div class="mb-2">
                <img src="{{asset('administrator/assets/images/layouts/layout-2.jpg')}}" class="img-fluid img-thumbnail"
                     alt="Layouts-2">
            </div>

            <div class="form-check form-switch mb-3">
                <input class="form-check-input theme-choice" type="checkbox" id="dark-mode-switch"
                       data-bsStyle="{{asset('administrator/assets/css/bootstrap-dark.min.css')}}"
                       data-appStyle="{{asset('administrator/assets/css/app-dark.min.css')}}">
                <label class="form-check-label" for="dark-mode-switch">Dark Mode</label>
            </div>

            <div class="mb-2">
                <img src="{{asset('administrator/assets/images/layouts/layout-3.jpg')}}" class="img-fluid img-thumbnail"
                     alt="Layouts-3">
            </div>

            <div class="form-check form-switch mb-3">
                <input class="form-check-input theme-choice" type="checkbox" id="rtl-mode-switch"
                       data-appStyle="{{asset('administrator/assets/css/app-rtl.min.css')}}">
                <label class="form-check-label" for="rtl-mode-switch">RTL Mode</label>
            </div>


        </div>

    </div> <!-- end slimscroll-menu-->
</div>
<!-- /Right-bar -->

<!-- Right bar overlay-->
<div class="rightbar-overlay"></div>



<!-- JAVASCRIPT -->
<script src="{{asset('administrator/assets/libs/jquery/jquery.min.js')}}"></script>

<script>
    function deviceTypeMobile(){
        const ua = navigator.userAgent;
        if (/(tablet|ipad|playbook|silk)|(android(?!.*mobi))/i.test(ua)) {
            return true
        }
        else if (/Mobile|Android|iP(hone|od)|IEMobile|BlackBerry|Kindle|Silk-Accelerated|(hpw|web)OS|Opera M(obi|ini)/.test(ua)) {
            return true
        }
        return false
    }

    if(!deviceTypeMobile()){
        $('#body').addClass('vertical-collpsed')
    }
</script>

<script src="{{asset('administrator/assets/libs/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('administrator/assets/libs/metismenu/metisMenu.min.js')}}"></script>
<script src="{{asset('administrator/assets/libs/simplebar/simplebar.min.js')}}"></script>
<script src="{{asset('administrator/assets/libs/node-waves/waves.min.js')}}"></script>
<script src="{{asset('administrator/assets/js/app.js')}}"></script>



@yield('js')

</body>


</html>
