@extends('administrator.layouts.master')

@section('title')
    <title>Home page</title>
@endsection

@section('name')
    <h4 class="page-title">Slider</h4>
@endsection
@section('css')
    <link href="{{asset('admins/products/add/add.css') }}" rel="stylesheet"/>
@endsection

@section('content')

    <form action="{{route('slider.update', ['id'=> $slider->id]) }}" method="post" enctype="multipart/form-data">
        @method('PUT')
        @csrf
        <div class="col-md-6">

            <div class="form-group">
                <label>Tên slider</label>
                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" placeholder="Nhập tên sản phẩm"
                       value="{{$slider->name}}">
                @error('name')
                <div class="alert alert-danger">{{$message}}</div>
                @enderror
            </div>
            <div class="form-group mt-3">
                <label>Mô tả</label>
                <textarea name="decription" class="form-control @error('decription') is-invalid @enderror" rows="8">{{$slider->decription}}</textarea>
                @error('decription')
                <div class="alert alert-danger">{{$message}}</div>
                @enderror
            </div>

            <div class="form-group mt-3">
                <label>Hình ảnh</label>
                <input type="file" name="feature_image_path" class="form-control-file">
                <div class="col-md-4 container_feature_image">
                    <div class="row">
                        <img class="feature_image" src="{{$slider->image_path}}" alt="">
                    </div>
                </div>
            </div>

            <button type="submit" class="btn btn-primary mt-3">Submit</button>

        </div>
    </form>

@endsection

@section('js')
    <script src="{{asset('admins/products/add/add.js') }}"></script>
@endsection
