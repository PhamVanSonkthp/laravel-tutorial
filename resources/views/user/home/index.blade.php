@extends('user.layouts.master')

@php
    $title = "Trang chủ";
@endphp

@section('title')
    <title>{{$title}}</title>
@endsection

@section('name')
    <h4 class="page-title">{{$title}}</h4>
@endsection

@section('css')
    <!-- Slide Swiper Css -->
    <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css"/>
    <script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>
    <!-- App Css-->
    <link href="{{asset('user/assets/css/style.css')}}" rel="stylesheet" type="text/css"/>
    <!-- Responsive Css -->
    <link href="{{asset('user/assets/css/responsive.css')}}" rel="stylesheet" type="text/css"/>
    <!-- Slide Swiper JS -->

@endsection

@section('content')

    <div class="banner">
        <div class="swiper mySwiper banner__slide">
            <div class="swiper-wrapper">
                @foreach($sliders as $sliderItem)
                    <a href="{{$sliderItem->link}}" class="swiper-slide banner__slide-item">
                        <img src="{{$sliderItem->image_path}}"
                             alt="{{$sliderItem->image_name}}" class="banner__slide-img"></img>
                    </a>
                @endforeach

            </div>

            <div class="swiper-pagination"></div>
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
        </div>
    </div>

    <div class="route">
        <div class="route__quantity">
            <span><strong>167.782+</strong></span>
            <span>người khác đã học</span>
        </div>
        <h3 class="route__nav-heading"><a href="{{route('welcome.products')}}">Các khóa học</a><sup
                class="ms-2">Mới</sup></h3>
        <div class="route__course">
            <div class="row gx-4">

                @foreach($products as $productItem)
                    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                        <div class="route__course-item">
                            <div class="route__course-img"
                                 style="background-image: url({{$productItem->feature_image_path}})">
                                <div class="overlay"></div>
                                <div class="button">
                                    <a href="{{ route('welcome.product', ['slug' => $productItem->slug]) }}">Xem Khóa
                                        học</a>
                                </div>
                            </div>
                            <h4 class="route__course-title">{{$productItem->name}}</h4>
                            <div class="route__course-number">
                                <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="eye"
                                     class="svg-inline--fa fa-eye fa-w-18 " role="img"
                                     xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                                    <path fill="currentColor"
                                          d="M572.52 241.4C518.29 135.59 410.93 64 288 64S57.68 135.64 3.48 241.41a32.35 32.35 0 0 0 0 29.19C57.71 376.41 165.07 448 288 448s230.32-71.64 284.52-177.41a32.35 32.35 0 0 0 0-29.19zM288 400a144 144 0 1 1 144-144 143.93 143.93 0 0 1-144 144zm0-240a95.31 95.31 0 0 0-25.31 3.79 47.85 47.85 0 0 1-66.9 66.9A95.78 95.78 0 1 0 288 160z">
                                    </path>
                                </svg>
                                <span>{{$productItem->views_count}}</span>

                                <span>
                                    <i class="fa-solid fa-plus"></i>
                                    {{$productItem->point}}
                                </span>

                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </div>

    <div class="route">
        <div class="route__nav">
            <h3 class="route__nav-heading">Tradings</h3>
            <a href="{{route('welcome.tradings')}}" class="route__nav-link">
                Xem tất cả
                <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="chevron-right"
                     class="svg-inline--fa fa-chevron-right fa-w-10 " role="img" xmlns="http://www.w3.org/2000/svg"
                     viewBox="0 0 320 512">
                    <path fill="currentColor"
                          d="M285.476 272.971L91.132 467.314c-9.373 9.373-24.569 9.373-33.941 0l-22.667-22.667c-9.357-9.357-9.375-24.522-.04-33.901L188.505 256 34.484 101.255c-9.335-9.379-9.317-24.544.04-33.901l22.667-22.667c9.373-9.373 24.569-9.373 33.941 0L285.475 239.03c9.373 9.372 9.373 24.568.001 33.941z">
                    </path>
                </svg>
            </a>
        </div>

        <div class="route__course">
            <div class="row gx-4">
                @foreach($tradings as $tradingItem)
                    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                        <div class="route__course-item">
                            <div class="route__course-img"
                                 style="background-image: url({{$tradingItem->feature_image_path}})">
                                <div class="overlay"></div>
                                <div class="button">
                                    <a href="{{route('welcome.trading' , ['slug'=>$tradingItem->slug])}}">Xem chi
                                        tiết</a>
                                </div>
                            </div>
                            <h4 class="route__course-title">{{$tradingItem->name}}</h4>
                            <div class="route__course-number">
                                <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="eye"
                                     class="svg-inline--fa fa-eye fa-w-18 " role="img"
                                     xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                                    <path fill="currentColor"
                                          d="M572.52 241.4C518.29 135.59 410.93 64 288 64S57.68 135.64 3.48 241.41a32.35 32.35 0 0 0 0 29.19C57.71 376.41 165.07 448 288 448s230.32-71.64 284.52-177.41a32.35 32.35 0 0 0 0-29.19zM288 400a144 144 0 1 1 144-144 143.93 143.93 0 0 1-144 144zm0-240a95.31 95.31 0 0 0-25.31 3.79 47.85 47.85 0 0 1-66.9 66.9A95.78 95.78 0 1 0 288 160z">
                                    </path>
                                </svg>
                                <span>{{$tradingItem->views_count}}</span>

                                <span><i class="fa-solid fa-plus"></i>{{$tradingItem->point}}</span>

                            </div>
                        </div>
                    </div>

                @endforeach
            </div>
        </div>
    </div>

    @auth()
        @if(\App\Models\InvoiceTrading::where('user_id' , \Illuminate\Support\Facades\Auth::id())->first())
            <div class="route">
                <div class="route__nav">
                    <h3 class="route__nav-heading">Posts</h3>
                    <a href="{{route('welcome.postTradings')}}" class="route__nav-link">
                        Xem tất cả
                        <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="chevron-right"
                             class="svg-inline--fa fa-chevron-right fa-w-10 " role="img"
                             xmlns="http://www.w3.org/2000/svg"
                             viewBox="0 0 320 512">
                            <path fill="currentColor"
                                  d="M285.476 272.971L91.132 467.314c-9.373 9.373-24.569 9.373-33.941 0l-22.667-22.667c-9.357-9.357-9.375-24.522-.04-33.901L188.505 256 34.484 101.255c-9.335-9.379-9.317-24.544.04-33.901l22.667-22.667c9.373-9.373 24.569-9.373 33.941 0L285.475 239.03c9.373 9.372 9.373 24.568.001 33.941z">
                            </path>
                        </svg>
                    </a>
                </div>

                <div class="route__course">
                    <div class="row gx-4">
                        @foreach($postTradings as $postTradingItem)
                            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                                <div class="route__course-item">
                                    <div class="route__course-img"
                                         style="background-image: url({{$postTradingItem->image_path}})">
                                        <div class="overlay"></div>
                                        <div class="button">
                                            <a href="{{route('welcome.postTrading' , ['slug'=>$postTradingItem->slug])}}">Xem
                                                tin tức</a>
                                        </div>
                                    </div>
                                    <h4 class="route__course-title">{{$postTradingItem->title}}</h4>
                                    <div class="route__course-number">
                                        <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="eye"
                                             class="svg-inline--fa fa-eye fa-w-18 " role="img"
                                             xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                                            <path fill="currentColor"
                                                  d="M572.52 241.4C518.29 135.59 410.93 64 288 64S57.68 135.64 3.48 241.41a32.35 32.35 0 0 0 0 29.19C57.71 376.41 165.07 448 288 448s230.32-71.64 284.52-177.41a32.35 32.35 0 0 0 0-29.19zM288 400a144 144 0 1 1 144-144 143.93 143.93 0 0 1-144 144zm0-240a95.31 95.31 0 0 0-25.31 3.79 47.85 47.85 0 0 1-66.9 66.9A95.78 95.78 0 1 0 288 160z">
                                            </path>
                                        </svg>
                                        <span>{{$postTradingItem->views_count}}</span>
                                    </div>
                                </div>
                            </div>

                        @endforeach
                    </div>
                </div>
            </div>
        @endif

    @endauth

    <div class="route">
        <div class="route__nav">
            <h3 class="route__nav-heading">News</h3>
            <a href="{{route('welcome.posts')}}" class="route__nav-link">
                Xem tất cả
                <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="chevron-right"
                     class="svg-inline--fa fa-chevron-right fa-w-10 " role="img" xmlns="http://www.w3.org/2000/svg"
                     viewBox="0 0 320 512">
                    <path fill="currentColor"
                          d="M285.476 272.971L91.132 467.314c-9.373 9.373-24.569 9.373-33.941 0l-22.667-22.667c-9.357-9.357-9.375-24.522-.04-33.901L188.505 256 34.484 101.255c-9.335-9.379-9.317-24.544.04-33.901l22.667-22.667c9.373-9.373 24.569-9.373 33.941 0L285.475 239.03c9.373 9.372 9.373 24.568.001 33.941z">
                    </path>
                </svg>
            </a>
        </div>

        <div class="route__course">
            <div class="row gx-4">
                @foreach($posts as $postItem)
                    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                        <div class="route__course-item">
                            <div class="route__course-img"
                                 style="background-image: url({{$postItem->image_path}})">
                                <div class="overlay"></div>
                                <div class="button">
                                    <a href="{{route('welcome.post' , ['slug'=>$postItem->slug])}}">Xem tin tức</a>
                                </div>
                            </div>
                            <h4 class="route__course-title">{{$postItem->title}}</h4>
                            <div class="route__course-number">
                                <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="eye"
                                     class="svg-inline--fa fa-eye fa-w-18 " role="img"
                                     xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                                    <path fill="currentColor"
                                          d="M572.52 241.4C518.29 135.59 410.93 64 288 64S57.68 135.64 3.48 241.41a32.35 32.35 0 0 0 0 29.19C57.71 376.41 165.07 448 288 448s230.32-71.64 284.52-177.41a32.35 32.35 0 0 0 0-29.19zM288 400a144 144 0 1 1 144-144 143.93 143.93 0 0 1-144 144zm0-240a95.31 95.31 0 0 0-25.31 3.79 47.85 47.85 0 0 1-66.9 66.9A95.78 95.78 0 1 0 288 160z">
                                    </path>
                                </svg>
                                <span>{{$postItem->views_count}}</span>
                            </div>
                        </div>
                    </div>

                @endforeach
            </div>
        </div>
    </div>

@endsection

@section('js')

    <script>
        // Slide banner Image
        var swiper = new Swiper(".mySwiper", {
            spaceBetween: 30,
            loop: true,
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },
            // Navigation arrows
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
            autoplay: {
                delay: 5000,
            },
        });
    </script>
@endsection
