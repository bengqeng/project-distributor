@extends('admin.master_admin')
@section('title', 'Product')

@section('main-content')
    <!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Product</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item">Admin</li>
                    <li class="breadcrumb-item active">Product</li>
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
                        <h3 class="card-title">Favorit Product</h3>
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
                                    <th style="width: 10px">#</th>
                                    <th>Name</th>
                                    <th>Descript</th>
                                    <th>Image</th>
                                    <th style="width: 40px">Act</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1.</td>
                                    <td>Update software</td>
                                    <td>Cron job running</td>
                                    <td>
                                        <div class="img-responsive" style="max-width: 40px;">
                                            <a href="https://via.placeholder.com/1200/FFFFFF.png?text=6"
                                                data-toggle="lightbox" data-title="sample 6 - white"
                                                data-gallery="gallery">
                                                <img src="https://via.placeholder.com/300/FFFFFF?text=6"
                                                    class="img-fluid mb-2" alt="white sample">
                                            </a>
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        <div class="btn-group btn-group-sm">
                                          <a href="#" class="btn btn-info" title="View"><i class="fas fa-eye"></i></a>
                                          <a href="#" class="btn btn-warning" title="Edit"><i class="fas fa-pencil-alt"></i></a>
                                          <a href="#" class="btn btn-danger" title="Delete"><i class="fas fa-trash"></i></a>
                                        </div>
                                      </td>
                                </tr>
                                <tr>
                                    <td>2.</td>
                                    <td>Cron job running</td>
                                    <td>Clean database</td>
                                    <td>
                                        <div class="img-responsive" style="max-width: 40px;">
                                            <a href="https://via.placeholder.com/1200/FFFFFF.png?text=6"
                                                data-toggle="lightbox" data-title="sample 6 - white"
                                                data-gallery="gallery">
                                                <img src="https://via.placeholder.com/300/FFFFFF?text=6"
                                                    class="img-fluid mb-2" alt="white sample">
                                            </a>
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        <div class="btn-group btn-group-sm">
                                          <a href="#" class="btn btn-info" title="View"><i class="fas fa-eye"></i></a>
                                          <a href="#" class="btn btn-warning" title="Edit"><i class="fas fa-pencil-alt"></i></a>
                                          <a href="#" class="btn btn-danger" title="Delete"><i class="fas fa-trash"></i></a>
                                        </div>
                                      </td>
                                </tr>
                                <tr>
                                    <td>3.</td>
                                    <td>Cron job running</td>
                                    <td>Cron job running</td>
                                    <td>
                                        <div class="img-responsive" style="max-width: 40px;">
                                            <a href="https://via.placeholder.com/1200/FFFFFF.png?text=6"
                                                data-toggle="lightbox" data-title="sample 6 - white"
                                                data-gallery="gallery">
                                                <img src="https://via.placeholder.com/300/FFFFFF?text=6"
                                                    class="img-fluid mb-2" alt="white sample">
                                            </a>
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        <div class="btn-group btn-group-sm">
                                          <a href="#" class="btn btn-info" title="View"><i class="fas fa-eye"></i></a>
                                          <a href="#" class="btn btn-warning" title="Edit"><i class="fas fa-pencil-alt"></i></a>
                                          <a href="#" class="btn btn-danger" title="Delete"><i class="fas fa-trash"></i></a>
                                        </div>
                                      </td>
                                </tr>
                                <tr>
                                    <td>4.</td>
                                    <td>Cron job running</td>
                                    <td>Cron job running</td>
                                    <td>
                                        <div class="img-responsive" style="max-width: 40px;">
                                            <a href="https://via.placeholder.com/1200/FFFFFF.png?text=6"
                                                data-toggle="lightbox" data-title="sample 6 - white"
                                                data-gallery="gallery">
                                                <img src="https://via.placeholder.com/300/FFFFFF?text=6"
                                                    class="img-fluid mb-2" alt="white sample">
                                            </a>
                                        </div>
                                    </td>
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
            </div>
        </div>
    </div><!-- /.container-fluid -->
</div>
<!-- /.content -->

@endsection
