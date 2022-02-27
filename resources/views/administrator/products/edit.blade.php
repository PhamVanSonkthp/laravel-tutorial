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

@include('administrator.products.active_slidebar')

@section('content')

    <form action="{{route('administrator.products.update', ['id'=> $product->id]) }}" method="post"
          enctype="multipart/form-data">
        @method('PUT')
        @csrf
        <div class="col-md-6">

            <div class="form-group">
                <label>Tên sản phẩm</label>
                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                       placeholder="Nhập tên sản phẩm"
                       value="{{$product->name}}">
                @error('name')
                <div class="alert alert-danger">{{$message}}</div>
                @enderror
            </div>
            <div class="form-group mt-3">
                <label>Giá sản phẩm</label>
                <input type="text" name="price" class="form-control @error('price') is-invalid @enderror"
                       placeholder="Nhập giá sản phẩm"
                       value="{{$product->price}}">
                @error('price')
                <div class="alert alert-danger">{{$message}}</div>
                @enderror
            </div>

            <div class="form-group mt-3">
                <label>Điểm nhận được khi mua khóa học</label>
                <input type="number" name="point" class="form-control @error('point') is-invalid @enderror"
                       placeholder="Nhập điểm" value="{{$product->point}}">
                @error('point')
                <div class="alert alert-danger">{{$message}}</div>
                @enderror
            </div>

            <div class="form-group mt-3">
                <label>Thời gian đóng học lại (tháng). Nhập 0 nếu là khóa học không gia hạn</label>
                <input type="text" name="time_payment_again"
                       class="form-control @error('time_payment_again') is-invalid @enderror"
                       placeholder="Nhập thời gian" value="{{$product->time_payment_again}}">
                @error('time_payment_again')
                <div class="alert alert-danger">{{$message}}</div>
                @enderror
            </div>

            <div class="form-group mt-3">
                <label>Ảnh đại diện</label>
                <input type="file" name="feature_image_path" class="form-control-file" accept="image/*">
                <div class="col-md-4 container_feature_image">
                    <div class="row">
                        <img class="feature_image" src="{{$product->feature_image_path}}" alt="">
                    </div>
                </div>
            </div>

{{--            <div class="form-group mt-3">--}}
{{--                <label>Ảnh chi tiết</label>--}}
{{--                <input type="file" multiple name="image_path[]" class="form-control-file">--}}
{{--                <div class="col-md-12 container_image_detail">--}}
{{--                    <div class="row">--}}
{{--                        @foreach($product->productImages as $productImageItem)--}}
{{--                            <div class="col-md-3">--}}
{{--                                <img class="image_detail_product" src="{{$productImageItem->image_path}}" alt="">--}}
{{--                            </div>--}}
{{--                        @endforeach--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}

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

{{--            <div class="form-group mt-3">--}}
{{--                <label>Nhập tags cho sản phẩm</label>--}}
{{--                <select name="tags[]" class="form-control tags_select_choose" multiple>--}}
{{--                    @foreach($product->tags as $tagItem)--}}
{{--                        <option value="{{$tagItem->name}}" selected>{{$tagItem->name}}</option>--}}
{{--                    @endforeach--}}
{{--                </select>--}}
{{--            </div>--}}

        </div>

        <div class="col-md-12">
            <div class="col-md-12 mt-3 container-list-source">
                <div class="col-md-12 row ">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Chủ đề khóa học</label>
                            <select name="topic_id"
                                    class="form-control select2_init @error('topic_id') is-invalid @enderror">
                                <option value=""></option>
                                @foreach($topics as $topicItem)
                                    <option
                                        value="{{$topicItem->id}}" {{$topicItem->product_id == $product->id ? 'selected' : ''}}>{{$topicItem->name}}</option>
                                @endforeach
                            </select>
                            @error('topic_id')
                            <div class="alert alert-danger">{{$message}}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="container_sources">
                            @foreach($sourceParents as $sourceParentItem)
                                <div class="mt-3">
                                    {{$sourceParentItem->name}}
                                </div>
                                @foreach($sourceParentItem->sourceChildren as $sourceChildItem)
                                    <div class="row">
                                        <div class="col-md-4 mt-1">
                                            <div class="form-group">
                                                <input name="sources_name[]" type="text"
                                                       class="name form-control @error('sources_name') is-invalid @enderror"
                                                       placeholder="Tên bài học" disabled value="{{$sourceChildItem->name}}">
                                                @error('sources_name')
                                                <div class="alert alert-danger">{{$message}}</div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-md-4 mt-1">
                                            <div class="form-group">
                                                <input name="sources_link[]" type="text"
                                                       class="link form-control @error('sources_link') is-invalid @enderror"
                                                       placeholder="Link video" disabled value="{{$sourceChildItem->link}}">
                                                @error('sources_link')
                                                <div class="alert alert-danger">{{$message}}</div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-md-4 mt-1">
                                            <div class="form-group">
                                                <input name="sources_doc[]" type="text"
                                                       class="link form-control @error('sources_doc') is-invalid @enderror"
                                                       placeholder="Link video" disabled value="{{$sourceChildItem->doc}}">
                                                @error('sources_doc')
                                                <div class="alert alert-danger">{{$message}}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @endforeach

                        </div>
                    </div>
                </div>
            </div>

            <div class="form-group mt-3">
                <label>Nhập nội dung</label>
                <textarea style="min-height: 400px;" name="contents"
                          class="form-control tinymce_editor_init @error('contents') is-invalid @enderror"
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
