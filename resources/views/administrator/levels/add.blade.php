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

    <form action="{{route('administrator.levels.store')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="col-md-6">

            <div class="form-group">
                <label>Nhập cấp độ</label>
                <input type="number" name="level" class="form-control @error('level') is-invalid @enderror" placeholder="Nhập cấp độ" value="{{old('level')}}">
                @error('level')
                <div class="alert alert-danger">{{$message}}</div>
                @enderror
            </div>

            <div class="form-group mt-3">
                <label>Số điểm cần để đạt cấp độ</label>
                <input type="number" name="point_require" class="form-control @error('point_require') is-invalid @enderror" placeholder="Nhập điểm" value="{{old('point_require')}}">
                @error('point_require')
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
