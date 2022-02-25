@extends('administrator.layouts.master')

@section('title')
    <title>Home page</title>
@endsection

@section('name')
    <h4 class="page-title">Trading</h4>
@endsection
@section('css')
    <link href="{{asset('vendor/select2/select2.min.css') }}" rel="stylesheet"/>
    <link href="{{asset('admins/products/add/add.css') }}" rel="stylesheet"/>
@endsection

@include('administrator.tradings.active_slidebar')

@section('content')

    <form action="{{route('administrator.tradings.register.store')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="col-md-6">

            <div class="form-group">
                <label>Thêm mới học viên</label>
                <a href="{{route('users.create')}}" class="btn btn-success ml-2">Add</a>
            </div>

            <div class="form-group mt-3">
                <label>Chọn học viên</label>
                <select name="user_id" class="form-control select2_init @error('user_id') is-invalid @enderror">
                    <option value=""></option>
                    @foreach($users as $userItem)
                        <option value="{{$userItem->id}}">{{$userItem->name}} - {{$userItem->email}}</option>
                    @endforeach
                </select>
                @error('user_id')
                <div class="alert alert-danger">{{$message}}</div>
                @enderror
            </div>

            <div class="form-group mt-3">
                <label>Chọn trading</label>
                <select name="trading_id" class="form-control select2_init @error('trading_id') is-invalid @enderror">
                    <option value=""></option>
                    @foreach($tradings as $tradingItem)
                        <option value="{{$tradingItem->id}}">{{$tradingItem->name}}</option>
                    @endforeach
                </select>
                @error('trading_id')
                <div class="alert alert-danger">{{$message}}</div>
                @enderror
            </div>

            <div class="form-group mt-3">
                <label>Chọn trạng thái</label>
                <select name="status" class="form-control select2_init @error('status') is-invalid @enderror">
                    <option value="Chờ xác nhận">Chờ xác nhận</option>
                    <option value="Đã xác nhận">Đã xác nhận</option>
                </select>
                @error('status')
                <div class="alert alert-danger">{{$message}}</div>
                @enderror
            </div>

            <div class="form-group mt-3">
                <label>
                    <input type="checkbox" name="is_add_trading">
                    Thêm học viên vào trading
                </label>
            </div>

            <button type="submit" class="btn btn-primary mt-3">Submit</button>

        </div>
    </form>

@endsection

@section('js')
    <script src="{{asset('vendor/select2/select2.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/5.10.3/tinymce.min.js"
            integrity="sha512-ykwx/3dGct2v2AKqqaDCHLt1QFVzdcpad7P5LfgpqY8PJCRqAqOeD4Bj63TKnSQy4Yok/6QiCHiSV/kPdxB7AQ=="
            crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="{{asset('admins/products/add/add.js') }}"></script>

@endsection
