@extends('admin.master_admin')
@section('title', 'Edit - Tentang Kami')

@section('main-content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Tentang Kami</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('index.admin')}}">Admin</a></li>
                    <li class="breadcrumb-item active">Tentang Kami</li>
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
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Tentang Kami</h3>
                        <div class="card-tools">
                        </div>
                    </div>

                    <!-- /.card-header -->
                    <div class="card-body">
                        <form action="{{route('about.update', $about->id)}}" method="post" enctype="multipart/form-data" id="form">
                            @method('patch')
                            @csrf
                            <div class="row">
                                <div class="col-sm-12">
                                    <input type="hidden" name="id" value="{{$about->id}}" id="id-data">
                                    <div class="form-group">
                                        <label>Gambar</label>
                                        <select class="form-control" name="images_id" required="">
                                            <option class="text-disabled" value="">Pilih Gambar</option>
                                            @foreach ($cat_image as $item)
                                            @if ($item->id == $about->images_id)
                                            <option value={{$item->id}} selected>{{$item->title}}</option>
                                            @else
                                            <option value={{$item->id}}>{{$item->title}}</option>
                                            @endif
                                            @endforeach
                                        </select>
                                        <span id="gambarError" class="alert-message text-danger"></span>
                                    </div>
                                    <div class="form-group">
                                        <label>Deskripsi</label>
                                        @if($errors->has('description'))
                                        <div class="text-danger">{{ $errors->first('description') }}</div>
                                        @endif
                                        <textarea class="form-control @error('description') is-invalid @enderror" id="summernote"
                                            name="description" value="{{ $about->description }}" maxlength="500"
                                            required>{{ $about->description }}</textarea>
                                        <span id="maxContentPost"></span>
                                    </div>
                                </div>
                            </div>


                            <div class="form-group row">
                                <div class="col-sm-10">
                                    <a href="{{route('about.index')}}" type="submit" class="btn btn-secondary">Kembali</a>
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                </div>
                            </div>
                        </form>

                    </div>
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
$(document).ready(function () {
            $('#summernote').summernote({
                toolbar: [
                  ['style', ['bold', 'italic', 'underline', 'clear']]
                ],
                placeholder: 'Leave a comment ...',
                callbacks: {
                    onKeydown: function (e) {
                        var t = e.currentTarget.innerText;
                        if (t.trim().length >= 500) {
                            //delete keys, arrow keys, copy, cut, select all
                            if (e.keyCode != 8 && !(e.keyCode >=37 && e.keyCode <=40) && e.keyCode != 46 && !(e.keyCode == 88 && e.ctrlKey) && !(e.keyCode == 67 && e.ctrlKey) && !(e.keyCode == 65 && e.ctrlKey))
                            e.preventDefault();
                        }
                    },
                    onKeyup: function (e) {
                        var t = e.currentTarget.innerText;
                        $('#maxContentPost').text(500 - t.trim().length);
                    },
                    onPaste: function (e) {
                        var t = e.currentTarget.innerText;
                        var bufferText = ((e.originalEvent || e).clipboardData || window.clipboardData).getData('Text');
                        e.preventDefault();
                        var maxPaste = bufferText.length;
                        if(t.length + bufferText.length > 500){
                            maxPaste = 500 - t.length;
                        }
                        if(maxPaste > 0){
                            document.execCommand('insertText', false, bufferText.substring(0, maxPaste));
                        }
                        $('#maxContentPost').text(500 - t.length);
                    }
                }
            });
        });
</script>
@endsection
