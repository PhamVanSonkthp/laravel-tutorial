@extends('user.layouts.master')

@php
    $title = "khóa học";
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

    <style>
        .inactive-link {
            pointer-events: none;
        }
        .inactive-link-m {
            pointer-events: none;
        }
    </style>
@endsection

@section('content')
    <div class="lecture">
        <div class="row gx-0">
            <div class="col-lg-9 col-md-12 col-sm-12 col-12">
                <div class="lecture__content">
                    <div class="lecture__content-wrap">
                        <div class="lecture__content-video">
                            <!-- <iframe width="560" height="315" id="iframecheck"
                                src="https://www.youtube.com/embed/qEA4p5i900E"
                                title="YouTube video player" frameborder="0"
                                allow="autoplay; accelerometer; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                allowfullscreen></iframe> -->

                            <iframe src="https://player.vimeo.com/video/{{$source->link}}?autoplay=1&amp;autopause=0"
                                    width="640" height="640" frameborder="0"
                                    allow="autoplay; accelerometer; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                    id="iframecheck" allowfullscreen="" data-ready="true"></iframe>

                            <!-- <div class="next_content" style=" text-align: center; ">
                                <input type="" name="course_ID" value="23" id="course_ID">
                                <input type="" name="lesson_ID" value="30" id="lesson_ID">
                                <input type="" value="0" id="playvideo" disabled="disabled">
                            </div> -->
                            <!-- <iframe
                                src="https://player.vimeo.com/video/180016798?autoplay=1&amp;autopause=0"
                                width="640" height="360" frameborder="0"
                                allow="autoplay; accelerometer; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                allowfullscreen></iframe> -->


                        </div>

                        <div class="lecture__content-info">
                            <ul class="nav nav-tabs lecture__content-nav" id="myTab" role="tablist">
                                <!-- Tab lecture list -->
                                <li class="nav-item hide" role="presentation">
                                    <button class="nav-link" id="lecture-tab" data-bs-toggle="tab"
                                            data-bs-target="#lectureList" type="button" role="tab"
                                            aria-controls="lectureList" aria-selected="false">
                                        Nội dung
                                    </button>
                                </li>

                                <!-- Tab Document -->
                                <li class="nav-item active" role="presentation">
                                    <button class="nav-link active" id="document-tab" data-bs-toggle="tab"
                                            data-bs-target="#document" type="button" role="tab" aria-controls="document"
                                            aria-selected="true">
                                        Tài liệu
                                    </button>
                                </li>

                                <!-- <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="note-tab" data-bs-toggle="tab"
                                        data-bs-target="#note" type="button" role="tab"
                                        aria-controls="note" aria-selected="false">note</button>
                                </li> -->
                            </ul>

                            <!-- Content Nav-Tab -->
                            <div class="tab-content lecture__content-tab">

                                <!-- Tab lecture list Content -->
                                <div class="tab-pane fade" id="lectureList" role="tabpanel"
                                     aria-labelledby="lecture-tab">
                                    <div class="lecture__route">
                                        <div class="lecture__route-header">
                                            <h3>Nội dung khoá học</h3>
                                        </div>
                                        <!-- List category lecture -->
                                        <div class="accordion lecture__route-accordion"
                                             id="accordionPanelsStayOpenExample">

                                            @php
                                                $numberSource = 0;
                                                $counter = 0;
                                            @endphp

                                            @foreach(optional($product->topic->sourceChildren)->where('parent_id',0) as $index=> $sourceParent)
                                                <div class="accordion-item">
                                                    <h2 class="accordion-header" id="course_one-m">
                                                        <button class="accordion-button" type="button"
                                                                data-bs-toggle="collapse" data-bs-target="#course_{{$index}}-m"
                                                                aria-expanded="true" aria-controls="course_{{$index}}-m">
                                                            Phần {{$index + 1}}: {{$sourceParent->name}}
                                                            <div class="lecture__route-accordion-info">
                                                                <span
                                                                    class="lecture__route-accordion-total">Số bài học: {{$sourceParent->where('parent_id' , $sourceParent->id)->count()}}</span>
                                                            </div>
                                                        </button>
                                                    </h2>
                                                    <div id="course_{{$index}}-m" class="accordion-collapse collapse show"
                                                         aria-labelledby="course_one-m">

                                                        @foreach($sourceParent->where('parent_id' , $sourceParent->id)->orderBy('id' , 'desc')->get() as $sourceChild)

                                                            @php
                                                                $object = null;
                                                                foreach ($processesd as $processItem){
                                                                    if($processItem->source_id == $sourceChild->id){
                                                                        $object = $processItem;
                                                                        break;
                                                                    }
                                                                }
                                                            @endphp

                                                            @if($sourceChild->id == $source->id)
                                                                <div class="course__accordion-lecture current current-m" data-url="{{route('user.updateProcess' , ['id'=> $sourceChild->id])}}">
                                                                    <div class="lecture__route-accordion-done"
                                                                         style="display: flex;">
                                                                        <svg aria-hidden="true" focusable="false"
                                                                             data-prefix="fas" data-icon="check"
                                                                             class="svg-inline--fa fa-check fa-w-16 Playlist_icon__3w9Rq"
                                                                             role="img" xmlns="http://www.w3.org/2000/svg"
                                                                             viewBox="0 0 512 512">
                                                                            <path fill="currentColor"
                                                                                  d="M173.898 439.404l-166.4-166.4c-9.997-9.997-9.997-26.206 0-36.204l36.203-36.204c9.997-9.998 26.207-9.998 36.204 0L192 312.69 432.095 72.596c9.997-9.997 26.207-9.997 36.204 0l36.203 36.204c9.997 9.997 9.997 26.206 0 36.204l-294.4 294.401c-9.998 9.997-26.207 9.997-36.204-.001z">
                                                                            </path>
                                                                        </svg>
                                                                    </div>
                                                                    <div class="lecture__route-accordion-link">
                                                                        <p class="course__accordion-lecture-name">
                                                                            {{++$numberSource}}. {{$sourceChild->name}}
                                                                        </p>
                                                                        <div class="course__accordion-lecture-content">
                                                                            <svg aria-hidden="true" focusable="false"
                                                                                 data-prefix="fas" data-icon="play-circle"
                                                                                 class="svg-inline--fa fa-play-circle fa-w-16 CurriculumOfCourse_icon__tlEt- CurriculumOfCourse_video__lRa-8"
                                                                                 role="img" xmlns="http://www.w3.org/2000/svg"
                                                                                 viewBox="0 0 512 512">
                                                                                <path fill="currentColor"
                                                                                      d="M256 8C119 8 8 119 8 256s111 248 248 248 248-111 248-248S393 8 256 8zm115.7 272l-176 101c-15.8 8.8-35.7-2.5-35.7-21V152c0-18.4 19.8-29.8 35.7-21l176 107c16.4 9.2 16.4 32.9 0 42z">
                                                                                </path>
                                                                            </svg>
                                                                            <span class="course__accordion-lecture-length">
{{--                                                                                    10:41--}}
                                                                                </span>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                            @else
                                                            <a href="{{route('user.learningSourceHasSource' , ['id'=>$product->id , 'source_id'=>$sourceChild->id]) }}"
                                                               class="course__accordion-lecture done {{ $is_end_video_to_next && $is_continue == false && !$object ? "inactive-link-m" : ""}}">

                                                            <div class="lecture__route-accordion-done"
                                                                 style="display: flex;">

                                                                @if($object)
                                                                    @if($object->status)

                                                                <svg aria-hidden="true" focusable="false"
                                                                     data-prefix="fas" data-icon="check"
                                                                     class="svg-inline--fa fa-check fa-w-16 Playlist_icon__3w9Rq"
                                                                     role="img" xmlns="http://www.w3.org/2000/svg"
                                                                     viewBox="0 0 512 512">
                                                                    <path fill="currentColor"
                                                                          d="M173.898 439.404l-166.4-166.4c-9.997-9.997-9.997-26.206 0-36.204l36.203-36.204c9.997-9.998 26.207-9.998 36.204 0L192 312.69 432.095 72.596c9.997-9.997 26.207-9.997 36.204 0l36.203 36.204c9.997 9.997 9.997 26.206 0 36.204l-294.4 294.401c-9.998 9.997-26.207 9.997-36.204-.001z">
                                                                    </path>
                                                                </svg>

                                                                    @else
                                                                        <i class="mdi mdi-motion-pause-outline"></i>
                                                                    @endif
                                                                @endif
                                                            </div>
                                                            <div class="lecture__route-accordion-link">
                                                                <p class="course__accordion-lecture-name">
                                                                    {{++$numberSource}}. {{$sourceChild->name}}
                                                                </p>

                                                            </div>
                                                        </a>
                                                            @endif

                                                            @php
                                                                if($counter >= 1){
                                                                    $is_continue = false;
                                                                }
                                                                if($processedItem->source_id == $sourceChild->id){
                                                                    $counter++;
                                                                }
                                                            @endphp
                                                        @endforeach
                                                    </div>
                                                </div>

                                            @endforeach
                                        </div>
                                    </div>
                                </div>

                                <!-- Tab Document Content -->
                                <div class="tab-pane fade show active" id="document" role="tabpanel"
                                     aria-labelledby="document-tab">
                                    <p class="lecture__content-description">
                                        {!! $source->doc !!}}
                                    </p>
                                </div>

                                <!-- <div class="tab-pane fade" id="note" role="tabpanel"
                                    aria-labelledby="note-tab">...</div> -->
                            </div>
                        </div>


                    </div>

                </div>
            </div>
            <div class="col-lg-3 hide-on-mobile-tablet">
                <div class="lecture__route">

                    <div class="lecture__route-header">
                        <h3>Nội dung khoá học</h3>
                        <span class="route-btn-close">
                                            <svg aria-hidden="true" focusable="false" data-prefix="fas"
                                                 data-icon="times"
                                                 class="svg-inline--fa fa-times fa-w-11 Playlist_icon__3w9Rq" role="img"
                                                 xmlns="http://www.w3.org/2000/svg" viewBox="0 0 352 512">
                                                <path fill="currentColor"
                                                      d="M242.72 256l100.07-100.07c12.28-12.28 12.28-32.19 0-44.48l-22.24-22.24c-12.28-12.28-32.19-12.28-44.48 0L176 189.28 75.93 89.21c-12.28-12.28-32.19-12.28-44.48 0L9.21 111.45c-12.28 12.28-12.28 32.19 0 44.48L109.28 256 9.21 356.07c-12.28 12.28-12.28 32.19 0 44.48l22.24 22.24c12.28 12.28 32.2 12.28 44.48 0L176 322.72l100.07 100.07c12.28 12.28 32.2 12.28 44.48 0l22.24-22.24c12.28-12.28 12.28-32.19 0-44.48L242.72 256z">
                                                </path>
                                            </svg>
                                        </span>
                    </div>

                    <!-- List category lecture -->
                    <div class="accordion lecture__route-accordion" id="accordionPanelsStayOpenExample">
                        @php
                            $numberSource = 0;
                            $counter = 0;
                        @endphp
                        @foreach(optional($product->topic->sourceChildren)->where('parent_id',0) as $index=> $sourceParent)
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="course_one">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                            data-bs-target="#course_{{$index}}" aria-expanded="true"
                                            aria-controls="course_{{$index}}">
                                        Phần {{$index + 1}}: {{$sourceParent->name}}
                                        <div class="lecture__route-accordion-info">
                                            <span
                                                class="lecture__route-accordion-total">Số bài học: {{$sourceParent->where('parent_id' , $sourceParent->id)->count()}}</span>
                                        </div>
                                    </button>
                                </h2>

                                <div id="course_{{$index}}" class="accordion-collapse collapse show"
                                     aria-labelledby="course_one">
                                    @foreach($sourceParent->where('parent_id' , $sourceParent->id)->orderBy('id' , 'desc')->get() as $sourceChild)

                                        @php
                                            $object = null;
                                            foreach ($processesd as $processItem){
                                                if($processItem->source_id == $sourceChild->id){
                                                    $object = $processItem;
                                                    break;
                                                }
                                            }
                                        @endphp

                                        @if($sourceChild->id == $source->id)
                                            <div class="course__accordion-lecture current"
                                                 data-url="{{route('user.updateProcess' , ['id'=> $sourceChild->id])}}">
                                                <div class="lecture__route-accordion-done" style="display: flex;">
                                                            <svg aria-hidden="true" focusable="false" data-prefix="fas"
                                                                 data-icon="check"
                                                                 class="svg-inline--fa fa-check fa-w-16 Playlist_icon__3w9Rq"
                                                                 role="img" xmlns="http://www.w3.org/2000/svg"
                                                                 viewBox="0 0 512 512">
                                                                <path fill="currentColor"
                                                                      d="M173.898 439.404l-166.4-166.4c-9.997-9.997-9.997-26.206 0-36.204l36.203-36.204c9.997-9.998 26.207-9.998 36.204 0L192 312.69 432.095 72.596c9.997-9.997 26.207-9.997 36.204 0l36.203 36.204c9.997 9.997 9.997 26.206 0 36.204l-294.4 294.401c-9.998 9.997-26.207 9.997-36.204-.001z">
                                                                </path>
                                                            </svg>
                                                </div>

                                                <div class="lecture__route-accordion-link">
                                                    <p class="course__accordion-lecture-name">
                                                        {{++$numberSource}}. {{$sourceChild->name}}
                                                    </p>

                                                    <div class="course__accordion-lecture-content">
                                                        <svg aria-hidden="true" focusable="false" data-prefix="fas"
                                                             data-icon="play-circle"
                                                             class="svg-inline--fa fa-play-circle fa-w-16 CurriculumOfCourse_icon__tlEt- CurriculumOfCourse_video__lRa-8"
                                                             role="img" xmlns="http://www.w3.org/2000/svg"
                                                             viewBox="0 0 512 512">
                                                            <path fill="currentColor"
                                                                  d="M256 8C119 8 8 119 8 256s111 248 248 248 248-111 248-248S393 8 256 8zm115.7 272l-176 101c-15.8 8.8-35.7-2.5-35.7-21V152c0-18.4 19.8-29.8 35.7-21l176 107c16.4 9.2 16.4 32.9 0 42z">
                                                            </path>
                                                        </svg>
                                                        <span class="course__accordion-lecture-length">
{{--                                                                10:41--}}
                                                            </span>
                                                    </div>
                                                </div>
                                            </div>
                                        @else
                                            <a href="{{route('user.learningSourceHasSource' , ['id'=>$product->id , 'source_id'=>$sourceChild->id]) }}"
                                               class="course__accordion-lecture done {{ $is_end_video_to_next && $is_continue == false && !$object ? "inactive-link" : ""}}">

                                                <div class="lecture__route-accordion-done" style="display: flex;">
                                                    @if($object)
                                                        @if($object->status)
                                                            <svg aria-hidden="true" focusable="false" data-prefix="fas"
                                                                 data-icon="check"
                                                                 class="svg-inline--fa fa-check fa-w-16 Playlist_icon__3w9Rq"
                                                                 role="img" xmlns="http://www.w3.org/2000/svg"
                                                                 viewBox="0 0 512 512">
                                                                <path fill="currentColor"
                                                                      d="M173.898 439.404l-166.4-166.4c-9.997-9.997-9.997-26.206 0-36.204l36.203-36.204c9.997-9.998 26.207-9.998 36.204 0L192 312.69 432.095 72.596c9.997-9.997 26.207-9.997 36.204 0l36.203 36.204c9.997 9.997 9.997 26.206 0 36.204l-294.4 294.401c-9.998 9.997-26.207 9.997-36.204-.001z">
                                                                </path>
                                                            </svg>
                                                        @else
                                                            <i class="mdi mdi-motion-pause-outline"></i>
                                                        @endif
                                                    @endif
                                                </div>


                                                <div class="lecture__route-accordion-link">
                                                    <p class="course__accordion-lecture-name">
                                                        {{++$numberSource}}. {{$sourceChild->name}}
                                                    </p>
                                                </div>
                                            </a>
                                        @endif

                                        @php
                                            if($counter >= 1){
                                                $is_continue = false;
                                            }
                                            if($processedItem->source_id == $sourceChild->id){
                                                $counter++;
                                            }
                                        @endphp

                                    @endforeach
                                </div>
                            </div>
                        @endforeach
                    </div>

                </div>
            </div>

            <div class="lecture__showList hide">
                <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="arrow-left"
                     class="svg-inline--fa fa-arrow-left fa-w-14 Content_icon__3KWt0" role="img"
                     xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                    <path fill="currentColor"
                          d="M257.5 445.1l-22.2 22.2c-9.4 9.4-24.6 9.4-33.9 0L7 273c-9.4-9.4-9.4-24.6 0-33.9L201.4 44.7c9.4-9.4 24.6-9.4 33.9 0l22.2 22.2c9.5 9.5 9.3 25-.4 34.3L136.6 216H424c13.3 0 24 10.7 24 24v32c0 13.3-10.7 24-24 24H136.6l120.5 114.8c9.8 9.3 10 24.8.4 34.3z">
                    </path>
                </svg>
                Nội dung bài học
            </div>
        </div>
    </div>
@endsection

@section('js')

    <script src="{{asset('user/assets/libs/morris.js/morris.min.js')}}"></script>
    <script src="{{asset('user/assets/libs/raphael/raphael.min.js')}}"></script>

    <script src="https://player.vimeo.com/api/player.js"></script>

    <script>



        $(document).ready(function () {

            var x = $("#iframecheck");
            var nodelist = x.length;

            for (i = 0; i < nodelist; i++) {

                var player = new Vimeo.Player(x[i]);

                player.getVideoTitle().then(function (title) {
                    console.log('title:', title);
                });

                // player.play();
                player.on('play', function () {
                    console.log("play");
                    // var totalplay = parseInt(document.getElementById('playvideo').value, 10);
                    // console.log(totalplay);


                    // totalplay = isNaN(totalplay) ? 0 : totalplay;
                    // totalplay++;
                    // document.getElementById('playvideo').value = totalplay;
                    // if (totalplay == 2) {
                    //     alert('Yêu cầu bạn không được tua video ?');
                    // }
                    // if (totalplay > 2) {
                    //     window.location = link_url;
                    // }
                });


                player.on('pause', function (data) {
                    console.log("pause", data);
                    player.pause();
                });


                const arrPercent = [];
                let checkFlagSkip = true;

                player.on('timeupdate', function (data) {
                    const percentVideo = data.percent * 100

                    arrPercent.push(percentVideo);

                    // check if skip video no open course
                    if (arrPercent[arrPercent.length - 1] > arrPercent[arrPercent.length - 2] + 2) {
                        // player.pause();
                        // If skip video checkFlagSkip = false;
                        checkFlagSkip = false;

                        console.log("Học thất bại!", checkFlagSkip);
                    }

                })


                player.on('ended', function () {
                    // check checkFlagSkip === false đã skip video
                    if (checkFlagSkip == false) {
                        console.log("Học thất bại!")
                    } else {
                        console.log("Học thành công!")
                    }

                    console.log('ended the video!');

                    if (deviceTypeMobile()) {
                        const tag_next = $('.inactive-link-m:first')
                        const tag_current = $('.course__accordion-lecture.current-m:first')

                        $.ajax({
                            type: 'GET',
                            url: tag_current.data('url'),
                            success: function (response) {

                            },
                            error: function (err) {

                            },
                        })

                        tag_next.removeClass('inactive-link-m')
                    }else{
                        const tag_next = $('.inactive-link:first')
                        const tag_current = $('.course__accordion-lecture.current:first')

                        $.ajax({
                            type: 'GET',
                            url: tag_current.data('url'),
                            success: function (response) {

                            },
                            error: function (err) {

                            },
                        })

                        tag_next.removeClass('inactive-link')
                    }


                });

            }
        })
    </script>

    <script>
        // show List lecture
        const closeBtnList = document.querySelector(".route-btn-close");

        if (closeBtnList) {
            closeBtnList.addEventListener("click", function (event) {
                document.querySelector(".lecture .col-lg-3").classList.add("hide");
                document.querySelector(".lecture .col-lg-9").classList.value = "col-lg-12";

                const btnHideList = document.querySelector(".lecture__showList.hide");
                if (!btnHideList) return;

                btnHideList.classList.remove("hide");
                handleShowList();
            })
        }

        function handleShowList() {
            const btnShowList = document.querySelector(".lecture__showList");
            if (btnShowList) {
                btnShowList.addEventListener("click", function () {
                    btnShowList.classList.add("hide");

                    document.querySelector(".lecture .col-lg-3").classList.remove("hide");
                    document.querySelector(".lecture .col-lg-12").classList.value = "col-lg-9";
                })
            }

        }
    </script>

@endsection
