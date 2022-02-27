@extends('administrator.layouts.master')

@section('title')
    <title>Home page</title>
@endsection

@section('name')
    <h4 class="page-title">Bài học</h4>
@endsection
@section('css')
    <link href="{{asset('vendor/select2/select2.min.css') }}" rel="stylesheet"/>
    <link href="{{asset('admins/products/add/add.css') }}" rel="stylesheet"/>
@endsection

@include('administrator.sources.active_slidebar')

@section('content')

    <form action="{{route('administrator.sources.update' , ['id' =>$source->id])}}" method="post" enctype="multipart/form-data">
        @method('PUT')
        @csrf
        <div class="col-md-6">

            <div class="form-group mt-3">
                <label>Nhập tên bài học</label>
                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                       placeholder="Nhập tên" value="{{$source->name}}">
                @error('name')
                <div class="alert alert-danger">{{$message}}</div>
                @enderror
            </div>

            <div class="form-group mt-3">
                <label>Bài học thuộc chủ đề</label>
                <select name="topic_id" class="form-control select2_init @error('topic_id') is-invalid @enderror">
                    <option value=""></option>
                    @foreach($topics as $topicItem)
                        <option
                            value="{{$topicItem->id}}" {{$source->topic_id == $topicItem->id ? 'selected' : ''}}>{{$topicItem->name}}</option>
                    @endforeach
                </select>
                @error('topic_id')
                <div class="alert alert-danger">{{$message}}</div>
                @enderror
            </div>
        </div>


        <div class="col-md-12 mt-3">
            <label>Nhập các bài học</label>
            <div class="container_sources mt-3">
                <div class="row">
                    <div class="col-md-6 mt-1">
                        <div class="form-group">
                            <label>Tên bài học</label>
                        </div>
                    </div>

                    <div class="col-md-6 mt-1">
                        <div class="form-group">
                            <div class="form-group">
                                <label>Link video</label>
                            </div>
                        </div>
                    </div>
                </div>

                @foreach($source->sourceChildren as $sourceItem)
                    <div class="row">
                        <div class="col-md-6 mt-1">
                            <div class="form-group">
                                <input name="sources_name[]" type="text"
                                       class="name form-control @error('sources_name') is-invalid @enderror"
                                       placeholder="Tên bài học" value="{{$sourceItem->name}}">
                                @error('sources_name')
                                <div class="alert alert-danger">{{$message}}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-5 mt-1">
                            <div class="form-group">
                                <input name="sources_link[]" type="text"
                                       class="link form-control @error('sources_link') is-invalid @enderror"
                                       placeholder="Link video" value="{{$sourceItem->link}}">
                                @error('sources_link')
                                <div class="alert alert-danger">{{$message}}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-1 mt-1">
                            <button type="button"
                                    class="btn btn-danger waves-effect waves-light action_delete_source">
                                x
                            </button>
                        </div>

                        <div class="form-group col-md-12 mt-1">
                        <textarea style="min-height: 100px;" name="sources_doc[]" placeholder="Nhập tài liệu"
                                  class="form-control tinymce_editor_init @error('sources_doc') is-invalid @enderror"
                                  rows="5">{{$sourceItem->doc}}</textarea>
                            @error('sources_doc')
                            <div class="alert alert-danger">{{$message}}</div>
                            @enderror
                        </div>

                    </div>
                @endforeach
            </div>

        </div>

        <div class="col-md-12">
            <button type="button"
                    class="btn btn-success waves-effect waves-light action_add_source float-end mt-1">
                (+)
            </button>
        </div>

        <div class="col-md-12">
            <button type="submit" class="btn btn-primary mt-3">Submit</button>
        </div>

    </form>

@endsection


@section('js')
    <script src="{{asset('vendor/select2/select2.min.js') }}"></script>
    <script src="{{asset('vendor/tinymce/tinymce.min.js') }}"></script>
    <script src="{{asset('admins/products/add/add.js') }}"></script>

    <script>

        function actionAddSource(event) {
            event.preventDefault()
            $(this).parent().parent().children('div').children('.container_sources').append(`<div class="row">
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

        <div class="col-md-5 mt-1">
            <div class="form-group">
                <input name="sources_link[]" type="text"
                       class="link form-control @error('sources_link') is-invalid @enderror"
                                   placeholder="Link video">
                            @error('sources_link')
            <div class="alert alert-danger">{{$message}}</div>
                            @enderror
            </div>
        </div>

        <div class="col-md-1 mt-1">
            <button type="button"
                    class="btn btn-danger waves-effect waves-light action_delete_source">
                x
            </button>
        </div>

        <div class="form-group col-md-12 mt-1">
                        <textarea style="min-height: 100px;" name="sources_doc[]" placeholder="Nhập tài liệu"
                                  class="form-control tinymce_editor_init @error('sources_doc') is-invalid @enderror"
                                  rows="5">{{old('sources_doc')}}</textarea>
                        @error('sources_doc')
            <div class="alert alert-danger">{{$message}}</div>
                        @enderror
            </div>

</div>`)

            //tinyMCE.remove();
            reinstallTinymce();
        }

        function actionDeleteSource(event) {
            event.preventDefault()
            $(this).parent().parent().remove()
        }

        $(function () {
            $(document).on('click', '.action_add_source', actionAddSource);
            $(document).on('click', '.action_delete_source', actionDeleteSource);
        })
    </script>
@endsection
