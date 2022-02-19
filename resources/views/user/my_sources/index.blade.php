@extends('user.layouts.master')

@section('title')
    <title>Home page</title>
@endsection

@section('name')
    <h4 class="page-title">Khóa học</h4>
@endsection

@section('css')
    <link href="{{asset('admins/products/index/list.css')}}" rel="stylesheet"/>
@endsection

@section('content')
    <div class="col-12">

        <div class="card">
            <div class="card-body">

                <div class="table-responsive">
                    <table class="table table-editable table-nowrap align-middle table-edits">
                        <thead>
                        <tr>
                            <th scope="col">Tên khóa học</th>
                            <th scope="col">Hình ảnh</th>
                            <th scope="col">Trạng thái</th>
                            <th scope="col">Ngày kích hoạt</th>
                            <th class="text-center" style="width: 50px;">Action</th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($products as $productItem)
                            <tr>
                                <td>{{$productItem->name}}</td>
                                <td><img class="product_image_150_100" src="{{$productItem->feature_image_path}}"></td>
                                <td>{{ ( $productItem->time_payment_again == 0 || (new DateTime($productItem->updated_at))->diff(new DateTime())->m  == 0 )? 'Hoạt động' : 'Hết hạn' }}</td>
                                <td>{{$productItem->created_at}}</td>
                                <td>
                                    <a href="{{route('products.edit' , ['id'=> $productItem->id])}}"
                                       class="btn btn-outline-secondary btn-sm edit" title="Learning">
                                        <i class="fas fa-pencil-alt"></i>
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
