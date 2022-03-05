@extends('user.layouts.master')

@php
    $title = "Khóa học của tôi";
@endphp

@section('title')
    <title>{{$title}}</title>
@endsection

@section('name')
    <h4 class="page-title">{{$title}}</h4>
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
                            <th scope="col">Tiến độ</th>
                            <th scope="col">Ngày học</th>
                            <th scope="col">Ngày gia hạn</th>
                            <th class="text-center" style="width: 50px;">Action</th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($products as $index=> $productItem)
                            <tr>
                                <td>{{$productItem->name}}</td>
                                <td><img class="product_image_150_100" src="{{$productItem->feature_image_path}}"></td>
                                <td>{{ \App\Models\Invoice::isExpired($productItem->idInvoice) ? new \Illuminate\Support\HtmlString('<a href="'. route('user.paymentProduct' , ['id' => $productItem->idProduct]) .'">Hết hạn! Gia hạn ngay!</a>') : 'Hoạt động' }}</td>
                                <td> {{$counterProcessesd[$index]}} / {{ $processes[$index] }}</td>
                                <td>{{$productItem->created_at}}</td>
                                <td>{{ $productItem->time_payment_again == 0 ? 'Vĩnh viễn' : (new DateTime($productItem->updated_at))->modify('+'. $productItem->time_payment_again .' month')->format('Y-m-d h:m:s')  }}</td>
                                <td>
                                    <a href="{{route('user.learningSource' , ['idInvoice' => $productItem->idInvoice, 'idProduct' => $productItem->idProduct])}}"
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
