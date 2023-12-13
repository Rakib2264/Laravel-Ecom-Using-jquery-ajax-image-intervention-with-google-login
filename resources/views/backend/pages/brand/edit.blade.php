@extends('backend.includes.master')
@section('content')
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">Brand</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Update Brand</li>
                </ol>
            </nav>
        </div>
    </div>

    <div class="row">
        <div class="col-xl-6">
            <h6 class="mb-0 text-uppercase">Brand Form</h6>
            <hr>
            <div class="card border-top border-0 border-4 border-info">
                <div class="card-body">
                    <div class="border p-4 rounded">
                        <div class="card-title d-flex align-items-center">
                            <div><i class="bx bxs-user me-1 font-22 text-info"></i>
                            </div>
                            <h5 class="mb-0 text-info">Update New Brand</h5>
                        </div>
                        <hr>
                        <form action="{{route('updatebrand',$brand->id)}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row mb-3">
                                <label for="name" class="col-sm-3 col-form-label">Brand Name</label>
                                <div class="col-sm-9">
                                    <input type="text" name="name" class="form-control" value="{{$brand->name}}" id="name"
                                        placeholder="Enter Your Brand Name">
                                        @error('name')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="cat_id" class="col-sm-3 col-form-label">Category</label>
                                <div class="col-sm-9">
                                    <select name="cat_id" class="form-control" id="cat_id">
                                         @foreach ($cats as $cat)
                                        <option value="{{$cat->id}}">{{$cat->name}}</option>
                                        @endforeach

                                    </select>
                                    @error('cat_id')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>



                            {{-- <div class="row mb-3">
                                <label for="images" class="col-sm-3 col-form-label">Gallery Images</label>
                                <div class="col-sm-9">
                                    <input type="file" class="form-control" name="images[]" id="images"
                                        placeholder="Brand Image" multiple>
                                </div>
                            </div> --}}
                            <div class="row mb-3">
                                <label for="image" class="col-sm -3 col-form-label">Brand Image</label>
                                <div class="col-sm-9">
                                    <img height="100" width="100" src="{{asset('backend/assets/brand/'.$brand->image)}}" alt="">

                                    <input type="file" class="form-control" name="image" id="image"
                                        placeholder="Brand Image">
                                </div>
                            </div>


                            <div class="row">
                                <label class="col-sm-3 col-form-label"></label>
                                <div class="col-sm-9">
                                    <button type="submit" class="btn btn-info px-5">Update Brand</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-6">
            <h6 class="mb-0 text-uppercase">Brand Form</h6>
            <hr>
            <div class="card border-top border-0 border-4 border-info">
                <div class="card-body">
                    <div class="border p-4 rounded">
                        <div class="card-title d-flex align-items-center">
                            <div><i class="bx bxs-user me-1 font-22 text-info"></i>
                            </div>
                            <h5 class="mb-0 text-info">Add and Delete Gallery</h5>
                        </div>
                        <hr>
                        <div class="row">
                        @foreach ($brand_gallery as $brand_gallery)

                            <div class="col-md-6 mt-2">
                                <img  class="img-thumbnail img-fluid " src="{{asset('backend/assets/brand/gallery/'.$brand_gallery->images)}}" alt="">
                                <a href="{{route('deletegallery',$brand_gallery->id)}}" class="btn btn-sm btn-info">X</a>
                            </div>
                            @endforeach
                        </div>
                        <div class="row">
                            <form action="{{route('addgallery',$brand->id)}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="col-md-12 mt-2">
                                <input type="file" class="form-control" name="images[]" id="images" multiple>
                                <label class="col-sm-3 col-form-label"></label>
                                <div class="col-sm-9">
                                    <button type="submit" class="btn btn-info px-5">Update Brand</button>
                                </div>
                            </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
