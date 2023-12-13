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


    <h6 class="mb-0 text-uppercase">DataTable Import</h6>
    <hr />
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table id="example2" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>Sl No</th>
                            <th>Product Name</th>
                            <th>Price</th>
                            <th>Description</th>
                            <th>Quantity</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($products as $product)
                            <tr>
                                <td>{{ $loop->index + 1 }}</td>
                                <td>{{ $product->name }}</td>
                                <td>{{ $product->price }}</td>
                                <td>{{ $product->des }}</td>
                                <td>{{ $product->quantity }}</td>
                                <td>
                                    @if ($product->status == 1)
                                        <a href="{{ route('activeproduct', $product->id) }}"
                                            class="btn btn-sm btn-primary">Active</a>
                                    @else
                                        <a href="{{ route('inactiveproduct', $product->id) }}"
                                            class="btn btn-sm btn-danger">Inactive</a>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{route('editproduct',$product->id)}}" class="btn btn-sm btn-info">Edit</a>
                                    <button  data-bs-toggle="modal" data-bs-target="#deleteModal{{ $product->id }}" class="btn btn-sm btn-warning">Delete</button>
                                </td>
                            </tr>
                            <div class="modal fade" id="deleteModal{{ $product->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                      <a   href="{{route('deleteproduct',$product->id)}}" class="btn btn-danger">Yes</a>
                                    </div>
                                  </div>
                                </div>
                              </div>
                        @endforeach

                    </tbody>
                    <tfoot>
                        <tr>
                            <th>Sl No</th>
                            <th>Product Name</th>
                            <th>Price</th>
                            <th>Description</th>
                            <th>Quantity</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
@endsection


