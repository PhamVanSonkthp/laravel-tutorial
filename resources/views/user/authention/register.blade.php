<!doctype html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <title>Register 2 | Admiria - Admin & Dashboard Template</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description">
    <meta content="Themesbrand" name="author">
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{asset('administrator/assets/images/favicon.ico')}}">

    <link href="{{asset('administrator/assets/css/bootstrap.min.css')}}"  rel="stylesheet" type="text/css">
    <!-- Icons Css -->
    <link href="{{asset('administrator/assets/css/icons.min.css')}}" rel="stylesheet" type="text/css">
    <!-- App Css-->
    <link href="{{asset('administrator/assets/css/app.min.css')}}" rel="stylesheet" type="text/css">

</head>

<body data-sidebar="dark">


<!-- Loader -->
<div id="preloader"><div id="status"><div class="spinner"></div></div></div>

<!-- Begin page -->
<div class="accountbg" style="background: url({{asset('assets/images/bg-2.jpg')}});background-size: cover;background-position: center;"></div>

<div class="wrapper-page account-page-full">

    <div class="card shadow-none">
        <div class="card-block">

            <div class="account-box">

                <div class="card-box shadow-none p-4">
                    <div class="p-2">
                        <div class="text-center mt-4">
                            <a href="index.html"><img src="{{asset('assets/images/logo.png')}}" height="30" alt="logo"></a>
                        </div>

                        <h4 class="font-size-18 mt-5 text-center">Free Register</h4>
                        <p class="text-muted text-center">Get your free Admiria account now.</p>

                        <form class="mt-4" action="#">

                            <div class="mb-3">
                                <label class="form-label" for="useremail">Email</label>
                                <input type="email" class="form-control" id="useremail" placeholder="Enter email">
                            </div>

                            <div class="mb-3">
                                <label class="form-label" for="username">Username</label>
                                <input type="text" class="form-control" id="username" placeholder="Enter username">
                            </div>

                            <div class="mb-3">
                                <label class="form-label" for="userpassword">Password</label>
                                <input type="password" class="form-control" id="userpassword" placeholder="Enter password">
                            </div>

                            <div class="mb-3">
                                <div class="text-end">
                                    <button class="btn btn-primary w-md waves-effect waves-light" type="submit">Register</button>
                                </div>
                            </div>

                            <div class="mt-2 mb-0 row">
                                <div class="col-12 mt-3">
                                    <p class="font-size-14 text-muted mb-0">By registering you agree to the Admiria <a href="#">Terms of Use</a></p>
                                </div>
                            </div>
                        </form>

                        <div class="mt-5 pt-4 text-center position-relative">
                            <p>Already have an account ? <a href="pages-login-2.html" class="fw-medium text-primary"> Login </a> </p>
                            <p><script>document.write(new Date().getFullYear())</script> © Admiria. Crafted with <i class="mdi mdi-heart text-danger"></i> by Themesbrand</p>
                        </div>

                    </div>
                </div>
            </div>

        </div>
    </div>

</div>


<!-- JAVASCRIPT -->
<script src="{{asset('administrator/assets/libs/jquery/jquery.min.js')}}"></script>
<script src="{{asset('administrator/assets/libs/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('administrator/assets/libs/metismenu/metisMenu.min.js')}}"></script>
<script src="{{asset('administrator/assets/libs/simplebar/simplebar.min.js')}}"></script>
<script src="{{asset('administrator/assets/libs/node-waves/waves.min.js')}}"></script>
<script src="{{asset('administrator/assets/js/app.js')}}"></script>

</body>
</html>
