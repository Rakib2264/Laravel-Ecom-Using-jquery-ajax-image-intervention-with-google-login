@extends('backend.includes.master')
@section('content')
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">Product</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Update Product</li>
                </ol>
            </nav>
        </div>
    </div>

    <div class="row">
        <div class="col-xl-9 mx-auto">
            <h6 class="mb-0 text-uppercase">Product Form</h6>
            <hr>
            <div class="card border-top border-0 border-4 border-info">
                <div class="card-body">
                    <div class="border p-4 rounded">
                        <div class="card-title d-flex align-items-center">
                            <div><i class="bx bxs-user me-1 font-22 text-info"></i>
                            </div>
                            <h5 class="mb-0 text-info">Update Product</h5>
                        </div>
                        <hr>
                        <form action="{{route('updateproduct',$product->id)}}" method="post">
                            @csrf
                            <div class="row mb-3">
                                <label for="name" class="col-sm-3 col-form-label">Product Name</label>
                                <div class="col-sm-9">
                                    <input type="text" value="{{$product->name}}" name="name" class="form-control" id="name"
                                        placeholder="Enter Your Product Name">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="des" class="col-sm-3 col-form-label">Description</label>
                                <div class="col-sm-9">
                                    <input type="text" value="{{$product->des}}" class="form-control" name="des" id="des"
                                        placeholder="Enter Your Product Description">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="price" class="col-sm-3 col-form-label">Product Price</label>
                                <div class="col-sm-9">
                                    <input type="text" value="{{$product->price}}" class="form-control" name="price" id="price"
                                        placeholder="Product Price">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="qnt" class="col-sm-3 col-form-label">Quantity</label>
                                <div class="col-sm-9">
                                    <input type="text" value="{{$product->quantity}}" class="form-control" name="qnt" id="qnt"
                                        placeholder="Product Quantity">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="status" class="col-sm-3 col-form-label">Status</label>
                                <div class="col-sm-9">
                                    <select name="status" class="form-control" id="status">
                                        <option value="">------Select------</option>
                                        <option value="{{$product->id}}" @if ($product->status == 1) selected @endif>Active</option>
                                        <option value="{{$product->id}}" @if ($product->status == 2) selected @endif>Inactive</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-3 col-form-label"></label>
                                <div class="col-sm-9">
                                    <button type="submit" class="btn btn-info px-5">Update</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
