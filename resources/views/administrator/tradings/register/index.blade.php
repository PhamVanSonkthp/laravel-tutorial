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

@include('administrator.tradings.register.active_slidebar')

@section('content')
    <div class="col-12">

        <div class="card">
            <div class="card-body">
                <div class="row">
                    @include('administrator.components.input_search')

                    <div class="col-md-6 text-end">
                        <a href="{{route('administrator.tradings.register.createRegister')}}"
                           class="btn btn-success float-end m-2">Add</a>
                    </div>
                </div>

                <div class="table-responsive">
                    <table class="table table-editable table-nowrap align-middle table-edits">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Trading</th>
                            <th scope="col">Tên học viên</th>
                            <th scope="col">Giá</th>
                            <th scope="col">Hình ảnh</th>
                            <th scope="col">Link học</th>
                            <th scope="col">Ngày đăng ký</th>
                            <th scope="col">Trạng thái</th>
                            <th class="text-center" style="width: 100px;">Action</th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($registerTradings as $registerTradingItem)
                            <tr>
                                <td>{{ $registerTradingItem->id }}</td>
                                <td>
                                    <a href="{{ optional($registerTradingItem->trading)->slug }}">{{ optional($registerTradingItem->trading)->name }}</a>
                                </td>
                                <td>{{ optional($registerTradingItem->user)->name }}</td>
                                <td>{{ optional($registerTradingItem->trading)->price }}</td>
                                <td><img class="product_image_150_100"
                                         src="{{ optional($registerTradingItem->trading)->feature_image_path }}"></td>
                                <td>
                                    <a href="{{ optional($registerTradingItem->trading)->link }}">{{ optional($registerTradingItem->trading)->link }}</a>
                                </td>
                                <td>{{ $registerTradingItem->created_at }}</td>
                                <td>{{ $registerTradingItem->status}}</td>
                                <td>
                                    <a href="{{route('administrator.tradings.register.edit' , ['id'=> $registerTradingItem->id])}}"
                                       class="btn btn-outline-secondary btn-sm edit" title="Edit">
                                        <i class="fas fa-pencil-alt"></i>
                                    </a>

                                    <a href="{{route('administrator.tradings.register.delete' , ['id'=> $registerTradingItem->id])}}"
                                       data-url="{{route('administrator.tradings.register.delete' , ['id'=> $registerTradingItem->id])}}"
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
        {{ $registerTradings->links('pagination::bootstrap-4') }}
    </div>

@endsection

@section('js')
    <script src="{{asset('vendor/sweet-alert-2/sweetalert2@11.js')}}"></script>
    <script src="{{asset('admins/products/index/list.js')}}"></script>
@endsection
