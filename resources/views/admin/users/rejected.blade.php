@extends('admin.master_admin')
@section('title', 'Deleted User')
@section('main-content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Rejected</h1>
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
                        <h3 class="card-title">List Rejected User</h3>
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
                                </tr>
                            </thead>
                            <tbody>
                            @foreach ($users as $user)
                                <tr>
                                    <th scope="row">{{$loop->iteration}}</th>
                                    <td><a href="{{ route('admin.users.rejected.detail', $user->uuid) }}">{{ $user->full_name }}</a></td>
                                    <td>{{ $user->account_type }}</td>
                                    <td>{{ $user->nama_provinsi }}</td>
                                    <td>{{ $user->username }}</td>
                                    <td>{{ $user->status_register }}</td>
                                </tr>
                            @endforeach

                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer clearfix">
                        <ul class="pagination pagination-sm m-0 float-right">
                            {{ $users->links('pagination::simple-bootstrap-4') }}
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
