@extends('administrator.layouts.master')

@section('title')
    <title>Home page</title>
@endsection

@section('name')
    <h4 class="page-title">Chủ đề</h4>
@endsection
@section('css')
    <link href="{{asset('vendor/select2/select2.min.css') }}" rel="stylesheet"/>
    <link href="{{asset('admins/products/add/add.css') }}" rel="stylesheet"/>
@endsection

@include('administrator.topics.active_slidebar')

@section('content')

    <form action="{{route('administrator.topics.update', ['id'=> $topic->id]) }}" method="post" enctype="multipart/form-data">
        @method('PUT')
        @csrf
        <div class="col-md-6">

            <div class="form-group">
                <label>Nhập tên chủ đề</label>
                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" placeholder="Nhập tên" value="{{$topic->name}}">
                @error('name')
                <div class="alert alert-danger">{{$message}}</div>
                @enderror
            </div>

            <div class="form-group mt-3">
                <label>Chủ đề thuộc khóa học</label>
                <select name="product_id" class="form-control select2_init @error('product_id') is-invalid @enderror">
                    <option value=""></option>
                    @foreach($products as $productsItem)
                        <option value="{{$productsItem->id}}" {{$productsItem->id == $topic->product_id ? 'selected' : ''}}>{{$productsItem->name}}</option>
                    @endforeach
                </select>
                @error('product_id')
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
