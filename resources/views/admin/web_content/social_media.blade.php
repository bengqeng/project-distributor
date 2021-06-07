@extends('admin.master_admin')
@section('title', 'Social Media')

@section('main-content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Social Media</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item">Admin</li>
                    <li class="breadcrumb-item active">Social Media</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->
@if (session('status'))
<div class="alert alert-success">
    {{ session('status') }}
</div>
@elseif (session('status2'))
<div class="alert alert-danger">
    {{ session('status2') }}
</div>
@endif
<!-- Main content -->
<div class="content">
    <div class="container-fluid">

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Social Media</h3>
                        <div class="card-tools">
                            <div class="input-group input-group-md">
                                <button type="button" class="btn btn-primary" data-toggle="modal"
                                    data-target="#modal-lg">
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
                                    <th>Social Media</th>
                                    <th>Link</th>
                                    <th>Link Share</th>
                                    <th style="width: 130px">Act</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($social_media as $socmed)
                                <tr>
                                    <th scope="row">{{$loop->iteration}}</th>
                                    <td>{{$socmed->media_type}}</td>
                                    <td>{{$socmed->url}}</td>
                                    <td>{{$socmed->url_share}}</td>
                                    <td class="text-center">
                                        <a href="#" class="btn btn-info btn-sm" title="View"><i
                                                class="fas fa-eye"></i></a>
                                        <a href="#" class="btn btn-warning btn-sm" title="Edit"><i
                                                class="fas fa-pencil-alt"></i></a>
                                        <form action="/admin/webcontent/social/{{$socmed->id}}" method="post"
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
@section('modal')
<div class="modal hide fade in" data-backdrop="static" id="modal-lg">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Tambah Carousel</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="card-body">
          <form action="{{route('admin.carousel.new')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row">
              <div class="col-sm-6">
                <!-- text input -->
                <div class="form-group">
                  <label>Judul</label>
                  <input type="text" name="title" id="title" class="form-control" value="{{ old('title') }}"
                    required="">
                </div>
                <div class="form-group">
                  <label>Deskripsi</label>
                  <textarea name="description" rows="10" cols="50" id="description" class="form-control"
                    value="{{ old('description') }}" required=""></textarea>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label>Gambar</label>
                  <select class="form-control @error('category') is-invalid @enderror" name="category" required="">
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
            </div>

            <div class="modal-footer justify-content-between">
              <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
          </form>
        </div>
        <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
    </div>
  </div>
</div>
  @endsection
