@extends('administrator.layouts.master')

@section('title')
    <title>Home page</title>
@endsection

@section('name')
    <h4 class="page-title">Học viên</h4>
@endsection

@section('css')
    <link href="{{asset('admins/products/index/list.css')}}" rel="stylesheet"/>
@endsection

@include('administrator.user.active_slidebar')

@section('content')

    <div class="col-12">

        <div class="card">
            <div class="card-header">
                Danh sách khóa học
            </div>
            <div class="card-body">

                <div class="table-responsive">
                    <table class="table table-editable table-nowrap align-middle table-edits">
                        <thead>
                        <tr>
                            <th>Mã hóa đơn</th>
                            <th>Tên khóa học</th>
                            <th>Tiến độ</th>
                            <th>Ngày học</th>
                            <th>Ngày gia hạn</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($invoices as $index=> $invoiceItem)
                            <tr>
                                <td>{{$invoiceItem->id}}</td>
                                <td>{{ optional($invoiceItem->product)->name}}</td>
                                <td> {{$counterProcessesd[$index]}} / {{ $processes[$index] }}</td>
                                <td>{{ optional($invoiceItem->product)->created_at}}</td>
                                <td>{{ optional($invoiceItem->product)->time_payment_again == 0 ? 'Vĩnh viễn' : (new DateTime($invoiceItem->product->created_at))->modify('+'. $invoiceItem->product->time_payment_again .' month')->format('Y-m-d h:m:s')  }}</td>
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
                Danh sách trading
            </div>
            <div class="card-body">

                <div class="table-responsive">
                    <table class="table table-editable table-nowrap align-middle table-edits">
                        <thead>
                        <tr>
                            <th>Mã hóa đơn</th>
                            <th>Tên trading</th>
                            <th>Link học</th>
                            <th>Ngày học</th>
                            <th>Ngày gia hạn</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($tradings as $tradingItem)
                            <tr>
                                <td>{{$tradingItem->id}}</td>
                                <td>{{ optional($tradingItem->trading)->name}}</td>
                                <td> <a href="{{ optional($tradingItem->trading)->link}}"></a>{{ optional($tradingItem->trading)->link}}</td>
                                <td>{{$tradingItem->created_at}}</td>
                                <td>{{ optional($tradingItem->trading)->time_payment_again == 0 ? 'Vĩnh viễn' : (new DateTime($tradingItem->trading->created_at))->modify('+'. $tradingItem->trading->time_payment_again .' month')->format('Y-m-d h:m:s')  }}</td>
                            </tr>
                        @endforeach

                        </tbody>
                    </table>
                </div>

            </div>
        </div>

        <div>
            {{ $tradings->links('pagination::bootstrap-4') }}
        </div>
    </div>

@endsection

@section('js')
    <script src="{{asset('vendor/sweet-alert-2/sweetalert2@11.js')}}"></script>
    <script src="{{asset('admins/products/index/list.js')}}"></script>
@endsection
