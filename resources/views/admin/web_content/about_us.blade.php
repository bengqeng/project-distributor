@extends('admin.master_admin')
@section('title', 'Tentang Kami')

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
                    </div>

                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="" class="table table-bordered">
                            <thead>
                                <tr>
                                    <th style="width: 10px">#</th>
                                    <th>Deskripsi</th>
                                    <th>ID Gambar</th>
                                    <th style="width: 130px">Act</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($about as $no => $data)
                                <tr>
                                    <th scope="row">{{ $loop->iteration }}</th>
                                    <td>{!! Str::limit($data->description,100, ' ...') !!}</td>
                                    <td>{{ $data->title }}</td>
                                    <td class="text-center">
                                        <a href="{{ route('about.edit', $data->id)}}" class="btn btn-warning btn-sm"
                                            title="Edit"><i class="fas fa-pencil-alt"> Edit</i></a>
                                        {{-- <button  onclick="confirmdeleteAbout('{{ $data->id}}')" type="button"
                                            class="btn btn-danger btn-sm" title="Delete">
                                            <i class="fas fa-trash"></i></button> --}}
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- /.card -->
            </div>
        </div>
    </div><!-- /.container-fluid -->
</div>
<!-- /.content -->
@endsection
@section('modal')
<div class="modal fade " data-backdrop="static" tabindex="-1" role="dialog" id="modal-lg">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Tambah Tentang Kami</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="card-body">
                    <form action="{{route('about.store')}}" method="post" enctype="multipart/form-data" id="form">
                        @csrf
                        <div class="row">
                            <div class="col-sm-12">
                                <!-- text input -->
                                    <div class="form-group">
                                        <label>Gambar</label>
                                        <select class="form-control @error('images_id') is-invalid @enderror" name="images_id"
                                            required="">
                                            <option class="text-disabled" value="">Pilih Gambar</option>
                                            @foreach ($image as $img)
                                            <option value="{{$img->id}}">{{$img->title}}
                                            </option>
                                            @endforeach
                                        </select>
                                        @if($errors->has('images_id'))
                                        <div class="text-danger">{{ $errors->first('images_id') }}</div>
                                        @endif
                                    </div>
                                <div class="form-group">
                                    <label>Deskripsi</label>
                                    @if($errors->has('description'))
                                    <div class="text-danger">{{ $errors->first('description') }}</div>
                                    @endif
                                    <textarea name="description" rows="10" cols="50" id="description"
                                        class="form-control  @error('description') is-invalid @enderror"
                                        value="{{ old('description') }}" required="" minlength="5" maxlength="500"></textarea>
                                        <span id="maxContentPost"></span>
                                </div>
                            </div>

                        </div>

                        <div class="modal-footer justify-content-between">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
</div>
<div class="modal fade " data-backdrop="static" tabindex="-1" role="dialog" id="modal-edit-about">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Sunting Tentang Kami</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="" method="post" enctype="multipart/form-data" id="form-edit-about">
                @csrf
                <div class="modal-body">

                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-primary btn-update-about">Simpan</button>
                </div>
            </form>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
</div>
@endsection

@section('js-script')
<script>

$(document).ready(function () {
            $('#description').summernote({
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

    @if ($errors->any()){
    $('#modal-lg').modal('show')}
    @endif

    function confirmdeleteAbout(id){
    Swal.fire({
        title: 'Apakah anda yakin ingin menghapus ini?',
        showDenyButton: true,
        showCancelButton: false,
        confirmButtonText: `Ya`,
        denyButtonText: `Tidak`,
        }).then((result) => {
        /* Read more about isConfirmed, isDenied below */
        if (result.isConfirmed) {
            deleteAbout(id);
        } else if (result.isDenied) {
            Swal.fire('Perubahan tidak disimpan', '', 'info')
        }
    });
}

function deleteAbout(id){
    url = "{{route('about.destroy', ':id')}}";
    url = url.replace(':id', id);

    $.ajax({
        type: "DELETE",
        url: url,
        data: {
            '_token': $('meta[name="csrf-token"]').attr('content')
        },
        dataType: "Json",
        success: function (response) {
            console.log(response.status);
            if (response.status){
                window.location.href = "{{route('about.index')}}";
            }
        }
    });
}

</script>
@endsection
