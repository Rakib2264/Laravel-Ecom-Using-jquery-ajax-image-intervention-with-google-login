@extends('backend.includes.master')
@section('content')

<div class="row">
    <div class="col-md-4">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title text-center">Brand Information</h4>
                <p class="text-center">Brand Name : {{$brand->name}}</p>
                <h2 class="text-center">
                    <img src="{{ asset('backend/assets/brand/'.$brand->image) }}" class="img-thumbnail" alt="">

                </h2>
            </div>
        </div>
    </div>
    <div class="col-md-8">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title text-center">Brand Gallery</h4>
                @foreach ($brand_gallery as $gallery)
                <style>

                    .gallery{
                        display: flex;
                        justify-content: center;
                        align-items: center;
                        position: relative;
                        height: 150px;
                        width: 150px;
                        padding: 10px;
                    }
                    .delete-btn{
                        position: absolute;
                        right: 2px;
                        top: 2px;
                    }

                    .gallery img{
                        width: 100%;
                        height: 100%;
                        border: 2px solid rgb(169, 185, 233);
                        box-shadow: 2px 2px green;
                    }

                </style>
                <div class="gallery">
                    <img src="{{ asset('backend/assets/brand/gallery/'.$gallery->images) }}" class="img-thumbnail" alt="">
                    <a class="btn btn-sm btn-danger delete-btn" href="">X</a>
                </div>

                @endforeach
            </div>
        </div>
    </div>
</div>

@endsection
