@extends('administrator.layouts.master')

@section('title')
    <title>Home page</title>
@endsection

@section('name')
    <h4 class="page-title">Trading</h4>
@endsection

@section('css')
    <link href="{{asset('admins/products/index/list.css')}}" rel="stylesheet"/>
@endsection

@include('administrator.tradings.post.active_slidebar')

@section('content')
    <div class="col-12">

        <div class="card">
            <div class="card-body">

                <div class="col-md-12">
                    <a href="{{route('administrator.tradings.post.create')}}" class="btn btn-success float-end m-2">Add</a>
                </div>
                <div class="clearfix"></div>

                <div class="table-responsive">
                    <table class="table table-editable table-nowrap align-middle table-edits">
                        <thead>
                        <tr>
                            <th>Tiêu đề</th>
                            <th>Ảnh</th>
                            <th>Nội dung</th>
                            <th class="text-center" style="width: 100px;">Action</th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($postTradings as $postTradingItem)
                            <tr>
                                <td style="width: 100px;">{{$postTradingItem->title}}</td>
                                <td><img class="product_image_150_100" src="{{$postTradingItem->image_path}}"></td>
                                <td class="ellipsis">{!! $postTradingItem->content !!}</td>
                                <td>

                                    <a href="{{route('administrator.tradings.post.edit' , ['id'=> $postTradingItem->id])}}"
                                       class="btn btn-outline-secondary btn-sm edit" title="Edit">
                                        <i class="fas fa-pencil-alt"></i>
                                    </a>

                                    <a href="{{route('administrator.post.delete' , ['id'=> $postTradingItem->id])}}"
                                       data-url="{{route('administrator.tradings.post.delete' , ['id'=> $postTradingItem->id])}}"
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
        {{ $postTradings->links('pagination::bootstrap-4') }}
    </div>

@endsection

@section('js')
    <script src="{{asset('vendor/sweet-alert-2/sweetalert2@11.js')}}"></script>
    <script src="{{asset('admins/products/index/list.js')}}"></script>
@endsection
