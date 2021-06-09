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
@if (session('status'))
<div class="alert alert-success" id="status-message">
    {{ session('status') }}
</div>
@elseif (session('status2'))
<div class="alert alert-danger" id="status-message">
    {{ session('status2') }}
</div>
@endif
<!-- Main content -->
<div class="content">
    <div class="container-fluid">

        <div class="row">
            <div class="col-12">
                <div class="card card-warning">
                    <!-- /.card-header -->
                    <div class="card-body">
                        <form action="{{route('admin.upload.new')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-sm-6">
                                    <!-- text input -->
                                    <div class="form-group">
                                        <label>Category</label>
                                        <select class="form-control " name="category" required=""
                                            value="{{ old('category')}}">
                                            <option class="text-disabled" value="">Pilih Kategori</option>
                                            <option value="carousel">Carousell</option>
                                            <option value="article">Article</option>
                                            <option value="product">Product</option>
                                            <option value="about">About Us</option>
                                            <option value="galery">Galery</option>
                                        </select>
                                        @if($errors->has('category'))
                                        <div class="text-danger">{{ $errors->first('category') }}</div>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleInputFile">Image</label>
                                        <div class="input-group">
                                            <input type="file" @error('master_images') is-invalid @enderror name="master_images"
                                                required="" value="{{ old('master_images')}}">
                                        </div>
                                        @if($errors->has('master_images'))
                                        <div class="text-danger">{{ $errors->first('master_images') }}</div>
                                        @endif
                                    </div>
                                </div>
                                <div class="input-group-append">
                                    <button type="submit" class="input-group-text">Upload</button>
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
                                @foreach ($masterimage as $no =>$data)
                                <tr>
                                    <td scope="row">{{$masterimage->firstItem()+$no}}</td>
                                    <td>{{$data->category}}</td>
                                    <td>{{$data->url_path}}</td>
                                    <td>
                                        <div class="img-responsive">
                                            <img src="{{asset($data->url_path)}}" height="40" width="40" alt="" />
                                            </a>
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        <a href="#" class="btn btn-info btn-sm" title="View"><i
                                                class="fas fa-eye"></i></a>
                                        <form action="/admin/upload/{{$data->id}}" method="post" class="d-inline"
                                            onsubmit="return confirm('Are you sure delete this?')">
                                            @method('delete')
                                            @csrf
                                            <button type="submit" class="btn btn-danger btn-sm" title="Delete"><i
                                                    class="fas fa-trash"></i></button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $masterimage->links() }}
                    </div>

                </div>
            </div>
        </div>

    </div>
</div>

@endsection
