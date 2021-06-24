<form action="{{ route('product-category.store') }}" method="POST" enctype="multipart/form-data">
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
