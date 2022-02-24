@extends('administrator.layouts.master')

@section('title')
    <title>Home page</title>
@endsection

@section('name')
    <h4 class="page-title">Trading</h4>
@endsection

@section('css')
    <link href="{{asset('admins/products/index/list.css')}}" rel="stylesheet"/>
@endsection

@section('content')
    <div class="col-12">

        <div class="card">
            <div class="card-body">

                <div class="col-md-12">
                    <a href="{{route('administrator.tradings.create')}}" class="btn btn-success float-end m-2">Add</a>
                </div>
                <div class="clearfix"></div>

                <div class="table-responsive">
                    <table class="table table-editable table-nowrap align-middle table-edits">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Tên trading</th>
                            <th scope="col">Giá</th>
                            <th scope="col">Hình ảnh</th>
                            <th scope="col">Link học</th>
                            <th class="text-center" style="width: 100px;">Action</th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($tradings as $tradingItem)
                            <tr>
                                <th scope="row">{{ $tradingItem->id }}</th>
                                <td>{{$tradingItem->name}}</td>
                                <td>{{ number_format($tradingItem->price) }}</td>
                                <td><img class="product_image_150_100" src="{{$tradingItem->feature_image_path}}"></td>
                                <td> <a href="{{$tradingItem->link}}">{{ $tradingItem->link }}</a></td>

                                <td>
                                    <a href="{{route('administrator.tradings.edit' , ['id'=> $tradingItem->id])}}"
                                       class="btn btn-outline-secondary btn-sm edit" title="Edit">
                                        <i class="fas fa-pencil-alt"></i>
                                    </a>

                                    <a href="{{route('administrator.tradings.delete' , ['id'=> $tradingItem->id])}}"
                                       data-url="{{route('administrator.tradings.delete' , ['id'=> $tradingItem->id])}}"
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
        {{ $tradings->links('pagination::bootstrap-4') }}
    </div>

@endsection

@section('js')
    <script src="{{asset('vendor/sweet-alert-2/sweetalert2@11.js')}}"></script>
    <script src="{{asset('admins/products/index/list.js')}}"></script>
@endsection
