<div class="row">
    <div class="col-sm-6">
        <input type="hidden" name="id" value="{{$carousel->id}}" id="id-data">
        <div class="form-group">
            <label>Title</label>
            <input type="text" name="title" id="title" class="form-control"
                value="{{ $carousel->title }}" required>
                <span id="titleError" class="alert-message text-danger"></span>
        </div>
        <div class="form-group">
            <label>Deskripsi</label>
            <textarea name="description" rows="10" cols="50" id="description"
                class="form-control" value="{{ $carousel->description }}"
                required="">{{ $carousel->description }}</textarea>
                <span id="descriptionError" class="alert-message text-danger"></span>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label>Gambar</label>
            <select class="form-control" name="images_id" required="">
                <option class="text-disabled" value="">Pilih Kategori</option>
                {{-- <option value="{{$carousel->images_id_id}}" selected>{{$carousel->images_id_id}}</option> --}}
                @foreach ($cat_image as $item)
                @if ($item->id == $carousel->images_id)
                <option value={{$item->id}} selected>{{$item->title}}</option>
                @else
                <option value={{$item->id}}>{{$item->title}}</option>
                @endif
                @endforeach
            </select>
            <span id="gambarError" class="alert-message text-danger"></span>
        </div>
    </div>
</div>
