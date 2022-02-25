@extends('user.layouts.master')

@section('title')
    <title>Home page</title>
@endsection

@section('name')
    <h4 class="page-title">Khóa học</h4>
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
                            <th>Tiêu đề</th>
                            <th>Nội dung</th>
                            <th>Thời gian</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($notifications as $notificationItem)
                            <tr>
                                <td>{{ json_decode($notificationItem->data, true)['body'] }}</td>
                                <td>{{ json_decode($notificationItem->data, true)['text'] }}</td>
                                <td>{{ $notificationItem->created_at }}</td>
                            </tr>
                        @endforeach

                        </tbody>
                    </table>
                </div>

            </div>
        </div>

    </div>

    <div class="col-md-12">
        {{ $notifications->links('pagination::bootstrap-4') }}
    </div>

@endsection

@section('js')
    <script src="{{asset('vendor/sweet-alert-2/sweetalert2@11.js')}}"></script>
    <script src="{{asset('admins/products/index/list.js')}}"></script>
@endsection
