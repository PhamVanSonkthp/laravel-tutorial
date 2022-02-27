@extends('administrator.layouts.master')

@section('title')
    <title>Home page</title>
@endsection

@section('name')
    <h4 class="page-title">Tổng quan</h4>
@endsection

@section('css')
    <link href="{{asset('admins/products/index/list.css')}}" rel="stylesheet"/>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-6 col-xl-3">
            <div class="card">
                <div class="card-body">
                    <div class="mini-stat">
                        <span class="mini-stat-icon bg-purple me-0 float-end"><i class="mdi mdi-basket"></i></span>
                        <div class="mini-stat-info">
                            <span
                                class="counter text-purple">{{\App\Models\User::where('is_admin' , 0)->get()->count()}}</span>
                            Học viên
                        </div>
                    </div>
                </div>
            </div>
        </div> <!--End col -->
        <div class="col-md-6 col-xl-3">
            <div class="card">
                <div class="card-body">
                    <div class="mini-stat">
                        <span class="mini-stat-icon bg-blue-grey me-0 float-end"><i
                                class="mdi mdi-black-mesa"></i></span>
                        <div class="mini-stat-info">
                            <span class="counter text-blue-grey">{{\App\Models\Product::all()->count()}}</span>
                            Khóa học
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- End col -->
        <div class="col-md-6 col-xl-3">
            <div class="card">
                <div class="card-body">
                    <div class="mini-stat">
                        <span class="mini-stat-icon bg-brown me-0 float-end"><i class="mdi mdi-buffer"></i></span>
                        <div class="mini-stat-info">
                            <span class="counter text-brown">{{\App\Models\Trading::all()->count()}}</span>
                            Trading
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- End col -->
        <div class="col-md-6 col-xl-3">
            <div class="card">
                <div class="card-body">
                    <div class="mini-stat">
                        <span class="mini-stat-icon bg-teal me-0 float-end"><i class="mdi mdi-coffee"></i></span>
                        <div class="mini-stat-info">
                            <span class="counter text-teal">{{\App\Models\Post::all()->count()}}</span>
                            Bài viết
                        </div>
                    </div>
                </div>
            </div>
        </div><!--end col -->
    </div>

    <div class="row">
        <div class="col-xl-3">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Quà tặng</h4>

                    <div class="text-center">
                        <div dir="ltr">
                            <div style="display:inline;width:120px;height:120px;">
                                <canvas width="120" height="120"></canvas>
                                <input class="knob" data-width="120" data-height="120" data-linecap="round"
                                       data-fgcolor="#ffbb44" value="{{\App\Models\UserGift::all()->count()}}"
                                       data-skin="tron" data-angleoffset="180" data-readonly="true" data-thickness=".1"
                                       readonly="readonly"
                                       style="width: 64px; height: 40px; position: absolute; vertical-align: middle; margin-top: 40px; margin-left: -92px; border: 0px; background: none; font: bold 24px Arial; text-align: center; color: rgb(255, 187, 68); padding: 0px; appearance: none;">
                            </div>
                        </div>

                        <a href="#" class="btn btn-sm btn-warning text-white mt-4">View All Data</a>
                        <ul class="list-inline row mt-4 clearfix">
                            <li class="col-6">
                                <p class="mb-1 font-size-18 fw-bold">{{\App\Models\UserGift::where('status' , 0)->get()->count()}}</p>
                                <p class="mb-0">Chưa nhận</p>
                            </li>
                            <li class="col-6">
                                <p class="mb-1 font-size-18 fw-bold">{{\App\Models\UserGift::where('status' , 1)->get()->count()}}</p>
                                <p class="mb-0">Đã nhận</p>
                            </li>
                        </ul>

                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Lượt đăng ký trading</h4>

                    <div class="text-center">
                        <div dir="ltr">
                            <div style="display:inline;width:120px;height:120px;">
                                <canvas width="120" height="120"></canvas>
                                <input class="knob" data-width="120" data-height="120" data-linecap="round"
                                       data-fgcolor="#4ac18e" value="{{\App\Models\RegisterTrading::all()->count()}}"
                                       data-skin="tron" data-angleoffset="180" data-readonly="true" data-thickness=".1"
                                       readonly="readonly"
                                       style="width: 64px; height: 40px; position: absolute; vertical-align: middle; margin-top: 40px; margin-left: -92px; border: 0px; background: none; font: bold 24px Arial; text-align: center; color: rgb(74, 193, 142); padding: 0px; appearance: none;">
                            </div>
                        </div>

                        <a href="#" class="btn btn-sm btn-success mt-4">View All Data</a>
                        <ul class="list-inline row mt-4 clearfix">
                            <li class="col-6">
                                <p class="mb-1 font-size-18 fw-bold">{{\App\Models\RegisterTrading::where('status' , 'Chưa xác nhận')->get()->count()}}</p>
                                <p class="mb-0">Chờ xác nhận</p>
                            </li>
                            <li class="col-6">
                                <p class="mb-1 font-size-18 fw-bold">{{\App\Models\RegisterTrading::where('status' , 'Đã xác nhận')->get()->count()}}</p>
                                <p class="mb-0">Đã duyệt</p>
                            </li>
                        </ul>

                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Income khóa học</h4>

                    <div class="text-center">
                        <div dir="ltr">
                            <div style="display:inline;width:120px;height:120px;">
                                <canvas width="120" height="120"></canvas>
                                <input class="knob" data-width="120" data-height="120" data-linecap="round"
                                       data-fgcolor="#8d6e63" value="${{\App\Models\Invoice::all()->sum('price')}}" data-skin="tron" data-angleoffset="180"
                                       data-readonly="true" data-thickness=".1" readonly="readonly"
                                       style="width: 64px; height: 40px; position: absolute; vertical-align: middle; margin-top: 40px; margin-left: -92px; border: 0px; background: none; font: bold 24px Arial; text-align: center; color: rgb(141, 110, 99); padding: 0px; appearance: none;">
                            </div>
                        </div>

                        <a href="#" class="btn btn-sm btn-brown mt-4">View All Data</a>
                        <ul class="list-inline row mt-4 clearfix" style="opacity: 0">
                            <li class="col-6">
                                <p class="mb-1 font-size-18 fw-bold">0</p>
                                <p class="mb-0">Chờ xác nhận</p>
                            </li>
                            <li class="col-6">
                                <p class="mb-1 font-size-18 fw-bold">0</p>
                                <p class="mb-0">Đã duyệt</p>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Income trading</h4>

                    <div class="text-center">
                        <div dir="ltr">
                            <div style="display:inline;width:120px;height:120px;">
                                <canvas width="120" height="120"></canvas>
                                <input class="knob" data-width="120" data-height="120" data-linecap="round"
                                       data-fgcolor="#90a4ae" value="${{\App\Models\InvoiceTrading::all()->sum('price')}}" data-skin="tron" data-angleoffset="180"
                                       data-readonly="true" data-thickness=".1" readonly="readonly"
                                       style="width: 64px; height: 40px; position: absolute; vertical-align: middle; margin-top: 40px; margin-left: -92px; border: 0px; background: none; font: bold 24px Arial; text-align: center; color: rgb(144, 164, 174); padding: 0px; appearance: none;">
                            </div>
                        </div>

                        <a href="#" class="btn btn-sm btn-blue-grey mt-4">View All Data</a>
                        <ul class="list-inline row mt-4 clearfix" style="opacity: 0">
                            <li class="col-6">
                                <p class="mb-1 font-size-18 fw-bold">0</p>
                                <p class="mb-0">Chờ xác nhận</p>
                            </li>
                            <li class="col-6">
                                <p class="mb-1 font-size-18 fw-bold">0</p>
                                <p class="mb-0">Đã duyệt</p>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <div class="row">
        <div class="col-xl-6">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-4">Học viên mới</h4>

                    <div class="table-responsive">
                        <table class="table table-centered table-vertical table-nowrap mb-0">

                            <tbody>

                            @php
                                $users = \App\Models\User::where('is_admin', 0)->latest()->take(5)->get();
                            @endphp

                            @foreach($users as $userItem)
                                <tr>
                                    <td>
                                        {{$userItem->name}}
                                    </td>

                                    <td>{{$userItem->email}}</td>
                                    <td>{{$userItem->phone}}</td>

                                    @if($userItem->email_verified_at)
                                        <td><i class="mdi mdi-checkbox-blank-circle text-success"></i> Confirmed</td>
                                    @else
                                        <td><i class="mdi mdi-checkbox-blank-circle text-orange"></i> Confirmed</td>
                                    @endif
                                </tr>
                            @endforeach


                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-6">
            <div class="card">
                <div class="card-body">

                    @php
                        $invoices = \App\Models\Invoice::latest()->take(5)->get();
                    @endphp

                    <h4 class="card-title mb-4">Hóa đơn mới nhất</h4>

                    <div class="table-responsive">
                        <table class="table table-centered table-vertical table-nowrap mb-0">

                            <tbody>

                            @foreach($invoices as $invoiceItem)
                                <tr>
                                    <td>#{{$invoiceItem->id}}</td>
                                    <td><span class="badge rounded-pill bg-success">{{ optional($invoiceItem->product)->name}}</span></td>
                                    <td>
                                        ${{number_format($invoiceItem->price)}}
                                    </td>
                                    <td>
                                        {{($invoiceItem->created_at)}}
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('js')
    <script src="{{asset('vendor/sweet-alert-2/sweetalert2@11.js')}}"></script>
    <script src="{{asset('admins/products/index/list.js')}}"></script>
@endsection
