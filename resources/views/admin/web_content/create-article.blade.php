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
        <form action="{{route('admin.article.new')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-8">
                    @csrf
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
                    <input type="text" name="author" id="author"
                        class="form-control  @error('author') is-invalid @enderror" value="{{ old('author') }}"
                        required="">
                    @if($errors->has('author'))
                    <div class="text-danger">{{ $errors->first('author') }}</div>
                    @endif
                </div>
                {{-- <div class="form-group">
                    <label for="exampleInputFile">Image</label>
                    <div class="input-group">
                        <input type="file" @error('master_images') is-invalid @enderror name="master_images"
                            required="" value="{{ old('master_images')}}">
                    </div>
                    @if($errors->has('master_images'))
                    <div class="text-danger">{{ $errors->first('master_images') }}</div>
                    @endif
                </div> --}}
            </div>
            <div class="col-12">
                <label>Article</label>
                <textarea class="form-control @error('body_article') is-invalid @enderror" id="summernote" name="body_article"  value="{{ old('body_article') }}" required></textarea>
                @if($errors->has('body_article'))
                <div class="text-danger">{{ $errors->first('body_article') }}</div>
                @endif
                <div class="modal-footer justify-content-between">
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </div>
            <!-- /.card -->
        </div>
        </form>


    </div>
</div>

@endsection
@section('js-script')
<script>
$('#summernote').summernote({
  toolbar: [
    // [groupName, [list of button]]
    ['style', ['bold', 'italic', 'underline', 'clear']],
    ['font', ['strikethrough', 'superscript', 'subscript']],
    ['fontsize', ['fontsize']],
    ['color', ['color']],
    ['para', ['ul', 'ol', 'paragraph']],
    ['height', ['height']]
  ],
 height:300,
});
</script>
@endsection
