@extends('layouts.admin')

@section('title')
    <title>Trang chu</title>
@endsection

@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
    @include('partials.content-header' , ['name'=> 'permission', 'key'=> 'Add'])
    <!-- /.content-header -->

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6">
                        <form action="{{route('permissions.store')}}" method="post">
                            @csrf

                            <div class="form-group">
                                <label>Chọn phân module</label>
                                <select class="form-control" name="module_parent">
                                    <option value="">Chọn tên module</option>
                                    @foreach(config('permissions.table_module') as $module_item)
                                        <option value="{{$module_item}}">{{$module_item}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
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

                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>

                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

@endsection
