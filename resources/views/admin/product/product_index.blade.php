@extends('admin.master_admin')
@section('title', 'Produk')

@section('main-content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Produk</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('index.admin') }}">Admin</a></li>
                    <li class="breadcrumb-item active">Produk</li>
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
                        <h3 class="card-title">Produk</h3>
                        <div class="card-tools">
                            <div class="input-group input-group-md">
                                {{-- @if(count($product) < 4) --}}
                                    <a href="{{ route('product.create')}}" class="btn btn-primary">
                                        <i class="fas fa-plus"></i> Tambah Baru
                                    </a>
                                {{-- @endif --}}
                            </div>
                        </div>
                    </div>

                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="" class="table table-bordered">
                            <thead>
                                <tr>
                                    <th style="width: 10px">#</th>
                                    <th>Judul</th>
                                    <th>Deskripsi</th>

                                    <th style="width: 130px">Act</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($product as $no => $data)
                                <tr>
                                    <th scope="row">{{$product->firstItem()+$no}}</th>
                                    <td>{{ $data->title }}</td>
                                    <td>{!! $data->description !!}</td>

                                    <td class="text-center">

                                        <a href="{{ route('product.edit',$data->slug) }}" class="btn btn-warning btn-sm" title="Edit"><i
                                            class="fas fa-pencil-alt"></i></a>

                                        <button onclick="confirmdeleteProduct({{ $data->id }})" type="button"
                                            class="btn btn-danger btn-sm" title="Delete">
                                            <i class="fas fa-trash"></i></button>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    {{$product->links()}}
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
        function editProduct(uuid){
            $.ajax({
                url:`/admin/webcontent/product/${uuid}/edit`,
                method: "GET",
                dataType: "html",
                success: function(data){
                    $('#modal-edit-prod').find('.modal-body').html(data)
                    $('#modal-edit-prod').modal('show')
                },
                error:function(error){
                    // console.log(error)
                }
            })
        }
        // $('#btn-edit-prod').on('click', function(e){
        //     console.log(e);
        //     let id = $(this).data('id')
        //     $.ajax({
        //         url:`/admin/webcontent/product/${id}/edit`,
        //         method: "GET",
        //         dataType: "html",
        //         success: function(data){
        //             $('#modal-edit-prod').find('.modal-body').html(data)
        //             $('#modal-edit-prod').modal('show')
        //         },
        //         error:function(error){
        //             // console.log(error)
        //         }
        //     })
        // })

        $('.btn-update-prod').on('click',function(){
            let slug = $('#form-edit-prod').find('#id-data').val()
            let formData = $('#form-edit-prod').serialize()

            $.ajax({
                url:`/admin/webcontent/product/${slug}`,
                method: "PATCH",
                data: formData,
                dataType: "Json",
                success: function(data){
                    window.location.assign('/admin/webcontent/product');
                },
                error:function(response){
                    // console.log(response);
                    $('#titleError').text(response.responseJSON.errors.title);
                    $('#descriptionError').text(response.responseJSON.errors.description);
                    $('#gambarError').text(response.responseJSON.errors.images_id);
                }
            })
        })

        @if ($errors->any()){
            $('#modal-lg').modal('show')}
        @endif

        function confirmdeleteProduct(id){
            Swal.fire({
                title: 'Apakah anda yakin ingin menghapus produk ini?',
                showDenyButton: true,
                showCancelButton: false,
                confirmButtonText: `Ya`,
                denyButtonText: `Tidak`,
                }).then((result) => {
                /* Read more about isConfirmed, isDenied below */
                if (result.isConfirmed) {
                    deleteProduct(id);
                } else if (result.isDenied) {
                    Swal.fire('Perubahan tidak disimpan', '', 'info')
                }
            });
        }

        function deleteProduct(id){
            url = " {{route('product.destroy', ':id') }}";
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
                        window.location.href = "{{route('product.index')}}";
                    }
                }
            });
        }

    </script>
@endsection
