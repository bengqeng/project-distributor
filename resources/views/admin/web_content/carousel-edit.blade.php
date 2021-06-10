<div class="row">
    <div class="col-sm-6">
       <input type="hidden" name="id" value="{{$carousel->id}}" id="id-data">
        <div class="form-group">
            <label>Title</label>
            <input type="text" name="title" id="title" class="form-control  @error('title') is-invalid @enderror"
                value="{{ $carousel->title }}" required="">
        </div>
        <div class="form-group">
            <label>Deskripsi</label>
            <textarea name="description" rows="10" cols="50" id="description"
                class="form-control  @error('description') is-invalid @enderror" value="{{ $carousel->description }}"
                required="">{{ $carousel->description }}</textarea>
            </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label>Gambar</label>
            <select class="form-control @error('images') is-invalid @enderror" name="images" required="">
                <option class="text-disabled" value="">Pilih Kategori</option>
                {{-- <option value="{{$carousel->images_id}}" selected>{{$carousel->images_id}}</option> --}}
                @foreach ($cat_image as $item)
                @if ($item->id == $carousel->images_id)
                <option value={{$item->id}} selected>{{$item->id}}</option>
                @else
                <option value={{$item->id}}>{{$item->id}}</option>
                @endif
                @endforeach
            </select>
        </div>
    </div>
</div>
