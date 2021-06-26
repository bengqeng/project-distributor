@extends('admin.master_admin')
@section('title', 'Carousel')

@section('main-content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Carousell</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('index.admin')}}">Admin</a></li>
                    <li class="breadcrumb-item active">Carousell</li>
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
                        <h3 class="card-title">Carousell</h3>
                        <div class="card-tools">
                            <div class="input-group input-group-md">
                                @if(count($carousel) < 4)
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
                                    <th>Title</th>
                                    <th>Description</th>
                                    <th> Image ID </th>
                                    <th style="width: 130px">Act</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($carousel as $no => $data)
                                <tr>
                                    <th scope="row">{{$carousel->firstItem()+$no}}</th>
                                    <td>{{$data->title}}</td>
                                    <td>{{$data->description}}</td>
                                    <td>{{$data->images_id}}</td>
                                    <td class="text-center">
                                        <a href="#" data-id="{{$data->id}}" class="btn btn-warning btn-sm btn-edit-caro"
                                            title="Edit"><i class="fas fa-pencil-alt"></i></a>
                                        <button  onclick="confirmdeleteCarousel({{$data->id}})" type="button"
                                            class="btn btn-danger btn-sm" title="Delete">
                                            <i class="fas fa-trash"></i></button>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    {{$carousel->links()}}
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
                <h4 class="modal-title">Tambah Carousel</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="card-body">
                    <form action="{{route('admin.carousel.new')}}" method="post" enctype="multipart/form-data" id="form">
                        @csrf
                        <div class="row">
                            <div class="col-sm-6">
                                <!-- text input -->
                                <div class="form-group">
                                    <label>Title</label>
                                    <input type="text" name="title" id="title"
                                        class="form-control  @error('title') is-invalid @enderror"
                                        value="{{ old('title') }}" minlength="4" required>
                                    @if($errors->has('title'))
                                    <div class="text-danger">{{ $errors->first('title') }}</div>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label>Deskripsi</label>
                                    <textarea name="description" rows="10" cols="50" id="description"
                                        class="form-control  @error('description') is-invalid @enderror"
                                        value="{{ old('description') }}" required="" minlength="5" ></textarea>
                                    @if($errors->has('description'))
                                    <div class="text-danger">{{ $errors->first('description') }}</div>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Gambar</label>
                                    <select class="form-control @error('images_id') is-invalid @enderror" name="images_id"
                                        required="">
                                        <option class="text-disabled" value="">Pilih Kategori</option>
                                        @foreach ($image as $img)
                                        <option value="{{$img->id}}">{{$img->title}}
                                        </option>
                                        @endforeach
                                    </select>
                                    @if($errors->has('images_id'))
                                    <div class="text-danger">{{ $errors->first('images_id') }}</div>
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
<div class="modal fade " data-backdrop="static" tabindex="-1" role="dialog" id="modal-edit-caro">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Edit Carousel</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="" method="post" enctype="multipart/form-data" id="form-edit-caro">
                @csrf
                <div class="modal-body">

                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-primary btn-update-caro">Save changes</button>
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
// var input = document.getElementById('title');
// input.oninvalid = function(event) {
// event.target.setCustomValidity('Title minimal 4 karakter, hanya diperbolehkan kata dan spasi');
// }

    @if ($errors->any()){
    $('#modal-lg').modal('show')}
    @endif

    function confirmdeleteCarousel(id){
    Swal.fire({
        title: 'Apakah anda yakin ingin menghapus ini?',
        showDenyButton: true,
        showCancelButton: false,
        confirmButtonText: `Ya`,
        denyButtonText: `Tidak`,
        }).then((result) => {
        /* Read more about isConfirmed, isDenied below */
        if (result.isConfirmed) {
            deleteCarousel(id);
        } else if (result.isDenied) {
            Swal.fire('Perubahan tidak disimpan', '', 'info')
        }
    });
}

function deleteCarousel(id){
    url = "{{ route('admin.carousel.delete', ':id') }}";
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
                window.location.href = "{{ route('admin.carousel') }}";
            }
        }
    });
}

</script>
@endsection
