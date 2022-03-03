@extends('administrator.layouts.master')

@section('title')
    <title>Home page</title>
@endsection

@section('name')
    <h4 class="page-title">Rương quà</h4>
@endsection

@section('css')
    <link href="{{asset('admins/products/index/list.css')}}" rel="stylesheet"/>
@endsection

@include('administrator.gifts.active_slidebar')

@section('content')
    <div class="col-12">

        <div class="card">
            <div class="card-body">
                <div class="row">
                    @include('administrator.components.input_search')

                    <div class="col-md-6 text-end">
                        <a href="{{route('administrator.gifts.create')}}" class="btn btn-success float-end m-2">Add</a>
                    </div>

                </div>

                <div class="table-responsive">
                    <table class="table table-editable table-nowrap align-middle table-edits">
                        <thead>
                        <tr>
                            <th>Tên rương quà</th>
                            {{--                            <th>Nội dung</th>--}}
                            <th>Phần quà - Xác xuất ( % )</th>
                            <th>Cấp độ yêu cầu</th>
                            <th class="text-center" style="width: 100px;">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($gifts as $giftItem)
                            <tr>
                                <th scope="row">{{ $giftItem->name }}</th>
                                {{--                                <th scope="row">{{ $giftItem->content }}</th>--}}
                                <th scope="row">
                                    <ul>
                                        @foreach($giftItem->giftChildren as $giftChildItem)
                                            <li>
                                                {{$giftChildItem->content}} - {{$giftChildItem->probability}}%
                                            </li>
                                        @endforeach
                                    </ul>
                                </th>
                                <th scope="row">{{ optional($giftItem->level)->level }}</th>
                                <td>
                                    <a href="{{route('administrator.gifts.edit' , ['id'=> $giftItem->id])}}"
                                       class="btn btn-outline-secondary btn-sm edit" title="Edit">
                                        <i class="fas fa-pencil-alt"></i>
                                    </a>

                                    <a href="{{route('administrator.gifts.delete' , ['id'=> $giftItem->id])}}"
                                       data-url="{{route('administrator.gifts.delete' , ['id'=> $giftItem->id])}}"
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
        {{ $gifts->links('pagination::bootstrap-4') }}
    </div>

@endsection

@section('js')
    <script src="{{asset('vendor/sweet-alert-2/sweetalert2@11.js')}}"></script>
    <script src="{{asset('admins/products/index/list.js')}}"></script>
@endsection
