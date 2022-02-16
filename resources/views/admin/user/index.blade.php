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
    @include('partials.content-header' , ['name'=> 'users', 'key'=> 'List'])
    <!-- /.content-header -->

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <a href="{{ route('users.create') }}" class="btn btn-success float-right m-2">Add</a>
                    </div>

                    <div class="col-md-12">
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Tên</th>
                                <th scope="col">Email</th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach($users as $userItem)
                                <tr>
                                    <th scope="row">{{ $userItem->id }}</th>
                                    <td>{{$userItem->name}}</td>
                                    <td>{{$userItem->email}}</td>
                                    <td>
                                        <a href="{{route('users.edit' , ['id'=> $userItem->id])}}" class="btn btn-default">Edit</a>
                                        <a href="{{route('users.delete' , ['id'=> $userItem->id])}}" data-url="{{route('users.delete' , ['id'=> $userItem->id])}}" class="btn btn-danger action_delete">Delete</a>
                                    </td>
                                </tr>
                            @endforeach

                            </tbody>
                        </table>
                    </div>

                    <div class="col-md-12">
                        {{ $users->links('pagination::bootstrap-4') }}
                    </div>

                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

@endsection
