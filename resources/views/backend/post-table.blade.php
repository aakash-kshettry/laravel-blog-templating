@extends('backend.master')

@section('content')
<div class="content-wrapper">
    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y">
      <h4 class="fw-bold py-3 mb-4"> Post Table</h4>
      <a class="btn btn-primary mb-4" href="{{route('post.create')}}" role="button">Add new posts</a>
      <!-- Basic Bootstrap Table -->
      <div class="card">
        <h5 class="card-header">POSTS</h5>
        <div class="table-responsive text-nowrap">
          <table class="table">
            <thead>
              <tr>
                <th>Title</th>
                <th>Category</th>
                <th>Status</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody class="table-border-bottom-0">
              @foreach ($posts as $post)
                  <tr>
                <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>{{$post->title}}</strong></td>
                <td>{{$post->description}}</td>
                <td><span class="badge bg-label-primary me-1">{{$post->status}}</span></td>
                <td>
                  <div class="dropdown">
                    <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                      <i class="bx bx-dots-vertical-rounded"></i>
                    </button>
                    <div class="dropdown-menu">
                      <a class="dropdown-item" href="{{ route('post.edit', $post->id) }}"
                        ><i class="bx bx-edit-alt me-1"></i> Edit</a
                      >
                      <form action="{{ route('post.destroy', $post->id) }}" method="post">
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