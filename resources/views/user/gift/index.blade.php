@extends('user.layouts.master')

@section('title')
    <title>Home page</title>
@endsection

@section('name')
    <h4 class="page-title">Quà tặng</h4>
@endsection

@section('css')
    <!-- App Css-->
    <link href="{{asset('user/assets/css/style.css')}}" rel="stylesheet" type="text/css" />
    <!-- Responsive Css -->
    <link href="{{asset('user/assets/css/responsive.css')}}" rel="stylesheet" type="text/css" />
    <!-- Slide Swiper JS -->
@endsection

@section('content')
    <div class="container">
        <div class="mission account">
            <h1 class="account__header mission__header">Cấp độ</h1>

            @foreach($levels as $levelItem)
                <div class="account__progress">
                    <div class="account__progress-levelUp">

                        <div class="mission__progress">
                            <h4 class="mission__progress-title"></h4>
                            <div class="progress">
                                <div class="progress-bar account__progress-bar bg-success" role="progressbar"
                                     style="width: {{$levelItem->calculateLevel($levelItem->id , \Illuminate\Support\Facades\Auth::user()->point)}}%" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100">
                                </div>
                            </div>
                            <p class="mission__progress-description">
                                Thăng cấp lên level {{$levelItem->level}} để được nhận phần thưởng
                            </p>
                        </div>

                        <div class="account__progress-currentLevel ">
                            <span class="account__progress-currentLevel-number">{{$levelItem->level}}</span>
                            <span class="account__progress-currentLevel-text">level</span>
                        </div>
                    </div>

                    @if(\Illuminate\Support\Facades\Auth::user()->getUserHasGift(\Illuminate\Support\Facades\Auth::id(), $levelItem->id))
                        <div class="mission__text mission__reward-header">Bạn đã nhận được
                            <span class="text-danger">{{\Illuminate\Support\Facades\Auth::user()->getUserHasGift(\Illuminate\Support\Facades\Auth::id(), $levelItem->id)->content}}
                            </span>

                            <span>: {{\Illuminate\Support\Facades\Auth::user()->getUserHasGift(\Illuminate\Support\Facades\Auth::id(), $levelItem->id)->status ? 'Đã nhận' : 'Chưa nhận'}}</span>
                        </div>

                    @else
                        <h4 class="mission__reward-header">Lựa chọn quà tặng hoặc mở rương</h4>
                        <div class="mission__reward">
                            <div class="mission__reward-option">

                                <div class="mission__reward-voucher">
                                    <div class="mission__reward-img"
                                         style="background-image: url({{asset('user/assets/images/voucher.png')}});"></div>

                                    <p class="mission__reward-info">
                                        Quà nhận ngay: <span class="text-danger">{{$levelItem->content}}</span>
                                    </p>

                                    <button class="btn btn-warning mission__reward-btn active_get_gift {{\Illuminate\Support\Facades\Auth::user()->point < $levelItem->point_require ? 'stop' : ''}}" data-url="{{route('user.getGift' , ['level_id' => $levelItem->id])}}">Nhận quà</button>
                                </div>
                            </div>
                            <div class="mission__reward-box">
                                <img src="{{asset('user/assets/images/treasure.gif')}}" alt="Ảnh mở Rương">

                                <div class='cont mission__progress-btn {{\Illuminate\Support\Facades\Auth::user()->point < $levelItem->point_require ? 'stop' : ''}}'>
                                    <button class='button' data-bs-toggle="modal" data-bs-target="#modalGifBox">
                                        <div class='blob action_open_gift' data-url="{{route('user.openGift' , ['level_id' => $levelItem->id])}}">
                                            <svg xmlns:xlink='http://www.w3.org/1999/xlink' version='1.1'
                                                 xmlns='http://www.w3.org/2000/svg' viewBox='0 0 310 350'>
                                                <path
                                                    d='M156.4,339.5c31.8-2.5,59.4-26.8,80.2-48.5c28.3-29.5,40.5-47,56.1-85.1c14-34.3,20.7-75.6,2.3-111  c-18.1-34.8-55.7-58-90.4-72.3c-11.7-4.8-24.1-8.8-36.8-11.5l-0.9-0.9l-0.6,0.6c-27.7-5.8-56.6-6-82.4,3c-38.8,13.6-64,48.8-66.8,90.3c-3,43.9,17.8,88.3,33.7,128.8c5.3,13.5,10.4,27.1,14.9,40.9C77.5,309.9,111,343,156.4,339.5z' />

                                            </svg>
                                        </div>
                                        <div class="text action_open_gift" data-url="{{route('user.openGift' , ['level_id' => $levelItem->id])}}">Mở rương</div>
                                    </button>
                                </div>
                            </div>
                        </div>
                    @endif

                </div>

                @if($levelItem->calculateLevel($levelItem->id , \Illuminate\Support\Facades\Auth::user()->point) < 100)
                    @php
                        break;
                    @endphp
                @endif
            @endforeach
        </div>
    </div>

    <!-- Modal Gift box -->
    <div class="modal fade mission__modal" id="modalGifBox" tabindex="-1" aria-labelledby="modalGifBoxLabel"
         aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <!-- <div class="modal-header">
                    <h5 class="modal-title" id="modalGifBoxLabel"></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div> -->
                <div class="modal-body">
                    <img src="{{asset('user/assets/images/giftBox.png')}}" alt="Ảnh Quà">
                    <div class="mission__modal-info">
                        <p class="text-center" id="title_open_gift"></p>
                        <button type="button" class="btn btn-primary mission__modal-btn action_refresh_page"
                                data-bs-dismiss="modal">OK</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')

    <script>
        const btnStopBox = document.querySelector(".mission__progress-btn.stop");
        if (btnStopBox) {
            btnStopBox.firstElementChild.dataset.bsTarget = "";
            btnStopBox.firstElementChild.dataset.bsToggle = "";
        }
    </script>


    <script>

        $( document ).ready(function() {

            function actionRefreshPage(event){
                event.preventDefault()
                location.reload()
            }

            function actionOpenGift(event){
                event.preventDefault()

                const that = $(this)

                let urlRequest = that.data('url')

                $.ajax({
                    type: 'GET',
                    url: urlRequest,
                    success: function (response) {
                        console.log(response)

                        $(that).parent().parent().parent().parent().parent().remove()
                        $('#title_open_gift').html(response.message)
                    },
                    error: function (err) {
                        console.log(err)
                    },
                })
            }

            function actionGetGift(event){
                event.preventDefault()
                const that = $(this)
                let urlRequest = that.data('url')

                $.ajax({
                    type: 'GET',
                    url: urlRequest,
                    success: function (response) {
                        console.log(response)
                        $(that).parent().parent().parent().remove()

                        location.reload()
                    },
                    error: function (err) {
                        console.log(err)
                    },
                })
            }

            $(document).on('click', '.action_open_gift', actionOpenGift);
            $(document).on('click', '.active_get_gift', actionGetGift);
            $(document).on('click', '.action_refresh_page', actionRefreshPage);
        });



    </script>
@endsection
