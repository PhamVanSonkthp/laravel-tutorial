@extends('user.layouts.master')

@php
    $title = $trading->name;
@endphp

@section('title')
    <title>{{$title}}</title>
@endsection

@section('name')
    <h4 class="page-title">{{$title}}</h4>
@endsection

@section('css')
    <!-- Slide Swiper Css -->
    <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />
    <script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>
    <!-- App Css-->
    <link href="{{asset('user/assets/css/style.css')}}" rel="stylesheet" type="text/css" />
    <!-- Responsive Css -->
    <link href="{{asset('user/assets/css/responsive.css')}}" rel="stylesheet" type="text/css" />
    <!-- Slide Swiper JS -->
@endsection

@section('content')
    <div class="course bg-white">

        <div class="row gx-5">

            <div class="col-lg-8 col-md-12 col-sm-12 col-12">
                <div class="course__heading">
                    <h1 class="course__heading-topic">{{$trading->name}}</h1>

                    <div class="course__heading-description">
                        {!! $trading->content !!}
                    </div>
                </div>


            </div>

            <div class="col-lg-4 col-md-12 col-sm-12 col-12">
                <div class="course__register">
                    <div class="course__register-img"
                         style="background-image: url({{$trading->feature_image_path}});">

{{--                        <svg aria-hidden="true" focusable="false" data-prefix="fas"--}}
{{--                             data-icon="play-circle"--}}
{{--                             class="svg-inline--fa fa-play-circle fa-w-16 CourseDetail_icon__1vsgK"--}}
{{--                             role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">--}}
{{--                            <path fill="currentColor"--}}
{{--                                  d="M256 8C119 8 8 119 8 256s111 248 248 248 248-111 248-248S393 8 256 8zm115.7 272l-176 101c-15.8 8.8-35.7-2.5-35.7-21V152c0-18.4 19.8-29.8 35.7-21l176 107c16.4 9.2 16.4 32.9 0 42z">--}}
{{--                            </path>--}}
{{--                        </svg>--}}
                        <span>{{$trading->name}}</span>
                    </div>

                    <h5 class="course__register-title">${{number_format($trading->price)}}</h5>

                    @auth
                        <a href="{{\Illuminate\Support\Facades\Auth::user()->checkHasTrading($trading->id) ? $trading->link : route('user.paymentTrading' , ['id' => $trading->id])}} " class="course__register-btn" style="width: 50%">{{\Illuminate\Support\Facades\Auth::user()->checkHasTrading($trading->id) ? 'Vào room' : 'Đăng ký room'}}</a>
                    @else
                        <a href="{{ route('login') }}" class="course__register-btn" style="width: 50%">Đăng ký trading</a>
                    @endauth

                    <ul class="course__register-info">

                        <li class="course__register-info-item">
                            <i class="fa-solid fa-plus"></i>
                            <span>Bạn sẽ nhận được <strong>{{$trading->point}}</strong> điểm</span>
                        </li>
                    </ul>

                </div>
            </div>
        </div>

    </div>
@endsection

@section('js')


@endsection
