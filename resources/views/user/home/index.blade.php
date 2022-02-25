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

    <div class="banner">
        <div class="swiper mySwiper banner__slide">
            <div class="swiper-wrapper">
                @foreach($sliders as $sliderItem)
                    <div class="swiper-slide banner__slide-item">
                        <img src="{{$sliderItem->image_path}}"
                             alt="{{$sliderItem->image_name}}" class="banner__slide-img"></img>
                    </div>
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
                                    <a href="{{ route('welcome.product', ['id' => $productItem->id]) }}">Xem Khóa học</a>
                                </div>
                            </div>
                            <h4 class="route__course-title">{{$productItem->name}}</h4>
                            <div class="route__course-number">
                                <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="users"
                                     class="svg-inline--fa fa-users fa-w-20 " role="img"
                                     xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512">
                                    <path fill="currentColor"
                                          d="M96 224c35.3 0 64-28.7 64-64s-28.7-64-64-64-64 28.7-64 64 28.7 64 64 64zm448 0c35.3 0 64-28.7 64-64s-28.7-64-64-64-64 28.7-64 64 28.7 64 64 64zm32 32h-64c-17.6 0-33.5 7.1-45.1 18.6 40.3 22.1 68.9 62 75.1 109.4h66c17.7 0 32-14.3 32-32v-32c0-35.3-28.7-64-64-64zm-256 0c61.9 0 112-50.1 112-112S381.9 32 320 32 208 82.1 208 144s50.1 112 112 112zm76.8 32h-8.3c-20.8 10-43.9 16-68.5 16s-47.6-6-68.5-16h-8.3C179.6 288 128 339.6 128 403.2V432c0 26.5 21.5 48 48 48h288c26.5 0 48-21.5 48-48v-28.8c0-63.6-51.6-115.2-115.2-115.2zm-223.7-13.4C161.5 263.1 145.6 256 128 256H64c-35.3 0-64 28.7-64 64v32c0 17.7 14.3 32 32 32h65.9c6.3-47.4 34.9-87.3 75.2-109.4z">
                                    </path>
                                </svg>
                                <span>58.134</span>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </div>

    <div class="route">
        <div class="route__nav">
            <h3 class="route__nav-heading">Bài viết nổi bật</h3>
            <a href="#" class="route__nav-link">
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
                                <a href="#">Xem Bài viết</a>
                            </div>
                        </div>
                        <h4 class="route__course-title">Kiến thức nhập môn IT</h4>
                        <div class="route__course-number">
                            <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="eye"
                                 class="svg-inline--fa fa-eye fa-w-18 " role="img"
                                 xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                                <path fill="currentColor"
                                      d="M572.52 241.4C518.29 135.59 410.93 64 288 64S57.68 135.64 3.48 241.41a32.35 32.35 0 0 0 0 29.19C57.71 376.41 165.07 448 288 448s230.32-71.64 284.52-177.41a32.35 32.35 0 0 0 0-29.19zM288 400a144 144 0 1 1 144-144 143.93 143.93 0 0 1-144 144zm0-240a95.31 95.31 0 0 0-25.31 3.79 47.85 47.85 0 0 1-66.9 66.9A95.78 95.78 0 1 0 288 160z">
                                </path>
                            </svg>
                            <span>58.134</span>
                        </div>
                    </div>
                </div>

                @endforeach
            </div>
        </div>
    </div>

    <div class="route">
        <div class="route__nav">
            <h3 class="route__nav-heading">Bài viết Trading</h3>
            <a href="#" class="route__nav-link">
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

                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="route__course-item">
                        <div class="route__course-img"
                             style="background-image: url(https://i.picsum.photos/id/1018/3914/2935.jpg?hmac=3N43cQcvTE8NItexePvXvYBrAoGbRssNMpuvuWlwMKg)">
                            <div class="overlay"></div>
                            <div class="button">
                                <a href="#">Xem Bài viết</a>
                            </div>
                        </div>
                        <h4 class="route__course-title">Kiến thức nhập môn IT</h4>
                        <div class="route__course-number">
                            <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="eye"
                                 class="svg-inline--fa fa-eye fa-w-18 " role="img"
                                 xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                                <path fill="currentColor"
                                      d="M572.52 241.4C518.29 135.59 410.93 64 288 64S57.68 135.64 3.48 241.41a32.35 32.35 0 0 0 0 29.19C57.71 376.41 165.07 448 288 448s230.32-71.64 284.52-177.41a32.35 32.35 0 0 0 0-29.19zM288 400a144 144 0 1 1 144-144 143.93 143.93 0 0 1-144 144zm0-240a95.31 95.31 0 0 0-25.31 3.79 47.85 47.85 0 0 1-66.9 66.9A95.78 95.78 0 1 0 288 160z">
                                </path>
                            </svg>
                            <span>58.134</span>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="route__course-item">
                        <div class="route__course-img"
                             style="background-image: url(https://images.unsplash.com/photo-1452475168325-672188dc4dc3?ixlib=rb-1.2.1&amp;ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&amp;auto=format&amp;fit=crop&amp;w=3874&amp;q=80)">
                            <div class="overlay"></div>
                            <div class="button">
                                <a href="#">Xem Bài viết</a>
                            </div>
                        </div>
                        <h4 class="route__course-title">Kiến thức nhập môn IT</h4>
                        <div class="route__course-number">
                            <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="eye"
                                 class="svg-inline--fa fa-eye fa-w-18 " role="img"
                                 xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                                <path fill="currentColor"
                                      d="M572.52 241.4C518.29 135.59 410.93 64 288 64S57.68 135.64 3.48 241.41a32.35 32.35 0 0 0 0 29.19C57.71 376.41 165.07 448 288 448s230.32-71.64 284.52-177.41a32.35 32.35 0 0 0 0-29.19zM288 400a144 144 0 1 1 144-144 143.93 143.93 0 0 1-144 144zm0-240a95.31 95.31 0 0 0-25.31 3.79 47.85 47.85 0 0 1-66.9 66.9A95.78 95.78 0 1 0 288 160z">
                                </path>
                            </svg>
                            <span>58.134</span>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="route__course-item">
                        <div class="route__course-img"
                             style="background-image: url(https://i.picsum.photos/id/1020/4288/2848.jpg?hmac=Jo3ofatg0fee3HGOliAIIkcg4KGXC8UOTO1dm5qIIPc)">
                            <div class="overlay"></div>
                            <div class="button">
                                <a href="#">Xem Bài viết</a>
                            </div>
                        </div>
                        <h4 class="route__course-title">Kiến thức nhập môn IT</h4>
                        <div class="route__course-number">
                            <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="eye"
                                 class="svg-inline--fa fa-eye fa-w-18 " role="img"
                                 xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                                <path fill="currentColor"
                                      d="M572.52 241.4C518.29 135.59 410.93 64 288 64S57.68 135.64 3.48 241.41a32.35 32.35 0 0 0 0 29.19C57.71 376.41 165.07 448 288 448s230.32-71.64 284.52-177.41a32.35 32.35 0 0 0 0-29.19zM288 400a144 144 0 1 1 144-144 143.93 143.93 0 0 1-144 144zm0-240a95.31 95.31 0 0 0-25.31 3.79 47.85 47.85 0 0 1-66.9 66.9A95.78 95.78 0 1 0 288 160z">
                                </path>
                            </svg>
                            <span>58.134</span>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="route__course-item">
                        <div class="route__course-img"
                             style="background-image: url(https://i.picsum.photos/id/1018/3914/2935.jpg?hmac=3N43cQcvTE8NItexePvXvYBrAoGbRssNMpuvuWlwMKg)">
                            <div class="overlay"></div>
                            <div class="button">
                                <a href="#">Xem Bài viết</a>
                            </div>
                        </div>
                        <h4 class="route__course-title">Kiến thức nhập môn IT</h4>
                        <div class="route__course-number">
                            <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="eye"
                                 class="svg-inline--fa fa-eye fa-w-18 " role="img"
                                 xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                                <path fill="currentColor"
                                      d="M572.52 241.4C518.29 135.59 410.93 64 288 64S57.68 135.64 3.48 241.41a32.35 32.35 0 0 0 0 29.19C57.71 376.41 165.07 448 288 448s230.32-71.64 284.52-177.41a32.35 32.35 0 0 0 0-29.19zM288 400a144 144 0 1 1 144-144 143.93 143.93 0 0 1-144 144zm0-240a95.31 95.31 0 0 0-25.31 3.79 47.85 47.85 0 0 1-66.9 66.9A95.78 95.78 0 1 0 288 160z">
                                </path>
                            </svg>
                            <span>58.134</span>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="route__course-item">
                        <div class="route__course-img"
                             style="background-image: url(https://images.unsplash.com/photo-1452475168325-672188dc4dc3?ixlib=rb-1.2.1&amp;ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&amp;auto=format&amp;fit=crop&amp;w=3874&amp;q=80)">
                            <div class="overlay"></div>
                            <div class="button">
                                <a href="#">Xem Bài viết</a>
                            </div>
                        </div>
                        <h4 class="route__course-title">Kiến thức nhập môn IT</h4>
                        <div class="route__course-number">
                            <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="eye"
                                 class="svg-inline--fa fa-eye fa-w-18 " role="img"
                                 xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                                <path fill="currentColor"
                                      d="M572.52 241.4C518.29 135.59 410.93 64 288 64S57.68 135.64 3.48 241.41a32.35 32.35 0 0 0 0 29.19C57.71 376.41 165.07 448 288 448s230.32-71.64 284.52-177.41a32.35 32.35 0 0 0 0-29.19zM288 400a144 144 0 1 1 144-144 143.93 143.93 0 0 1-144 144zm0-240a95.31 95.31 0 0 0-25.31 3.79 47.85 47.85 0 0 1-66.9 66.9A95.78 95.78 0 1 0 288 160z">
                                </path>
                            </svg>
                            <span>58.134</span>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="route__course-item">
                        <div class="route__course-img"
                             style="background-image: url(https://i.picsum.photos/id/1020/4288/2848.jpg?hmac=Jo3ofatg0fee3HGOliAIIkcg4KGXC8UOTO1dm5qIIPc)">
                            <div class="overlay"></div>
                            <div class="button">
                                <a href="#">Xem Bài viết</a>
                            </div>
                        </div>
                        <h4 class="route__course-title">Kiến thức nhập môn IT</h4>
                        <div class="route__course-number">
                            <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="eye"
                                 class="svg-inline--fa fa-eye fa-w-18 " role="img"
                                 xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                                <path fill="currentColor"
                                      d="M572.52 241.4C518.29 135.59 410.93 64 288 64S57.68 135.64 3.48 241.41a32.35 32.35 0 0 0 0 29.19C57.71 376.41 165.07 448 288 448s230.32-71.64 284.52-177.41a32.35 32.35 0 0 0 0-29.19zM288 400a144 144 0 1 1 144-144 143.93 143.93 0 0 1-144 144zm0-240a95.31 95.31 0 0 0-25.31 3.79 47.85 47.85 0 0 1-66.9 66.9A95.78 95.78 0 1 0 288 160z">
                                </path>
                            </svg>
                            <span>58.134</span>
                        </div>
                    </div>
                </div>
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
        });
    </script>
@endsection
