@extends('admin.master_admin')
@section('title', 'Edit Article')

@section('main-content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Edit Article</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('index.admin')}}">Admin</a></li>
                    <li class="breadcrumb-item active"><a href="{{ route('admin.article')}}">Article</a></li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<div class="content">
    <div class="container-fluid">
        <form action="{{route('admin.article.update', $article->slug)}}" method="post" enctype="multipart/form-data">
            @method('patch')
            @csrf
            <div class="row">
                <div class="col-8">
                    @csrf
                    <div class="form-group">
                        <label>Title</label>
                        <input type="text" name="title" id="title"
                            class="form-control  @error('title') is-invalid @enderror" value="{{ $article->title }}"
                            required="">
                        @if($errors->has('title'))
                        <div class="text-danger">{{ $errors->first('title') }}</div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label>Author</label>
                        <input type="text" name="author" id="author"
                            class="form-control  @error('author') is-invalid @enderror" value="{{ $article->author }}"
                            required="">
                        @if($errors->has('author'))
                        <div class="text-danger">{{ $errors->first('author') }}</div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label>Gambar</label>
                        <select class="form-control @error('images_id') is-invalid @enderror" name="images_id"
                            required="">
                            <option class="text-disabled" value="">Pilih Kategori</option>
                            @foreach ($image as $item)
                            @if ($item->id == $article->images_id)
                            <option value={{$item->id}} selected>{{$item->title}}</option>

                            @else
                            <option value={{$item->id}}>{{$item->title}}</option>
                            @endif

                            @endforeach
                        </select>
                        @if($errors->has('images_id'))
                        <div class="text-danger">{{ $errors->first('images_id') }}</div>
                        @endif
                    </div>
                </div>

                <div class="col-12">
                    <div class="form-group">
                        <textarea class="form-control @error('body_article') is-invalid @enderror" id="summernote"
                            name="body_article" value="{{ $article->body_article }}"
                            required>{{ $article->body_article }}</textarea>
                        @if($errors->has('body_article'))
                        <div class="text-danger">{{ $errors->first('body_article') }}</div>
                        @endif
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-10">
                            <a href="{{route('admin.article')}}" type="submit" class="btn btn-secondary">Kembali</a>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
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
