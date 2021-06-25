@extends('admin.master_admin')
@section('title', 'Upload Image')
@section('main-content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Upload Image</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('index.admin')}}">Admin</a></li>
                    <li class="breadcrumb-item active">Upload</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->
@if (session('status'))
<div class="alert alert-success" id="status-message">
    {{ session('status') }}
</div>
@elseif (session('status2'))
<div class="alert alert-danger" id="status-message">
    {{ session('status2') }}
</div>
@endif
<!-- Main content -->
<div class="content">
    <div class="container-fluid">

        <div class="row">
            <div class="col-12">
                <div class="card card-warning">
                    <!-- /.card-header -->
                    <div class="card-body">
                        <form action="{{route('admin.upload.new')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-sm-4">
                                    <!-- text input -->
                                    <div class="form-group">
                                        <label>Title</label>
                                        <input type="text" name="title" id="title"
                                            class="form-control  @error('title') is-invalid @enderror"
                                            value="{{ old('title') }}" minlength="3" required>
                                            {{-- required pattern="/^[a-zA-Z]*$/" --}}
                                        @if($errors->has('title'))
                                        <div class="text-danger">{{ $errors->first('title') }}</div>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <!-- text input -->
                                    <div class="form-group">
                                        <label>Category</label>
                                        <select class="form-control " name="category" required=""
                                            value="{{ old('category')}}">
                                            <option class="text-disabled" value="">Pilih Kategori</option>
                                            <option value="carousel">Carousell</option>
                                            <option value="article">Article</option>
                                            <option value="product">Product</option>
                                            <option value="about_us">About Us</option>
                                            <option value="galery">Galery</option>
                                        </select>
                                        @if($errors->has('category'))
                                        <div class="text-danger">{{ $errors->first('category') }}</div>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="exampleInputFile">Image</label>
                                        <div class="input-group">
                                            <input type="file" @error('master_images') is-invalid @enderror
                                                name="master_images" required="" value="{{ old('master_images')}}"
                                                id="file">
                                        </div>
                                        @if($errors->has('master_images'))
                                        <div class="text-danger">{{ $errors->first('master_images') }}</div>
                                        @endif
                                        <div class="text-danger" id="client-error"></div>
                                    </div>
                                </div>
                                <div class="input-group-append">
                                    <button type="submit" class="input-group-text">Upload</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Favorit Product</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th style="width: 10px">#</th>
                                    <th>Title</th>
                                    <th>Category</th>
                                    <th>url_path</th>
                                    <th> Image </th>
                                    <th style="width: 130px">Act</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($masterimage as $no =>$data)
                                <tr>
                                    <td scope="row">{{$masterimage->firstItem()+$no}}</td>
                                    <td>{{$data->title}}</td>
                                    <td>{{$data->category}}</td>
                                    <td>{{$data->url_path}}</td>
                                    <td>
                                        <div class="img-responsive">
                                            <img src="{{asset($data->url_path)}}" height="40" width="40" alt="" data-zoomable/>
                                            </a>
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        <button  onclick="confirmdeleteUpload({{$data->id}})" type="button"
                                            class="btn btn-danger btn-sm" title="Delete">
                                            <i class="fas fa-trash"></i>
                                            Hapus
                                        </button>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $masterimage->links() }}
                    </div>

                </div>
            </div>
        </div>

    </div>
</div>

@endsection
@section('js-script')
<script>
    $(document).ready(function () {
        mediumZoom('[data-zoomable]');
    });

    document.getElementById("file").addEventListener("change", validateFile)
    function validateFile(){
        const allowedExtensions =  ['jpg','jpeg','png','JPG','JPEG'],
                sizeLimit = 300000; //300kb

        const { name:fileName, size:fileSize } = this.files[0];
        const fileExtension = fileName.split(".").pop();

        if(!allowedExtensions.includes(fileExtension)){
            document.getElementById('client-error').innerHTML = "Format gambar hanya jpg, png, dan jpeg";
            this.value = null;
        }else if(fileSize > sizeLimit){
            document.getElementById('client-error').innerHTML = "Maksimal ukuran 300 Kb";
            this.value = null;
        }
    }

    function confirmdeleteUpload(id){
        Swal.fire({
            title: 'Apakah anda yakin ingin menghapus data aproval ini?',
            showDenyButton: true,
            showCancelButton: true,
            confirmButtonText: `Ya`,
            denyButtonText: `Tidak`,
            }).then((result) => {
            /* Read more about isConfirmed, isDenied below */
            if (result.isConfirmed) {
                deleteUpload(id);
            } else if (result.isDenied) {
                Swal.fire('Perubahan tidak disimpan', '', 'info')
            }
        });
    }

    function deleteUpload(id){
        url = "{{ route('admin.upload.delete', ':id') }}";
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
                    window.location.href = "{{ route('admin.upload') }}";
                }
            }
        });
    }
</script>
@endsection
