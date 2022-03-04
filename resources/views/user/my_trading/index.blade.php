@extends('user.layouts.master')

@php
    $title = "Trading của tôi";
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
                            <th scope="col">Ngày học</th>
                            <th scope="col">Ngày gia hạn</th>
                            <th scope="col">Link học</th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($tradings as $tradingItem)
                            <tr>
                                <td>{{$tradingItem->name}}</td>
                                <td><img class="product_image_150_100" src="{{$tradingItem->feature_image_path}}"></td>
                                <td>{{ \App\Models\InvoiceTrading::isExpired($tradingItem->id) ? 'Hoạt động' : new \Illuminate\Support\HtmlString('<a href="#">Hết hạn! Gia hạn ngay!</a>') }}</td>
                                <td>{{$tradingItem->created_at}}</td>
                                <td>{{ $tradingItem->time_payment_again == 0 ? 'Vĩnh viễn' : (new DateTime($tradingItem->updated_at))->modify('+'. $tradingItem->time_payment_again .' month')->format('Y-m-d h:m:s')  }}</td>

                                @if( \App\Models\InvoiceTrading::isExpired($tradingItem->id) )
                                    <td><a href="{{$tradingItem->link}}">{{$tradingItem->link}}</a></td>
                                @endif
                            </tr>
                        @endforeach

                        </tbody>
                    </table>
                </div>

            </div>
        </div>

    </div>

    <div class="col-md-12">
        {{ $tradings->links('pagination::bootstrap-4') }}
    </div>

@endsection

@section('js')
    <script src="{{asset('vendor/sweet-alert-2/sweetalert2@11.js')}}"></script>
    <script src="{{asset('admins/products/index/list.js')}}"></script>
@endsection
