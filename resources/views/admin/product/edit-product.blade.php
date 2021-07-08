@extends('admin.master_admin')
@section('title', 'Edit product')

@section('main-content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Edit Product</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('index.admin')}}">Admin</a></li>
                    <li class="breadcrumb-item active"><a href="{{ route('product.index')}}">Product</a></li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<div class="content">
    <div class="container-fluid">
        <form action="{{ route('product.update', $product->slug) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            <div class="row">
                <div class="col-sm-6">
                    <!-- text input -->
                    <div class="form-group">
                        <label>Title</label>
                        <input type="text" name="title" id="title"
                            class="form-control  @error('title') is-invalid @enderror" value="{{ $product->title }}"
                            minlength="4" required>
                        @if($errors->has('title'))
                            <div class="text-danger">{{ $errors->first('title') }}</div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label>Gambar 1</label>
                        <select class="form-control @error('images_1') is-invalid @enderror" id="images_1"
                            name="images_1" required="">
                            <option class="text-disabled" value="">Pilih Gambar</option>
                            @foreach ($listImage as $item)
                                @if ($item->id == $product->images_1)
                                    <option value={{$item->id}} selected>{{$item->title}}</option>
                                @else
                                    <option value={{$item->id}}>{{$item->title}}</option>
                                @endif
                            @endforeach
                        </select>
                        @if($errors->has('images_1'))
                            <div class="text-danger">{{ $errors->first('images_1') }}</div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label>Gambar 2</label>
                        <select class="form-control @error('images_2') is-invalid @enderror" id="images_2"
                            name="images_2" required="">
                            <option class="text-disabled" value="">Pilih Gambar</option>
                            @foreach ($listImage as $item)
                                @if ($item->id == $product->images_2)
                                    <option value={{$item->id}} selected>{{$item->title}}</option>
                                @else
                                     value={{$item->id}}>{{$item->title}}</option>
                                @endif
                            @endforeach
                        </select>
                        @if($errors->has('images_2'))
                        <div class="text-danger">{{ $errors->first('images_2') }}</div>
                        @endif
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Produk by Kategory</label>
                        <select class="form-control @error('category_id') is-invalid @enderror" id="category_id"
                            name="category_id" required="">
                            <option class="text-disabled" value="">Pilih Kategori</option>
                            @foreach ($categoryProduct as $item)
                                @if ($item->id == $product->category_id)
                                     value="{{ $item->id }}" selected>{{ $item->category_name }}</option>
                                @else
                                     value="{{ $item->id }}">{{ $item->category_name }}</option>
                                @endif
                            @endforeach
                        </select>
                        @if($errors->has('category_id'))
                        <div class="text-danger">{{ $errors->first('category_id') }}</div>
                        @endif
                    </div>


                    <div class="form-group">
                        <label>Gambar 3</label>
                        <select class="form-control @error('images_3') is-invalid @enderror" id="images_3"
                            name="images_3" required="">
                            <option class="text-disabled" value="">Pilih Gambar</option>
                            @foreach ($listImage as $item)
                                @if ($item->id == $product->images_3)
                                    <option value={{$item->id}} selected>{{$item->title}}</option>
                                @else
                                    <option value={{$item->id}}>{{$item->title}}</option>
                                @endif
                            @endforeach
                        </select>
                        @if($errors->has('images_3'))
                            <div class="text-danger">{{ $errors->first('images_3') }}</div>
                        @endif
                    </div>

                    <div class="form-group">
                        <label>Gambar 4</label>
                        <select class="form-control @error('images_4') is-invalid @enderror" id="images_4"
                            name="images_4" required="">
                            <option class="text-disabled" value="">Pilih Gambar</option>
                            @foreach ($listImage as $item)
                                @if ($item->id == $product->images_4)
                                    <option value={{$item->id}} selected>{{$item->title}}</option>
                                @else
                                    <option value={{$item->id}}>{{$item->title}}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-10">
                    <div class="form-group">
                        <label>Deskripsi</label>
                        <textarea class="form-control @error('description') is-invalid @enderror" id="summernote"
                            name="description" value="{{ $product->description }}"
                            required>{{ $product->description }}</textarea>
                        @if($errors->has('description'))
                            <div class="text-danger">{{ $errors->first('description') }}</div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label>Tabel Deskripsi</label>
                        <textarea class="form-control @error('tabdesc') is-invalid @enderror" id="summernote2"
                            name="tabdesc" value="{{ $product->tabdesc }}" required>{{ $product->tabdesc }}</textarea>
                        @if($errors->has('tabdesc'))
                            <div class="text-danger">{{ $errors->first('tabdesc') }}</div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label>How To Use</label>
                        <textarea class="form-control @error('howtouse') is-invalid @enderror" id="summernote3"
                            name="howtouse" value="{{ $product->howtouse }}"
                            required>{{ $product->howtouse }}</textarea>
                        @if($errors->has('howtouse'))
                            <div class="text-danger">{{ $errors->first('howtouse') }}</div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label>Ingrediends</label>
                        <textarea class="form-control @error('ingredients') is-invalid @enderror" id="summernote4"
                            name="ingredients" value="{{ $product->ingredients }}"
                            required>{{ $product->ingredients }}</textarea>
                        @if($errors->has('ingredients'))
                            <div class="text-danger">{{ $errors->first('ingredients') }}</div>
                        @endif
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-10">
                            <a href="{{route('admin.article')}}" type="submit" class="btn btn-secondary">Kembali</a>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </div>
                </div>
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

    $('#summernote2').summernote({
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

    $('#summernote3').summernote({
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

    $('#summernote4').summernote({
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
