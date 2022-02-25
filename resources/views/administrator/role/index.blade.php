@extends('administrator.layouts.master')

@section('title')
    <title>Home page</title>
@endsection

@section('name')
    <h4 class="page-title">Vai trò</h4>
@endsection

@section('css')
    <link href="{{asset('admins/products/index/list.css')}}" rel="stylesheet"/>
@endsection

@include('administrator.role.active_slidebar')

@section('content')
    <div class="col-12">

        <div class="card">
            <div class="card-body">

                <div class="col-md-12">
                    <a href="{{route('administrator.roles.create')}}" class="btn btn-success float-end m-2">Add</a>
                </div>
                <div class="clearfix"></div>

                <div class="table-responsive">
                    <table class="table table-editable table-nowrap align-middle table-edits">
                        <thead>
                        <tr style="cursor: pointer;">
                            <th>#</th>
                            <th>Tên</th>
                            <th>Mô tả</th>
                            <th class="text-center" style="width: 100px;">Action</th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($roles as $roleItem)
                            <tr>
                                <th scope="row">{{ $roleItem->id }}</th>
                                <td>{{$roleItem->name}}</td>
                                <td>{{$roleItem->display_name}}</td>
                                <td>
                                    <a href="{{route('administrator.roles.edit' , ['id'=> $roleItem->id])}}"
                                       class="btn btn-outline-secondary btn-sm edit" title="Edit">
                                        <i class="fas fa-pencil-alt"></i>
                                    </a>

                                    <a href="{{route('administrator.roles.delete' , ['id'=> $roleItem->id])}}"
                                       data-url="{{route('administrator.roles.delete' , ['id'=> $roleItem->id])}}"
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
        {{ $roles->links('pagination::bootstrap-4') }}
    </div>

@endsection

@section('js')
    <script src="{{asset('vendor/sweet-alert-2/sweetalert2@11.js')}}"></script>
    <script src="{{asset('admins/products/index/list.js')}}"></script>
@endsection
