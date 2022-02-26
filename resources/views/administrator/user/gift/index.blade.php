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

{{--                <div class="col-md-12">--}}
{{--                    <a href="{{route('users.create')}}" class="btn btn-success float-end m-2">Add</a>--}}
{{--                </div>--}}
{{--                <div class="clearfix"></div>--}}

                <div class="table-responsive">
                    <table class="table table-editable table-nowrap align-middle table-edits">
                        <thead>
                        <tr>
                            <th>Tên</th>
                            <th>Email</th>
                            <th>Số điện thoại</th>
                            <th>Cấp độ nhận</th>
                            <th>Món quà</th>
                            <th>Trạng thái</th>
                            <th>Ngày</th>
                            <th class="text-center" style="width: 50px;">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($userGifts as $userGiftItem)
                            <tr>
                                <td>{{ optional($userGiftItem->user)->name }}</td>
                                <td>{{ optional($userGiftItem->user)->email }}</td>
                                <td>{{ optional($userGiftItem->user)->phone }}</td>
                                <td>{{ optional($userGiftItem->level)->level }}</td>
                                <td>{{ $userGiftItem->content }}</td>
                                <td>{{ $userGiftItem->status ? 'Đã nhận' : 'Chưa nhận' }}</td>
                                <td>{{ $userGiftItem->created_at }}</td>
                                <td>
                                    <a href="{{route('administrator.users.gift.update' , ['id'=> $userGiftItem->id])}}"
                                       class="btn btn-outline-success btn-sm edit" title="Đã nhận">
                                        <i class="ion ion-md-checkmark"></i>
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
        {{ $userGifts->links('pagination::bootstrap-4') }}
    </div>

@endsection

@section('js')
    <script src="{{asset('vendor/sweet-alert-2/sweetalert2@11.js')}}"></script>
    <script src="{{asset('admins/products/index/list.js')}}"></script>
@endsection
