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

    <form action="{{route('products.update', ['id'=> $product->id]) }}" method="post" enctype="multipart/form-data">
        @method('PUT')
        @csrf
        <div class="col-md-6">

            <div class="form-group">
                <label>Tên sản phẩm</label>
                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" placeholder="Nhập tên sản phẩm"
                       value="{{$product->name}}">
                @error('name')
                <div class="alert alert-danger">{{$message}}</div>
                @enderror
            </div>
            <div class="form-group">
                <label>Giá sản phẩm</label>
                <input type="text" name="price" class="form-control @error('price') is-invalid @enderror" placeholder="Nhập giá sản phẩm"
                       value="{{$product->price}}">
                @error('price')
                <div class="alert alert-danger">{{$message}}</div>
                @enderror
            </div>
            <div class="form-group">
                <label>Ảnh đại diện</label>
                <input type="file" name="feature_image_path" class="form-control-file">
                <div class="col-md-4 container_feature_image">
                    <div class="row">
                        <img class="feature_image" src="{{$product->feature_image_path}}" alt="">
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label>Ảnh chi tiết</label>
                <input type="file" multiple name="image_path[]" class="form-control-file">
                <div class="col-md-12 container_image_detail">
                    <div class="row">
                        @foreach($product->productImages as $productImageItem)
                            <div class="col-md-3">
                                <img class="image_detail_product" src="{{$productImageItem->image_path}}" alt="">
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label>Chọn danh mục</label>
                <select class="form-control select2_init @error('category_id') is-invalid @enderror" name="category_id">
                    <option value="">Chọn danh mục</option>
                    {!! $htmlOption !!}
                </select>
                @error('category_id')
                <div class="alert alert-danger">{{$message}}</div>
                @enderror
            </div>

            <div class="form-group">
                <label>Nhập tags cho sản phẩm</label>
                <select name="tags[]" class="form-control tags_select_choose" multiple>
                    @foreach($product->tags as $tagItem)
                        <option value="{{$tagItem->name}}" selected>{{$tagItem->name}}</option>
                    @endforeach
                </select>
            </div>

        </div>

        <div class="col-md-12">
            <div class="form-group">
                <label>Nhập nội dung</label>
                <textarea style="min-height: 400px;" name="contents" class="form-control tinymce_editor_init @error('contents') is-invalid @enderror"
                          rows="8">{{$product->content}}</textarea>
                @error('contents')
                <div class="alert alert-danger">{{$message}}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
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