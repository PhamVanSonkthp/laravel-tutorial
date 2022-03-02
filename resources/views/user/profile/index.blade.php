@extends('user.layouts.master')

@php
    $title = "Profile";
@endphp

@section('title')
    <title>{{$title}}</title>
@endsection

@section('name')
    <h4 class="page-title">{{$title}}</h4>
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
        <div class="account">
            <h1 class="account__header">Thông tin cá nhân</h1>

            <div class="account__level">
                <img src="{{asset('user/assets/images/Frame.svg')}}" alt="Ảnh hạng">
                <div class="account__level-info">
                    <h3 class="account__level-title">Hạng thành viên hiện tại</h3>
                    <p class="text-start account__level-paces text-dark">Điểm của bạn: &nbsp;<span class="account__level-paces">{{number_format($user->point)}} P</span></p>
                    <p class="text-start account__level-paces text-dark">Level: &nbsp;<span class="account__level-paces">{{$user->getUserLevel()}}</span></p>
                </div>
            </div>

            <div class="account__progress">
                <div class="account__progress-levelUp">
                    <!-- <img src="./assets/images/sign.png" alt="Ảnh LevelUp"> -->

{{--                    <div class="account__progress-currentLevel">--}}
{{--                        <span class="account__progress-currentLevel-number">{{$user->getUserLevel()}}</span>--}}
{{--                        <span class="account__progress-currentLevel-text">level</span>--}}
{{--                    </div>--}}

{{--                    <div class="progress">--}}
{{--                        <div class="progress-bar account__progress-bar bg-success" role="progressbar"--}}
{{--                             style="width: 10%" aria-valuemax="100">--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <img src="{{asset('user/assets/images/level.png')}}" alt="Ảnh LevelUp">--}}
                </div>
            </div>

            <form action="{{route('user.updateProfile')}}" class="account__form" method="post" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <div class="account__form-group">
                    <label for="formGroupExampleInput" class="form-label">Họ và tên</label>
                    <input name="name" type="text" class="form-control @error('name') is-invalid @enderror" id="formGroupExampleInput" placeholder="Name input" value="{{$user->name}}" disabled>
                    @error('name')
                    <div class="alert alert-danger">{{$message}}</div>
                    @enderror
                </div>

                <div class="account__form-group">
                    <label for="formGroupEmail" class="form-label">Email</label>
                    <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="formGroupEmail" placeholder="Email input" value="{{$user->email}}" disabled>
                    @error('email')
                    <div class="alert alert-danger">{{$message}}</div>
                    @enderror
                </div>

                <div class="account__form-group">
                    <label for="formGroupPhone" class="form-label">Số điện thoại</label>
                    <input type="text" name="phone" class="form-control @error('phone') is-invalid @enderror" id="formGroupPhone" placeholder="Phone input" value="{{$user->phone}}" disabled>
                    @error('phone')
                    <div class="alert alert-danger">{{$message}}</div>
                    @enderror
                </div>

                <div class="account__form-group">
                    <label for="formGroupPassword" class="form-label">Mật khẩu</label>
                    <input type="text" name="password" class="form-control @error('password') is-invalid @enderror" id="formGroupPassword" placeholder="Password input" disabled>
                    @error('password')
                    <div class="alert alert-danger">{{$message}}</div>
                    @enderror
                </div>

                <div class="account__btn">
                    <button type="button" class="btn btn-primary account__btn-edit">Edit</button>

                    <div class="account__btn-save hide">
                        <button type="submit" class="btn btn-primary">Lưu</button>
                        <button type="button" class="btn btn-outline-danger account__btn-cancel">Hủy</button>
                    </div>
                </div>
            </form>

        </div>
    </div>
@endsection

@section('js')

    <script>
        // Handle click Edit
        let btnEdit = document.querySelector(".account__btn-edit");
        const btnCancel = document.querySelector(".account__btn-cancel");
        if (btnEdit) {
            btnEdit.addEventListener("click", function (e) {
                const btnSave = document.querySelector(".account__btn-save.hide");
                const inputGroup = document.querySelectorAll(".account__form-group>input");
                if (inputGroup) {
                    inputGroup.forEach(x => x.disabled = false);
                    inputGroup[0].focus();
                }

                e.target.classList.add("hide");
                btnSave.classList.remove("hide");
            })
        }
        if (btnCancel) {
            btnCancel.addEventListener("click", function () {
                const inputGroup = document.querySelectorAll(".account__form-group>input");
                if (inputGroup) {
                    inputGroup.forEach(x => x.disabled = true);
                    inputGroup[0].focus();
                }

                this.closest(".account__btn-save").classList.add("hide");
                btnEdit.classList.remove("hide");
            })
        }


        const minValue = 0;
        const maxValue = 2000;
        const currentValue = 1800;

        // handleProgress(minValue, maxValue, currentValue);
        //
        // // Calc Progress Bar Level
        // function handleProgress(minValue, maxValue, currentValue) {
        //     const percentProgress = ((currentValue - minValue) / (maxValue - minValue)) * 100;
        //     console.log(percentProgress);
        //     const valueProgress = document.querySelector(".account__progress-bar");
        //     if (valueProgress) {
        //         valueProgress.ariaValueNow = percentProgress;
        //         valueProgress.style.width = `${percentProgress}%`;
        //     }
        // }
    </script>
@endsection
