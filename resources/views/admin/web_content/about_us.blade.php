@extends('admin.master_admin')
@section('title', 'About Us')

@section('main-content')
    <!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">About Us</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item">Admin</li>
                    <li class="breadcrumb-item active">About Us</li>
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
                        <h3 class="card-title">About Us</h3>
                        <div class="card-tools">
                            <div class="input-group input-group-md">
                                <button type="button" class="btn btn-primary">
                                    <i class="fas fa-plus"></i> Add New
                                </button>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Descript</th>
                                    <th style="width: 40px">Act</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Update software...</td>
                                    <td class="text-center">
                                        <div class="btn-group btn-group-sm">
                                          <a href="#" class="btn btn-info" title="View"><i class="fas fa-eye"></i></a>
                                          <a href="#" class="btn btn-warning" title="Edit"><i class="fas fa-pencil-alt"></i></a>
                                          <a href="#" class="btn btn-danger" title="Delete"><i class="fas fa-trash"></i></a>
                                        </div>
                                      </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                </div>
                <!-- /.card -->
            </div>
        </div>
    </div><!-- /.container-fluid -->
</div>
<!-- /.content -->

@endsection
