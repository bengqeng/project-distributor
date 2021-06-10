@extends('admin.master_admin')
@section('title', 'Tambah Article')

@section('main-content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Tambah Article</h1>
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
                <div class="form-group">
                    <label>Title</label>
                    <input type="text" name="title" id="title"
                        class="form-control  @error('title') is-invalid @enderror" value="{{ old('title') }}"
                        required="">
                    @if($errors->has('title'))
                    <div class="text-danger">{{ $errors->first('title') }}</div>
                    @endif
                </div>
                <div class="form-group">
                    <label>Author</label>
                    <input type="text" name="title" id="title"
                        class="form-control  @error('title') is-invalid @enderror" value="{{ old('title') }}"
                        required="">
                    @if($errors->has('title'))
                    <div class="text-danger">{{ $errors->first('title') }}</div>
                    @endif
                </div>

                <div id="summernote"></div>

                <!-- /.card-body -->
            </div>
            <div class="modal-footer justify-content-between">
                <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
            <!-- /.card -->
        </div>
    </div>


</div><!-- /.container-fluid -->
</div>
<!-- /.content -->

@endsection
@section('js-script')
<script>
    $(document).ready(function() {
      $('#summernote').summernote({
        height: 250,
      });
    });
</script>
@endsection
