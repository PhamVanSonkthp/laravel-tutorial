@extends('administrator.layouts.master')

@section('title')
    <title>Home page</title>
@endsection

@section('name')
    <h4 class="page-title">Trading</h4>
@endsection
@section('css')
    <link href="{{asset('vendor/select2/select2.min.css') }}" rel="stylesheet"/>
    <link href="{{asset('admins/products/add/add.css') }}" rel="stylesheet"/>
@endsection

@include('administrator.tradings.active_slidebar')

@section('content')

    <form action="{{route('administrator.tradings.store')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="col-md-6">

            <div class="form-group">
                <label>Tên Trading</label>
                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                       placeholder="Nhập tên" value="{{old('name')}}">
                @error('name')
                <div class="alert alert-danger">{{$message}}</div>
                @enderror
            </div>
            <div class="form-group mt-3">
                <label>Giá</label>
                <input type="number" name="price" class="form-control @error('price') is-invalid @enderror"
                       placeholder="Nhập giá" value="{{old('price')}}">
                @error('price')
                <div class="alert alert-danger">{{$message}}</div>
                @enderror
            </div>

            <div class="form-group mt-3">
                <label>Điểm nhận được khi đăng ký trading</label>
                <input type="number" name="point" class="form-control @error('point') is-invalid @enderror"
                       placeholder="Nhập điểm" value="{{old('point') ?? 0}}">
                @error('point')
                <div class="alert alert-danger">{{$message}}</div>
                @enderror
            </div>


            <div class="form-group mt-3">
                <label>Thời gian gia hạn lại (tháng). Nhập 0 nếu không gia hạn</label>

                <input type="number" name="time_payment_again"
                       class="form-control @error('time_payment_again') is-invalid @enderror"
                       placeholder="Nhập thời gian" value="{{old('time_payment_again') ?? 0}}">
                @error('time_payment_again')
                <div class="alert alert-danger">{{$message}}</div>
                @enderror
            </div>

            <div class="form-group mt-3">
                <label>Link học trading</label>

                <input type="text" name="link"
                       class="form-control @error('link') is-invalid @enderror"
                       placeholder="Nhập link" value="{{old('link')}}">
                @error('link')
                <div class="alert alert-danger">{{$message}}</div>
                @enderror
            </div>

            <div class="form-group mt-3">
                <label>Ảnh đại diện</label>
                <input type="file" name="feature_image_path" class="form-control-file" accept="image/*">
            </div>

        </div>

        <div class="col-md-12">

            <div class="form-group mt-3">
                <label>Nhập nội dung</label>
                <textarea style="min-height: 400px;" name="contents"
                          class="form-control tinymce_editor_init @error('contents') is-invalid @enderror"
                          rows="8">{{old('contents')}}</textarea>
                @error('contents')
                <div class="alert alert-danger">{{$message}}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary mt-3">Submit</button>

        </div>
    </form>

@endsection

@section('js')
    <script src="{{asset('vendor/select2/select2.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/5.10.3/tinymce.min.js"
            integrity="sha512-ykwx/3dGct2v2AKqqaDCHLt1QFVzdcpad7P5LfgpqY8PJCRqAqOeD4Bj63TKnSQy4Yok/6QiCHiSV/kPdxB7AQ=="
            crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="{{asset('admins/products/add/add.js') }}"></script>

@endsection
