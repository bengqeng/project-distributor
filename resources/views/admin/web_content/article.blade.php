@extends('admin.master_admin')
@section('title', 'Article')

@section('main-content')
    <!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Article</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item">Admin</li>
                    <li class="breadcrumb-item active">Article</li>
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
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Article</h3>

                        <div class="card-tools">
                            <div class="input-group input-group-md">
                                <button type="button" class="btn btn-primary">
                                    <i class="fas fa-plus"></i> Add New
                                </button>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body table-responsive p-0">
                        <table class="table table-hover text-nowrap">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Author</th>
                                    <th>Date</th>
                                    <th>Status</th>
                                    <th>Title</th>
                                    <th style="width: 40px">Act</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>183</td>
                                    <td>John Doe</td>
                                    <td>11-7-2014</td>
                                    <td><span class="tag tag-success">Active</span></td>
                                    <td>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td>
                                    <td class="text-center">
                                        <div class="btn-group btn-group-sm">
                                          <a href="#" class="btn btn-info" title="View"><i class="fas fa-eye"></i></a>
                                          <a href="#" class="btn btn-warning" title="Edit"><i class="fas fa-pencil-alt"></i></a>
                                          <a href="#" class="btn btn-danger" title="Delete"><i class="fas fa-trash"></i></a>
                                        </div>
                                      </td>
                                </tr>
                                <tr>
                                    <td>219</td>
                                    <td>Alexander Pierce</td>
                                    <td>11-7-2014</td>
                                    <td><span class="tag tag-warning">Inactive</span></td>
                                    <td>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td>
                                    <td class="text-center">
                                        <div class="btn-group btn-group-sm">
                                          <a href="#" class="btn btn-info"><i class="fas fa-eye"></i></a>
                                          <a href="#" class="btn btn-warning"><i class="fas fa-pencil-alt"></i></a>
                                          <a href="#" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                                        </div>
                                      </td>
                                </tr>
                                <tr>
                                    <td>657</td>
                                    <td>Bob Doe</td>
                                    <td>11-7-2014</td>
                                    <td><span class="tag tag-primary">Active</span></td>
                                    <td>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td>
                                    <td class="text-center">
                                        <div class="btn-group btn-group-sm">
                                          <a href="#" class="btn btn-info"><i class="fas fa-eye"></i></a>
                                          <a href="#" class="btn btn-warning"><i class="fas fa-pencil-alt"></i></a>
                                          <a href="#" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                                        </div>
                                      </td>
                                </tr>
                                <tr>
                                    <td>175</td>
                                    <td>Mike Doe</td>
                                    <td>11-7-2014</td>
                                    <td><span class="tag tag-danger">Denied</span></td>
                                    <td>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td>
                                    <td class="text-center">
                                        <div class="btn-group btn-group-sm">
                                          <a href="#" class="btn btn-info"><i class="fas fa-eye"></i></a>
                                          <a href="#" class="btn btn-warning"><i class="fas fa-pencil-alt"></i></a>
                                          <a href="#" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                                        </div>
                                      </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
        </div>


    </div><!-- /.container-fluid -->
</div>
<!-- /.content -->

@endsection
