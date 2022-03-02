@extends('layouts.app')

@section('content')
    <div class="accountbg"
         style="background: url({{asset('user/assets/images/bg-2.jpg')}});background-size: cover;background-position: center;z-index: -1;"></div>

    <div class="wrapper-page account-page-full">

        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="card shadow-none">
                <div class="card-block">

                    <div class="account-box">

                        <div class="card-box shadow-none p-4">
                            <div class="p-2">
                                <div class="text-center mt-4">
                                    <a href="{{ route('welcome.index') }}"><img src="{{asset('user/assets/images/logo-banner.png')}}" height="30"
                                                              alt="logo"></a>
                                </div>

                                <h4 class="font-size-18 mt-5 text-center">Welcome Back !</h4>
                                <p class="text-muted text-center">Sign in to continue to {{ config('app.name', 'Laravel') }}.</p>

                                <form class="mt-4" action="#">

                                    <div class="mb-3">
                                        <label for="email"
                                               class="col-form-label text-md-end">{{ __('Email Address') }}</label>

                                        <div>
                                            <input id="email" type="email"
                                                   class="form-control @error('email') is-invalid @enderror"
                                                   name="email" value="{{ old('email') }}" required autocomplete="email"
                                                   autofocus>

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
                                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                            @error('password')
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="mb-3">
                                        <div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                                <label class="form-check-label" for="remember">
                                                    {{ __('Remember Me') }}
                                                </label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="mb-0">
                                        <div>
                                            <button type="submit" class="btn btn-primary">
                                                {{ __('Login') }}
                                            </button>

                                            @if (Route::has('password.request'))
                                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                                    {{ __('Forgot Your Password?') }}
                                                </a>
                                            @endif
                                        </div>
                                    </div>

                                </form>

                                <div class="mt-5 pt-4 text-center position-relative">

                                    @guest
                                    @if (Route::has('register'))
                                        <p>Don't have an account ? <a href="{{ route('register') }}"
                                                                      class="fw-medium text-primary"> Signup now </a></p>
                                    @endif

                                    @endguest
                                    <p>
                                        <script>document.write(new Date().getFullYear())</script>
                                        © {{ config('app.name', 'Laravel') }}. Crafted with <i class="mdi mdi-heart text-danger"></i> by ifnt.vn
                                    </p>
                                </div>

                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </form>
    </div>
@endsection
