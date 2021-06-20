@extends('admin.master_admin')
@section('title', 'Sosial Media')

@section('main-content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Sosial Media</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('index.admin')}}">Admin</a></li>
                    <li class="breadcrumb-item active">Sosial Media</li>
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
                        <h3 class="card-title">Sosial Media</h3>
                        <div class="card-tools">
                            <div class="input-group input-group-md">
                                @if(count($social) < 4)
                                <button type="button" class="btn btn-primary" data-toggle="modal"
                                    data-target="#modal-lg">
                                    <i class="fas fa-plus"></i> Tambah Baru
                                </button>
                                @endif
                            </div>
                        </div>
                    </div>

                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="" class="table table-bordered">
                            <thead>
                                <tr>
                                    <th style="width: 10px">#</th>
                                    <th>Sosial Media</th>
                                    <th>URL</th>
                                    <th>URL Share</th>
                                    <th style="width: 130px">Act</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($social as $no => $data)
                                <tr>
                                    <th scope="row">{{$loop->iteration}}</th>
                                    <td>{{$data->media_type}}</td>
                                    <td>{{$data->url}}</td>
                                    <td>{{$data->url_share}}</td>
                                    <td class="text-center">
                                        <a href="#" data-id="{{$data->id}}" class="btn btn-warning btn-sm btn-edit-social"
                                            title="Edit"><i class="fas fa-pencil-alt"></i></a>
                                        <button  onclick="confirmdeleteSocial('{{ $data->id}}')" type="button"
                                            class="btn btn-danger btn-sm" title="Delete">
                                            <i class="fas fa-trash"></i></button>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    {{-- {{$social->links()}} --}}
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
                <h4 class="modal-title">Tambah Sosial Media</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="card-body">
                    <form action="{{route('social.store')}}" method="post" enctype="multipart/form-data" id="form">
                        @csrf
                        <div class="row">
                            <div class="col-sm-6">
                                <!-- text input -->
                                <div class="form-group">
                                    <label>Sosial Media</label>
                                    <input type="text" name="media_type" id="media_type"
                                        class="form-control  @error('media_type') is-invalid @enderror"
                                        value="{{ old('media_type') }}" required>
                                    @if($errors->has('media_type'))
                                    <div class="text-danger">{{ $errors->first('media_type') }}</div>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label>URL</label>
                                    <input type="text" name="url" id="url"
                                        class="form-control  @error('url') is-invalid @enderror"
                                        value="{{ old('url') }}" required>
                                    @if($errors->has('url'))
                                    <div class="text-danger">{{ $errors->first('url') }}</div>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>URL Share</label>
                                    <input type="text" name="url_share" id="url_share"
                                        class="form-control  @error('url_share') is-invalid @enderror"
                                        value="{{ old('url_share') }}">
                                    @if($errors->has('url_share'))
                                    <div class="text-danger">{{ $errors->first('url_share') }}</div>
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
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
</div>
<div class="modal fade " data-backdrop="static" tabindex="-1" role="dialog" id="modal-edit-social">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Edit Sosial Media</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="" method="post" enctype="multipart/form-data" id="form-edit-social">
                @csrf
                <div class="modal-body">

                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-primary btn-update-social">Save changes</button>
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

    @if ($errors->any()){
    $('#modal-lg').modal('show')}
    @endif

    function confirmdeleteSocial(id){
    Swal.fire({
        title: 'Apakah anda yakin ingin menghapus data aproval ini?',
        showDenyButton: true,
        showCancelButton: true,
        confirmButtonText: `Ya`,
        denyButtonText: `Tidak`,
        }).then((result) => {
        /* Read more about isConfirmed, isDenied below */
        if (result.isConfirmed) {
            deleteSocial(id);
        } else if (result.isDenied) {
            Swal.fire('Perubahan tidak disimpan', '', 'info')
        }
    });
}

function deleteSocial(id){
    url = "{{route('social.destroy', ':id')}}";
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
                window.location.href = "{{route('social.index')}}";
            }
        }
    });
}

</script>
@endsection
