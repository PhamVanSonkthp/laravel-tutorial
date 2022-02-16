@extends('layouts.admin')

@section('title')
    <title>Add product</title>
@endsection

@section('css')
        <link href="{{asset('vendor/select2/select2.min.css') }}" rel="stylesheet"/>
        <link href="{{asset('admins/user/add/add.css') }}" rel="stylesheet"/>
@endsection

@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        @include('partials.content-header' , ['name'=> 'users', 'key'=> 'Add'])

        <form action="{{route('users.store')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-6">

                            <div class="form-group">
                                <label>Tên</label>
                                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" placeholder="Nhập tên" value="{{old('name')}}">
                                @error('name')
                                <div class="alert alert-danger">{{$message}}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>Email</label>
                                <input type="text" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="Nhập email" value="{{old('email')}}">
                                @error('email')
                                <div class="alert alert-danger">{{$message}}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>Password</label>
                                <input type="text" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="Nhập mật khẩu">
                                @error('password')
                                <div class="alert alert-danger">{{$message}}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>Chọn vai trò</label>
                                <select name="role_id[]" class="form-control select2_init" multiple>
                                    <option value=""></option>
                                    @foreach($roles as $roleItem)
                                        <option value="{{$roleItem->id}}">{{$roleItem->name}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>

                    </div>
                </div>
            </div>
        </form>
    </div>


@endsection

@section('js')
    <script src="{{asset('vendor/select2/select2.min.js') }}"></script>
    <script src="{{asset('admins/user/add/add.js') }}"></script>

@endsection
