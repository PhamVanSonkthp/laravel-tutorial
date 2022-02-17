@extends('administrator.layouts.master')

@section('title')
    <title>Home page</title>
@endsection

@section('css')

@endsection

@section('content')
    <div class="col-12">

        <div class="card">
            <div class="card-body">

                <div class="col-md-12">
                    <a href="" class="btn btn-success float-end m-2">Add</a>
                </div>
                <div class="clearfix"></div>

                <div class="table-responsive">
                    <table class="table table-editable table-nowrap align-middle table-edits">
                        <thead>
                        <tr style="cursor: pointer;">
                            <th>ID</th>
                            <th>Name</th>
                            <th>Age</th>
                            <th>Gender</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr data-id="2" style="cursor: pointer;">
                            <td data-field="id">2</td>
                            <td data-field="name">Frank Kirk</td>
                            <td data-field="age">22</td>
                            <td data-field="gender">Male</td>
                            <td>
                                <a class="btn btn-outline-secondary btn-sm edit" title="Edit">
                                    <i class="fas fa-pencil-alt"></i>
                                </a>
                                <a class="btn btn-danger btn-sm delete" title="Delete">
                                    <i class="mdi mdi-close"></i>
                                </a>
                            </td>
                        </tr>
                        
                        </tbody>
                    </table>
                </div>

            </div>
        </div>

        {{--                        @foreach($roles as $roleItem)--}}
        {{--                            <tr>--}}
        {{--                                <th scope="row">{{ $roleItem->id }}</th>--}}
        {{--                                <td>{{$roleItem->name}}</td>--}}
        {{--                                <td>{{$roleItem->display_name}}</td>--}}
        {{--                                <td>--}}
        {{--                                    <a href="{{route('roles.edit' , ['id'=> $roleItem->id])}}" class="btn btn-default">Edit</a>--}}
        {{--                                    <a href="{{route('users.delete' , ['id'=> $roleItem->id])}}" data-url="{{route('users.delete' , ['id'=> $roleItem->id])}}" class="btn btn-danger action_delete">Delete</a>--}}
        {{--                                </td>--}}
        {{--                            </tr>--}}
        {{--                        @endforeach--}}

    </div>

    <div class="col-md-12">
        {{--                    {{ $roles->links('pagination::bootstrap-4') }}--}}
    </div>

@endsection

@section('js')


@endsection
