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

    <form action="{{route('administrator.products.store')}}" method="post" enctype="multipart/form-data">
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
                <input type="number" name="price" class="form-control @error('price') is-invalid @enderror"
                       placeholder="Nhập giá khóa học" value="{{old('price')}}">
                @error('price')
                <div class="alert alert-danger">{{$message}}</div>
                @enderror
            </div>

            <div class="form-group mt-3">
                <label>Điểm nhận được khi mua khóa học</label>
                <input type="number" name="point" class="form-control @error('point') is-invalid @enderror"
                       placeholder="Nhập điểm" value="{{old('point')}}">
                @error('point')
                <div class="alert alert-danger">{{$message}}</div>
                @enderror
            </div>


            <div class="form-group mt-3">
                <label>Thời gian đóng học lại (tháng). Nhập 0 nếu là khóa học không gia hạn</label>

                <input type="text" name="time_payment_again"
                       class="form-control @error('time_payment_again') is-invalid @enderror"
                       placeholder="Nhập thời gian" value="{{old('time_payment_again')}}">
                @error('time_payment_again')
                <div class="alert alert-danger">{{$message}}</div>
                @enderror
            </div>

            <div class="form-group mt-3">
                <label>
                    <input name="end_video_to_next" class="checkbox_wrapper" type="checkbox">
                </label>
                <label>
                    Bắt buộc xem hết video mới được học bài tiếp theo
                </label>
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

            <div class="row">

                <div class="col-md-12 mt-3">
                    <label>Thêm bài học</label>
                </div>

                <div class="col-md-12 mt-3 container-list-source">
                    <div class="col-md-12 mt-3 row ">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Chủ đề bài học</label>
                                <input name="sources_name[]" type="text"
                                       class="header form-control @error('sources_name') is-invalid @enderror"
                                       placeholder="Chủ đề bài học">
                                @error('sources_name')
                                <div class="alert alert-danger">{{$message}}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="clearfix"></div>

                        <div class="col-md-12">
                            <div class="container_sources">
                                <div class="row">
                                    <div class="col-md-6 mt-1">
                                        <div class="form-group">
                                            <input name="sources_name[]" type="text"
                                                   class="name form-control @error('sources_name') is-invalid @enderror"
                                                   placeholder="Tên bài học">
                                            @error('sources_name')
                                            <div class="alert alert-danger">{{$message}}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-6 mt-1">
                                        <div class="row">
                                            <div class="col-11">
                                                <div class="form-group">
                                                    <input name="sources_link[]" type="text"
                                                           class="link form-control @error('sources_link') is-invalid @enderror"
                                                           placeholder="Link bài học">
                                                    @error('sources_link')
                                                    <div class="alert alert-danger">{{$message}}</div>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-1">
                                                <button type="button"
                                                        class="btn btn-danger waves-effect waves-light action_delete_source">
                                                    x
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="col-md-12">
                            <button type="button"
                                    class="btn btn-success waves-effect waves-light action_add_source float-end mt-1">
                                (+)
                            </button>
                        </div>

                        <div class="clearfix"></div>
                    </div>
                </div>


                <div class="col-md-3 mt-3">
                    <button type="button" class="btn btn-success waves-effect waves-light action_add_list_source">Thêm
                    </button>
                </div>


            </div>


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

    <script>
        function actionAddSource(event) {
            event.preventDefault()
            $(this).parent().parent().children('div').children('.container_sources').append(`<div class="row">
                                <div class="col-md-6 mt-1">
                                    <div class="form-group">
                                        <input name="sources_name[]" type="text"
                                               class="form-control @error('sources_name') is-invalid @enderror"
                                               placeholder="Tên bài học">
                                        @error('sources_name')
            <div class="alert alert-danger">{{$message}}</div>
                                        @enderror
            </div>
        </div>

        <div class="col-md-6 mt-1">
            <div class="row">
                <div class="col-11">
                    <div class="form-group">
                        <input name="sources_link[]" type="text"
                               class="form-control @error('sources_link') is-invalid @enderror"
                                                       placeholder="Link bài học">
                                                @error('sources_link')
            <div class="alert alert-danger">{{$message}}</div>
                                                @enderror
            </div>
        </div>

        <div class="col-1">
            <button type="button"
                    class="btn btn-danger waves-effect waves-light action_delete_source">x
            </button>
        </div>
    </div>
</div>
</div>`)
        }

        function actionAddListSource(event) {
            event.preventDefault()


            $('.container-list-source').append(`<div class="col-md-12 mt-3 row ">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Chủ đề bài học</label>
                                <input name="sources_name[]" type="text"
                                       class="form-control @error('sources_name') is-invalid @enderror"
                                       placeholder="Chủ đề bài học">
                                @error('sources_name')
            <div class="alert alert-danger">{{$message}}</div>
                                @enderror
            </div>
        </div>

        <div class="clearfix"></div>

        <div class="col-md-12">
            <div class="container_sources">
                <div class="row">
                    <div class="col-md-6 mt-1">
                        <div class="form-group">
                            <input name="sources_name[]" type="text"
                                   class="form-control @error('sources_name') is-invalid @enderror"
                                                   placeholder="Tên bài học">
                                            @error('sources_name')
            <div class="alert alert-danger">{{$message}}</div>
                                            @enderror
            </div>
        </div>

        <div class="col-md-6 mt-1">
            <div class="row">
                <div class="col-11">
                    <div class="form-group">
                        <input name="sources_link[]" type="text"
                               class="form-control @error('sources_link') is-invalid @enderror"
                                                           placeholder="Link bài học">
                                                    @error('sources_link')
            <div class="alert alert-danger">{{$message}}</div>
                                                    @enderror
            </div>
        </div>

        <div class="col-1">
            <button type="button"
                    class="btn btn-danger waves-effect waves-light action_delete_source">x
            </button>
        </div>
    </div>
</div>
</div>


</div>

</div>


<div class="col-md-12">
<button type="button"
class="btn btn-success waves-effect waves-light action_add_source float-end mt-1">(+)
</button>
</div>

<div class="clearfix"></div>
</div>`)
        }

        function actionDeleteSource(event) {
            event.preventDefault()

            $(this).parent().parent().parent().parent().remove()
        }

        $(function () {
            $(document).on('click', '.action_add_source', actionAddSource);
            $(document).on('click', '.action_delete_source', actionDeleteSource);
            $(document).on('click', '.action_add_list_source', actionAddListSource);
        })
    </script>


@endsection
