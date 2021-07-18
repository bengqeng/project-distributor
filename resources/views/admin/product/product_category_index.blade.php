@extends('admin.master_admin')
@section('title', 'Kategori Produk')

@section('main-content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Kategori Produk</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('index.admin') }}">Admin</a></li>
                    <li class="breadcrumb-item active">Kategori Produk</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<section class="content">
    <!-- Default box -->
    <div class="card card-solid">
        <div class="card-header">
            <h3 class="card-title">Kategori Produk</h3>
            <div class="card-tools">
                <div class="input-group input-group-md">
                    <button type="button" class="btn btn-primary" onclick="window.addNewCategoryProduct()">
                        Tambah Kategori
                    </button>
                </div>
            </div>
        </div>
        <div class="card-body pb-0">
            <div class="row d-flex align-items-stretch">
                @if ($productCategories->count() > 0)
                    @foreach ($productCategories as $category)
                        <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch" id="product_category_content">
                            <div class="card bg-light" id="product_category_card">
                                @if (empty($category->thumbnail_url))
                                    <div class="ribbon-wrapper ribbon-xl">
                                        <div class="ribbon bg-danger text-l">
                                            Gambar Kosong
                                        </div>
                                    </div>
                                @endif
                                <div class="card-header text-muted border-bottom-0">
                                    {{ $category->category_name }}
                                </div>
                                <div class="card-body pt-0">
                                    <div class="row">
                                        <div class="col-10 text-center">
                                            <img id="image_index_preview" src="{{ empty($category->thumbnail_url) ? asset('vendor/img/avatar/image-not-found.png') : asset($category->thumbnail_url) }}" alt="" class="img-fluid">
                                        </div>
                                    </div>
                                </div>
                                <div class="row justify-content-between">
                                    <div class="col-4">
                                        <button class="btn btn-warning btn-sm" id="edit" title="Edit Category" onclick="window.editProductCategory('{{ $category->id }}')">
                                            <i class="fas fa-pencil-alt"></i>
                                            Ubah
                                        </button>
                                    </div>
                                    <div class="col-4 text-right">
                                        <button  type="button" class="btn btn-default btn-sm" id="delete" onclick="confirmDeleteCategoryProduct('{{ $category->id }}')" title="Delete Category">
                                            <i class="fas fa-trash"></i>
                                            Hapus
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                    <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch">
                        Tidak ada data yang ditemukan.
                    </div>
                @endif


            </div>
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
            <nav aria-label="Contacts Page Navigation">
                {{ $productCategories->links('pagination::simple-bootstrap-4') }}
            </nav>
        </div>

    </div>

</section>
<div class="modal fade" id="modal-category-product">
    <div class="modal-dialog modal-lg">
        <div class="modal-content" id="product_category_modal_content">

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
                title: 'Apakah anda yakin ingin Menghapus Kategori Produk ini?',
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
