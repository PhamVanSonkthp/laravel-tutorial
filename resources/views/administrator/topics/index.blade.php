@extends('administrator.layouts.master')

@section('title')
    <title>Home page</title>
@endsection

@section('name')
    <h4 class="page-title">Chủ đề</h4>
@endsection

@section('css')
    <link href="{{asset('admins/products/index/list.css')}}" rel="stylesheet"/>
@endsection

@section('content')
    <div class="col-12">

        <div class="card">
            <div class="card-body">

                <div class="col-md-12">
                    <a href="{{route('administrator.topics.create')}}" class="btn btn-success float-end m-2">Add</a>
                </div>
                <div class="clearfix"></div>

                <div class="table-responsive">
                    <table class="table table-editable table-nowrap align-middle table-edits">
                        <thead>
                        <tr>
                            <th>Tên chủ đề</th>
                            <th>Chủ đề thuộc khóa học</th>
                            <th>Tổng chương</th>
                            <th>Tổng bài học</th>
                            <th class="text-center" style="width: 100px;">Action</th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($topics as $index => $topicItem)
                            <tr>
                                <th scope="row">{{ $topicItem->name }}</th>
                                <th scope="row">{{ optional($topicItem->product)->name }}</th>
                                <th scope="row">{{ optional($topicItem->sourceChildren)->where('parent_id',0)->count() }}</th>
                                <th scope="row">{{ $counters[$index] }}</th>
                                <td>
                                    <a href="{{route('administrator.topics.edit' , ['id'=> $topicItem->id])}}"
                                       class="btn btn-outline-secondary btn-sm edit" title="Edit">
                                        <i class="fas fa-pencil-alt"></i>
                                    </a>

                                    <a href="{{route('administrator.topics.delete' , ['id'=> $topicItem->id])}}"
                                       data-url="{{route('administrator.topics.delete' , ['id'=> $topicItem->id])}}"
                                       class="btn btn-danger btn-sm delete action_delete" title="Delete">
                                        <i class="mdi mdi-close"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach

                        </tbody>
                    </table>
                </div>

            </div>
        </div>

    </div>

    <div class="col-md-12">
        {{ $topics->links('pagination::bootstrap-4') }}
    </div>

@endsection

@section('js')
    <script src="{{asset('vendor/sweet-alert-2/sweetalert2@11.js')}}"></script>
    <script src="{{asset('admins/products/index/list.js')}}"></script>
@endsection
