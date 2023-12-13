@extends('backend.includes.master')
@section('content')
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">Product</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Manage Product</li>
                </ol>
            </nav>
        </div>
    </div>


     <hr />
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table  class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>Sl No</th>
                            <th>Brand Name</th>
                            <th>Category Name</th>
                            <th>Image</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($brands as $brand)
                            <tr>
                                <td>{{ $loop->index + 1 }}</td>
                                <td>{{ $brand->name }}</td>
                                <td>{{ $brand->category?->name }}</td>
                                <td>
                                     <img src="{{asset('backend/assets/brand/'.$brand->image)}}" height="100" width="100" alt="">
                                </td>

                                <td>
                                    <a href="{{route('editbrand',$brand->id)}}" class="btn btn-sm btn-info">Edit</a>
                                    <a href="{{route('viewbrand',$brand->id)}}" class="btn btn-sm btn-success">View</a>
                                    <button  data-bs-toggle="modal" data-bs-target="#deleteModal{{$brand->id}}" class="btn btn-sm btn-warning">Delete</button>
                                </td>
                            </tr>
                            <div class="modal fade" id="deleteModal{{$brand->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <h5 class="modal-title" id="exampleModalLabel">Confiramaction</h5>
                                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                      Are You Sure want to delete this item ?
                                    </div>
                                    <div class="modal-footer">
                                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
                                      <a   href="{{route('deletebrand',$brand->id)}}" class="btn btn-danger">Yes</a>
                                    </div>
                                  </div>
                                </div>
                              </div>
                        @endforeach

                    </tbody>
                    <tfoot>
                        <tr>
                            <th>Sl No</th>
                            <th>Brand Name</th>
                            <th>Category Name</th>
                            <th>Image</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
@endsection


