@extends('layouts.admin')

@section('title')
    <title>Add products</title>
@endsection

@section('css')
    <link href="{{asset('admins/products/index/list.css')}}" rel="stylesheet" />
@endsection

@section('js')
    <script src="{{asset('vendor/sweet-alert-2/sweetalert2@11.js')}}"></script>
    <script src="{{asset('admins/products/index/list.js')}}"></script>
@endsection

@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
    @include('partials.content-header' , ['name'=> 'roles', 'key'=> 'List'])
    <!-- /.content-header -->

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <a href="{{ route('roles.create') }}" class="btn btn-success float-right m-2">Add</a>
                    </div>

                    <div class="col-md-12">
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Tên</th>
                                <th scope="col">Mô tả</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach($roles as $roleItem)
                                <tr>
                                    <th scope="row">{{ $roleItem->id }}</th>
                                    <td>{{$roleItem->name}}</td>
                                    <td>{{$roleItem->display_name}}</td>
                                    <td>
                                        <a href="{{route('roles.edit' , ['id'=> $roleItem->id])}}" class="btn btn-default">Edit</a>
                                        <a href="{{route('users.delete' , ['id'=> $roleItem->id])}}" data-url="{{route('users.delete' , ['id'=> $roleItem->id])}}" class="btn btn-danger action_delete">Delete</a>
                                    </td>
                                </tr>
                            @endforeach

                            </tbody>
                        </table>
                    </div>

                    <div class="col-md-12">
                        {{ $roles->links('pagination::bootstrap-4') }}
                    </div>

                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

@endsection
