@extends('admin.admin')
@section('title', 'Upload Image')
@section('main-content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Upload Image</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item">Admin</li>
                    <li class="breadcrumb-item active">Upload</li>
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
                <div class="card card-warning">
                    <!-- /.card-header -->
                    <div class="card-body">
                        <form>
                            <div class="row">
                                <div class="col-sm-4">
                                    <!-- text input -->
                                    <div class="form-group">
                                        <label>Title</label>
                                        <input type="text" class="form-control" placeholder="Enter ...">
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <!-- text input -->
                                    <div class="form-group">
                                        <label>Category</label>
                                        <select class="form-control">
                                            <option>Carousell</option>
                                            <option>Articel</option>
                                            <option>Favorite Product</option>
                                            <option>About Us</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Image</label>
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="exampleInputFile">
                                                <label class="custom-file-label" for="exampleInputFile">Choose
                                                    file</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="input-group-append">
                                    <span class="input-group-text">Upload</span>
                                </div>
                            </div>

                        </form>
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Favorit Product</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th style="width: 10px">#</th>
                                    <th>Title</th>
                                    <th>Category</th>
                                    <th>Image</th>
                                    <th style="width: 40px">Act</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1.</td>
                                    <td>Update software</td>
                                    <td>Carousell</td>
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
                                    <td><span class="badge bg-danger"><i class="fas fa-pen"></i></span></td>
                                </tr>
                                <tr>
                                    <td>2.</td>
                                    <td>Cron job running</td>
                                    <td>Article</td>
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
                                    <td><span class="badge bg-danger"><i class="fas fa-pen"></i></span></td>
                                </tr>
                                <tr>
                                    <td>3.</td>
                                    <td>Cron job running</td>
                                    <td>Article</td>
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
                                    <td><span class="badge bg-danger"><i class="fas fa-pen"></i></span></td>
                                </tr>
                                <tr>
                                    <td>4.</td>
                                    <td>Cron job running</td>
                                    <td>About Us</td>
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
                                    <td><span class="badge bg-danger"><i class="fas fa-pen"></i></span></td>
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
