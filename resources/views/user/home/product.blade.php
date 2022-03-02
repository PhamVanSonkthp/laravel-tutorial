@extends('user.layouts.master')

@php
    $title = $product->name;
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
                    <h1 class="course__heading-topic">{{$product->name}}</h1>

                    <div class="course__heading-description">
                        {!! $product->content !!}
                    </div>
                </div>

                <div class="course__content">

                    <!-- Begin Content Course -->
                    <h3 class="course__content-title">Nội dung khóa học</h3>

                    <div class="course__content-main">
                        <div class="course__content-general">
                            <span><strong>{{optional(optional(optional($product->topic)->sourceChildren)->where('parent_id',0))->count()}} </strong>phần </span>&nbsp;•&nbsp;
                            <span><strong>{{$counter}} </strong>bài học </span>
                        </div>
                    </div>

                    <div class="accordion course__accordion" id="accordionPanelsStayOpenExample">

                        @php
                            $numberSource = 0;

                            $sources = optional(optional($product->topic)->sourceChildren)->where('parent_id',0) ?? [];
                        @endphp

                        @foreach($sources as $index=> $sourceParent)
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="course_one">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                            data-bs-target="#course_{{$index}}" aria-expanded="true"
                                            aria-controls="course_{{$index}}">
                                        {{$index + 1}}. {{$sourceParent->name}}
                                        <span class="course__accordion-total">{{$sourceParent->where('parent_id' , $sourceParent->id)->count()}} bài học</span>
                                    </button>
                                </h2>

                                <div id="course_{{$index}}" class="accordion-collapse collapse show"
                                     aria-labelledby="course_one">

                                    @foreach($sourceParent->where('parent_id' , $sourceParent->id)->get() as $sourceChild)
                                        <div class="course__accordion-lecture">

                                                    <span class="course__accordion-lecture-name">
                                                        <svg aria-hidden="true" focusable="false" data-prefix="fas"
                                                             data-icon="play-circle"
                                                             class="svg-inline--fa fa-play-circle fa-w-16 CurriculumOfCourse_icon__tlEt- CurriculumOfCourse_video__lRa-8"
                                                             role="img" xmlns="http://www.w3.org/2000/svg"
                                                             viewBox="0 0 512 512">
                                                            <path fill="currentColor"
                                                                  d="M256 8C119 8 8 119 8 256s111 248 248 248 248-111 248-248S393 8 256 8zm115.7 272l-176 101c-15.8 8.8-35.7-2.5-35.7-21V152c0-18.4 19.8-29.8 35.7-21l176 107c16.4 9.2 16.4 32.9 0 42z">
                                                            </path>
                                                        </svg>
                                                        <div class="course__accordion-lecture-content">
                                                            {{++$numberSource}}. {{$sourceChild->name}}
                                                        </div>
                                                    </span>
                                            @php
                                            $object = null;
                                                foreach ($processesd as $processItem){
                                                    if($processItem->source_id == $sourceChild->id){
                                                        $object = $processItem;
                                                        break;
                                                    }
                                                }


                                            @endphp
                                            <span
                                                class="course__accordion-lecture-length">{{$object ? ($object->status ? 'Đã học xong' : 'Đang học') : 'Chưa học'}}</span>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <!-- End Content Course -->


                    <h3 class="course__content-title">Liên quan</h3>
                    <ul class="course__content-list one">

                        <li class="course__content-item">
                            <svg aria-hidden="true" focusable="false" data-prefix="fas"
                                 data-icon="check"
                                 class="svg-inline--fa fa-check fa-w-16 CourseDetail_icon__1vsgK"
                                 role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                <path fill="currentColor"
                                      d="M173.898 439.404l-166.4-166.4c-9.997-9.997-9.997-26.206 0-36.204l36.203-36.204c9.997-9.998 26.207-9.998 36.204 0L192 312.69 432.095 72.596c9.997-9.997 26.207-9.997 36.204 0l36.203 36.204c9.997 9.997 9.997 26.206 0 36.204l-294.4 294.401c-9.998 9.997-26.207 9.997-36.204-.001z">
                                </path>
                            </svg>
                            <span>Chủ đề khóa học: {{ optional($product->topic)->name}}</span>
                        </li>

                        <li class="course__content-item">
                            <svg aria-hidden="true" focusable="false" data-prefix="fas"
                                 data-icon="check"
                                 class="svg-inline--fa fa-check fa-w-16 CourseDetail_icon__1vsgK"
                                 role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                <path fill="currentColor"
                                      d="M173.898 439.404l-166.4-166.4c-9.997-9.997-9.997-26.206 0-36.204l36.203-36.204c9.997-9.998 26.207-9.998 36.204 0L192 312.69 432.095 72.596c9.997-9.997 26.207-9.997 36.204 0l36.203 36.204c9.997 9.997 9.997 26.206 0 36.204l-294.4 294.401c-9.998 9.997-26.207 9.997-36.204-.001z">
                                </path>
                            </svg>
                            <span>Danh mục khóa học: {{ optional($product->category)->name}}</span>
                        </li>

                    </ul>
                </div>
            </div>

            <div class="col-lg-4 col-md-12 col-sm-12 col-12">
                <div class="course__register">
                    <div class="course__register-img"
                         style="background-image: url({{$product->feature_image_path}});">

{{--                        <svg aria-hidden="true" focusable="false" data-prefix="fas"--}}
{{--                             data-icon="play-circle"--}}
{{--                             class="svg-inline--fa fa-play-circle fa-w-16 CourseDetail_icon__1vsgK"--}}
{{--                             role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">--}}
{{--                            <path fill="currentColor"--}}
{{--                                  d="M256 8C119 8 8 119 8 256s111 248 248 248 248-111 248-248S393 8 256 8zm115.7 272l-176 101c-15.8 8.8-35.7-2.5-35.7-21V152c0-18.4 19.8-29.8 35.7-21l176 107c16.4 9.2 16.4 32.9 0 42z">--}}
{{--                            </path>--}}
{{--                        </svg>--}}
                        <span>{{$product->name}}</span>
                    </div>

                    <h5 class="course__register-title">${{number_format($product->price)}}</h5>

                    @auth

                        <a href="{{\Illuminate\Support\Facades\Auth::user()->checkHasProduct($product->id) ? route('user.learningSource' , ['id' => $product->id]) : route('user.paymentProduct' , ['id' => $product->id])}} " class="course__register-btn" style="width: 50%">{{\Illuminate\Support\Facades\Auth::user()->checkHasProduct($product->id) ? 'Tiếp tục học' : 'Đăng ký học'}}</a>
                    @else
                        <a href="{{ route('login') }}" class="course__register-btn" style="width: 50%">Đăng ký học</a>
                    @endauth

                    <ul class="course__register-info">

                        <li class="course__register-info-item">
                            <i class="fa-solid fa-plus"></i>
                            <span>Bạn sẽ nhận được <strong>{{$product->point}}</strong> điểm</span>
                        </li>

                        <li class="course__register-info-item">
                            <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="film"
                                 class="svg-inline--fa fa-film fa-w-16 CourseDetail_icon__1vsgK"
                                 role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                <path fill="currentColor"
                                      d="M488 64h-8v20c0 6.6-5.4 12-12 12h-40c-6.6 0-12-5.4-12-12V64H96v20c0 6.6-5.4 12-12 12H44c-6.6 0-12-5.4-12-12V64h-8C10.7 64 0 74.7 0 88v336c0 13.3 10.7 24 24 24h8v-20c0-6.6 5.4-12 12-12h40c6.6 0 12 5.4 12 12v20h320v-20c0-6.6 5.4-12 12-12h40c6.6 0 12 5.4 12 12v20h8c13.3 0 24-10.7 24-24V88c0-13.3-10.7-24-24-24zM96 372c0 6.6-5.4 12-12 12H44c-6.6 0-12-5.4-12-12v-40c0-6.6 5.4-12 12-12h40c6.6 0 12 5.4 12 12v40zm0-96c0 6.6-5.4 12-12 12H44c-6.6 0-12-5.4-12-12v-40c0-6.6 5.4-12 12-12h40c6.6 0 12 5.4 12 12v40zm0-96c0 6.6-5.4 12-12 12H44c-6.6 0-12-5.4-12-12v-40c0-6.6 5.4-12 12-12h40c6.6 0 12 5.4 12 12v40zm272 208c0 6.6-5.4 12-12 12H156c-6.6 0-12-5.4-12-12v-96c0-6.6 5.4-12 12-12h200c6.6 0 12 5.4 12 12v96zm0-168c0 6.6-5.4 12-12 12H156c-6.6 0-12-5.4-12-12v-96c0-6.6 5.4-12 12-12h200c6.6 0 12 5.4 12 12v96zm112 152c0 6.6-5.4 12-12 12h-40c-6.6 0-12-5.4-12-12v-40c0-6.6 5.4-12 12-12h40c6.6 0 12 5.4 12 12v40zm0-96c0 6.6-5.4 12-12 12h-40c-6.6 0-12-5.4-12-12v-40c0-6.6 5.4-12 12-12h40c6.6 0 12 5.4 12 12v40zm0-96c0 6.6-5.4 12-12 12h-40c-6.6 0-12-5.4-12-12v-40c0-6.6 5.4-12 12-12h40c6.6 0 12 5.4 12 12v40z">
                                </path>
                            </svg>
                            <span>Tổng số <strong>{{$counter}}</strong> bài học</span>
                        </li>

                        <li class="course__register-info-item">
                            <svg aria-hidden="true" focusable="false" data-prefix="fas"
                                 data-icon="battery-full"
                                 class="svg-inline--fa fa-battery-full fa-w-20 CourseDetail_icon__1vsgK"
                                 role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512">
                                <path fill="currentColor"
                                      d="M544 160v64h32v64h-32v64H64V160h480m16-64H48c-26.51 0-48 21.49-48 48v224c0 26.51 21.49 48 48 48h512c26.51 0 48-21.49 48-48v-16h8c13.255 0 24-10.745 24-24V184c0-13.255-10.745-24-24-24h-8v-16c0-26.51-21.49-48-48-48zm-48 96H96v128h416V192z">
                                </path>
                            </svg>
                            <span>Học mọi lúc mọi nơi</span>
                        </li>
                    </ul>

                </div>
            </div>
        </div>

    </div>
@endsection

@section('js')


@endsection
