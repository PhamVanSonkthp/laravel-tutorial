@extends('user.layouts.master')

@php
    $title = "Các khóa học";
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

    <div class="route">
        <div class="route__quantity">
            <span><strong>167.782+</strong></span>
            <span>người khác đã học</span>
        </div>
        <h3 class="route__nav-heading">Các khóa học <sup>Mới</sup></h3>
        <div class="route__course">
            <div class="row gx-4">

                @foreach($products as $productItem)
                    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                        <div class="route__course-item">
                            <div class="route__course-img"
                                 style="background-image: url({{$productItem->feature_image_path}})">
                                <div class="overlay"></div>
                                <div class="button">
                                    <a href="{{ route('welcome.product', ['slug' => $productItem->slug]) }}">Xem Khóa học</a>
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

                                <span><i class="fa-solid fa-plus"></i>{{$productItem->point}}</span>

                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </div>

@endsection

@section('js')

@endsection
