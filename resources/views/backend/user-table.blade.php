@extends('backend.master')

@section('content')
<div class="content-wrapper">
    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4">User Table</h4>
        <a class="btn btn-primary mb-4" href="/admin/users/form" role="button">Add new users</a>
        <!-- Basic Bootstrap Table -->
        <div class="card">
            <div class="table-responsive text-nowrap">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Users</th>
                            <th>Roles</th>
                            <th>Roles</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @foreach ($users as $user)
                        <tr>
                            <td><i class="fab fa-react fa-lg text-info me-3"></i> <strong>{{$user->name}}</strong></td>
                            <td>{{$user->email}}</td>
                            <td>{{$user->role}}</td>
                            <td>
                                <div class="dropdown">
                                    <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                        <i class="bx bx-dots-vertical-rounded"></i>
                                    </button>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" href="/admin/users/{{ $user->id }}"
                                              ><i class="bx bx-edit-alt me-1"></i> Edit</a
                                            >
                                            <form action="/admin/users/{{ $user->id }}" method="post">
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
@endsection
