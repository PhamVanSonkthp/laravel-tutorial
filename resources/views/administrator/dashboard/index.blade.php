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
                            <span class="counter text-purple">25140</span>
                            Total Sales
                        </div>
                        <p class=" mb-0 mt-4 text-muted">Total income: $22506 <span class="float-end"><i class="fa fa-caret-up me-1"></i>10.25%</span></p>
                    </div>
                </div>
            </div>
        </div> <!--End col -->
        <div class="col-md-6 col-xl-3">
            <div class="card">
                <div class="card-body">
                    <div class="mini-stat">
                        <span class="mini-stat-icon bg-blue-grey me-0 float-end"><i class="mdi mdi-black-mesa"></i></span>
                        <div class="mini-stat-info">
                            <span class="counter text-blue-grey">65241</span>
                            New Orders
                        </div>
                        <p class="text-muted mb-0 mt-4">Total income: $22506 <span class="float-end"><i class="fa fa-caret-up me-1"></i>10.25%</span></p>
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
                            <span class="counter text-brown">85412</span>
                            New Users
                        </div>
                        <p class="text-muted mb-0 mt-4">Total income: $22506 <span class="float-end"><i class="fa fa-caret-up me-1"></i>10.25%</span></p>
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
                            <span class="counter text-teal">20544</span>
                            Unique Visitors
                        </div>
                        <p class="text-muted mb-0 mt-4">Total income: $22506 <span class="float-end"><i class="fa fa-caret-up me-1"></i>10.25%</span></p>
                    </div>
                </div>
            </div>
        </div><!--end col -->
    </div>

    <div class="row">
        <div class="col-xl-3">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Recent Stock</h4>

                    <div class="text-center">
                        <div dir="ltr">
                            <div style="display:inline;width:120px;height:120px;"><canvas width="120" height="120"></canvas><input class="knob" data-width="120" data-height="120" data-linecap="round" data-fgcolor="#ffbb44" value="80" data-skin="tron" data-angleoffset="180" data-readonly="true" data-thickness=".1" readonly="readonly" style="width: 64px; height: 40px; position: absolute; vertical-align: middle; margin-top: 40px; margin-left: -92px; border: 0px; background: none; font: bold 24px Arial; text-align: center; color: rgb(255, 187, 68); padding: 0px; appearance: none;"></div>
                        </div>

                        <a href="#" class="btn btn-sm btn-warning text-white mt-4">View All Data</a>
                        <ul class="list-inline row mt-4 clearfix">
                            <li class="col-6">
                                <p class="mb-1 font-size-18 fw-bold">7,541</p>
                                <p class="mb-0">Mobile Phones</p>
                            </li>
                            <li class="col-6">
                                <p class="mb-1 font-size-18 fw-bold">125</p>
                                <p class="mb-0">Desktops</p>
                            </li>
                        </ul>

                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Purchase Order</h4>

                    <div class="text-center">
                        <div dir="ltr">
                            <div style="display:inline;width:120px;height:120px;"><canvas width="120" height="120"></canvas><input class="knob" data-width="120" data-height="120" data-linecap="round" data-fgcolor="#4ac18e" value="68" data-skin="tron" data-angleoffset="180" data-readonly="true" data-thickness=".1" readonly="readonly" style="width: 64px; height: 40px; position: absolute; vertical-align: middle; margin-top: 40px; margin-left: -92px; border: 0px; background: none; font: bold 24px Arial; text-align: center; color: rgb(74, 193, 142); padding: 0px; appearance: none;"></div>
                        </div>

                        <a href="#" class="btn btn-sm btn-success mt-4">View All Data</a>
                        <ul class="list-inline row mt-4 clearfix">
                            <li class="col-6">
                                <p class="mb-1 font-size-18 fw-bold">2,541</p>
                                <p class="mb-0">Mobile Phones</p>
                            </li>
                            <li class="col-6">
                                <p class="mb-1 font-size-18 fw-bold">874</p>
                                <p class="mb-0">Desktops</p>
                            </li>
                        </ul>

                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Shipped Orders</h4>

                    <div class="text-center">
                        <div dir="ltr">
                            <div style="display:inline;width:120px;height:120px;"><canvas width="120" height="120"></canvas><input class="knob" data-width="120" data-height="120" data-linecap="round" data-fgcolor="#8d6e63" value="39" data-skin="tron" data-angleoffset="180" data-readonly="true" data-thickness=".1" readonly="readonly" style="width: 64px; height: 40px; position: absolute; vertical-align: middle; margin-top: 40px; margin-left: -92px; border: 0px; background: none; font: bold 24px Arial; text-align: center; color: rgb(141, 110, 99); padding: 0px; appearance: none;"></div>
                        </div>

                        <a href="#" class="btn btn-sm btn-brown mt-4">View All Data</a>
                        <ul class="list-inline row mt-4 clearfix">
                            <li class="col-6">
                                <p class="mb-1 font-size-18 fw-bold">1,154</p>
                                <p class="mb-0">Mobile Phones</p>
                            </li>
                            <li class="col-6">
                                <p class="mb-1 font-size-18 fw-bold">89</p>
                                <p class="mb-0">Desktops</p>
                            </li>
                        </ul>

                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Cancelled Orders</h4>

                    <div class="text-center">
                        <div dir="ltr">
                            <div style="display:inline;width:120px;height:120px;"><canvas width="120" height="120"></canvas><input class="knob" data-width="120" data-height="120" data-linecap="round" data-fgcolor="#90a4ae" value="95" data-skin="tron" data-angleoffset="180" data-readonly="true" data-thickness=".1" readonly="readonly" style="width: 64px; height: 40px; position: absolute; vertical-align: middle; margin-top: 40px; margin-left: -92px; border: 0px; background: none; font: bold 24px Arial; text-align: center; color: rgb(144, 164, 174); padding: 0px; appearance: none;"></div>
                        </div>

                        <a href="#" class="btn btn-sm btn-blue-grey mt-4">View All Data</a>
                        <ul class="list-inline row mt-4 clearfix">
                            <li class="col-6">
                                <p class="mb-1 font-size-18 fw-bold">95</p>
                                <p class="mb-0">Mobile Phones</p>
                            </li>
                            <li class="col-6">
                                <p class="mb-1 font-size-18 fw-bold">25</p>
                                <p class="mb-0">Desktops</p>
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
                    <h4 class="card-title mb-4">Latest Transactions</h4>

                    <div class="table-responsive">
                        <table class="table table-centered table-vertical table-nowrap mb-0">

                            <tbody>
                            <tr>
                                <td>
                                    <img src="assets/images/users/avatar-2.jpg" alt="user-image" class="avatar-sm rounded-circle me-2">
                                    Herbert C. Patton
                                </td>
                                <td><i class="mdi mdi-checkbox-blank-circle text-success"></i> Confirm
                                </td>
                                <td>
                                    $14,584
                                    <p class="m-0 text-muted font-size-14">Amount</p>
                                </td>
                                <td>
                                    5/12/2016
                                    <p class="m-0 text-muted font-size-14">Date</p>
                                </td>
                                <td>
                                    <button type="button" class="btn btn-secondary btn-sm waves-effect">Edit</button>
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    <img src="assets/images/users/avatar-3.jpg" alt="user-image" class="avatar-sm rounded-circle me-2">
                                    Mathias N. Klausen
                                </td>
                                <td><i class="mdi mdi-checkbox-blank-circle text-warning"></i> Waiting
                                    payment</td>
                                <td>
                                    $8,541
                                    <p class="m-0 text-muted font-size-14">Amount</p>
                                </td>
                                <td>
                                    10/11/2016
                                    <p class="m-0 text-muted font-size-14">Date</p>
                                </td>
                                <td>
                                    <button type="button" class="btn btn-secondary btn-sm waves-effect">Edit</button>
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    <img src="assets/images/users/avatar-4.jpg" alt="user-image" class="avatar-sm rounded-circle me-2">
                                    Nikolaj S. Henriksen
                                </td>
                                <td><i class="mdi mdi-checkbox-blank-circle text-success"></i> Confirm
                                </td>
                                <td>
                                    $954
                                    <p class="m-0 text-muted font-size-14">Amount</p>
                                </td>
                                <td>
                                    8/11/2016
                                    <p class="m-0 text-muted font-size-14">Date</p>
                                </td>
                                <td>
                                    <button type="button" class="btn btn-secondary btn-sm waves-effect">Edit</button>
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    <img src="assets/images/users/avatar-5.jpg" alt="user-image" class="avatar-sm rounded-circle me-2">
                                    Lasse C. Overgaard
                                </td>
                                <td><i class="mdi mdi-checkbox-blank-circle text-danger"></i> Payment
                                    expired</td>
                                <td>
                                    $44,584
                                    <p class="m-0 text-muted font-size-14">Amount</p>
                                </td>
                                <td>
                                    7/11/2016
                                    <p class="m-0 text-muted font-size-14">Date</p>
                                </td>
                                <td>
                                    <button type="button" class="btn btn-secondary btn-sm waves-effect">Edit</button>
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    <img src="assets/images/users/avatar-6.jpg" alt="user-image" class="avatar-sm rounded-circle me-2">
                                    Kasper S. Jessen
                                </td>
                                <td><i class="mdi mdi-checkbox-blank-circle text-success"></i> Confirm
                                </td>
                                <td>
                                    $8,844
                                    <p class="m-0 text-muted font-size-14">Amount</p>
                                </td>
                                <td>
                                    1/11/2016
                                    <p class="m-0 text-muted font-size-14">Date</p>
                                </td>
                                <td>
                                    <button type="button" class="btn btn-secondary btn-sm waves-effect">Edit</button>
                                </td>
                            </tr>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-6">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-4">Latest Orders</h4>

                    <div class="table-responsive">
                        <table class="table table-centered table-vertical table-nowrap mb-0">

                            <tbody>
                            <tr>
                                <td>#12354781</td>
                                <td>
                                    <img src="assets/images/products/1.jpg" alt="user-image" style="height: 48px;" class="rounded me-2">
                                    Riverston Glass Chair
                                </td>
                                <td><span class="badge rounded-pill bg-success">Delivered</span></td>
                                <td>
                                    $185
                                </td>
                                <td>
                                    5/12/2016
                                </td>
                                <td>
                                    <button type="button" class="btn btn-secondary btn-sm waves-effect">Edit</button>
                                </td>
                            </tr>

                            <tr>
                                <td>#52140300</td>
                                <td>
                                    <img src="assets/images/products/2.jpg" alt="user-image" style="height: 48px;" class="rounded me-2">
                                    Shine Company Catalina
                                </td>
                                <td><span class="badge rounded-pill bg-success">Delivered</span></td>
                                <td>
                                    $1,024
                                </td>
                                <td>
                                    5/12/2016
                                </td>
                                <td>
                                    <button type="button" class="btn btn-secondary btn-sm waves-effect">Edit</button>
                                </td>
                            </tr>

                            <tr>
                                <td>#96254137</td>
                                <td>
                                    <img src="assets/images/products/3.jpg" alt="user-image" style="height: 48px;" class="rounded me-2">
                                    Trex Outdoor Furniture Cape
                                </td>
                                <td><span class="badge rounded-pill bg-danger">Cancel</span></td>
                                <td>
                                    $657
                                </td>
                                <td>
                                    5/12/2016
                                </td>
                                <td>
                                    <button type="button" class="btn btn-secondary btn-sm waves-effect">Edit</button>
                                </td>
                            </tr>

                            <tr>
                                <td>#12365474</td>
                                <td>
                                    <img src="assets/images/products/4.jpg" alt="user-image" style="height: 48px;" class="rounded me-2">
                                    Oasis Bathroom Teak Corner
                                </td>
                                <td><span class="badge rounded-pill bg-warning">Shipped</span></td>
                                <td>
                                    $8451
                                </td>
                                <td>
                                    5/12/2016
                                </td>
                                <td>
                                    <button type="button" class="btn btn-secondary btn-sm waves-effect">Edit</button>
                                </td>
                            </tr>

                            <tr>
                                <td>#85214796</td>
                                <td>
                                    <img src="assets/images/products/5.jpg" alt="user-image" style="height: 48px;" class="rounded me-2">
                                    BeoPlay Speaker
                                </td>
                                <td><span class="badge rounded-pill bg-success">Delivered</span></td>
                                <td>
                                    $584
                                </td>
                                <td>
                                    5/12/2016
                                </td>
                                <td>
                                    <button type="button" class="btn btn-secondary btn-sm waves-effect">Edit</button>
                                </td>
                            </tr>

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
