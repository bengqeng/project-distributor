@extends('admin.admin')
@section('title', 'Web Content')
@section('main-content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Web Content</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item">Admin</li>
                    <li class="breadcrumb-item active">Web Content</li>
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
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Carousell</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th style="width: 10px">#</th>
                                    <th>Carousell</th>
                                    <th style="width: 40px">Act</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1.</td>
                                    <td>Update software</td>
                                    <td><a href="#" class="btn btn-danger btn-sm" ><i class="fas fa-pen"></i></a></td>
                                </tr>
                                <tr>
                                    <td>2.</td>
                                    <td>Clean database</td>
                                    <td><a href="#" class="btn btn-danger btn-sm"><i class="fas fa-pen"></i></a></td>
                                </tr>
                                <tr>
                                    <td>3.</td>
                                    <td>Cron job running</td>
                                    <td><a href="#" class="btn btn-danger btn-sm"><i class="fas fa-pen"></i></a></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                </div>
                <!-- /.card -->

                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">About Us</h3>
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
                                    <td><a href="#" class="btn btn-danger btn-sm"><i class="fas fa-pen"></i></a></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
            <div class="col-md-6">
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
                                    <td><a href="#" class="btn btn-danger btn-sm"><i class="fas fa-pen"></i></a></td>
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
                                    <td><a href="#" class="btn btn-danger btn-sm"><i class="fas fa-pen"></i></a></td>
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
                                    <td><a href="#" class="btn btn-danger btn-sm"><i class="fas fa-pen"></i></a></td>
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
                                    <td><a href="#" class="btn btn-danger btn-sm"><i class="fas fa-pen"></i></a></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                </div>
                <!-- /.card -->

                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Social Media</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th style="width: 10px">#</th>
                                    <th>Social</th>
                                    <th>Link</th>
                                    <th style="width: 40px">Act</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1.</td>
                                    <td>Facebook</td>
                                    <td>http://www.link</td>
                                    <td><a href="#" class="btn btn-danger btn-sm"><i class="fas fa-pen"></i></a></td>
                                </tr>
                                <tr>
                                    <td>2.</td>
                                    <td>Instagram</td>
                                    <td>http://www.link</td>
                                    <td><a href="#" class="btn btn-danger btn-sm"><i class="fas fa-pen"></i></a></td>
                                </tr>
                                <tr>
                                    <td>3.</td>
                                    <td>Twitter</td>
                                    <td>http://www.link</td>
                                    <td><a href="#" class="btn btn-danger btn-sm"><i class="fas fa-pen"></i></a></td>
                                </tr>
                                <tr>
                                    <td>4.</td>
                                    <td>Tiktok</td>
                                    <td>http://www.link</td>
                                    <td><a href="#" class="btn btn-danger btn-sm"><i class="fas fa-pen"></i></a></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Article</h3>

                        <div class="card-tools">
                            <div class="input-group input-group-sm" style="width: 150px;">
                                <button type="button" class="btn btn-tool" data-card-widget="remove">
                                    Add <i class="fas fa-plus"></i>
                                </button>
                                <input type="text" name="table_search" class="form-control float-right"
                                    placeholder="Search">
                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-default">
                                        <i class="fas fa-search"></i>
                                    </button>
                                </div>

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
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>183</td>
                                    <td>John Doe</td>
                                    <td>11-7-2014</td>
                                    <td><span class="tag tag-success">Active</span></td>
                                    <td>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td>
                                </tr>
                                <tr>
                                    <td>219</td>
                                    <td>Alexander Pierce</td>
                                    <td>11-7-2014</td>
                                    <td><span class="tag tag-warning">Inactive</span></td>
                                    <td>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td>
                                </tr>
                                <tr>
                                    <td>657</td>
                                    <td>Bob Doe</td>
                                    <td>11-7-2014</td>
                                    <td><span class="tag tag-primary">Active</span></td>
                                    <td>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td>
                                </tr>
                                <tr>
                                    <td>175</td>
                                    <td>Mike Doe</td>
                                    <td>11-7-2014</td>
                                    <td><span class="tag tag-danger">Denied</span></td>
                                    <td>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h4 class="card-title">Ekko Lightbox</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-2">
                                <a href="https://via.placeholder.com/1200/FFFFFF.png?text=1" data-toggle="lightbox"
                                    data-title="sample 1 - white" data-gallery="gallery">
                                    <img src="https://via.placeholder.com/300/FFFFFF?text=1" class="img-fluid mb-2"
                                        alt="white sample">
                                </a>
                            </div>
                            <div class="col-sm-2">
                                <a href="https://via.placeholder.com/1200/000000.png?text=2" data-toggle="lightbox"
                                    data-title="sample 2 - black" data-gallery="gallery">
                                    <img src="https://via.placeholder.com/300/000000?text=2" class="img-fluid mb-2"
                                        alt="black sample">
                                </a>
                            </div>
                            <div class="col-sm-2">
                                <a href="https://via.placeholder.com/1200/FF0000/FFFFFF.png?text=3"
                                    data-toggle="lightbox" data-title="sample 3 - red" data-gallery="gallery">
                                    <img src="https://via.placeholder.com/300/FF0000/FFFFFF?text=3"
                                        class="img-fluid mb-2" alt="red sample">
                                </a>
                            </div>
                            <div class="col-sm-2">
                                <a href="https://via.placeholder.com/1200/FF0000/FFFFFF.png?text=4"
                                    data-toggle="lightbox" data-title="sample 4 - red" data-gallery="gallery">
                                    <img src="https://via.placeholder.com/300/FF0000/FFFFFF?text=4"
                                        class="img-fluid mb-2" alt="red sample">
                                </a>
                            </div>
                            <div class="col-sm-2">
                                <a href="https://via.placeholder.com/1200/000000.png?text=5" data-toggle="lightbox"
                                    data-title="sample 5 - black" data-gallery="gallery">
                                    <img src="https://via.placeholder.com/300/000000?text=5" class="img-fluid mb-2"
                                        alt="black sample">
                                </a>
                            </div>
                            <div class="col-sm-2">
                                <a href="https://via.placeholder.com/1200/FFFFFF.png?text=6" data-toggle="lightbox"
                                    data-title="sample 6 - white" data-gallery="gallery">
                                    <img src="https://via.placeholder.com/300/FFFFFF?text=6" class="img-fluid mb-2"
                                        alt="white sample">
                                </a>
                            </div>
                            <div class="col-sm-2">
                                <a href="https://via.placeholder.com/1200/FFFFFF.png?text=7" data-toggle="lightbox"
                                    data-title="sample 7 - white" data-gallery="gallery">
                                    <img src="https://via.placeholder.com/300/FFFFFF?text=7" class="img-fluid mb-2"
                                        alt="white sample">
                                </a>
                            </div>
                            <div class="col-sm-2">
                                <a href="https://via.placeholder.com/1200/000000.png?text=8" data-toggle="lightbox"
                                    data-title="sample 8 - black" data-gallery="gallery">
                                    <img src="https://via.placeholder.com/300/000000?text=8" class="img-fluid mb-2"
                                        alt="black sample">
                                </a>
                            </div>
                            <div class="col-sm-2">
                                <a href="https://via.placeholder.com/1200/FF0000/FFFFFF.png?text=9"
                                    data-toggle="lightbox" data-title="sample 9 - red" data-gallery="gallery">
                                    <img src="https://via.placeholder.com/300/FF0000/FFFFFF?text=9"
                                        class="img-fluid mb-2" alt="red sample">
                                </a>
                            </div>
                            <div class="col-sm-2">
                                <a href="https://via.placeholder.com/1200/FFFFFF.png?text=10" data-toggle="lightbox"
                                    data-title="sample 10 - white" data-gallery="gallery">
                                    <img src="https://via.placeholder.com/300/FFFFFF?text=10" class="img-fluid mb-2"
                                        alt="white sample">
                                </a>
                            </div>
                            <div class="col-sm-2">
                                <a href="https://via.placeholder.com/1200/FFFFFF.png?text=11" data-toggle="lightbox"
                                    data-title="sample 11 - white" data-gallery="gallery">
                                    <img src="https://via.placeholder.com/300/FFFFFF?text=11" class="img-fluid mb-2"
                                        alt="white sample">
                                </a>
                            </div>
                            <div class="col-sm-2">
                                <a href="https://via.placeholder.com/1200/000000.png?text=12" data-toggle="lightbox"
                                    data-title="sample 12 - black" data-gallery="gallery">
                                    <img src="https://via.placeholder.com/300/000000?text=12" class="img-fluid mb-2"
                                        alt="black sample">
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.row -->


    </div><!-- /.container-fluid -->
</div>
<!-- /.content -->
@endsection

