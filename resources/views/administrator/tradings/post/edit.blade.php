@extends('administrator.layouts.master')

@section('title')
    <title>Home page</title>
@endsection

@section('name')
    <h4 class="page-title">Menu</h4>
@endsection
@section('css')
    <link href="{{asset('vendor/select2/select2.min.css') }}" rel="stylesheet"/>
    <link href="{{asset('admins/products/add/add.css') }}" rel="stylesheet"/>
@endsection

@include('administrator.tradings.post.active_slidebar')

@section('content')

    <form action="{{route('administrator.post.update', ['id'=> $post->id])}}" method="post" enctype="multipart/form-data">
        @method('PUT')
        @csrf
        <div class="col-md-6">

            <div class="form-group">
                <label>Tiêu đề</label>
                <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" placeholder="Nhập tiêu đề" value="{{$post->title}}">
                @error('title')
                <div class="alert alert-danger">{{$message}}</div>
                @enderror
            </div>

            <div class="form-group mt-3">
                <label>Ảnh</label>
                <input type="file" name="image_path" class="form-control-file @error('image_path') is-invalid @enderror" accept="image/*">
                <div class="col-md-4 container_feature_image">
                    <div class="row">
                        <img class="feature_image" src="{{$post->image_path}}" alt="">
                    </div>
                </div>
                @error('image_path')
                <div class="alert alert-danger">{{$message}}</div>
                @enderror
            </div>

            <div class="form-group mt-3">
                <label>Nhập nội dung</label>
                <textarea style="min-height: 400px;" name="contents"
                          class="form-control tinymce_editor_init @error('contents') is-invalid @enderror"
                          rows="8">{{$post->content}}</textarea>
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
    <script src="{{asset('vendor/tinymce/tinymce.min.js') }}"></script>
    <script src="{{asset('admins/products/add/add.js') }}"></script>
@endsection
