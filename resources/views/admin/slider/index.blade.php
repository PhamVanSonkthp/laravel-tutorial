@extends('layouts.admin')

@section('title')
    <title>Add products</title>
@endsection

@section('css')
    <link href="{{asset('admins/products/index/list.css')}}" rel="stylesheet" />
@endsection

@section('js')
    <script src="{{asset('vendor/sweet-alert-2/sweetalert2@11.js')}}"></script>
    <script src="{{asset('admins/products/index/list.js')}}"></script>
@endsection

@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
    @include('partials.content-header' , ['name'=> 'sliders', 'key'=> 'List'])
    <!-- /.content-header -->

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <a href="{{ route('slider.create') }}" class="btn btn-success float-right m-2">Add</a>
                    </div>

                    <div class="col-md-12">
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Tên slider</th>
                                <th scope="col">Decription</th>
                                <th scope="col">Hình ảnh</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach($sliders as $slidersItem)
                                <tr>
                                    <th scope="row">{{ $slidersItem->id }}</th>
                                    <td>{{$slidersItem->name}}</td>
                                    <td>{{ ($slidersItem->decription) }}</td>
                                    <td> <img class="product_image_150_100" src="{{$slidersItem->image_path}}"> </td>
                                    <td>
                                        <a href="{{route('slider.edit' , ['id'=> $slidersItem->id])}}" class="btn btn-default">Edit</a>
                                        <a href="{{route('slider.delete' , ['id'=> $slidersItem->id])}}" data-url="{{route('slider.delete' , ['id'=> $slidersItem->id])}}" class="btn btn-danger action_delete">Delete</a>
                                    </td>
                                </tr>
                            @endforeach

                            </tbody>
                        </table>
                    </div>

                    <div class="col-md-12">
                        {{ $sliders->links('pagination::bootstrap-4') }}
                    </div>

                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

@endsection
