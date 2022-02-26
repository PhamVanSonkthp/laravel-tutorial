@extends('administrator.layouts.master')

@section('title')
    <title>Home page</title>
@endsection

@section('name')
    <h4 class="page-title">Khóa học</h4>
@endsection

@section('css')
    <link href="{{asset('admins/products/index/list.css')}}" rel="stylesheet"/>
@endsection

@include('administrator.products.active_slidebar')

@section('content')
    <div class="col-12">

        <div class="card">
            <div class="card-body">

                <div class="col-md-12">
                    <a href="{{route('administrator.products.create')}}" class="btn btn-success float-end m-2">Add</a>
                </div>
                <div class="clearfix"></div>

                <div class="table-responsive">
                    <table class="table table-editable table-nowrap align-middle table-edits">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Tên khóa học</th>
                            <th scope="col">Giá</th>
                            <th scope="col">Hình ảnh</th>
                            <th scope="col">Danh mục</th>
                            <th scope="col">Chủ đề</th>
                            <th scope="col">Tổng chương</th>
                            <th scope="col">Tổng bài học</th>
                            <th class="text-center" style="width: 100px;">Action</th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($products as $index=> $productItem)
                            <tr>
                                <th scope="row">{{ $productItem->id }}</th>
                                <td>{{$productItem->name}}</td>
                                <td>${{ number_format($productItem->price) }}</td>
                                <td><img class="product_image_150_100" src="{{$productItem->feature_image_path}}"></td>
                                <td>{{ optional($productItem->category)->name }}</td>
                                <td>{{ optional($productItem->topic)->name }}</td>
                                <td>{{ optional(optional(optional($productItem->topic)->sourceChildren)->where('parent_id',0))->count() }}</td>
                                <td>{{ $counters[$index] }}</td>

                                <td>
                                    <a href="{{route('administrator.products.edit' , ['id'=> $productItem->id])}}"
                                       class="btn btn-outline-secondary btn-sm edit" title="Edit">
                                        <i class="fas fa-pencil-alt"></i>
                                    </a>

                                    <a href="{{route('administrator.products.delete' , ['id'=> $productItem->id])}}"
                                       data-url="{{route('administrator.products.delete' , ['id'=> $productItem->id])}}"
                                       class="btn btn-danger btn-sm delete action_delete" title="Delete">
                                        <i class="mdi mdi-close"></i>
                                    </a>
                                </td>

                            </tr>
                        @endforeach

                        </tbody>
                    </table>
                </div>

            </div>
        </div>

    </div>

    <div class="col-md-12">
        {{ $products->links('pagination::bootstrap-4') }}
    </div>

@endsection

@section('js')
    <script src="{{asset('vendor/sweet-alert-2/sweetalert2@11.js')}}"></script>
    <script src="{{asset('admins/products/index/list.js')}}"></script>
@endsection
