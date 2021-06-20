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
                    <li class="breadcrumb-item"><a href="{{ route('index.admin')}}">Admin</a></li>
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
                                <a href="{{ route('admin.article.create') }}" class="btn btn-primary">
                                    <i class="fas fa-plus"></i> Tambah Baru
                                </a>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th style="width: 10px">#</th>
                                    <th>Title</th>
                                    <th>Author</th>
                                    <th>Time</th>
                                    <th style="width: 130px">Act</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($article as $no =>$data)
                                <tr>
                                    <th scope="row">{{$article->firstItem()+$no}}</th>
                                    <td>{{$data->title}}</td>
                                    <td>{{$data->author}}</td>
                                    <td>{{$data->created_at}}</td>
                                    <td class="text-center">
                                        <a href="{{route('admin.article.show',$data->slug)}}" class="btn btn-info btn-sm" title="View"><i
                                                class="fas fa-eye"></i></a>
                                        <a href="{{route('admin.article.edit',$data->slug)}}" class="btn btn-warning btn-sm" title="Edit"><i
                                                class="fas fa-pencil-alt"></i></a>
                                        <form action="#" method="post"
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
                    {{$article->links()}}
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
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
          <form action="{{route('admin.carousel')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row">
              <div class="col-sm-6">
                <!-- text input -->
                <div class="form-group">
                  <label>Judul</label>
                  <input type="text" name="title" id="title" class="form-control" value="{{ old('title') }}" required>
                </div>
                <div class="form-group">
                  <label>Deskripsi</label>
                  <textarea name="description" rows="10" cols="50" id="description" class="form-control"
                    value="{{ old('description') }}" required></textarea>
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
        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-primary">Save changes</button>
        </div>
        </form>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
</div>
  @endsection
