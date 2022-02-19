@extends('user.layouts.master')

@section('title')
    <title>Home page</title>
@endsection

@section('css')

@endsection

@section('content')
    <div class="col-12">
        <div class="card">
            <div class="card-body">

                <div class="row">
                    <div class="col-12">
                        <div class="invoice-title">
                            <h4 class="float-end font-size-16">Order</h4>
                            <h3 class="mt-0">
                                <img src="{{asset('assets/images/logo.png')}}" alt="logo" height="26">
                            </h3>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-6 mt-4">
                                <address>
                                    <strong>Payment Method:</strong><br>
                                    Visa ending **** 4242<br>
                                    jsmith@email.com
                                </address>
                            </div>
                            <div class="col-6 mt-4 text-end">
                                <address>
                                    <strong>Order Date:</strong><br>
                                    October 7, 2016<br><br>
                                </address>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12">
                        <div class="card card-body">
                            <div class="p-2">
                                <h3 class="card-title font-size-20">Order summary</h3>
                            </div>
                            <div class="">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                        <tr>
                                            <td><strong>Item</strong></td>
                                            <td class="text-center"><strong>Price</strong></td>
                                            <td class="text-center"><strong>Quantity</strong>
                                            </td>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <!-- foreach ($order->lineItems as $line) or some such thing here -->
                                        <tr>
                                            <td>{{$product->name}}</td>
                                            <td class="text-center">${{number_format($product->price)}}</td>
                                            <td class="text-center">1</td>
                                        </tr>
                                        <tr>
                                            <td class="no-line"></td>
                                            <td class="no-line"></td>
                                            <td class="no-line text-center">
                                                <strong>Total</strong></td>
                                            <td class="no-line text-end"><h4 class="m-0">${{number_format($product->price)}}</h4></td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>

                                <div class="d-print-none">
                                    <div class="float-end">
                                        <a href="javascript:window.print()" class="btn btn-success waves-effect waves-light"><i class="fa fa-print"></i></a>
                                        <a href="{{route('user.payment' , ['id' => $product->id])}}" class="btn btn-primary waves-effect waves-light">Pay</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div> <!-- end row -->

            </div>
        </div>
    </div>
@endsection

@section('js')


@endsection
