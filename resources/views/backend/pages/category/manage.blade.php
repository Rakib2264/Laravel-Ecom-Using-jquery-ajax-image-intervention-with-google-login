@extends('backend.includes.master')
@section('content')
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">Category</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Manage Category</li>
                </ol>
            </nav>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
             <button class="btn btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="lni lni-plus"></i></button>
            <div class="table-responsive">

                <table class="table">

                    <thead>
                        <tr>
                            <th>Sl No</th>
                            <th>Category Name</th>
                            <th>Category Description</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <tbody class="allData">

                    </tbody>

                </table>

            </div>
        </div>
    </div>

    <!-- Add Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content bg-warning">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Add Category</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div class="form-group">
                <label for="cat_name">Category Name</label>
                <input type="text" id="cat_name" class="form-control cat_name">
            </div>
            <div class="form-group">
                <label for="des">Description</label>
                <input type="text" id="des" class="form-control des">
            </div>
            <div class="form-group">
                <label for="status">Status</label>
                <select id="status" class="form-control text-center cat_status">
                    <option value="">--------Select Status--------</option>
                    <option value="1">Active</option>
                    <option value="2">Inactive</option>
                </select>
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
          <button type="button" class="btn btn-dark cat_add">Add</button>
          <button type="button" style="display: none" class="btn btn-dark cat_update">Update</button>
        </div>
      </div>
    </div>
  </div>

      <!-- Delete Modal -->
<div class="modal fade" id="delete" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content bg-dark">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Confirmation Message</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            Are you sure want to delete this item ?
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
          <button type="button" class="btn btn-danger cat_delete">Yes</button>
        </div>
      </div>
    </div>
  </div>
@endsection
