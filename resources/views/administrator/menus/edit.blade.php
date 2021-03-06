@extends('administrator.layouts.master')

@section('title')
    <title>Home page</title>
@endsection

@section('name')
    <h4 class="page-title">Menu</h4>
@endsection
@section('css')
    <link href="{{asset('vendor/select2/select2.min.css') }}" rel="stylesheet"/>
    <link href="{{asset('admins/products/add/add.css') }}" rel="stylesheet"/>
@endsection

@include('administrator.menus.active_slidebar')

@section('content')

    <form action="{{route('administrator.menus.update', ['id'=> $menuFollowIdEdit->id])}}" method="post" enctype="multipart/form-data">
        @method('PUT')
        @csrf
        <div class="col-md-6">

            <div class="form-group">
                <label>Tên menu</label>
                <input type="text" name="name" class="form-control" placeholder="Nhập tên danh mục" value="{{$menuFollowIdEdit->name}}">
            </div>

            <div class="form-group">
                <label>Chọn menu cha</label>
                <select class="form-control select2_init" name="parent_id">
                    <option value="0">Chọn danh mục cha</option>
                    {!! $optionSelect !!}
                </select>
            </div>

            <button type="submit" class="btn btn-primary mt-3">Submit</button>
        </div>
    </form>

@endsection


@section('js')
    <script src="{{asset('vendor/select2/select2.min.js') }}"></script>
    <script src="{{asset('admins/products/add/add.js') }}"></script>
@endsection
