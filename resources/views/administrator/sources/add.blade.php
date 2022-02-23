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

@section('content')

    <form action="{{route('administrator.sources.store')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="col-md-6">

            <div class="form-group">
                <label>Nhập tên bài học</label>
                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" placeholder="Nhập tên" value="{{old('name')}}">
                @error('name')
                <div class="alert alert-danger">{{$message}}</div>
                @enderror
            </div>

            <div class="form-group mt-3">
                <label>Bài học thuộc chủ đề</label>
                <select name="topic_id" class="form-control select2_init @error('topic_id') is-invalid @enderror">
                    <option value=""></option>
                    @foreach($topics as $topicItem)
                        <option value="{{$topicItem->id}}">{{$topicItem->name}}</option>
                    @endforeach
                </select>
                @error('topic_id')
                <div class="alert alert-danger">{{$message}}</div>
                @enderror
            </div>
        </div>


        <div class="col-md-12 mt-3">
            <label>Nhập các bài học</label>
            <div class="container_sources">

                <div class="row">
                    <div class="col-md-4 mt-1">
                        <div class="form-group">
                            <label>Tên bài học</label>
                        </div>
                    </div>

                    <div class="col-md-4 mt-1">
                        <div class="form-group">
                            <div class="form-group">
                                <label>Link video</label>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3 mt-1">
                        <div class="form-group">
                            <div class="form-group">
                                <label>Link tài liệu</label>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-4 mt-1">
                        <div class="form-group">
                            <input name="sources_name[]" type="text"
                                   class="name form-control @error('sources_name') is-invalid @enderror"
                                   placeholder="Tên bài học">
                            @error('sources_name')
                            <div class="alert alert-danger">{{$message}}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-4 mt-1">
                        <div class="form-group">
                            <input name="sources_link[]" type="text"
                                   class="link form-control @error('sources_link') is-invalid @enderror"
                                   placeholder="Link video">
                            @error('sources_link')
                            <div class="alert alert-danger">{{$message}}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-3 mt-1">
                        <div class="form-group">
                            <input name="sources_doc[]" type="text"
                                   class="link form-control @error('sources_doc') is-invalid @enderror"
                                   placeholder="Link tài liệu">
                            @error('sources_doc')
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
                </div>
            </div>

        </div>

        <div class="col-md-12">
            <button type="button"
                    class="btn btn-success waves-effect waves-light action_add_source mt-1">
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
    <script src="{{asset('admins/products/add/add.js') }}"></script>

    <script>

        function actionAddSource(event) {
            event.preventDefault()
            $(this).parent().parent().children('div').children('.container_sources').append(`<div class="row">
                    <div class="col-md-4 mt-1">
                        <div class="form-group">
                            <input name="sources_name[]" type="text"
                                   class="name form-control @error('sources_name') is-invalid @enderror"
                                   placeholder="Tên bài học">
                            @error('sources_name')
            <div class="alert alert-danger">{{$message}}</div>
                            @enderror
            </div>
        </div>

        <div class="col-md-4 mt-1">
            <div class="form-group">
                <input name="sources_link[]" type="text"
                       class="link form-control @error('sources_link') is-invalid @enderror"
                                   placeholder="Link video">
                            @error('sources_link')
            <div class="alert alert-danger">{{$message}}</div>
                            @enderror
            </div>
        </div>

        <div class="col-md-3 mt-1">
            <div class="form-group">
                <input name="sources_doc[]" type="text"
                       class="link form-control @error('sources_doc') is-invalid @enderror"
                                   placeholder="Link tài liệu">
                            @error('sources_doc')
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
    </div>`)
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
