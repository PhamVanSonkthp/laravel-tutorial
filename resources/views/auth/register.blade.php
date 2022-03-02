@extends('layouts.app')

@section('content')
    <div class="accountbg" style="background: url({{asset('user/assets/images/bg.jpg')}});background-size: cover;background-position: center;z-index: -1;"></div>

    <div class="account-pages mt-5 pt-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-6 col-xl-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="text-center mt-4">
                                <div class="mb-3">
                                    <a href="{{ route('welcome.index') }}"><img src="{{asset('user/assets/images/logo-banner.png')}}" height="30" alt="logo"></a>
                                </div>
                            </div>
                            <div class="p-3">
                                <h4 class="font-size-18 mt-2 text-center">Free Register</h4>
                                <p class="text-muted text-center mb-4">Get your free {{ config('app.name', 'Laravel') }} account now.</p>

                                <form method="POST" action="{{ route('register') }}" class="form-horizontal">
                                    @csrf

                                    <div class="mb-3">
                                        <label for="name" class="col-form-label text-md-end">{{ __('Name') }}</label>

                                        <div>
                                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                            @error('name')
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="mb-3">
                                        <label for="email" class="col-form-label text-md-end">{{ __('Email Address') }}</label>

                                        <div>
                                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                            @error('email')
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="mb-3">
                                        <label for="password" class="col-form-label text-md-end">{{ __('Password') }}</label>

                                        <div>
                                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                            @error('password')
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="mb-3">
                                        <label for="password-confirm" class="col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                                        <div>
                                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                        </div>
                                    </div>

                                    <div class="mb-3">
                                        <div class="text-end">
                                            <button class="btn btn-primary w-md waves-effect waves-light" type="submit">Register</button>
                                        </div>
                                    </div>

                                    <div class="mb-0 row">
                                        <div class="col-12 mt-4">
                                            <p class=" text-muted mb-0">By registering you agree to the {{ config('app.name', 'Laravel') }} <a href="#">Terms of Use</a></p>
                                        </div>
                                    </div>
                                </form>

                            </div>

                        </div>
                    </div>
                    <div class="mt-5 text-center position-relative">
                        <p class="text-white">Already have an account ?  <a href="{{ route('login') }}" class="font-weight-bold text-primary"> Login </a> </p>
                        <p class="text-white"><script>document.write(new Date().getFullYear())</script> © {{ config('app.name', 'Laravel') }}. Crafted with <i class="mdi mdi-heart text-danger"></i> by Themesbrand</p>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
