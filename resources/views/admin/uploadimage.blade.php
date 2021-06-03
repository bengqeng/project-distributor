@extends('admin.master_admin')
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
                        <form action="" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-sm-6">
                                    <!-- text input -->
                                    <div class="form-group">
                                        <label>Category</label>
                                        <select class="form-control">
                                            <option name="carousell">Carousell</option>
                                            <option name="article">Article</option>
                                            <option name="product">Favorite Product</option>
                                            <option name="about">About Us</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-6">
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
                                    <a href="#" class="input-group-text">Upload</a>
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
                                    <th>Category</th>
                                    <th>url_path</th>
                                    <th> Image </th>
                                    <th style="width: 130px">Act</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($masterimage as $masterimage)
                                <tr>
                                    <th scope="row">{{$loop->iteration}}</th>
                                    <td>{{$masterimage->category}}</td>
                                    <td>{{$masterimage->url_path}}</td>
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
                                        <a href="#" class="btn btn-info btn-sm" title="View"><i
                                                class="fas fa-eye"></i></a>
                                        <a href="#" class="btn btn-warning btn-sm" title="Edit"><i
                                                class="fas fa-pencil-alt"></i></a>
                                        <form action="/admin/webcontent/carousel/{{$masterimage->id}}" method="post"
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

                </div>
            </div>
        </div>


    </div><!-- /.container-fluid -->
</div>
<!-- /.content -->
@endsection
