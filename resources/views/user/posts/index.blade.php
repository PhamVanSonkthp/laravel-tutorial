@extends('user.layouts.master')

@section('title')
    <title>Home page</title>
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
        <h3 class="route__nav-heading">Bài viết <sup>Mới</sup></h3>
        <div class="route__course">
            <div class="row gx-4">

                @foreach($posts as $postItem)
                    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                        <div class="route__course-item">
                            <div class="route__course-img"
                                 style="background-image: url({{$postItem->image_path}})">
                                <div class="overlay"></div>
                                <div class="button">
                                    <a href="{{ route('welcome.product', ['slug' => $postItem->slug]) }}">Xem chi tiết</a>
                                </div>
                            </div>
                            <h4 class="route__course-title">{{$postItem->title}}</h4>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </div>

@endsection

@section('js')

@endsection
