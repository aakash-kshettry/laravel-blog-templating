@extends('backend.master')

@section('content')
<div class="content-wrapper">
    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y">
      <h4 class="fw-bold py-3 mb-2"> Post Table</h4>
      <a class="btn btn-primary mb-4" href="/admin/categories/form" role="button">Add new Category</a>
      <!-- Basic Bootstrap Table -->
      <div class="card">
        <h5 class="card-header">POSTS</h5>
        <div class="table-responsive text-nowrap">
          <table class="table">
            <thead>
              <tr>
                <th>Name</th>
                <th>Description</th>
                <th>Status</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody class="table-border-bottom-0">
              @foreach ($categories as $category)
              <tr>
                <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>{{ $category->name }}</strong></td>
                <td>{{ $category->description }}</td>
                
                <td><span class="badge bg-label-primary me-1">{{ $category->status }}</span></td>
                <td>
                  <div class="dropdown">
                    <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                      <i class="bx bx-dots-vertical-rounded"></i>
                    </button>
                    <div class="dropdown-menu">
                      <a class="dropdown-item" href="/admin/categories/{{ $category->id }}"
                        ><i class="bx bx-edit-alt me-1"></i> Edit</a
                      >
                      <form action="/admin/categories/{{ $category->id }}" method="post">
                        @csrf
                        @method('delete')
                        <button class="dropdown-item"><i class="bx bx-edit-alt me-1"></i>Delete</button>
                      </form>
                    </div>
                  </div>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
      <!--/ Basic Bootstrap Table -->
    </div>
    <!-- / Content -->
    <div class="content-backdrop fade"></div>
  </div>
  @endsection