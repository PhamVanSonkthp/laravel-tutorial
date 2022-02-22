@extends('administrator.layouts.master')

@section('title')
    <title>Home page</title>
@endsection

@section('name')
    <h4 class="page-title">Vai trò</h4>
@endsection
@section('css')
    <link href="{{asset('vendor/select2/select2.min.css') }}" rel="stylesheet"/>
    <link href="{{asset('admins/products/add/add.css') }}" rel="stylesheet"/>
@endsection

@section('content')

    <form action="{{route('administrator.roles.store')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="col-md-6">

            <div class="form-group">
                <label>Tên</label>
                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                       placeholder="Nhập tên" value="{{old('name')}}">
                @error('name')
                <div class="alert alert-danger">{{$message}}</div>
                @enderror
            </div>

            <div class="form-group mt-3">
                <label>Mô tả</label>
                <input type="text" name="display_name"
                       class="form-control @error('display_name') is-invalid @enderror"
                       placeholder="Nhập mô tả" value="{{old('display_name')}}">
                @error('display_name')
                <div class="alert alert-danger">{{$message}}</div>
                @enderror
            </div>
        </div>

        <div class="col-md-12">
            <div class="mt-3">

                @foreach($premissionsParent as $premissionsParentItem)
                    <div class="card border-primary mb-3 col-md-12">
                        <div class="card-header">
                            <label>
                                <input class="checkbox_wrapper" type="checkbox" value="">
                            </label>
                            Module {{$premissionsParentItem->name}}
                        </div>
                        <div class="row">
                            @foreach($premissionsParentItem->permissionsChildren as $permissionsChildrenItem)
                                <div class="card-body text-primary col-md-3">
                                    <h5 class="card-title">
                                        <label>
                                            <input class="checkbox_children" type="checkbox" name="permission_id[]" value="{{$permissionsChildrenItem->id}}">
                                        </label>
                                        {{$permissionsChildrenItem->name}}
                                    </h5>
                                </div>
                            @endforeach
                        </div>

                    </div>
                @endforeach

            </div>

        </div>

        <div class="col-md-12">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>

@endsection


@section('js')
    <script src="{{asset('vendor/select2/select2.min.js') }}"></script>
    <script>
        $('.checkbox_wrapper').on('click' , function (){
            $(this).parents('.card').find('.checkbox_children').prop('checked', $(this).prop('checked'))
        })

    </script>
@endsection
