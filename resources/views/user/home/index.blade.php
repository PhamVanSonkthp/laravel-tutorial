@extends('user.layouts.master')

@section('title')
    <title>Home page</title>
@endsection

@section('css')

@endsection

@section('content')

    @foreach($products as $productItem)
        <div class="col-lg-3 col-md-6">
            <a href="  {{ route('welcome.source', ['id' => $productItem->id]) }}" class="gallery-popup" title="Open Imagination">
                <div class="project-item">
                    <div class="overlay-container">
                        <img src="assets/images/gallery/work-1.jpg" alt="img" class="gallery-thumb-img">
                        <div class="project-item-overlay">
                            <h4>{{$productItem->name}}</h4>
                            <p>
                                <img src="assets/images/users/avatar-1.jpg" alt="user" class="avatar-xs rounded-circle">
                                <span class="ms-2">Curtis Marion</span>
                            </p>
                        </div>
                    </div>
                </div>
            </a>
        </div>
    @endforeach


@endsection

@section('js')


@endsection
