<form action="{{ route('product-category.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="modal-header">
        <h4 class="modal-title">Tambah Kategori</h4>
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
        <div class="row justify-content-center">
            <div class="col-4">
                <img src="" id="preview_product_category" width="150px" height="150px">
            </div>
        </div>
    </div>
    <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-default" data-dismiss="modal">Kembali</button>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </div>
</form>


<script>
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#preview_product_category').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#file").change(function(){
        readURL(this);
    });
</script>
