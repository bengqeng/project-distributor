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
                    <li class="breadcrumb-item">Admin</li>
                    <li class="breadcrumb-item active">Carousell</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->
@if (session('status'))
<div class="alert alert-success">
    {{ session('status') }}
</div>
@elseif (session('status2'))
<div class="alert alert-danger">
    {{ session('status2') }}
</div>
@endif
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
                                <button type="button" class="btn btn-primary" data-toggle="modal"
                                    data-target="#modal-lg">
                                    <i class="fas fa-plus"></i> Add New
                                </button>
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
                                    <td>{{$data->tittle}}</td>
                                    <td>{{$data->description}}</td>
                                    <td>{{$data->images_id}}</td>
                                    <td class="text-center">
                                        <a href="#" class="btn btn-info btn-sm" title="View"><i
                                                class="fas fa-eye"></i></a>
                                        <a href="#" data-id="{{$data->id}}" class="btn btn-warning btn-sm btn-edit"
                                            title="Edit"><i class="fas fa-pencil-alt"></i></a>
                                        <form action="{{route('admin.carousel.delete', $data->id)}}" method="post"
                                            class="d-inline" onsubmit="return confirm('Are you sure delete this?')">
                                            @method('delete')
                                            @csrf
                                            <button type="submit" class="btn btn-danger btn-sm" title="Delete"><i
                                                    class="fas fa-trash"></i></button></form>
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
<div class="modal fade " tabindex="-1" role="dialog" id="modal-lg">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Large Modal</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="card-body">
                    <form action="{{route('admin.carousel.new')}}" method="post" enctype="multipart/form-data" id="new">
                        @csrf
                        <div class="row">
                            <div class="col-sm-6">
                                <!-- text input -->
                                <div class="form-group">
                                    <label>Title</label>
                                    <input type="text" name="title" id="title"
                                        class="form-control  @error('title') is-invalid @enderror"
                                        value="{{ old('title') }}" required="">
                                    @if($errors->has('title'))
                                    <div class="text-danger">{{ $errors->first('title') }}</div>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label>Deskripsi</label>
                                    <textarea name="description" rows="10" cols="50" id="description"
                                        class="form-control  @error('description') is-invalid @enderror"
                                        value="{{ old('description') }}" required=""></textarea>
                                    @if($errors->has('description'))
                                    <div class="text-danger">{{ $errors->first('description') }}</div>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Gambar</label>
                                    <select class="form-control @error('images') is-invalid @enderror" name="images"
                                        required="">
                                        <option class="text-disabled" value="">Pilih Kategori</option>
                                        @foreach ($image as $img)
                                        <option value="{{$img->id}}">{{$img->id}}
                                        </option>
                                        @endforeach
                                    </select>
                                    @if($errors->has('images'))
                                    <div class="text-danger">{{ $errors->first('images') }}</div>
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
<div class="modal fade " tabindex="-1" role="dialog" id="modal-edit">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Large Modal</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <!-- /.modal-content -->
            </div>
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


    $('.btn-edit').on('click',function(){
        console.log($(this).data('id'))
        let id = $(this).data('id')
        $.ajax({
            url:`/admin/webcontent/carousel/${id}/edit`,
            method: "GET",
            success: function(data){
                console.log(data)
                $('#modal-edit').modal('show')

            },
            error:function(error){
                console.log(eddor)
            }

        })


    })

</script>
@endsection
