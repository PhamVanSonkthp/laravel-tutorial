@extends('user.layouts.master')

@section('title')
    <title>Home page</title>
@endsection

@section('css')

@endsection

@section('content')
    <div class="col-12">
        <div class="card">
            <div class="card-body">

                <h4 class="card-title">Profile</h4>

                <div class="row mb-3">
                    <label for="example-url-input" class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-10">
                        <input class="form-control" type="email" >
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="example-tel-input" class="col-sm-2 col-form-label">Telephone</label>
                    <div class="col-sm-10">
                        <input class="form-control" type="tel" >
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="example-tel-input" class="col-sm-2 col-form-label">Password</label>
                    <div class="col-sm-10">
                        <input class="form-control" type="password" >
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="example-tel-input" class="col-sm-2 col-form-label">Confirm password</label>
                    <div class="col-sm-10">
                        <input class="form-control" type="password" >
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection

@section('js')


@endsection
