@extends('admin.master_admin')
@section('title', 'Product')

@section('main-content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Product Category</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('index.admin') }}">Admin</a></li>
                    <li class="breadcrumb-item active">Product</li>
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
                        <h3 class="card-title">Product Category</h3>
                        <div class="card-tools">
                            <div class="input-group input-group-md">
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-default">
                                    Tambah Kategori
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
                                    <th>Title Category</th>
                                    <th>Thumbnail</th>
                                    <th style="width: 130px">Act</th>
                                </tr>
                            </thead>

                            <tbody>
                                @if ($productCategories->count() > 0)
                                    @foreach ($productCategories as $category)
                                        <tr>
                                            <th scope="row">{{ $loop->iteration }}</th>
                                            <td>{{ $category->category_name }}</td>
                                            <td></td>

                                            <td class="text-center">

                                                <button class="btn btn-warning btn-sm" title="Edit Category">
                                                    <i class="fas fa-pencil-alt"></i>
                                                </button>

                                                <button  type="button" class="btn btn-danger btn-sm" onclick="confirmDeleteCategoryProduct('{{$category->id}}')" title="Delete Category">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="4">Data Kosong</td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>

                    <!-- /.card-body -->
                    <div class="card-footer clearfix">
                        {{ $productCategories->links('pagination::simple-bootstrap-4') }}
                    </div>

                </div>

                <!-- /.card -->
            </div>
        </div>
    </div><!-- /.container-fluid -->
</div>
<!-- /.content -->

<div class="modal fade" id="modal-default">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form action="{{ route('product-category.store') }}" method="POST">
                @csrf
                <div class="modal-header">
                    <h4 class="modal-title">Default Modal</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" name="category_name" class="form-control" value="" placeholder="Nama Kategori" required>
                    </div>

                    <div class="form-group">
                        <input type="file" name="thumbnail_image" required="" value="" id="file">
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
@endsection

@section('js-script')
    <script>
        function confirmDeleteCategoryProduct(id){
            Swal.fire({
                title: 'Apakah anda yakin ingin Menghapus data product category ini?',
                text: "Data product yang terhubung dengan category ini akan ikut terhapus!",
                showDenyButton: true,
                showCancelButton: false,
                confirmButtonText: `Ya`,
                denyButtonText: `Tidak`,
                }).then((result) => {
                /* Read more about isConfirmed, isDenied below */
                if (result.isConfirmed) {
                    window.deleteCategoryProduct(id);
                }
            });
        }

    </script>
@endsection
