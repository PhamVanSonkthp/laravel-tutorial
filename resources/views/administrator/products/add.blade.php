@extends('administrator.layouts.master')

@section('title')
    <title>Home page</title>
@endsection

@section('name')
    <h4 class="page-title">Khóa học</h4>
@endsection
@section('css')
    <link href="{{asset('vendor/select2/select2.min.css') }}" rel="stylesheet"/>
    <link href="{{asset('admins/products/add/add.css') }}" rel="stylesheet"/>
@endsection

@section('content')

    <form action="{{route('products.store')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="col-md-6">

            <div class="form-group">
                <label>Tên khóa học</label>
                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                       placeholder="Nhập tên khóa học" value="{{old('name')}}">
                @error('name')
                <div class="alert alert-danger">{{$message}}</div>
                @enderror
            </div>
            <div class="form-group mt-3">
                <label>Giá khóa học</label>
                <input type="text" name="price" class="form-control @error('price') is-invalid @enderror"
                       placeholder="Nhập giá khóa học" value="{{old('price')}}">
                @error('price')
                <div class="alert alert-danger">{{$message}}</div>
                @enderror
            </div>
            <div class="form-group mt-3">
                <label>Ảnh đại diện</label>
                <input type="file" name="feature_image_path" class="form-control-file">
            </div>

            <div class="form-group mt-3">
                <label>Ảnh chi tiết</label>
                <input type="file" multiple name="image_path[]" class="form-control-file">
            </div>

            <div class="form-group mt-3">
                <label>Chọn danh mục</label>
                <select class="form-control select2_init @error('category_id') is-invalid @enderror" name="category_id">
                    <option value="">Chọn danh mục</option>
                    {!! $htmlOption !!}
                </select>
                @error('category_id')
                <div class="alert alert-danger">{{$message}}</div>
                @enderror
            </div>

            <div class="form-group mt-3">
                <label>Nhập tags cho khóa học</label>
                <select name="tags[]" class="form-control tags_select_choose" multiple>

                </select>
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