@extends('administrator.layouts.master')

@section('title')
    <title>Home page</title>
@endsection

@section('name')
    <h4 class="page-title">Học viên</h4>
@endsection

@section('css')
    <link href="{{asset('admins/products/index/list.css')}}" rel="stylesheet"/>
@endsection

@include('administrator.user.active_slidebar')

@section('content')
    <div class="col-12">

        <div class="card">
            <div class="card-body">

                <div class="row">
                    @include('administrator.components.input_search')

                    <div class="col-md-6 text-end">
                        <a href="{{route('users.create')}}" class="btn btn-success float-end m-2">Add</a>
                    </div>
                </div>

                <div class="table-responsive">
                    <table class="table table-editable table-nowrap align-middle table-edits">
                        <thead>
                        <tr>
                            <th>Tên</th>
                            <th>Email</th>
                            <th>Số điện thoại</th>
                            <th>Điểm</th>
                            <th>Cấp độ</th>
                            <th>Số lượng khóa học</th>
                            <th>Số lượng trading</th>
                            <th class="text-center" style="width: 100px;">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($users as $userItem)
                            <tr>
                                <td>{{$userItem->name}}</td>
                                <td>{{$userItem->email}}</td>
                                <td>{{$userItem->phone}}</td>
                                <td>{{ number_format($userItem->point)}}</td>
                                <td>{{number_format($userItem->getUserLevel($userItem->id))}}</td>
                                <td><a href="#">--{{number_format($userItem->getUserNumberProduct($userItem->id))}}
                                        --</a></td>
                                <td><a href="#">--{{number_format($userItem->getUserNumberTrading($userItem->id))}}
                                        --</a></td>
                                <td>
                                    <a href="{{route('administrator.users.gift.index' , ['id'=> $userItem->id])}}"
                                       class="btn btn-outline-secondary btn-sm edit" title="Gift">
                                        <i class="mdi mdi-gift-outline"></i>
                                    </a>
                                    <a href="{{route('administrator.users.sources.index' , ['id'=> $userItem->id])}}"
                                       class="btn btn-outline-secondary btn-sm edit" title="View">
                                        <i class="ion ion-md-eye"></i>
                                    </a>

                                    <a href="{{route('users.edit' , ['id'=> $userItem->id])}}"
                                       class="btn btn-outline-secondary btn-sm edit" title="Edit">
                                        <i class="fas fa-pencil-alt"></i>
                                    </a>

                                    <a href="{{route('users.delete' , ['id'=> $userItem->id])}}"
                                       data-url="{{route('users.delete' , ['id'=> $userItem->id])}}"
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
        {{ $users->links('pagination::bootstrap-4') }}
    </div>

@endsection

@section('js')
    <script src="{{asset('vendor/sweet-alert-2/sweetalert2@11.js')}}"></script>
    <script src="{{asset('admins/products/index/list.js')}}"></script>
@endsection
