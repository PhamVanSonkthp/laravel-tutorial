@extends('administrator.layouts.master')

@section('title')
    <title>Home page</title>
@endsection

@section('name')
    <h4 class="page-title">Phân quyền</h4>
@endsection
@section('css')
    <link href="{{asset('vendor/select2/select2.min.css') }}" rel="stylesheet"/>
    <link href="{{asset('admins/products/add/add.css') }}" rel="stylesheet"/>
@endsection

@section('content')

    <form action="{{route('administrator.permissions.store')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label>Chọn phân module</label>
            <select class="form-control select2_init" name="module_parent">
                <option value="">Chọn tên module</option>
                @foreach(config('permissions.table_module') as $module_item)
                    <option value="{{$module_item}}">{{$module_item}}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group mt-3">
            <div class="row">
                @foreach(config('permissions.module_children') as $module_item_children)
                    <div class="col-md-3">
                        <label>
                            <input name="module_children[]" type="checkbox" value="{{$module_item_children}}">
                            {{$module_item_children}}
                        </label>
                    </div>
                @endforeach
            </div>
        </div>

        <button type="submit" class="btn btn-primary mt-3">Submit</button>
    </form>

@endsection


@section('js')
    <script src="{{asset('vendor/select2/select2.min.js') }}"></script>
    <script src="{{asset('admins/products/add/add.js') }}"></script>
@endsection
