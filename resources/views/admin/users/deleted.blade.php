@extends('admin.master_admin')
@section('title', 'Deleted User')
@section('main-content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Deleted</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item">Users</li>
                    <li class="breadcrumb-item active">Deleted</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<div class="content">
    <div class="container-fluid">


        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Bordered Table</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table class="table table-bordered" id="table-users-all">
                            <thead>
                                <tr>
                                    <th style="width: 10px">#</th>
                                    <th>Full Name</th>
                                    <th>Account Type</th>
                                    <th>Area</th>
                                    <th>Account Id</th>
                                    <th>Status User</th>
                                    <th style="width: 130px">Action</th>
                                </tr>
                            </thead>
                            <tbody>

                    @foreach ($user as $user)
                    <tr>
                        <th scope="row">{{$loop->iteration}}</th>
                        <td>{{$user->full_name}}</td>
                        <td>{{$user->status_register}}</td>
                        <td>{{$user->province_id}}</td>
                        <td>{{$user->status_register}}</td>
                      <td class="text-center">
                        <a href="#" class="btn btn-info btn-sm" title="View"><i
                                class="fas fa-eye"></i></a>
                        <a href="#" class="btn btn-warning btn-sm" title="Edit"><i
                                class="fas fa-pencil-alt"></i></a>
                        <form action="/admin/users/deleted/{{$user->id}}" method="post"
                            class="d-inline" onsubmit="return confirm('Are you sure delete this?')">
                            @method('delete')
                            @csrf
                            <button type="submit" class="btn btn-danger btn-sm" title="Delete"><i
                                    class="fas fa-trash"></i></button>
                    </td>
                    </tr>
                    @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer clearfix">
                        <ul class="pagination pagination-sm m-0 float-right">
                            <li class="page-item"><a class="page-link" href="#">&laquo;</a></li>
                            <li class="page-item"><a class="page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item"><a class="page-link" href="#">&raquo;</a></li>
                        </ul>
                    </div>
                </div>
                <!-- /.card -->
            </div>
        </div>

    </div><!-- /.container-fluid -->
</div>
<!-- /.content -->
@endsection
