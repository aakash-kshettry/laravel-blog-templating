@extends('backend.master')

@section('content')
<div class="content-wrapper">
    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y">
      <h4 class="fw-bold py-3 mb-4"> Comments Table</h4>

      <!-- Basic Bootstrap Table -->
      <div class="card">
        <h5 class="card-header">Comments</h5>
        <div class="table-responsive text-nowrap">
          <table class="table">
            <thead>
              <tr>
                <th>Description</th>
                <th>Post</th>
                <th>User</th>
                <th>Status</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody class="table-border-bottom-0">
              @foreach ($comments as $comment)
              <tr>
                <td><i class="fab fa-react fa-lg text-info me-3"></i> <strong>{{$comment->description}}</strong></td>
                <td>Post 1</td>
                <td>
                  <ul class="list-unstyled users-list m-0 avatar-group d-flex align-items-center">
                    <li
                      data-bs-toggle="tooltip"
                      data-popup="tooltip-custom"
                      data-bs-placement="top"
                      class="avatar avatar-xs pull-up"
                      title="Lilian Fuller"
                    >
                      <img src="../assets/img/avatars/5.png" alt="Avatar" class="rounded-circle" />
                    </li>
                    <li
                      data-bs-toggle="tooltip"
                      data-popup="tooltip-custom"
                      data-bs-placement="top"
                      class="avatar avatar-xs pull-up"
                      title="Sophia Wilkerson"
                    >
                      <img src="../assets/img/avatars/6.png" alt="Avatar" class="rounded-circle" />
                    </li>
                    <li
                      data-bs-toggle="tooltip"
                      data-popup="tooltip-custom"
                      data-bs-placement="top"
                      class="avatar avatar-xs pull-up"
                      title="Christina Parker"
                    >
                      <img src="../assets/img/avatars/7.png" alt="Avatar" class="rounded-circle" />
                    </li>
                  </ul>
                </td>
                <td><span class="badge bg-label-success me-1">{{$comment->status}}</span></td>
                <td>
                  <div class="dropdown">
                    <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                      <i class="bx bx-dots-vertical-rounded"></i>
                    </button>
                    <div class="dropdown-menu">
                      <a class="dropdown-item" href="/admin/comments/{{$comment->id}}"
                        ><i class="bx bx-edit-alt me-2"></i> Edit</a
                      >
                      <a class="dropdown-item" href="/admin/comments/{{$comment->id}}"
                        ><i class="bx bx-trash me-2"></i> Delete</a
                      >
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