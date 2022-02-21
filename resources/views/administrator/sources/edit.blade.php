@extends('administrator.layouts.master')

@section('title')
    <title>Home page</title>
@endsection

@section('name')
    <h4 class="page-title">Người dùng</h4>
@endsection
@section('css')
    <link href="{{asset('vendor/select2/select2.min.css') }}" rel="stylesheet"/>
    <link href="{{asset('admins/products/add/add.css') }}" rel="stylesheet"/>
@endsection

@section('content')

    <form action="{{route('administrator.gifts.update', ['id'=> $gift->id]) }}" method="post" enctype="multipart/form-data">
        @method('PUT')
        @csrf
        <div class="col-md-6">

            <div class="form-group">
                <label>Nhập tên rương quà</label>
                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" placeholder="Nhập tên" value="{{$gift->name}}">
                @error('name')
                <div class="alert alert-danger">{{$message}}</div>
                @enderror
            </div>

            <div class="form-group mt-3">
                <label>Nhập nội dung rương quà</label>
                <input type="text" name="contents" class="form-control @error('contents') is-invalid @enderror" placeholder="Nhập nội dung" value="{{$gift->content}}">
                @error('contents')
                <div class="alert alert-danger">{{$message}}</div>
                @enderror
            </div>

            <div class="form-group">
                <label>Chọn cấp độ để đạt được rương quà</label>
                <select class="form-control select2_init @error('level_id') is-invalid @enderror" name="level_id">
                    <option value=""></option>
                    @foreach($levels as $levelItem)
                        <option value="{{$levelItem->id}}" {{ $gift->level_id == $levelItem->id ? 'selected' : '' }}>{{$levelItem->level}}</option>
                    @endforeach
                </select>
                @error('level_id')
                <div class="alert alert-danger">{{$message}}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary mt-3">Submit</button>

        </div>
    </form>

@endsection

@section('js')
    <script src="{{asset('vendor/select2/select2.min.js') }}"></script>
    <script src="{{asset('admins/products/add/add.js') }}"></script>
@endsection
