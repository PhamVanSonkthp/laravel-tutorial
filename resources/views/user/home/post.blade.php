@extends('user.layouts.master')

@php
    $title = $post->title;
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
    <div class="container">
        <div class="news">
            <article class="news__main">
                <h1 class="news__main-header">{{$post->title}}</h1>
                <!-- Content News -->
                <article class="news__main-content" style="line-height: 30px;">
                    {!! $post->content !!}
                </article>
            </article>

            <div class="news__related">
                <h4 class="news__related-heading">Bài viết liên quan</h4>

                <div class="news__related-list">

                    @foreach($postRelates as $postRelateItem)
                        <a href="{{route('welcome.post' , ['slug'=>$postRelateItem->slug])}}" class="news__related-post">
                            <img src="{{$postRelateItem->image_path}}" alt="Ảnh">
                            <aside>
                                <h3 class="news__related-title">
                                    {{$postRelateItem->title}}
                                </h3>
                            </aside>
                        </a>
                    @endforeach

                </div>

            </div>
        </div>
    </div>
@endsection

@section('js')


@endsection
