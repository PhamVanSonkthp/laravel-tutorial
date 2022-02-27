@extends('administrator.layouts.master')

@section('title')
    <title>Home page</title>
@endsection

@section('name')
    <h4 class="page-title">Hóa đơn</h4>
@endsection

@section('css')
    <link href="{{asset('admins/products/index/list.css')}}" rel="stylesheet"/>
@endsection

@section('content')
    <div class="col-12">

        <div class="card">

            <div class="card-header">
                Hóa đơn khóa học
            </div>

            <div class="card-body">

                <div class="table-responsive">
                    <table class="table table-editable table-nowrap align-middle table-edits">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Tên khóa học</th>
                            <th>Giá trị</th>
                            <th>Ngày tạo</th>
                            <th>Học viên mua</th>
                            <th>Email</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($invoices as $invoiceItem)
                            <tr>
                                <td>{{ $invoiceItem->id }}</td>
                                <td>{{ optional($invoiceItem->product)->name }}</td>
                                <td>${{ number_format($invoiceItem->price) }}</td>
                                <td>{{ $invoiceItem->created_at }}</td>
                                <td>{{ $invoiceItem->user->name }}</td>
                                <td>{{ $invoiceItem->user->email }}</td>
                            </tr>
                        @endforeach

                        </tbody>
                    </table>
                </div>

            </div>
        </div>

        <div>
            {{ $invoices->links('pagination::bootstrap-4') }}
        </div>

    </div>

    <div class="col-12">

        <div class="card">

            <div class="card-header">
                Hóa đơn trading
            </div>

            <div class="card-body">

                <div class="table-responsive">
                    <table class="table table-editable table-nowrap align-middle table-edits">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Tên trading</th>
                            <th>Giá trị</th>
                            <th>Ngày tạo</th>
                            <th>Học viên mua</th>
                            <th>Email</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($invoiceTradings as $invoiceTradingItem)
                            <tr>
                                <td>{{ $invoiceTradingItem->id }}</td>
                                <td>{{ optional($invoiceTradingItem->trading)->name }}</td>
                                <td>${{ number_format($invoiceTradingItem->price) }}</td>
                                <td>{{ $invoiceTradingItem->created_at }}</td>
                                <td>{{ $invoiceTradingItem->user->name }}</td>
                                <td>{{ $invoiceTradingItem->user->email }}</td>
                            </tr>
                        @endforeach

                        </tbody>
                    </table>
                </div>

            </div>
        </div>

        <div>
            {{ $invoiceTradings->links('pagination::bootstrap-4') }}
        </div>

    </div>

@endsection

@section('js')
    <script src="{{asset('vendor/sweet-alert-2/sweetalert2@11.js')}}"></script>
    <script src="{{asset('admins/products/index/list.js')}}"></script>
@endsection
