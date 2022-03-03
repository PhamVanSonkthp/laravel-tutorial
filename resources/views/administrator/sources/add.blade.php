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
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.12/datatables.min.css"/>
@endsection

@include('administrator.sources.active_slidebar')

@section('content')

    <form action="{{route('administrator.sources.store')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="col-md-6">

            <div class="form-group">
                <label>Nhập tên bài học</label>
                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                       placeholder="Nhập tên" value="{{old('name')}}">
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
            <div class="container_sources mt-3">

                <table id="table" class="table table-bordered">
                    <thead>
                    <tr>
                        <th width="30px">STT</th>
                        <th>Nội dung</th>
                    </tr>
                    </thead>
                    <tbody id="tablecontents">
                    <tr data-id="1">
                        <td style="cursor: move;">
                            Bài 1
                        </td>
                        <td>
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

                            </div>
                        </td>
                    </tr>

                    </tbody>
                </table>


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
    <script src="{{asset('vendor/tinymce/tinymce.min.js') }}"></script>
    <script src="{{asset('admins/products/add/add.js') }}"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.12/datatables.min.js"></script>

    <script type="text/javascript">
        $(function () {
            $("#table").DataTable({searching: false, paging: false, info: false, sort: false});

            $("#tablecontents").sortable({
                items: "tr",
                cursor: 'move',
                opacity: 0.6,
            });
        });
    </script>

    <script>

        let indexRow = 1

        function actionAddSource(event) {
            event.preventDefault()
            $("#tablecontents").append(`<tr data-id="${indexRow++}">
                        <td style="cursor: move;">
                            Bài ${indexRow}
                        </td>
                        <td>
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

        </div>
    </td>
</tr>`)

            //tinyMCE.remove();
            reinstallTinymce();
        }

        function actionDeleteSource(event) {
            event.preventDefault()
            $(this).parent().parent().parent().parent().remove()
            indexRow--
        }

        $(function () {
            $(document).on('click', '.action_add_source', actionAddSource);
            $(document).on('click', '.action_delete_source', actionDeleteSource);
        })

    </script>
@endsection
